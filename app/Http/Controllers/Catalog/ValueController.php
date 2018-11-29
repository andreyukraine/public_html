<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Option;
use App\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ValueController extends Controller
{
    public function editValuesOption(Request $request){
        $item = Value::find($request->value_id);
        $item->name = $request->value;
        $item->sort = $request->sort;
        $item->save();

        return Response("ok");

    }

    public function addValuesOption(Request $request)
    {

        $file_url = "";

        //записываем файл на сервер
        if ($request->file != ""){
            $filename = $request->file->getClientOriginalName();
            $filesize = $request->file->getClientSize();
            $file_url = env('APP_URL').'/storage/upload/options'.$filename;
            $contents = file_get_contents($request->file->getRealPath());
            Storage::disk('options_uploads')->put($filename,$contents);
        }


        $value = new Value();
        $option = Option::find($request->id);
        $value->name = $request->name;
        $value->sort = $request->sort;
        $value->images = $file_url;
        $value->save();

        $value->options()->attach($option);

        if($request->ajax()) {
            $output = "";
            $values_mass = $option->values()->get();
            foreach ($values_mass as $value) {
                $output .= '<p class="value_item">' . $value->name . '<span class="btn-sm btn-danger glyphicon glyphicon-minus del_opt" id ="' . $value->id . '" data-opt = "' . $option->id . '" role = "button" ></span ></p >';
            }
            return Response($output);
        }

        return false;
    }

    public function delValuesOption(Request $request)
    {
        $value = Value::find($request->value);
        $option = Option::find($request->id);
        $value->options()->detach();

        $value->delete();

        if($request->ajax()) {
            $output = "";
            $values_mass = $option->values()->get();
            foreach ($values_mass as $value) {
                $output .= '<p class="value_item">' . $value->name . '<span class="btn-sm btn-danger glyphicon glyphicon-minus del_opt" id ="' . $value->id . '" data-opt = "' . $option->id . '" role = "button" ></span ></p >';
            }
            return Response($output);
        }
        return false;
    }

}
