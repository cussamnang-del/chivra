<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WingTransactionName extends Model
{
    use HasFactory;
    protected $table="wing_transaction_names";
    /** @return BelongsTo<\App\Models\AgentType, $this> */
    public function agenttype(): BelongsTo
    {
        return $this->belongsTo('App\Models\AgentType','agent_type_id')->withDefault(['name' =>'']);
    }
}
