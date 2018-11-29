<?php

namespace App\Http\Controllers\Blog;

use App\Blog;
use App\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function admin()
    {
        $posts = Blog::all();
        return view('admin.blog.index',['posts'=> $posts]);
    }

    public function index()
    {
        $posts = Blog::all();
        return view('blog.index',['posts'=> $posts]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
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

        //записываем пост в базу
        $blog = new Blog();
        $blog->name = $request->name;
        $blog->url = Str::slug($request->name,"-");
        $blog->title = $request->title;
        $blog->images = $file_url;
        $blog->prev_desc = $request->prev_desc;
        $blog->desc = $request->description;
        $blog->meta = $request->meta;
        $blog->save();


        return redirect('admin/blog');
    }

    public function show($url)
    {
        $post = Blog::where('url', '=', $url)->first();
        return view('blog.post.index',['post'=>$post]);
    }

    public function edit($id)
    {
        $post = Blog::find($id);
        return view('admin.blog.edit',[
            'post'=>$post
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

        //записываем пост в базу
        $blog = Blog::find($id);
        $blog->name = $request->name;
        $blog->url = Str::slug($request->name,"-");
        $blog->title = $request->title;
        if ($blog->images == "") {
            $blog->images = $file_url;
        }
        $blog->prev_desc = $request->prev_desc;
        $blog->desc = $request->description;
        $blog->meta = $request->meta;
        $blog->save();



        return redirect('admin/blog');
    }

    public function destroy(Blog $blog)
    {
        //
    }


    public function del_images(Request $request){
        $output = "";
        $name = substr(strrchr($request->url, "/"), 1);
        $file = Storage::disk('public_uploads')->exists($name);
        if($request->ajax()) {
            if ($file) {
                Storage::disk('public_uploads')->delete($name);
                $post = Blog::find($request->id);
                $post->images = "";
                $post->save();
                $output .= '<div class="form-group">
                <label for="exampleFormControlTextarea1">Картинка</label>
                <input name="file" id="file" class="file" type="file" data-preview-file-type="any" data-upload-url="#">
                </div>';
                return Response($output);
            }
        }
    }
}
