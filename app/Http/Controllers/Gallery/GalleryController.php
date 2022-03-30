<?php

namespace App\Http\Controllers\Gallery;

use App\File;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery_mass = Gallery::all();
        return view("admin.gallery.index",[
            'gallery'=>$gallery_mass
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.gallery.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $gallery = new Gallery();
        //картинки
        if ($request->hasFile('file_more')){
            $filename_more = $request->file_more->getClientOriginalName();
            $filesize_more = $request->file_more->getClientSize();
            $file_url_more = '/storage/upload/'.$filename_more;
            $contents = file_get_contents($request->file_more->getRealPath());
            $file_more = Storage::disk('public_uploads')->put($filename_more,$contents);
            $file_atach = new File();
            $file_atach->name = $filename_more;
            $file_atach->size = $filesize_more;
            $file_atach->url = $file_url_more;
            $file_atach->save();
            $gallery->files()->attach($file_atach);
        }

        //записываем товар в базу
        $gallery->name = $request->name;
        $gallery->active = $request->active;

        $gallery->save();
        return redirect('admin/gallery');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        $files = $gallery->files()->get()->all();

        return view('admin.gallery.edit',
            [
                'gallery' => $gallery,
                'files' => $files
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $gallery = Gallery::find($id);

        //картинка гранулы
        if ($request->hasFile('file_more')){
            $filename_more = $request->file_more->getClientOriginalName();
            $filesize_more = $request->file_more->getClientSize();
            $file_url_more = '/storage/upload/'.$filename_more;
            $contents = file_get_contents($request->file_more->getRealPath());
            $file_more = Storage::disk('public_uploads')->put($filename_more,$contents);
            $file_atach = new File();
            $file_atach->name = $filename_more;
            $file_atach->size = $filesize_more;
            $file_atach->url = $file_url_more;
            $file_atach->save();
            $gallery->files()->attach($file_atach);
        }



        $gallery->active = $request->active;
        $gallery->name = $request->name;

        $gallery->save();

        return redirect(route('gallery.edit',$gallery->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider  = Gallery::find($id);
        $slider->delete();

        return redirect('admin/gallery');
    }

    public function del_images(Request $request){

        $output = "";
        $file = File::find($request->id_image)->first();
        $prod = Gallery::find($request->prod_id);

        $prod->files()->detach($request->id_image);
        Storage::disk('public_uploads')->delete($file->name);

        $files = $prod->files()->get()->all();
        foreach ($files as $item){
            $output .= '<div style="position: relative;text-align: center; float: left;"><i id="'.$item->id.'" class="del_file" data-id="'. $prod->id .'">x</i>
                                                    <a href="'.$item->url.'" download>
                                                        <img width="200px" src="'.$item->url.'">
                                                    </a>
                                                </div>';
        }
        return Response($output);
    }

    public function add_image(Request $request){
        $output = "";

        $gallery = Gallery::find($request->id);

        //картинка гранулы
        if ($request->hasFile('file_more')){
            $filename_more = $request->file_more->getClientOriginalName();
            $filesize_more = $request->file_more->getClientSize();
            $file_url_more = '/storage/upload/'.$filename_more;
            $contents = file_get_contents($request->file_more->getRealPath());
            $file_more = Storage::disk('public_uploads')->put($filename_more,$contents);
            $file_atach = new File();
            $file_atach->name = $filename_more;
            $file_atach->size = $filesize_more;
            $file_atach->url = $file_url_more;
            $file_atach->save();
            $gallery->files()->attach($file_atach);
        }

        return Response($output);
    }
}
