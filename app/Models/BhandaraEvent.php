<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BhandaraEvent extends Model
{
    protected $fillable = [
        'title', 'description', 'event_date', 'event_time',
        'location', 'address', 'image', 'is_active', 'is_featured',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_active'  => 'boolean',
        'is_featured'=> 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', now()->toDateString());
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->event_date->format('d M Y');
    }

    public function getIsUpcomingAttribute(): bool
    {
        return $this->event_date->isFuture() || $this->event_date->isToday();
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(public_path('storage/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
        return asset('demo-assets/bhandara-placeholder.jpg');
    }
}
