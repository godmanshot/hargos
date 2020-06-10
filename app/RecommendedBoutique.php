<?php

namespace App;

use App\Boutique;
use App\CanFilterTrait;
use Illuminate\Database\Eloquent\Model;

class RecommendedBoutique extends Model
{
    use CanFilterTrait;

    public function boutique() {
        return $this->belongsTo(Boutique::class, 'recommended_boutique_id', 'id');
    }
}
