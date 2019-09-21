<?php

use Illuminate\Database\Seeder;

class FloorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          \Illuminate\Support\Facades\DB::table('floors')->insert([


         [

            'name' => '1st Floor',
         ],
          [

            'name' => '2nd Floor',
         ],
          [

            'name' => '3rd Floor',
         ],
          [

            'name' => '4th Floor',
         ],
          [

            'name' => '5th Floor',
         ],
          [

            'name' => '6th Floor',
         ]



        ]);
    }
}
