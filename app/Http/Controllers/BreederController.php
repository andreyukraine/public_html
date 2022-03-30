<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Breeder;
use App\Gallery;
use App\Mail\CallBack;
use App\Mail\NerseryEmail;
use App\Mail\QuestionEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class BreederController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post_index = Blog::all();
        $groupe_value = "value_" . App::getLocale();
        $r = DB::table('product_options')->where('option_id','=', 4)->groupBy($groupe_value,'option_id')->get();

        $lang = App::getLocale();

        if($request->ajax()){
            if ($request['type_form'] == 1){
                $data = array(
                    'name' => $request->name,
                    'tel' => $request->tel,
                );

                $info = array(
                    "address" => 'chicopee.ua@gmail.com',
                    "subject" => 'Заявка питомника',
                    "name" => 'SITE CHICOPEE'
                );

                //отправка на почту
                Mail::to('chicopee.ua@gmail.com')->send(new NerseryEmail($data, $info));
                $response = 'Ваше сообщение отправленно';
                return Response($response);
            }
            if ($request['type_form'] == 2){
                $data = array(
                    'name' => $request['name'],
                    'tel' => $request['tel'],
                    'email' => $request['email'],
                    'comments' => $request['comment']
                );

                $info = array(
                    "address" => 'chicopee.ua@gmail.com',
                    "subject" => 'Вопрос с сайта',
                    "name" => 'SITE CHICOPEE'
                );

                Mail::to('chicopee.ua@gmail.com')->send(new QuestionEmail($data, $info));

                $response = 'Ваше сообщение отправленно';

                return Response($response);
            }
            if ($request['type_form'] == 3){
                $data = array(
                    'tel' => $request->tel,
                );

                $info = array(
                    "address" => 'chicopee.ua@gmail.com',
                    "subject" => 'Заявка обратного звонка',
                    "name" => 'SITE CHICOPEE'
                );

                //отправка на почту
                Mail::to('chicopee.ua@gmail.com')->send(new CallBack($data, $info));
                $response = 'Ваше сообщение отправленно';
                return Response($response);
            }
            if ($request['type_form'] == 4){
                if ($request['selectedIndex'] == 3) {
                    //убераем из запроса цуценя если кошки
                    $r = DB::table('product_options')->where('option_id','=', 4)->where('value_id', '!=', '226')->groupBy($groupe_value,'option_id')->get();
                    return Response($r);
                }else{
                    $r = DB::table('product_options')->where('option_id','=', 4)->where('value_id', '!=', '385')->groupBy($groupe_value,'option_id')->get();
                    return Response($r);
                }
            }
        }


        $mass = array();
        Session::all();
        $sliders_mass = DB::table('sliders')->where('active' ,'=', 1)->get()->sortBy('sort');
        foreach ($sliders_mass as $key=>$slide){
            $locale = App::getLocale();
            $prev_desc = "prev_desc_" . $locale;
            $desc = "desc_" . $locale;
            $item = array([
                'index'=> $key,
                'img'=> URL::to('/') . $slide->images,
                'prev_text'=>$slide->{$prev_desc},
                'text'=>$slide->{$desc}
            ]);
            $mass[$slide->sort] = $item;
            arsort($mass);
        }

        $json_mass = json_encode($mass);

        $gallery = Gallery::find(1);
        $files = $gallery->files()->get()->all();

        return view('breeder.index', [
            'o'=>DB::table('categories')->where('parent_id','=', 0)->get(),
            'r'=>$r,
            's'=>DB::table('product_options')
                ->where('option_id','=', 3)
                ->groupBy($groupe_value,'option_id')->get(),
            'lang'=>$lang,
            'files'=>$files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Breeder  $breeder
     * @return \Illuminate\Http\Response
     */
    public function show(Breeder $breeder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Breeder  $breeder
     * @return \Illuminate\Http\Response
     */
    public function edit(Breeder $breeder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Breeder  $breeder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Breeder $breeder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Breeder  $breeder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breeder $breeder)
    {
        //
    }
}
