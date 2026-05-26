<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewPayRomlos extends Model
{
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
