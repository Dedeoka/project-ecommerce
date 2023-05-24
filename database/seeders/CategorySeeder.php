<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            [
                'kode_category' => 'K-B01',
                'nama_category' => 'Beras'
            ],
            [
                'kode_category' => 'K-M01',
                'nama_category' => 'Minyak'
            ],
            [
                'kode_category' => 'K-T01',
                'nama_category' => 'Telur'
            ],
            [
                'kode_category' => 'K-B02',
                'nama_category' => 'Bumbu'
            ],
        ]);
    }
}
