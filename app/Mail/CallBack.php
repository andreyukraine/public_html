<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;
use Symfony\Component\VarDumper\Cloner\Data;

class CallBack extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $info;

    public function __construct($data, $info)
    {
        $this->data = $data;
        $this->info = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mytime = Carbon::now("Europe/Kiev");
        return $this->view('mails.callback')
            ->from($this->info['address'], $this->info['name'])
            ->cc($this->info['address'], $this->info['name'])
            ->bcc($this->info['address'], $this->info['name'])
            ->replyTo($this->info['address'], $this->info['name'])
            ->subject($this->info['subject'])
            ->with([ 'time' => $mytime->toDateTimeString(),'tel' => $this->data['tel'] ]);
    }
}
