<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
     protected $fillable = ['room_no','room_type_id','floor_id','max_adult','max_child','status'];

    public function roomtype()
    {
    	return $this->hasOne('App\RoomType','id','room_type_id');
    }

     public function floor()
    {
    	return $this->hasOne('App\Floor','id','floor_id');
    }

    public function transaction(){
    	return $this->belongsTo('App\RoomTransaction','id','room_id');
    }
}
