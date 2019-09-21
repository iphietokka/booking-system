<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
         $this->call(GuestTableSeeder::class);
          $this->call(RoomTypeTableSeeder::class);
           $this->call(RoomTableSeeder::class);
            $this->call(FloorTableSeeder::class);
             $this->call(ServiceCategoryTableSeeder::class);
             $this->call(ServiceTableSeeder::class);
             $this->call(CompanyTableSeeder::class);
    }
}
