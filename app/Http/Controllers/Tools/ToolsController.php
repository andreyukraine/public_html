<?php

namespace App\Http\Controllers\Tools;

use App\Category;
use App\Http\Controllers\Catalog\ProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExportFile;
use App\Option;
use App\Partners;
use App\Product;
use App\User;
use App\Value;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PHPExcel_Style_Alignment;
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
        $mass = $request->getContent();
        $data = array();
        $data = json_decode($mass,true);
//        switch (json_last_error()) {
//            case JSON_ERROR_NONE:
//                echo ' - Ошибок нет';
//                break;
//            case JSON_ERROR_DEPTH:
//                echo ' - Достигнута максимальная глубина стека';
//                break;
//            case JSON_ERROR_STATE_MISMATCH:
//                echo ' - Некорректные разряды или несоответствие режимов';
//                break;
//            case JSON_ERROR_CTRL_CHAR:
//                echo ' - Некорректный управляющий символ';
//                break;
//            case JSON_ERROR_SYNTAX:
//                echo ' - Синтаксическая ошибка, некорректный JSON';
//                break;
//            case JSON_ERROR_UTF8:
//                echo ' - Некорректные символы UTF-8, возможно неверно закодирован';
//                break;
//            default:
//                echo ' - Неизвестная ошибка';
//                break;
//        }

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
            foreach ($data['ecommers'] as $ecommers) {
                $partner = new Partners();
                $partner->name = $ecommers['user'];
                $partner->addres = $ecommers['store'];
                if (!empty($ecommers['link'])) {
                    $partner->url = $ecommers['link'];
                }else{
                    $partner->url = $ecommers['store'];
                }
                $partner->type = "I";
                $partner->index = $ecommers['index'];
                $partner->save();
            }
            return "Send ok";
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

    public function createFile(Request $request){
        $category = Category::all();
        $locales = config('app.locales');
        return view('export.index',
            [
                'categorys'=> $category,
                'locales'=>$locales
            ]);
    }

    public function exportFile(Request $request){



        if($request->ajax()){

            $new_product_mass_ajax = array();

            if ($request->id) {
                $products = Category::find($request->id)->products()->get()->sortBy('sort');
                $products_mass = $products;

                // попробуем добавить линейку к товару
                if (!empty($products_mass)){
                    $line = "";
                    foreach ($products_mass->all() as $key=>$product){
                        $product->line = ProductController::getValueOptions(8,$product->id);
                        $product->fasovka = ProductController::getValueOptionsArray(7,$product->id, $request->loc);
                        $product->age = ProductController::getValueOptionsArray(4,$product->id, $request->loc);
                        $product->size = ProductController::getValueOptionsArray(3,$product->id, $request->loc);
                        $product->specifics = ProductController::getValueOptionsArray(9,$product->id, $request->loc);
                        $product->sku = ProductController::getSkuOptionsArray(7,$product->id);
                        $product->barcode = ProductController::getBarcodeOptionsArray(7,$product->id);
                        if ($line == "" || $product->line != ""){
                            $line = $product->line;
                        }
                        if ($line != "" || $product->line == $line){
                            $new_product_mass_ajax[$line][] = $product;
                        }
                    }
                }

                if (count($new_product_mass_ajax) > 0) {

                    $excel = new \PHPExcel();

                    //$excel->createSheet();
                    //$excel->setActiveSheetIndex(1);
                    $excel->getActiveSheet()->setTitle('Chicopee');


                    $name = "name_".$request->loc;
                    $excerpt = "excerpt_".$request->loc;
                    $desc = "desc_".$request->loc;
                    $prev_desc = "prev_desc_".$request->loc;
                    $composition = "composition_".$request->loc;
                    $dose = "dose_".$request->loc;


                    $objWorksheet = $excel->getActiveSheet();
                    $a = array();
                    $objWorksheet->getStyle('A1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('B1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('C1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('D1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('E1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('F1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('G1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('H1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('I1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('J1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('K1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('L1')->getFont()->setBold(true);
                    $objWorksheet->getStyle('M1')->getFont()->setBold(true);
                    $a[1] = array('артикул','штрихкод','название','фасовки','возраст животного','размер животного','особенности','описание','выдержка','применение','состав','норми кормления','картинка');
                    $i = 2;
                    foreach ($new_product_mass_ajax as $k=>$line){
                        $objWorksheet->getStyle('A'.$i)->getFont()->setBold(true);
                        $objWorksheet->getStyle('A'.$i)->getFont()->setSize(18);
//                        $objWorksheet->mergeCells('A'.$i.':B'.$i);
//                        $objWorksheet->mergeCells('A'.$i.':C'.$i);
                        $a[$i] = array($k,'','','');

                        foreach ($line as $f=>$product){
                            $i++;
                            $a[$i] = array(
                                $product->sku,
                                '',
                                $product->$name,
                                '',
                                implode(",", $product->age),
                                implode(",", $product->size),
                                implode(",", $product->specifics),
                                $product->$desc,
                                $product->$excerpt,
                                $product->$prev_desc,
                                $product->$composition,
                                $product->$dose);

                            //fasovka
                            foreach ($product->fasovka as $h=> $ves){
                                if (count($product->fasovka)> 1){
                                    if ($h == 0) {
                                        $objWorksheet->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                                        $a[$i][0] = $product->sku[$h];
                                        $a[$i][1] = $product->barcode[$h];
                                        $a[$i][3] = $ves;
                                        $a[$i][12] = "https://www.chicopee.in.ua/storage/upload/".$product->sku[$h].".jpg";
                                    }else{
                                        $i++;
                                        $objWorksheet->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                                        $a[$i] = array(
                                            $product->sku[$h],
                                            $product->barcode[$h],
                                            '',
                                            $ves,
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            "https://www.chicopee.in.ua/storage/upload/".$product->sku[$h].".jpg"
                                        );
                                    }
                                }else{
                                    $objWorksheet->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                                    $a[$i][0] = $product->sku[$h];
                                    $a[$i][1] = $product->barcode[$h];
                                    $a[$i][3]= $ves;
                                    $a[$i][12] = "https://www.chicopee.in.ua/storage/upload/".$product->sku[$h].".jpg";
                                }
                            }

                        }
                        $i++;
                    }
                    $objWorksheet->fromArray($a);
                    $objWorksheet->getColumnDimension('C')->setAutoSize(true);
                    $objWorksheet->getColumnDimension('D')->setAutoSize(true);
                    $objWorksheet->getColumnDimension('E')->setAutoSize(true);
                    $objWorksheet->getColumnDimension('F')->setAutoSize(true);
                    $writer = new \PHPExcel_Writer_Excel2007($excel);
                    // Save the file.
                    $writer->save(public_path().'/efile.xlsx');
                    return Response($new_product_mass_ajax);
                }else {

                    return Response("error");
                }
            }
        }




    }
}
