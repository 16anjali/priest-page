<?php

namespace App\Http\Controllers;

use App\Models\Priest;
use App\Models\BhandaraEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $priest  = Priest::first();
        $bhandara = BhandaraEvent::active()
                        ->orderBy('event_date', 'asc')
                        ->get();

        $upcomingBhandara = $bhandara->filter(fn($e) => $e->is_upcoming);
        $pastBhandara     = $bhandara->filter(fn($e) => !$e->is_upcoming);

        // Demo YouTube videos — replace with real API call after approval
        $youtubeVideos = $this->getDemoVideos();

        return view('home', compact('priest', 'upcomingBhandara', 'pastBhandara', 'youtubeVideos'));
    }

    /**
     * Demo videos — hardcoded for the demo phase.
     * After approval, replace this with a real YouTube Data API v3 call.
     *
     * Real API call example (save for later):
     *   GET https://www.googleapis.com/youtube/v3/search
     *       ?key=YOUR_API_KEY
     *       &channelId=CHANNEL_ID
     *       &part=snippet,id
     *       &order=date
     *       &maxResults=6
     */
    private function getDemoVideos(): array
    {
        return [
            [
                'id'           => 'dQw4w9WgXcQ',
                'title'        => 'Bhagwat Katha – Day 1 | Pandit Ramesh Sharma Ji',
                'thumbnail'    => 'https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg',
                'views'        => '1.2L',
                'published_at' => '2 days ago',
                'duration'     => '1:32:45',
            ],
            [
                'id'           => 'dQw4w9WgXcQ',
                'title'        => 'Ram Katha – Sunderkand Path | Complete',
                'thumbnail'    => 'https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg',
                'views'        => '85K',
                'published_at' => '1 week ago',
                'duration'     => '2:10:20',
            ],
            [
                'id'           => 'dQw4w9WgXcQ',
                'title'        => 'Morning Aarti Live – Dashashwamedh Ghat',
                'thumbnail'    => 'https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg',
                'views'        => '45K',
                'published_at' => '2 weeks ago',
                'duration'     => '45:10',
            ],
            [
                'id'           => 'dQw4w9WgXcQ',
                'title'        => 'Geeta Saar – Chapter 2 Explained Simply',
                'thumbnail'    => 'https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg',
                'views'        => '62K',
                'published_at' => '3 weeks ago',
                'duration'     => '58:30',
            ],
            [
                'id'           => 'dQw4w9WgXcQ',
                'title'        => 'Hanuman Chalisa – 108 Times | Peaceful',
                'thumbnail'    => 'https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg',
                'views'        => '2.3L',
                'published_at' => '1 month ago',
                'duration'     => '3:45:00',
            ],
            [
                'id'           => 'dQw4w9WgXcQ',
                'title'        => 'Why We Do Puja? – Spiritual Significance',
                'thumbnail'    => 'https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg',
                'views'        => '38K',
                'published_at' => '1 month ago',
                'duration'     => '28:15',
            ],
        ];
    }
}
