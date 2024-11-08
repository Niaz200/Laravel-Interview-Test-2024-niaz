<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    protected $fillable = ['user_id', 'country_id','state_id', 'name'];


    function country():BelongsTo{
        return $this->belongsTo(Country::class);
    }

    function state():BelongsTo{
        return $this->belongsTo(State::class);
    }
}
