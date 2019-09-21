<?php

use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          \Illuminate\Support\Facades\DB::table('rooms')->insert([

            [
            'room_no' => '101',
            'room_type_id' => '1',
            'max_adult' => '2',
            'max_child' => '1',
            'status' => '0',
            'floor_id' => '1',
            ],

            [
            'room_no' => '102',
            'room_type_id' => '1',
            'max_adult' => '2',
            'max_child' => '1',
            'status' => '0',
            'floor_id' => '1',
            ],

             [
               'room_no' => '103',
            'room_type_id' => '1',
            'max_adult' => '2',
            'max_child' => '1',
            'status' => '0',
            'floor_id' => '1',
            ],

             [
               'room_no' => '104',
            'room_type_id' => '1',
            'max_adult' => '2',
            'max_child' => '1',
            'status' => '0',
            'floor_id' => '1',
            ],

             [
               'room_no' => '201',
            'room_type_id' => '2',
            'max_adult' => '2',
            'max_child' => '1',
            'status' => '0',
            'floor_id' => '2',
            ],

             [
               'room_no' => '202',
            'room_type_id' => '2',
            'max_adult' => '2',
            'max_child' => '1',
            'status' => '0',
            'floor_id' => '2',
            ],

             [
               'room_no' => '203',
            'room_type_id' => '2',
            'max_adult' => '2',
            'max_child' => '1',
            'status' => '0',
            'floor_id' => '2',
            ],

             [
               'room_no' => '204',
            'room_type_id' => '2',
            'max_adult' => '2',
            'max_child' => '1',
            'status' => '0',
            'floor_id' => '2',
            ],

             [
               'room_no' => '301',
            'room_type_id' => '3',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '3',
            ],

             [
               'room_no' => '302',
            'room_type_id' => '3',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '3',
            ],

             [
               'room_no' => '303',
            'room_type_id' => '3',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '3',
            ],

             [
               'room_no' => '304',
            'room_type_id' => '3',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '3',
            ],

             [
               'room_no' => '401',
            'room_type_id' => '4',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '4',
            ],

             [
               'room_no' => '402',
            'room_type_id' => '4',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '4',
            ],

             [
               'room_no' => '403',
            'room_type_id' => '4',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '4',
            ],

             [
               'room_no' => '404',
            'room_type_id' => '4',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '4',
            ],
             [
               'room_no' => '501',
            'room_type_id' => '5',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '5',
            ],
             [
               'room_no' => '502',
            'room_type_id' => '5',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '5',
            ],
             [
               'room_no' => '503',
            'room_type_id' => '5',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '5',
            ],
             [
               'room_no' => '504',
            'room_type_id' => '5',
            'max_adult' => '3',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '5',
            ],
            [
               'room_no' => '601',
            'room_type_id' => '6',
            'max_adult' => '4',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '6',
            ],
             [
               'room_no' => '602',
            'room_type_id' => '6',
            'max_adult' => '4',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '6',
            ],
             [
               'room_no' => '603',
            'room_type_id' => '6',
            'max_adult' => '4',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '6',
            ],
             [
               'room_no' => '604',
            'room_type_id' => '6',
            'max_adult' => '4',
            'max_child' => '2',
            'status' => '0',
            'floor_id' => '6',
            ]



        ]);
    }
}
