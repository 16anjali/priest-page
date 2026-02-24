<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priest extends Model
{
    protected $fillable = [
        'name', 'title', 'bio', 'short_bio', 'image',
        'youtube_channel_id', 'youtube_channel_name', 'youtube_subscribers',
        'phone', 'email', 'location',
        'facebook_url', 'instagram_url', 'youtube_url',
    ];

    public function getFormattedSubscribersAttribute(): string
    {
        $count = $this->youtube_subscribers;
        if ($count >= 1_000_000) {
            return round($count / 1_000_000, 1) . 'M';
        } elseif ($count >= 1_000) {
            return round($count / 1_000, 1) . 'K';
        }
        return (string) $count;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        return asset('demo-assets/priest-placeholder.jpg');
    }
}
