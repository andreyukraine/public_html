<?php

namespace App\Http\Controllers;


use App\Mail\GmailEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class AjaxController extends Controller
{

    public function sendForm(Request $request)
    {

        if ($request['type_form'] == 1){
            $data = array(
                'name' => $request->name,
                'tel' => $request->tel
            );

            $info = array(
                "address" => 'ukr.web.ua@gmail.com',
                "subject" => 'Заявка питомника',
                "name" => 'SITE CHICOPEE'
            );

            //отправка на почту
            Mail::to('detta_web@detta.com.ua')->send(new GmailEmail($data, $info));
            $response = 'Ваше сообщение отправленно';
            return Response($response);
        }
        if ($request['type_form'] == 2){
            $data = array(
                'name' => $request['name'],
                'tel' => $request['tel'],
                'comments' => $request['comment']);

            //отправка на почту

            //        Mail::send('mails.question', $data, function($message) {
            //            $message->to('detta_web@detta.com.ua', 'Andrey')->subject
            //            ('ВОПРОС С САЙТА CHICOPEE');
            //            $message->from('ukr.web.ua@gmail.com','SITE CHICOPEE');
            //        });
            Mail::to('detta_web@detta.com.ua')->send(new GmailEmail($data));

            $response = 'Ваше сообщение отправленно';

            return Response($response);
        }
    }
    public function send()
    {
            $data = array(
                'name' => 1111,
                'tel' => 2222,
            );

            $info = array(
                "address" => 'ukr.web.ua@gmail.com',
                "subject" => 'Заявка питомника',
                "name" => 'SITE CHICOPEE'
            );

            //отправка на почту
            Mail::to('detta_web@detta.com.ua')->send(new GmailEmail($data, $info));
            $response = 'Ваше сообщение отправленно';
            return Response($response);
    }
}
