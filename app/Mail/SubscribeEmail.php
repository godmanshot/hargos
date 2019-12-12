<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribeEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $post;
    public $subscribe;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post, $subscribe)
    {
        $this->post = $post;
        $this->subscribe = $subscribe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.post')->subject('dai5.kz '.$this->post->title);
    }
}
