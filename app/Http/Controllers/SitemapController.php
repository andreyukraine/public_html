<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index() {

        $sitemap = App::make("sitemap");

        $sitemap->add(URL::to('http://chicopee.in.ua'), '2016-11-18T12:30:00+02:00', '1.0', 'monthly');
        $sitemap->add(URL::to('contact'), '2016-11-18T12:30:00+02:00', '1.0', 'monthly');
        $sitemap->add(URL::to('about'), '2016-11-18T12:30:00+02:00', '1.0', 'monthly');
        $sitemap->add(URL::to('shops'), '2016-11-18T12:30:00+02:00', '1.0', 'monthly');

        $categories = DB::table('categories')->get();
        foreach ($categories as $category) {
            $p_c = DB::table('category_product')->where('category_id','=', $category->id)->get();
            foreach ($p_c as $item) {
                $products = DB::table('product')->where('id','=',$item->product_id)->get();
                foreach ($products as $product)
                {
                    $sitemap->add('http://chicopee.in.ua/catalog/'.$category->url.'/'.$product->name, '0.5', 'yearly');
                }
            }
        }

        $posts = DB::table('blog')->get();
        foreach ($posts as $post) {
            $sitemap->add('http://chicopee.in.ua/blog/'.$post->url, '0.5', 'yearly');
        }

        $sitemap->store('xml', 'sitemap');
    }
}
