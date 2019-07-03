<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Option;
use App\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ValueController extends Controller
{
    public function editValuesOption(Request $request){

        $item = Value::find($request->value_id);
        $file_url = $item->images;

        //записываем файл на сервер
        if ($request->type_option != "dir"){
            if ($request->hasFile('file')){
                $filename = $request->file->getClientOriginalName();
                $filesize = $request->file->getClientSize();

                $file_url = env('APP_URL').'/storage/upload/options/'.$filename;
                $contents = file_get_contents($request->file);
                Storage::disk('options_uploads')->put($filename,$contents);
            }
        }

        $item->name = $request->name;
        $item->sort = $request->sort;
        $item->images = $file_url;
        $item->save();

        return route('options.edit',$request->id);

    }

    public function addValuesOption(Request $request)
    {

        $file_url = "";

//        $validation = Validator::make($request->all(), [
//            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
//        ]);


        //записываем файл на сервер
        if ($request->type_option != "dir"){
            if ($request->hasFile('file')){
                $filename = $request->file->getClientOriginalName();
                $filesize = $request->file->getClientSize();

                $file_url = env('APP_URL').'/storage/upload/options/'.$filename;
                $contents = file_get_contents($request->file);
                Storage::disk('options_uploads')->put($filename,$contents);
            }
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
                if ($request->type_option != "dir"){
                    $output .='
                            <div class="row">
                                <div class="col-lg-1">'. $value->id .'</div>
                                <div class="col-lg-1"><img width="25px" src="'. $value->images .'"></div>
                                <div class="col-lg-6">'. $value->name .'</div>
                                <div class="col-lg-2">'. $value->sort .'</div>
                                <div class="col-lg-2">
                                    <span data-toggle="modal" data-target="#modal-bid" data-sort="'. $value->sort .'" data-name="'. $value->name .'" class="glyphicon glyphicon-pencil edit_opt" id="'. $value->id .'" data-opt="'. $option->id .'"></span>
                                    <span class="glyphicon glyphicon-remove del_opt" id="'. $value->id .'" data-opt="'. $option->id .'" data-type-opt="'. $request->type_option .'"></span>
                                </div>
                            </div>
                
                ';
                }else{
                    $output .='
                            <div class="row">
                                <div class="col-lg-1">'. $value->id .'</div>
                                <div class="col-lg-6">'. $value->name .'</div>
                                <div class="col-lg-2">'. $value->sort .'</div>
                                <div class="col-lg-2">
                                    <span data-toggle="modal" data-target="#modal-bid" data-sort="'. $value->sort .'" data-name="'. $value->name .'" class="glyphicon glyphicon-pencil edit_opt" id="'. $value->id .'" data-opt="'. $option->id .'"></span>
                                    <span class="glyphicon glyphicon-remove del_opt" id="'. $value->id .'" data-opt="'. $option->id .'" data-type-opt="'. $request->type_option .'"></span>
                                </div>
                            </div>
                
                ';
                }

            }
            return route('options.edit',$option->id);
        }

        return false;
    }

    public function getValueOption(Request $request){

        $value = Value::find($request->value_id);
        $name = 'name_'. App::getLocale();

        return Response([
            'name'=>$value->getAttribute($name),
            'sort'=>$value->getAttribute('sort'),
            'file'=>$value->getAttribute('images'),
        ]);
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
                if ($request->type_option != "dir"){
                    $output .='
                            <div class="row">
                                <div class="col-lg-1">'. $value->id .'</div>
                                <div class="col-lg-1"><img width="25px" src="'. $value->images .'"></div>
                                <div class="col-lg-6">'. $value->name .'</div>
                                <div class="col-lg-2">'. $value->sort .'</div>
                                <div class="col-lg-2">
                                    <span data-toggle="modal" data-target="#modal-bid" data-sort="'. $value->sort .'" data-name="'. $value->name .'" class="glyphicon glyphicon-pencil edit_opt" id="'. $value->id .'" data-opt="'. $option->id .'"></span>
                                    <span class="glyphicon glyphicon-remove del_opt" id="'. $value->id .'" data-opt="'. $option->id .'" data-type-opt="'.$request->type_option .'"></span>
                                </div>
                            </div>
                
                ';
                }else{
                    $output .='
                            <div class="row">
                                <div class="col-lg-1">'. $value->id .'</div>
                                <div class="col-lg-6">'. $value->name .'</div>
                                <div class="col-lg-2">'. $value->sort .'</div>
                                <div class="col-lg-2">
                                    <span data-toggle="modal" data-target="#modal-bid" data-sort="'. $value->sort .'" data-name="'. $value->name .'" class="glyphicon glyphicon-pencil edit_opt" id="'. $value->id .'" data-opt="'. $option->id .'"></span>
                                    <span class="glyphicon glyphicon-remove del_opt" id="'. $value->id .'" data-opt="'. $option->id .'" data-type-opt="'.$request->type_option .'"></span>
                                </div>
                            </div>
                
                ';
                }
            }
            return Response($output);
        }
        return false;
    }

}
