<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Mail\CallBack;
use App\Mail\NerseryEmail;
use App\Mail\QuestionEmail;
use Illuminate\Support\Facades\URL;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{

    public function setlocale(Request $request){
            if (in_array($request->lang, Config::get('app.locales'))) {
                Session::put('locale', $request->lang);
            }
        return redirect()->back();
    }
    public function callback(Request $request){
        if($request->ajax()){
            if ($request['type_form'] == 1){
            }
        }
    }

    public function index(Request $request){

        $post_index = Blog::all();

        if($request->ajax()){
            if ($request['type_form'] == 1){
                $data = array(
                    'name' => $request->name,
                    'tel' => $request->tel,
                );

                $info = array(
                    "address" => 'ua.chicopee@gmail.com',
                    "subject" => 'Заявка питомника',
                    "name" => 'SITE CHICOPEE'
                );

                //отправка на почту
                Mail::to('ua.chicopee@gmail.com')->send(new NerseryEmail($data, $info));
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

                Mail::to('ua.chicopee@gmail.com')->send(new QuestionEmail($data, $info));

                $response = 'Ваше сообщение отправленно';

                return Response($response);
            }
            if ($request['type_form'] == 3){
                $data = array(
                    'tel' => $request->tel,
                );

                $info = array(
                    "address" => 'ukr.web.ua@gmail.com',
                    "subject" => 'Заявка обратного звонка',
                    "name" => 'SITE CHICOPEE'
                );

                //отправка на почту
                Mail::to('ukr.web.ua@gmail.com')->send(new CallBack($data, $info));
                $response = 'Ваше сообщение отправленно';
                return Response($response);
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

        $groupe_value = "value_" . $locale;

        return view('index',
            [
                'slider' => $json_mass,
                'keywords' => DB::table('settings')->where('name','=','keywords')->get(),
                'post' => $post_index->first(),
                'o'=>DB::table('categories')->where('parent_id','=', 0)->get(),
                'r'=>DB::table('product_options')
                    ->where('option_id','=', 4)
                    ->groupBy($groupe_value,'option_id')->get(),
                's'=>DB::table('product_options')
                    ->where('option_id','=', 3)
                    ->groupBy($groupe_value,'option_id')->get(),
            ]);

    }


}
