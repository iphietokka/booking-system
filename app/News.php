<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $fillable = ['user_id','title','content_news','status'];

    protected $appends = ['status_text'];

     public function getStatusTextAttribute()
    {
    	if($this->attributes['status'] == 0){
    		return 'NORMAL';
    	}
    	return 'URGENT';
    }

    public function user()
    {
    	return $this->hasOne('App\User','id','user_id');
    }
}
