<?php

namespace App;

use App\CanFilterTrait;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use CanFilterTrait;

    public $fillable = [
        'name',
        'date',
        'review',
        'rating',
        'likes',
        'dislikes',
    ];

    public function getDateFormatedAttribute()
    {
        return Carbon::parse($this->date)->format('d.m.Y');
    }
}
