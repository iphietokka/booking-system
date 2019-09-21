<?php

use Illuminate\Database\Seeder;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('room_types')->insert([
            [
            'name' => 'Standart',
            'price_night' => '375000',
             'price_guest' => '0',
            'desc' => 'Room Standart ',
           ],
           [
            'name' => 'Superior',
            'price_night' => '400000',
             'price_guest' => '0',
            'keterangan' => 'Room Superior',
           ],
           [
            'name' => 'Deluxe',
            'price_night' => '450000',
             'price_guest' => '0',
            'desc' => 'Room Deluxe',
           ],
           [

            'name' => 'Junior Suite',
            'price_night' => '650000',
             'price_guest' => '0',
            'desc' => 'Room Junior Suite',

           ],
           [

            'name' => 'Suite',
            'price_night' => '800000',
             'price_guest' => '0',
            'desc' => 'Room Suite',

           ],
            [

            'name' => 'Presidential',
            'price_night' => '1200000',
             'price_guest' => '0',
            'desc' => 'Room Presidential',

           ],

        ]);
    }
}
