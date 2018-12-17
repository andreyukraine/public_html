<?php

namespace App\Http\Controllers\Catalog;

use App\Category;
use App\File;
use App\Filters\ProductFilter;
use App\Option;
use App\Product;
use App\ProductFilter\ProductsFilter;
use App\Value;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function admin(Request $request){

                $products_mass = Product::with('products')->get()->sortBy('sort');
                $categories = Category::where('parent_id', '=', 0)->get();

                //добавляем свойства к товару
                if (count($products_mass->all()) > 0) {
                    foreach ($products_mass as $product) {
                        $product->options = $this->getProductOptionsCategory($product->id);
                    }
                }

                //аякс фильт
                if($request->ajax()){
                    $output = "";
                    if ($request->id) {
                        $products_mass = Category::find($request->id)->products()->get();
                        if (count($products_mass->all()) > 0) {

                            foreach ($products_mass as $product) {
                                $product->options = $this->getProductOptionsCategory($product->id);
                                $output .=
                                '<div class="row">
                                    <div class="col-lg-1">
                                    </div>
                                    <div class="col-lg-2">
                                        <img width="100px" src="'. $product->images.'">
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="product_name">'. $product->name .'</p>
                                        <div class="product_desc">'. $product->excerpt .'</div>
                                    </div>
                                    <div class="col-lg-1">
                                        <a href="'. route('products.edit',$product->id).'"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="'. route('delete.products',$product->id) .'"><span class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                </div>';
                            }
                            return Response($output);
                        } else {
                            $output = "нет товаров";
                            return Response($output);
                        }
                    }
                    return Response($output);
                }

                return view("admin.products.index", [
                    'products' => $products_mass,
                    'categories'=>$categories
                ]);
    }

    public function filter(Request $request)
    {
            $data = DB::table('product_options')
                ->crossjoin('category_product', 'category_product.product_id', '=', 'product_options.product_id')
                ->where('product_options.option_id', '=', $request->opt_id)
                ->groupBy('product_options.value')
                ->get();

            $output = '<select name="age" class="form-select age" data-placeholder="-- Вік вихованця --"><option style="display: none"> </option>';
            foreach ($data as $v){
                $output .= '<option data-opt="'. $v->id .'"value="'.$v->value.'">'. $v->value .'</option>';
            }
            $output .= '</select>';

        return Response($output);
    }

    public function index(Request $request)
    {
        $new_product_mass = array();
        // список товаров по умолчанию
        //$products_mass = Product::with('products')->get()->sortBy('sort');
        $products_mass = Category::find(1)->products()->get()->sortBy('sort');
        $categories = Category::where('parent_id', '=', 0)->get();
        $options = array();


        // список товаров через быстрый фильтр
        if ($request->cat || $request->age || $request->size) {
            $products_mass = (new ProductsFilter(Product::with('products'), $request))->apply()->get()->sortBy('sort');
        }

        // попробуем добавить линейку к товару
        if (!empty($products_mass)){
            $line = "";
            foreach ($products_mass->all() as $key=>$product){
                $product->line = $this->getValueOptions(8,$product->id);

                if ($line == "" || $product->line != ""){
                    $line = $product->line;
                }
                if ($line != "" || $product->line == $line){
                    $new_product_mass[$line][] = $product;
                }
            }
        }

        if($request->ajax()){

            $output_y = array();
            $new_product_mass_ajax = array();

                if ($request->id) {
                    $products = Category::find($request->id)->products()->get()->sortBy('sort');
                    $products_mass = $products;

                    // попробуем добавить линейку к товару
                    if (!empty($products_mass)){
                        $line = "";
                        foreach ($products_mass->all() as $key=>$product){
                            $product->line = $this->getValueOptions(8,$product->id);
                            if ($line == "" || $product->line != ""){
                                $line = $product->line;
                            }
                            if ($line != "" || $product->line == $line){
                                $new_product_mass_ajax[$line][] = $product;
                            }
                        }
                    }

                    if (count($new_product_mass_ajax) > 0) {
                        foreach ($new_product_mass_ajax as $key => $line) {
                            $hr_line = "";
                            if($key == 'Holistic Nature Line'){
                                $hr_line = '<img class="line_key" alt="'.$key.'" title="'.$key.'" src="images/cb_select_hnl.png">
                            <div class="l_d"></div>';
                            }elseif($key == 'Classic Nature Line'){
                                $hr_line = '<img class="line_key" alt="'.$key.'" title="'.$key.'" src="images/cb_select_cnl.png">
                            <div class="l_d"></div>';
                            }elseif($key == 'Pro Nature Line'){
                                $hr_line = '<img class="line_key" alt="'.$key.'" title="'.$key.'" src="images/cb_select_pnl.png">
                            <div class="l_d"></div>';
                            }elseif($key == 'Titan Line') {
                                $hr_line = '<img class="line_key" alt="' . $key . '" title="' . $key . '" src="images/cb_select_titan.png"><div class="l_d"></div>';
                            }

                            $output_y[] = '<div class="line_block col-lg-12 col-md-12 text-center">'.$hr_line.'</div>';

                             foreach ($line as $product) {

                                $activ_item = "";
                                if (!$product->active) {
                                    $activ_item = 'active_item';
                                }

                                //товары
                                $output_y[] = '<div class="product_item ' . $activ_item . ' col-lg-3"><a href="' . route('products_show', ['category' => 'sobaki', 'url' => $product->url]) . '"><img class="img-fluid center" src="' . $product->images . '"><p class="product_name">' . $product->name . '</p><div class="product_desc">' . $product->excerpt . '</div></a><div class="product-item__more"><a href="' . route("products_show", ["category" => "sobaki", "url" => $product->url]) . '" class="product-item__more-link">ДЕТАЛЬНІШЕ</a></div></div>';
                            }
                        }
                        $output = array([
                            'products' => $output_y,
                            'options' => $options
                        ]);
                        return Response($output);
                    }else {
                        $output_y[] = '<div class="col-lg-3">нет товаров</div>';
                        $output = array([
                            'products' => $output_y,
                            'options' => ""
                        ]);
                        return Response($output);
                    }
                }

        }

        return view('product.index', [
            'products' => $new_product_mass,
            'categories'=>$categories,
            'options'=>$options
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        //dd($request);
        $file_url = "";

        //записываем файл на сервер
        if ($request->hasFile('file')){
            $filename = $request->file->getClientOriginalName();
            $filesize = $request->file->getClientSize();
            $file_url = '/storage/upload/'.$filename;
            $contents = file_get_contents($request->file->getRealPath());
            Storage::disk('public_uploads')->put($filename,$contents);
        }

        //записываем товар в базу
        $product = new Product();
        $product->name = $request->name;
        $product->active = $request->active;
        $product->sort = $request->sort;
        $product->url = Str::slug($request->name,"-");
        $product->title = $request->title;
        $product->images = $file_url;
        $product->composition = $request->composition;
        $product->dose = $request->dose;
        $product->excerpt = $request->excerpt;
        $product->prev_desc = $request->prev_desc;
        $product->desc = $request->description;
        $product->meta = $request->meta;
        $product->keywords = $request->keywords;
        $product->save();

        //подвязываем категории
        foreach ($request->cat_id as $cat_item) {
            $catуgory = Category::find($cat_item);
            $product->categories()->attach($catуgory);
        }

        return redirect('admin/products');
    }

    public function show($category, $url)
    {
        $product = Product::where('url', '=', $url)->first();
        $shops = $this->getShopsProduct();
        if (!empty($product)) {

                $options = $this->getProductOptionsCategory($product->getAttribute('id'));
                $files = $product->files()->get()->all();
                return view('product.view',
                    [
                        'shops' => $shops[0],
                        'product' => $product,
                        'options' => $options,
                        'files' => $files
                    ]
                );
        }else{
            return view('error.404');
        }

    }

    public function edit($id)
    {
        $product  = Product::find($id);
        $select_category = $product->categories()->get()->all();
        $categories = Category::all();
        $option_mass = $product->options()->get()->all();
        $select_option = array();
        $files = $product->files()->get()->all();

        foreach ($option_mass as $asd){
            $select_option[] = DB::table('product_options')
                ->where('option_id','=', $asd->id)
                ->where('product_id','=', $id)
                ->get();
        }

        $options = $this->getProductOptionsCategory($id);

        //dd($options);

        return view('admin.products.edit', [
            'product'=> $product,
            'categories'=> $categories,
            'select_category' => $select_category,
            'options' => $options,
            'files' => $files,
            'select_options' => $select_option,
        ]);
    }

    public function update(Request $request, $id)
    {
        $file_url = "";

        //записываем файл на сервер
        if ($request->hasFile('file')){
            $filename = $request->file->getClientOriginalName();
            $filesize = $request->file->getClientSize();
            $file_url = '/storage/upload/'.$filename;
            $contents = file_get_contents($request->file->getRealPath());
            Storage::disk('public_uploads')->put($filename,$contents);
        }

        $product = Product::find($id);

        $product->active = $request->active;
        $product->name = $request->name;
        $product->sort = $request->sort;
        $product->url = Str::slug($request->name,"-");
        $product->title = $request->title;
        if ($file_url != "") {
            $product->images = $file_url;
        }
        $product->composition = $request->composition;
        $product->dose = $request->dose;
        $product->excerpt = $request->excerpt;
        $product->desc = $request->description;
        $product->prev_desc = $request->prev_desc;
        $product->meta = $request->meta;
        $product->keywords = $request->keywords;
        $product->save();
        $product->categories()->detach();
        //$product->current_option()->detach();

        //переподвязываем категории
        foreach ((array)$request->cat_id as $cat_item) {
            $cat = Category::find($cat_item);
            $product->categories()->attach($cat);
        }

        //перезаписываем свойства товара
        if (!empty($request->opt_id)) {

            $value_colum = "value_" . App::getLocale();
            $name = "name_" . App::getLocale();

            $cur_opt = DB::table('product_options')->where('product_id', '=', $id)->get()->keyBy('option_id')->all();

            $add_opt_mass = $request->opt_id;

            if (count($cur_opt)>0) {

                $mass = array();

                foreach ($cur_opt as $s => $i) {

                    if (array_key_exists($i->option_id, $request->opt_id)){
                        $mass = $request->opt_id[$i->option_id];
                        unset($add_opt_mass[$s]);
                    }

                    $current_option = DB::table('product_options')
                        ->where('product_id', '=', $id)
                        ->where('option_id', '=', $i->option_id)
                        ->get()->all();
                    foreach ($current_option as $key => $current_value) {

                        $id_update = 0;
                        $sku = "";
                        $barcode = "";
                        $price = 0.0;

                        foreach ($mass as $k => $select_value) {
                            if ($current_value->value_id == $select_value) {
                                $id_update = $current_value->value_id;
                                $sku = $this->getPostSku($request, $select_value);
                                $barcode = $this->getPostBarcode($request, $select_value);
                                $price = $this->getPostPrice($request, $select_value);;
                                unset($mass[$k]);
                                break;
                            }
                        }


                        if ($id_update > 0) {
                            //update
                            $option_value_table = DB::table('values')
                                ->where('id', '=', $id_update)
                                ->get()->all();

                            $znachenie = $current_value->$value_colum;
                            if ($current_value->$value_colum == "") {
                                $znachenie = $option_value_table[0]->$name;
                            }

                            $product->options()
                                ->wherePivot('value_id', $id_update)
                                ->updateExistingPivot($i->option_id,
                                    ['option_id' => $i->option_id,
                                        'product_id' => $id,
                                        'sku' => $sku,
                                        'barcode' => $barcode,
                                        'price' => $price,
                                        $value_colum => $znachenie,
                                        'sort' => $request->sort,
                                        'value_id' => $id_update
                                    ]
                                );
                        } else {
                            //detach
                            $product->options()->wherePivot('value_id', $current_value->value_id)->detach();
                        }

                    }
                    if (count($mass) > 0) {
                        foreach ($mass as $new_item) {
                            $option_value_table = DB::table('values')
                                ->where('id', '=', $new_item)
                                ->get()->all();
                            $znachenie = $option_value_table[0]->$name;
                            $product->options()
                                ->wherePivot('value_id', $new_item)
                                ->attach(array(['option_id' => $i->option_id,
                                        'product_id' => $id,
                                        $value_colum => $znachenie,
                                        'sort' => "$request->sort",
                                        'value_id' => $new_item
                                    ])
                                );
                        }
                    }
                }
                if (count($add_opt_mass) > 0){
                    foreach ($add_opt_mass as $option_id => $rr) {
                        foreach ($rr as $add_item) {
                            $option_value_table = DB::table('values')
                                ->where('id', '=', $add_item)
                                ->get()->all();
                            $znachenie = $option_value_table[0]->$name;
                            $product->options()
                                ->wherePivot('value_id', (int)$add_item)
                                ->attach(array(['option_id' => $option_id,
                                        'product_id' => $id,
                                        $value_colum => $znachenie,
                                        'sort' => "$request->sort",
                                        'value_id' => (int)$add_item
                                    ])
                                );
                        }
                    }
                }
            }else{
                foreach ($request->opt_id as $option_id => $select_option) {
                    foreach ($select_option as $key => $select_value) {
                        $option_value_table = DB::table('values')
                            ->where('id', '=', (int)$select_value)
                            ->get()->all();
                        $product->options()
                                ->wherePivot('value_id', $option_value_table[0]->id)
                                ->attach(array(['option_id' => $option_id,
                                        'product_id' => $id,
                                        $value_colum => $option_value_table[0]->$name,
                                        'sort' => "$request->sort",
                                        'price'=> 0,
                                        'sku' => "",
                                        'barcode'=>"",
                                        'value_id' => $option_value_table[0]->id]));
                    }
                }

            }


        }
        return redirect(route('products.edit',$product->id));
    }

    public function destroy($id)
    {
        $product  = Product::find($id);
        if ($product != null) {
            $product->categories()->detach();
            $product->options()->detach();
            $product->files()->detach();
            $product->delete();
        }

        return redirect('admin/products');
    }

    public static function destroyP($id)
    {
        $product  = Product::find($id);
        $product->categories()->detach();
        $product->options()->detach();
        $product->files()->detach();
        $product->delete();

        return true;
    }

    public function getProductOptionsCategory($id)
    {
        $options = array();

        $mass = DB::table('option')
            ->leftjoin('category_option', 'category_option.option_id', '=', 'option.id')
            ->leftjoin('product_options', 'product_options.option_id', '=', 'option.id')
            ->groupBy('option.id')
            ->where('category_option.category_id', '=', 1)
            ->select('category_option.category_id', 'option.id', 'option.*')
            ->get();

        foreach ($mass->all() as $f) {
            //если выбрана хоть одно значение тогда отображаем на сайте
            $f->view = false;
            $f->images = null;
            if ($f->type == "dir" || $f->type == "dir_img" ) {
                $o_mass = DB::table('option_values')
                    ->leftjoin('values', 'values.id', '=', 'option_values.value_id')
                    ->where('option_values.option_id', '=', $f->id)
                    ->select('option_values.option_id', 'values.*','values.images')
                    ->get();
                $value = $o_mass->toArray();
                $option_sel = 0;
                //пробигаемся и ставим признак если выбранный
                foreach ($value as $key => $e) {
                    $e->select_id = 0;
                    $e->price = 0.0;
                    $e->sku = "";
                    $e->barcode = 0;
                    $f->images = $e->images;
                    $option_sel = DB::table('product_options')
                        ->where('product_id', '=', $id)
                        ->where('option_id', '=', $e->option_id)
                        ->get();
                    foreach ($option_sel as $k => $r) {
                        //$name_lang = "name_".App::getLocale();
                        //$value_s = "value_".App::getLocale();
                        if ($e->id == $r->value_id) {
                            $f->view = true;
                            $e->select_id = $r->id;
                            $e->price = $r->price;
                            $e->sku = $r->sku;
                            $e->barcode = $r->barcode;
                        }
                    }
                }
            } else {
                $value = self::getValueOptions($f->id, $id);
            }
            $name = "name_".App::getLocale();

            $options[] = array(
                [
                    "id_opt" => $f->id,
                    "name_opt" => $f->{$name},
                    "images" => $f->images,
                    "value_opt" => $value,
                    "type_opt" => $f->type,
                    "view_opt" => $f->view
                ]
            );

        }
        return $options;
    }

    public function getValueAttribut($object, $name)
    {
        $array = $object->getAttributes();

        foreach ($array as $key => $attribute) {
            if ($key == $name) {
                return $attribute;
            }
        }
        return "";
    }

    public function getValueOptions($id_options, $id_product)
    {

        $obj_value = DB::table('product_options')->where('product_id', '=', $id_product)->where('option_id', '=', $id_options)->get();
        $value_colum = "value_" . App::getLocale();
        foreach ($obj_value as $r){
            return $r->$value_colum;
        }
        return "";
    }

    public function del_images(Request $request){

        $output = "";
        $file = File::find($request->id_image)->first();
        $prod = Product::find($request->prod_id);

        $prod->files()->detach($request->id_image);
        Storage::disk('public_uploads')->delete($file->name);

        $files = $prod->files()->get()->all();
        foreach ($files as $item){
            $output .= '<div class="col-lg-6"><i id="'.$item->id.'" class="del_file" data-id="'. $prod->id .'">x</i>
                                                    <a href="'.$item->url.'" download>
                                                        <img width="150px" src="'.$item->url.'">
                                                    </a>
                                                </div>';
        }
        return Response($output);
    }

    public function getPostSku($request, $opt_id){
        if (count($request->sku) > 0) {
            foreach ($request->sku as $key => $sku) {
                if ($key == $opt_id) {
                    return $sku[0];
                }
            }
        }
        return "";
    }

    public function getPostBarcode($request, $opt_id){
        if (count($request->barcode) > 0) {
            foreach ($request->barcode as $key => $barcod){
                if ($key == $opt_id){
                    return $barcod[0];
                }
            }
        }
        return 0;
    }

    public function getPostPrice($request, $opt_id){
        if (count($request->price) > 0) {
            foreach ($request->price as $key => $item) {
                if ($key == $opt_id) {
                    return $item[0];
                }
            }
        }
        return 0;
    }

    public function getShopsProduct(){
        $mass = array();
        $mass_shops = array();
        $mass_ecommerces = array();

        $s_mass = DB::table('partners')->where('type','=','T')->get()->sortByDesc('sort');
        $e_mass = DB::table('partners')->where('type','=','I')->get()->sortByDesc('sort');

        foreach ($s_mass as $key=>$partner){
            $item = array([
                'id'=>$partner->id,
                'name'=>$partner->name,
                'addres'=>$partner->addres,
                'type'=>$partner->type
            ]);
            $mass_shops[$key] = $item;
        }

        foreach ($e_mass as $key=>$partner){
            $item = array([
                'id'=>$partner->id,
                'name'=>$partner->name,
                'addres'=>$partner->addres,
                'type'=>$partner->type
            ]);
            $mass_ecommerces[$key] = $item;
        }

        $json_mass_shops = json_encode($mass_shops);

        return $mass = array([
            'shops'=>$json_mass_shops,
            'ecommerces'=>$mass_ecommerces
        ]);
    }
}
