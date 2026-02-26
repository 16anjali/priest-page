<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BhandaraEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('bhandara_events')->insert([
            [
                'title' => 'Grand Bhandara Mahotsav',
                'description' => 'Join us for the sacred bhandara and receive blessings.',
                'event_date' => now()->addDays(7),
                'location' => 'Kanpur, Uttar Pradesh',
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
