<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('services')->insert([
            [
            'service_name' => 'Nasi Goreng',
            'service_category_id' => '1',
             'price' => '10000',
            'unit' => 'Box',
           ],
           [
           'service_name' => 'Jusss',
            'service_category_id' => '2',
             'price' => '10000',
            'unit' => 'pcs ',
           ],

           [
           'service_name' => 'Kue',
            'service_category_id' => '3',
             'price' => '10000',
            'unit' => 'pcs ',
           ],


        ]);
    }
}
