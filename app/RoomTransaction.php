<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class RoomTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','invoice_no','guest_id','room_id','adult','child','checkin_date','checkout_date','price_total','deposite','status','method'];

    protected $appends = ['deposite_format','price_total_format'];

    public function room(){
    	return $this->hasOne('App\Room','id','room_id');
    }

    public function guest(){
    	return $this->hasOne('App\Guest','id','guest_id');
    }

    public function getDepositeFormatAttribute($value){
    	return 'Rp'.number_format($this->attributes['deposite'],2);
    }

    public function getPriceTotalFormatAttribute($value){
        return 'Rp'.number_format($this->attributes['price_total'],2);
    }
}
