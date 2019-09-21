<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
   protected $fillable = [
   	'title',
   	'name',
   	'identity_type',
   	'identity_no',
   	'address',
   	'phone',
   	'email'
   ];


}
