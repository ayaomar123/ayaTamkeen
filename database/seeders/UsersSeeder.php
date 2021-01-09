<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'=>'Super Admin',
            'email'=>'admin@exmaple.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
