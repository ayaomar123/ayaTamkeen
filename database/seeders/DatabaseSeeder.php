<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();   
        //execute Seeder by Name     
		$this->call(UsersSeeder::class);
		$this->call(CitySeeder::class);
    }
}
