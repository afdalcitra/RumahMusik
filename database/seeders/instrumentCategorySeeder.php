<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class instrumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instrument_category')->insert([
            [
                'category_id' => '12',
                'instrument_id' => '1',
            ],
        ]);

        DB::table('instrument_category')->insert([
            [
                'category_id' => '12',
                'instrument_id' => '2',
            ],
        ]);

        DB::table('instrument_category')->insert([
            [
                'category_id' => '13',
                'instrument_id' => '2',
            ],
        ]);

        DB::table('instrument_category')->insert([
            [
                'category_id' => '1',
                'instrument_id' => '3',
            ],
        ]);

        DB::table('instrument_category')->insert([
            [
                'category_id' => '2',
                'instrument_id' => '3',
            ],
        ]);

        DB::table('instrument_category')->insert([
            [
                'category_id' => '3',
                'instrument_id' => '3',
            ],
        ]);

        DB::table('instrument_category')->insert([
            [
                'category_id' => '9',
                'instrument_id' => '4',
            ],
        ]);

        DB::table('instrument_category')->insert([
            [
                'category_id' => '10',
                'instrument_id' => '4',
            ],
        ]);

        DB::table('instrument_category')->insert([
            [
                'category_id' => '8',
                'instrument_id' => '5',
            ],
        ]);

        
    }
}
