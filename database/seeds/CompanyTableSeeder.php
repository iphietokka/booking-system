<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('companies')->insert([
            'name' => 'Hotel Melati',
            'company_name' => 'PT.Maju Mundur',
            'address' => 'Jalan. Ahmad Yani No.22',
            'phone' => '09876543321',
            'website' => 'www.majumundur.com',
            'email' => 'maju@mundur.com',

        ]);
    }
}
