<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SmsProcess;

class SMS extends Model
{
    use HasFactory;
    protected $connection="mysql_thai";
    protected $table="sms";
    protected $primaryKey = 'id';
    public function smsp()
    {
        return $this->hasOne('App\Models\SmsProcess','sms_id')->where('status',1)->withDefault(['group_id'=>'','id'=>'','opdate'=>'','optime'=>'']);
    }
    /** @return BelongsTo<\App\Models\ThaiCustomer, $this> */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(ThaiCustomer::class,'thai_customer_id');
    }
    static public function getmixsms($mixid)
    {
        $ids=explode('|',$mixid);
       $smsmixed=SMS::whereIn('id',$ids)->get();
       return $smsmixed;
    }
}
