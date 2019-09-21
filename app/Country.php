<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
     protected $fillable = ['code', 'name'];

    //  public function tamu(){
    // 	return $this->belongsTo('App\Guest','warga_negara','id');
    // }
}
