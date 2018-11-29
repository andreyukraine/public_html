<?php

namespace App\Http\Controllers\Slider;

use App\File;
use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function index()
    {
        $sliders_mass = Slider::all();
        return view("admin.slider.index",[
            'sliders'=>$sliders_mass
        ]);
    }

    public function create()
    {
        return view("admin.slider.create");
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

        $slider = new Slider();
        $slider->name = $request->name;
        $slider->desc = $request->desc;
        $slider->prev_desc = $request->prev_desc;
        $slider->sort = $request->sort;
        $slider->images = $file_url;
        $slider->save();
        return redirect('admin/slider');
    }

    public function show(Slider $slider)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        $local = Session::get('locale');
        return view('admin.slider.edit',
            [
                'slider' => $slider,
                'local' => $local
            ]
        );
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

        $slider = Slider::find($id);
        $slider->name = $request->name;
        $slider->prev_desc = $request->prev_desc;
        $slider->desc = $request->desc;
        $slider->sort = $request->sort;
        if ($file_url != "") {
            $slider->images = $file_url;
        }
        $slider->save();

        return redirect('admin/slider');
    }




    public function destroy($id)
    {
        $slider  = Slider::find($id);
        $slider->delete();

        return redirect('admin/slider');
    }
}
