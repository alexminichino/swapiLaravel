<?php

namespace AlexMinichino\Swapi\Models;

use Illuminate\Database\Eloquent\Model;
use AlexMinichino\Swapi\Models\Planet;

class People extends Model
{
    

    public function planet()
    {
        return $this->belongsTo(Planet::class, 'homeworld_id');

    }
}