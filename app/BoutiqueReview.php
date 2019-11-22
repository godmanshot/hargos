<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class BoutiqueReview extends Model
{
    public $fillable = [
        'name',
        'date',
        'review',
        'rating',
    ];
    
    public function getDateFormatedAttribute()
    {
        return Carbon::parse($this->date)->format('d.m.Y');
    }
}
