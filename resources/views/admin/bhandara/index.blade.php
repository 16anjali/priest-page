@extends('admin.layout')
@section('title', 'Bhandara Events')

@push('styles')
<style>
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }

    .btn-add {
        background: linear-gradient(135deg, #FF6B00, #FF9500);
        color: white;
        padding: 10px 22px;
        border-radius: 6px;
        text-decoration: none;
        font-family: 'Cinzel', serif;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: opacity 0.2s;
    }
    .btn-add:hover { opacity: 0.85; }

    .table-wrap {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
    }

    table { width: 100%; border-collapse: collapse; }

    thead { background: #3a0a0a; }
    thead th {
        padding: 14px 18px;
        text-align: left;
        color: #F5C842;
        font-family: 'Cinzel', serif;
        font-size: 0.8rem;
        letter-spacing: 1px;
    }

    tbody tr { border-bottom: 1px solid #f0e8e0; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: #fdf8f3; }

    td { padding: 14px 18px; font-size: 0.9rem; vertical-align: middle; }

    .badge-upcoming {
        background: #FFF3E0;
        color: #FF6B00;
        border: 1px solid #FFD580;
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
        white-space: nowrap;
    }

    .badge-past {
        background: #f0f0f0;
        color: #888;
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
    }

    .badge-featured {
        background: #FFFBEA;
        color: #B8860B;
        border: 1px solid #D4AF37;
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
        margin-left: 6px;
    }

    .action-btns { display: flex; gap: 8px; }

    .btn-edit {
        background: #3a5a8a;
        color: white;
        padding: 6px 14px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.8rem;
    }

    .btn-delete {
        background: #8a2020;
        color: white;
        padding: 6px 14px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-size: 0.8rem;
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div>
        <h2 style="font-family:'Cinzel',serif; color:#3a0a0a; font-size:1.2rem;">🍛 Bhandara Events</h2>
        <p style="color:#a08060; font-size:0.85rem; margin-top:4px;">Manage upcoming and past Bhandara announcements</p>
    </div>
    <a href="{{ route('admin.bhandara.create') }}" class="btn-add">
        <i class="fas fa-plus"></i> Add New Event
    </a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Event Title</th>
                <th>Date & Time</th>
                <th>Location</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr>
                <td>
                    <strong>{{ $event->title }}</strong>
                    @if($event->is_featured)
                        <span class="badge-featured">⭐ Featured</span>
                    @endif
                </td>
                <td>
                    {{ $event->formatted_date }}
                    @if($event->event_time)
                        <br><small style="color:#a08060;">{{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}</small>
                    @endif
                </td>
                <td>{{ $event->location }}</td>
                <td>
                    @if($event->is_upcoming)
                        <span class="badge-upcoming">✨ Upcoming</span>
                    @else
                        <span class="badge-past">✓ Past</span>
                    @endif
                </td>
                <td>
                    <div class="action-btns">
                        <a href="{{ route('admin.bhandara.edit', $event) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.bhandara.destroy', $event) }}" method="POST"
                              onsubmit="return confirm('Delete this event?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; padding:40px; color:#a08060;">
                    No events yet. <a href="{{ route('admin.bhandara.create') }}">Add your first event</a>.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
