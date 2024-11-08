<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    protected $fillable = ['user_id', 'country_id', 'name'];


    function country():BelongsTo{
        return $this->belongsTo(Country::class);
    }


    public function cities()
    {
        return $this->hasMany(City::class);
    }

   
}
