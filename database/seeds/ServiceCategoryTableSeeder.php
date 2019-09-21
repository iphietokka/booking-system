<?php

use Illuminate\Database\Seeder;

class ServiceCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('service_categories')->insert([


             [
            'name' => 'Food',
            ],
               [
            'name' => 'Drink',
            ],
             [
            'name' => 'Snack',
            ],




        ]);
    }
}
