<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
   protected $fillable = ['name','desc'];

    public function service(){
      return $this->belongsTo('App\Service','id','service_category_id');
    }
}
