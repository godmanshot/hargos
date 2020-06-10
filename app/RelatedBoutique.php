<?php

namespace App;

use App\Boutique;
use App\CanFilterTrait;
use Illuminate\Database\Eloquent\Model;

class RelatedBoutique extends Model
{
    use CanFilterTrait;

    public function boutique() {
        return $this->belongsTo(Boutique::class, 'related_boutique_id');
    }
}
