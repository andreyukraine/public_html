<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{

    public function admin(Request $request){
        $pages = Pages::all();
        return view('admin.pages.index',['pages'=> $pages]);
    }

    public function index()
    {

    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $page = new Pages();
        $page->name = $request->name;
        $page->active = $request->active;
        $page->url = Str::slug($request->name,"-");
        $page->title = $request->title;
        $page->desc = $request->desc;
        $page->meta = $request->meta;
        $page->save();
        return redirect('admin/pages');
    }

    public function show($url)
    {
        $page = Pages::where('url', '=', $url)->first();
        return view('pages.view', [
            'page' => $page,
        ]);
    }

    public function edit($id)
    {
        $page  = Pages::find($id);
        return view('admin.pages.edit', [
            'page' => $page,
        ]);
    }

    public function update(Request $request, $id)
    {
        $page = Pages::find($id);
        $page->name = $request->name;
        $page->active = $request->active;
        $page->url = $request->url;
        $page->title = $request->title;
        $page->desc = $request->desc;
        $page->meta = $request->meta;
        $page->save();
        return redirect('admin/pages');
    }

    public function destroy($id)
    {
        $page  = Pages::find($id);
        if ($page != null) {
            $page->delete();
        }
        return redirect('admin/pages');
    }
}
