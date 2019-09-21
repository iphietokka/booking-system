<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     protected $fillable = ['service_name','service_category_id','unit','price'];
    protected $appends = ['price_format'];

    public function servicecategory()
    {
    	return $this->hasOne('App\ServiceCategory','id','service_category_id');
    }

    public function getPriceFormatAttribute($value){
    	return 'Rp'.number_format($this->attributes['price'],2);
    }
}
