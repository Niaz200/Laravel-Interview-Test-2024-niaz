<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'user_id'];


    public function states()
    {
        return $this->hasMany(State::class);
    }


    // public function cities()
    // {
    //     return $this->hasMany(City::class);
    // }


}


