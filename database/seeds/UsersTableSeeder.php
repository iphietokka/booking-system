<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([


            [
                'username' => 'admin',
                'name' => 'Administrator',
                'password' => bcrypt('123456'),
                 'active' => '1',
                'role_id' => '1',
           ],


            [
                'username' => 'staff',
                'name' => 'Staff',
               'password' => bcrypt('123456'),
                 'active' => '1',
                'role_id' => '2',
           ],
        ]);
    }
}
