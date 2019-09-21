<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     protected $fillable =['name',
        'company_name',
        'address',
        'phone',
        'website',
        'email'];
}
