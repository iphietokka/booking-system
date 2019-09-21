<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GuestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

           $faker = Faker::create('id_ID');
            for($i = 1; $i <= 10; $i++){
            DB::table('guests')->insert([
                'title' => $faker->title,
                'name' => $faker->name,
                'identity_no' => $faker->randomNumber,
                'address' => $faker->streetAddress,
                'phone' => $faker->e164PhoneNumber,
                'email' => $faker->email
            ]);
        }
    }
}
