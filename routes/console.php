<?php

use App\Post;
use App\Subscribe;
use App\Mail\SubscribeEmail;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('subscribe-send', function () {

    $posts = Post::where('is_send', 0)->get();
    $subscribes = Subscribe::all();

    foreach($posts as $post) {
        $post->is_send = 1;
        $post->save();

        foreach($subscribes as $subscribe) {
            Mail::to($subscribe)->send(new SubscribeEmail($post, $subscribe));
        }


        if (!Mail::failures()) {}
    }
});


