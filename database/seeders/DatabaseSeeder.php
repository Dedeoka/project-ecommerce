<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
        ]);
         DB::table('admins')->insert([

            'name' => 'Deadi Artana',

            'username' => 'deadi@gmail.com',

            'password' => Hash::make('deadi123'),

            'phone' => '0821473960666'

        ]);


    }
}
