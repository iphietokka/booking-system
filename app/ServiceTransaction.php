<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','room_transaction_id','service_id','qty','total','price'];

    protected $appends = ['total_format'];

    public function roomtransaction(){
    	return $this->hasOne('App\RoomTransaction','id','room_transaction_id');
    }

    // public function layanan(){
    // 	return $this->hasOne('App\Layanan','id','layanan_id');
    // }

     public function service(){
            return $this->hasOne('App\Service','id','service_id');
    }

    public function getTotalFormatAttribute($value){
    	return 'Rp. '.number_format($this->attributes['total'],2);
    }

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}
