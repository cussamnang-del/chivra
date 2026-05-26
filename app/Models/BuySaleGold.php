<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuySaleGold extends Model
{
    public function currency()
    {
    	return $this->belongsTo('App\Currency');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function customer()
    {
    	return $this->belongsTo('App\Customer')->withDefault(['name' =>'']);
    }
}
