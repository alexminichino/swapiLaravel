<?php

namespace AlexMinichino\Swapi\Models;

use Illuminate\Database\Eloquent\Model;
use AlexMinichino\Swapi\Models\People;

class Planet extends Model
{
    //
    public function people(){
        return $this->hasMany(People::class);
    }
}