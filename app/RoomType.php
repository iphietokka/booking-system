<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
     protected $fillable = ['nama','price_night','price_guest','desc'];
    protected $appends = ['price_night_format','price_guest_format'];

    public function getPriceNightFormatAttribute($value)
    {
        return 'Rp'.number_format($this->attributes['price_night'],2);
    }

     public function getPriceGuestFormatAttribute($value)
    {
        return 'Rp'.number_format($this->attributes['price_guest'],2);
    }
}
