<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    public $fillable = [
        'email',
        'last_send'
    ];
}
