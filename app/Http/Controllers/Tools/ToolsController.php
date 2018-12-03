<?php

namespace App\Http\Controllers\Tools;


use App\Category;
use App\Http\Controllers\Catalog\ProductController;
use App\Http\Controllers\Controller;
use App\Option;
use App\Partners;
use App\Product;
use App\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Rap2hpoutre\FastExcel\FastExcel;


class ToolsController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.tools.index',
            [
                'categories'=>$categories
            ]);
    }

    public function importJson(Request $request){
        $data = $request->json()->all();
        if ($data['data']){
            return "ok";
        }
        if ($data['key'] == "1234567890"){
            $users_sql = DB::table('partners')->where('index','=','1c')->get()->all();
            foreach ($users_sql as $user_sql){
                Partners::destroy($user_sql->id);
            }
            foreach ($data['users'] as $user) {
                $partner = new Partners();
                $partner->name = $user['user'];
                $partner->addres = $user['tt'];
                $partner->type = "T";
                $partner->index = $user['index'];
                $partner->save();
            }
            return $users_sql;
        }else{
            return "bad key";
        }

    }

    public function importExcel(Request $request)
    {
        if($request->hasFile('import_file')){

            $path = $request->file('import_file')->getRealPath();

            $collection = (new FastExcel)->import($path);
            $product_temp = null;

            $line_food = "";

            foreach ($collection as $key=>$item){
                    if (!empty($item['артикул']) && empty($item['назва EN']) && empty($item['фасовки'])) {
                        $line_food = $item['артикул'];
                    }
                    if ($line_food != "") {
                        if (!empty($item['артикул']) && !empty($item['назва EN'])) {
                            $product_temp = null;

                            //затираем товар и его все сатегории и свойства
                            $current_product = $values_option = DB::table('product')
                                ->where('sku', '=', trim($item['артикул'], " "))
                                ->get();
                            if ($current_product->count() > 0) {
                                ProductController::destroyP($current_product->get(0)->id);
                            }

                            if ($product_temp == null) {
                                $sort = $item['сортування'];
                                $product_temp = $this->createProduct($item);
                                $this->addLineProduct($product_temp, $line_food, $sort);
                                $this->createOptionsProduct($item, $product_temp, $sort);
                            }
                        } else {
                            if ($product_temp != null && !empty($item['фасовки'])) {
                                $this->createOptionsProduct($item, $product_temp, $sort);
                            }
                        }
                    }
            }
            Session::put('success', 'Товары загружены в базу данных!!!');
            return back();
        }else{
            Session::put('error', 'Выберите файл!!!');
            return back();
        }

    }

    public function createProduct($item)
    {
            //создаем товары
            $product = new Product();
            $product->sku = trim($item['артикул'], " ");

            if($item['активность'] == 1){
                $product->active = 1;
            }else{
                $product->active = 0;
            }

            $product->barcode = trim($item['штрихкод'], " ");
            $product->name = trim($item['назва EN'], " ");
            $product->title = trim($item['назва UA'], " ");
            $product->url = Str::slug(trim($item['назва EN'], " "), "-");
            $product->images = '/storage/upload/' . trim($item['артикул'], " ") . '.jpg';
            $product->composition = trim($item['склад'], " ");
            $product->sort = trim($item['сортування'], " ");

            $product->price = 0;
            $product->dose = trim($item['норми годування'], " ");
            $product->excerpt = trim($item['витримка'], " ");
            $product->desc = trim($item['опис'], " ");
            $product->prev_desc = trim($item['застосування'], " ");
            $product->save();

            //категории
            $cat = Category::find(1);
            $product->categories()->attach($cat);

            return $product;
    }

    public function createOptionsProduct($item, $product_temp, $sort): void
    {
        if (!empty($item['розмір тварини'])){
            $values_option = DB::table('option_values')
                ->leftjoin('values', 'values.id', '=', 'option_values.value_id')
                ->where('option_values.option_id', '=', 3)
                ->get();
            $val_o = "";
            $id_o = 3;
            $val_id = "";

            $option_value = "";

            $mass_size = explode(",", $item['розмір тварини']);
            foreach ($mass_size as $size){
                $option_value = $size;
                foreach ($values_option as $value) {
                    if ($value->name == $size) {
                        $val_o = $value->name;
                        $id_o = $value->option_id;
                        $val_id = $value->id;
                        break;
                    }
                }
                if ($val_o != "") {
                    $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val_o, 'sort' => $sort, 'value_id' => $val_id]));
                    $val_o = "";
                }else{
                    $val = new Value();
                    $option = Option::find($id_o);
                    $val->name = $option_value;
                    $val->save();
                    $val->options()->attach($option);
                    $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val->name, 'sort' => $val->sort, 'value_id' => $val->id]));
                }
            }

        }

        //записываем особбености товара
        if (!empty($item['особливості'])){
            $values_option = DB::table('option_values')
                ->leftjoin('values', 'values.id', '=', 'option_values.value_id')
                ->where('option_values.option_id', '=', 9)
                ->get();
            $val_o = "";
            $id_o = 9;
            $val_id = "";

            $option_value = "";

            $mass_size = explode(",", $item['особливості']);
            foreach ($mass_size as $size){
                $option_value = $size;
                foreach ($values_option as $value) {
                    if ($value->name == $size) {
                        $val_o = $value->name;
                        $id_o = $value->option_id;
                        $val_id = $value->id;
                        break;
                    }
                }
                if ($val_o != "") {
                    $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val_o, 'sort' => $sort, 'value_id' => $val_id]));
                    $val_o = "";
                }else{
                    $val = new Value();
                    $option = Option::find($id_o);
                    $val->name = $option_value;
                    $val->save();
                    $val->options()->attach($option);
                    $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val->name, 'sort' => $val->sort, 'value_id' => $val->id]));
                }
            }

        }


        //записываем свойства фасовки
        if (!empty($item['фасовки'])) {
            $values_option = DB::table('option_values')
                ->leftjoin('values', 'values.id', '=', 'option_values.value_id')
                ->where('option_values.option_id', '=', 7)
                ->get();
            $val_o = "";
            $id_o = 7;
            $val_id = "";

            foreach ($values_option as $value) {
                if ($value->name == trim($item['фасовки'], " ")) {
                    $val_o = $value->name;
                    $id_o = $value->option_id;
                    $val_id = $value->id;
                    break;
                }
            }

            if ($val_o != "") {
                $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val_o, 'sort' => $sort, 'value_id' => $val_id]));
            } else {
                $val = new Value();
                $option = Option::find($id_o);
                $val->name = trim($item['фасовки'], " ");
                $val->save();
                $val->options()->attach($option);
                $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val->name, 'sort' => $val->sort, 'value_id' => $val->id]));
            }
        }

        //записываем свойства возраста
        if (!empty($item['вік тварини'])) {
            $values_option = DB::table('option_values')
                ->leftjoin('values', 'values.id', '=', 'option_values.value_id')
                ->where('option_values.option_id', '=', 4)
                ->get();

            $val_o = "";
            $val_id = "";
            $id_o = 4;

            foreach ($values_option as $value) {
                if ($value->name == trim($item['вік тварини'], " ")) {
                    $val_o = $value->name;
                    $val_id = $value->id;
                    $id_o = $value->option_id;
                    break;
                }
            }
            if ($val_o != "") {
                $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val_o,'sort' => $sort, 'value_id' => $val_id]));
            } else {
                $val = new Value();
                $option = Option::find($id_o);
                $val->name = trim($item['вік тварини'], " ");
                $val->save();
                $val->options()->attach($option);
                $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val->name, 'sort' => $val->sort, 'value_id' => $val->id]));
            }
        }
    }

    public function addLineProduct($product_temp, $line_food, $sort){


        //записываем свойства линейки
        if (!empty($line_food)) {
            //получаем список свойств из базы
            $values_option = DB::table('option_values')
                ->leftjoin('values', 'values.id', '=', 'option_values.value_id')
                ->where('option_values.option_id', '=', 8)
                ->get();
            $val_o = "";
            $val_id = "";
            $id_o = 8;
            //проверяем есть это свойство в списке
            foreach ($values_option as $value) {
                if ($value->name == $line_food) {
                    $val_o = $value->name;
                    $val_id = $value->id;
                    $id_o = $value->option_id;
                    break;
                }
            }
            //если свойства не нашли создаем его
            if ($val_o != "") {
                $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val_o, 'sort' => $sort, 'value_id' => $val_id]));
            } else {
                //если есть тогда привязываем его к товару
                $val = new Value();
                $option = Option::find($id_o);
                $val->name = $line_food;
                $val->sort = $sort;
                $val->save();
                $val->options()->attach($option);
                $product_temp->options()->attach(array(['option_id' => $id_o, 'product_id' => $product_temp->id, 'value' => $val->name, 'sort' => $val->sort, 'value_id' => $val->id]));
            }
        }
    }


}
