@extends('admin.layout')
@section('title', isset($bhandara) ? 'Edit Bhandara Event' : 'Add Bhandara Event')

@push('styles')
<style>
    .form-card {
        background: white;
        border-radius: 10px;
        padding: 30px;
        max-width: 720px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
    }

    .form-group { margin-bottom: 20px; }

    label {
        display: block;
        font-family: 'Cinzel', serif;
        font-size: 0.8rem;
        letter-spacing: 1px;
        color: #5C3A1E;
        margin-bottom: 6px;
    }

    input[type=text], input[type=date], input[type=time], textarea, select {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #d8c8b8;
        border-radius: 6px;
        font-family: 'Lora', serif;
        font-size: 0.9rem;
        color: #2C1A0E;
        background: #fdf9f5;
        transition: border-color 0.2s;
    }

    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: #D4AF37;
        background: white;
    }

    textarea { resize: vertical; min-height: 100px; }

    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: 'Lora', serif;
        font-size: 0.9rem;
        cursor: pointer;
    }

    input[type=checkbox] { width: auto; accent-color: #D4AF37; }

    .form-actions { display: flex; gap: 12px; margin-top: 24px; }

    .btn-save {
        background: linear-gradient(135deg, #3a0a0a, #7B1C1C);
        color: #F5C842;
        padding: 12px 28px;
        border: none;
        border-radius: 6px;
        font-family: 'Cinzel', serif;
        font-size: 0.9rem;
        cursor: pointer;
        transition: opacity 0.2s;
    }
    .btn-save:hover { opacity: 0.85; }

    .btn-cancel {
        background: #e8ddd0;
        color: #5C3A1E;
        padding: 12px 24px;
        border-radius: 6px;
        text-decoration: none;
        font-family: 'Cinzel', serif;
        font-size: 0.9rem;
    }
</style>
@endpush

@section('content')
<div class="form-card">
    <form action="{{ isset($bhandara) ? route('admin.bhandara.update', $bhandara) : route('admin.bhandara.store') }}"
          method="POST">
        @csrf
        @if(isset($bhandara)) @method('PUT') @endif

        <div class="form-group">
            <label>Event Title *</label>
            <input type="text" name="title"
                   value="{{ old('title', $bhandara->title ?? '') }}"
                   placeholder="e.g. Maha Bhandara – Ram Navami Celebration"
                   required>
        </div>

        <div class="form-group">
            <label>Description *</label>
            <textarea name="description" placeholder="Describe the event, what will be served, who is invited...">{{ old('description', $bhandara->description ?? '') }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Event Date *</label>
                <input type="date" name="event_date"
                       value="{{ old('event_date', isset($bhandara) ? $bhandara->event_date->format('Y-m-d') : '') }}"
                       required>
            </div>
            <div class="form-group">
                <label>Event Time</label>
                <input type="time" name="event_time"
                       value="{{ old('event_time', $bhandara->event_time ?? '') }}">
            </div>
        </div>

        <div class="form-group">
            <label>Location / Venue *</label>
            <input type="text" name="location"
                   value="{{ old('location', $bhandara->location ?? '') }}"
                   placeholder="e.g. Sankat Mochan Mandir, Varanasi"
                   required>
        </div>

        <div class="form-group">
            <label>Full Address</label>
            <input type="text" name="address"
                   value="{{ old('address', $bhandara->address ?? '') }}"
                   placeholder="Full address with pincode">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $bhandara->is_active ?? true) ? 'checked' : '' }}>
                    Show on Website
                </label>
            </div>
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_featured" value="1"
                           {{ old('is_featured', $bhandara->is_featured ?? false) ? 'checked' : '' }}>
                    ⭐ Mark as Featured
                </label>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">
                <i class="fas fa-save"></i> {{ isset($bhandara) ? 'Update Event' : 'Save Event' }}
            </button>
            <a href="{{ route('admin.bhandara.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
