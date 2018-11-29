<?php

namespace App\Http\Controllers\Catalog;

use App\Category;
use App\Http\Controllers\Controller;
use App\Option;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{

    public function index()
    {
        $options_mass = Option::all();
        return view('admin.options.index',
            ['options'=> $options_mass]
        );
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.options.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        //записываем товар в базу
        $option = new Option();
        $option->name = $request->name;
        $option->type = $request->type;
        $option->save();

        //подвязываем категории
        foreach ($request->cat_id as $cat_item) {
            $catуgory = Category::find($cat_item);
            $option->categories()->attach($catуgory);
        }

        return redirect('admin/options');
    }

    public function show(Option $option)
    {
        //
    }

    public function edit($id)
    {

        $option  = Option::find($id);
        $categories = Category::all();
        $select_category = $option->categories()->get()->all();
        $values = $option->values()->get()->all();
        return view('admin.options.edit',[
            'option'=> $option,
            'values'=>$values,
            'categories'=> $categories,
            'select_category' => $select_category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $option  = Option::find($id);
        $option->name = $request->name;
        $option->type = $request->type;
        $option->categories()->detach();
        $option->save();

        //переподвязываем категории
        foreach ((array)$request->cat_id as $cat_item) {
            $cat = Category::find($cat_item);
            $option->categories()->attach($cat);
        }
        return redirect('admin/options');
    }

    public function destroy($id)
    {
        $option  = Option::find($id);
        $option->categories()->detach();
        //TODO Удалить значения свойств в таблице value
        $obj_value = DB::table('option_values')->where('option_id', '=', $id)->get()->all();
        foreach ($obj_value as $item) {
            DB::table('values')->where('id', '=', $item->id)->delete();
        }

        $option->delete();

        return redirect('admin/options');
    }
}
