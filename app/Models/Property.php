<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    use HasFactory;
    public function group()
    {
    	return $this->belongsTo('App\Models\PropertyGroup','property_group_id')->withDefault(['name' =>'']);
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    /** @return BelongsTo<\App\Currency, $this> */
    public function currency(): BelongsTo
    {
    	return $this->belongsTo('App\Currency')->withDefault(['shortcut' =>'']);
    }

}
