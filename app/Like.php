<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
    protected $fillable = ['entity_type', 'entity_id', 'user_id', 'ip_address', 'type'];
    public function entity()
    {
        return $this->morphTo();
    }
}
