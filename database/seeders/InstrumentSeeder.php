<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instrument')->insert([
            [
                'code' => 'SPK01',
                'name' => 'Speaker Polytron',
                'price' => '50000',
                'image' => 'speaker.jpg',
                'stock' => '4',
                'description' => 'Speaker Full Bass dan Kondisi Bagus',
            ],
        ]);

        DB::table('instrument')->insert([
            [
                'code' => 'MIC01',
                'name' => 'Microphone Fantech',
                'price' => '20000',
                'image' => 'microphone.jpg',
                'stock' => '4',
                'description' => 'Microphone Jernih, Crispy, dan Bagus',
            ],
        ]);

        DB::table('instrument')->insert([
            [
                'code' => 'BAS01',
                'name' => 'Bass BenQ',
                'price' => '30000',
                'image' => 'bass_listrik.jpg',
                'stock' => '4',
                'description' => 'Bass Listrik dari BenQ. Sudah termasuk dengan senarnya',
            ],
        ]);

        DB::table('instrument')->insert([
            [
                'code' => 'KYB01',
                'name' => 'Keyboard Yamaha',
                'price' => '50000',
                'image' => 'keyboard.jpeg',
                'stock' => '4',
                'description' => 'Keyboard dari Yamaha. Memiliki 1001 built-in SoundFX',
            ],
        ]);

        DB::table('instrument')->insert([
            [
                'code' => 'DRM01',
                'name' => 'Drum Yamaha',
                'price' => '50000',
                'image' => 'drumset.jpg',
                'stock' => '4',
                'description' => 'Drumset dari Yamaha. Memiliki daya tahan dan kualitas suara yang bagus',
            ],
        ]);
    }
}
