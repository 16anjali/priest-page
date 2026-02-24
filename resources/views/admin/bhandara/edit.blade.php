@extends('admin.layout')
@section('title', 'Edit Bhandara Event')

@push('styles')
<style>
    .form-card { background:white; border-radius:10px; padding:30px; max-width:720px; box-shadow:0 2px 10px rgba(0,0,0,0.06); }
    .form-group { margin-bottom:20px; }
    label { display:block; font-family:'Cinzel',serif; font-size:0.8rem; letter-spacing:1px; color:#5C3A1E; margin-bottom:6px; }
    input[type=text],input[type=date],input[type=time],textarea { width:100%; padding:10px 14px; border:1px solid #d8c8b8; border-radius:6px; font-family:'Lora',serif; font-size:0.9rem; color:#2C1A0E; background:#fdf9f5; }
    input:focus,textarea:focus { outline:none; border-color:#D4AF37; background:white; }
    textarea { resize:vertical; min-height:100px; }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:20px; }
    .checkbox-label { display:flex; align-items:center; gap:10px; font-family:'Lora',serif; font-size:0.9rem; cursor:pointer; }
    input[type=checkbox] { width:auto; accent-color:#D4AF37; }
    .form-actions { display:flex; gap:12px; margin-top:24px; }
    .btn-save { background:linear-gradient(135deg,#3a0a0a,#7B1C1C); color:#F5C842; padding:12px 28px; border:none; border-radius:6px; font-family:'Cinzel',serif; font-size:0.9rem; cursor:pointer; }
    .btn-cancel { background:#e8ddd0; color:#5C3A1E; padding:12px 24px; border-radius:6px; text-decoration:none; font-family:'Cinzel',serif; font-size:0.9rem; }
</style>
@endpush

@section('content')
<div class="form-card">
    <form action="{{ route('admin.bhandara.update', $bhandara) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Event Title *</label>
            <input type="text" name="title" value="{{ old('title', $bhandara->title) }}" required>
        </div>

        <div class="form-group">
            <label>Description *</label>
            <textarea name="description">{{ old('description', $bhandara->description) }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Event Date *</label>
                <input type="date" name="event_date" value="{{ old('event_date', $bhandara->event_date->format('Y-m-d')) }}" required>
            </div>
            <div class="form-group">
                <label>Event Time</label>
                <input type="time" name="event_time" value="{{ old('event_time', $bhandara->event_time) }}">
            </div>
        </div>

        <div class="form-group">
            <label>Location / Venue *</label>
            <input type="text" name="location" value="{{ old('location', $bhandara->location) }}" required>
        </div>

        <div class="form-group">
            <label>Full Address</label>
            <input type="text" name="address" value="{{ old('address', $bhandara->address) }}">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_active" value="1" {{ $bhandara->is_active ? 'checked' : '' }}>
                    Show on Website
                </label>
            </div>
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_featured" value="1" {{ $bhandara->is_featured ? 'checked' : '' }}>
                    ⭐ Mark as Featured
                </label>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Update Event</button>
            <a href="{{ route('admin.bhandara.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
