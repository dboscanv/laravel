<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{

    function isComplete() {
        return false;
    }

    public static function ratherThan1000() {
        return static::where('fans', '>', '1000')->get();
    }

}
