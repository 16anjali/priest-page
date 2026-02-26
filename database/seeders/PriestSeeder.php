<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Priest;

class PriestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Priest::create([
            'name' => 'Maharaj Ji',
            'title' => 'Spiritual Guru',
            'bio' => 'Welcome to the official page of Maharaj Ji.',
            'short_bio' => 'Spiritual Guide',
            'youtube_subscribers' => 0,
            'location' => 'India',
        ]);
    }
}
