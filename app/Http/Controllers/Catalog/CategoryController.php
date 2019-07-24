<?php

namespace App\Http\Controllers\Catalog;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function admin()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.category.index',
            [
            'categories'=>$categories
            ]
        );
    }

    public function index()
    {
        $categories = Category::where('parent_id', '=', 0)->get();

        return view('category.index',
            [
                'categories'=>$categories
            ]
        );
    }

    public function create()
    {
        $categoties = Category::all();
        return view('admin.category.create',['categories'=>$categoties]);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $parent_id =$request->parent_id;
        $category->name = $request->name;
        $category->title = $request->title;
        $category->meta = $request->meta;
        $category->keywords = $request->keywords;
        $category->description = $request->description;
        if (empty($parent_id)){
            $parent_id = 0;
        }
        $category->parent_id = $parent_id;
        $category->url = Str::slug($request->name,"-");
        $category->save();
        Session::flash('message', 'Successfully create!');
        return redirect('admin/category');
    }

    public function show($url)
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $new_product_mass = array();
        $category = Category::where('url', '=', $url)->first();
        $actual_category_id = $category->id;
        if (!$category) return view('error.404');
        $products_mass = Category::find($category->getAttribute('id'))->products()->get()->sortBy('sort');

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

            return view('category.index', [
                'products' => $new_product_mass,
                'category' => $category,
                'actual_category' => $actual_category_id,
                'categories'=>$categories,
            ]);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        return view('admin.category.edit', ['categories'=> $categories, 'category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->title = $request->title;
        $category->url = Str::slug($request->name,"-");
        $category->meta = $request->meta;
        $category->keywords = $request->keywords;
        $category->description = $request->description;
        $parent_id = 0;
        if ($request->parent_id != ""){
            $parent_id = $request->parent_id;
        }
        $category->parent_id = $parent_id;

        $cat = Category::find($request->cat_id);

        $category->save();

        Session::flash('message', 'Successfully update!');
        return redirect('admin/category');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $product = $category->products()->get()->all();

        if (count($product) > 0){
            Session::flash('message', 'Not delete category, there are products here!');
            return redirect('admin/category');
        }else{
            $category->delete();
        }

        Session::flash('message', 'Successfully delete!');
        return redirect('admin/category');

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
}
