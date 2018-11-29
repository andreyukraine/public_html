<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuestionEmail extends Mailable
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
        return $this->view('mails.question')
            ->from($this->info['address'], $this->info['name'])
            ->cc($this->info['address'], $this->info['name'])
            ->bcc($this->info['address'], $this->info['name'])
            ->replyTo($this->info['address'], $this->info['name'])
            ->subject($this->info['subject'])
            ->with([ 'name' => $this->data['name'],'tel' => $this->data['tel'],'email' => $this->data['email'], 'comments' => $this->data['comments']]);
    }
}
