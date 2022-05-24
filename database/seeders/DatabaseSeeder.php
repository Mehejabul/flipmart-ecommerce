<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::create([
            'name' => 'oittizzophp ',
            'phone' => '01714294499',
            'slug' => 'u-admin',
            'email' => 'admin@gmail.com',
            'status'=> 1,
            'password' => Hash::make('password')
        ]);
    }
}
