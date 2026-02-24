@extends('admin.layout')
@section('title', 'Edit Priest Profile')

@push('styles')
<style>
    .form-card { background:white; border-radius:10px; padding:30px; max-width:720px; box-shadow:0 2px 10px rgba(0,0,0,0.06); }
    .form-group { margin-bottom:20px; }
    .form-section { margin-bottom:8px; padding-bottom:8px; border-bottom:1px solid #f0e8e0; font-family:'Cinzel',serif; font-size:0.75rem; letter-spacing:2px; color:#a08060; text-transform:uppercase; }
    label { display:block; font-family:'Cinzel',serif; font-size:0.8rem; letter-spacing:1px; color:#5C3A1E; margin-bottom:6px; }
    input[type=text],input[type=email],input[type=number],input[type=url],textarea { width:100%; padding:10px 14px; border:1px solid #d8c8b8; border-radius:6px; font-family:'Lora',serif; font-size:0.9rem; color:#2C1A0E; background:#fdf9f5; }
    input:focus,textarea:focus { outline:none; border-color:#D4AF37; background:white; }
    textarea { resize:vertical; min-height:80px; }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:20px; }
    .form-actions { display:flex; gap:12px; margin-top:24px; }
    .btn-save { background:linear-gradient(135deg,#3a0a0a,#7B1C1C); color:#F5C842; padding:12px 28px; border:none; border-radius:6px; font-family:'Cinzel',serif; font-size:0.9rem; cursor:pointer; }
    .hint { font-size:0.75rem; color:#a08060; margin-top:4px; font-style:italic; }
</style>
@endpush

@section('content')
<div class="form-card">
    <form action="{{ route('admin.priest.update') }}" method="POST">
        @csrf @method('PUT')

        <div class="form-section">Basic Info</div>

        <div class="form-row">
            <div class="form-group">
                <label>Full Name *</label>
                <input type="text" name="name" value="{{ old('name', $priest->name) }}" required>
            </div>
            <div class="form-group">
                <label>Title / Designation *</label>
                <input type="text" name="title" value="{{ old('title', $priest->title) }}" required>
                <p class="hint">e.g. Vedic Priest & Spiritual Guide</p>
            </div>
        </div>

        <div class="form-group">
            <label>Short Bio (shown in hero) *</label>
            <textarea name="short_bio" rows="2">{{ old('short_bio', $priest->short_bio) }}</textarea>
            <p class="hint">Keep under 150 characters</p>
        </div>

        <div class="form-group">
            <label>Full Bio (shown in About section) *</label>
            <textarea name="bio" rows="5">{{ old('bio', $priest->bio) }}</textarea>
        </div>

        <div class="form-section" style="margin-top:24px;">YouTube</div>

        <div class="form-row">
            <div class="form-group">
                <label>YouTube Channel ID</label>
                <input type="text" name="youtube_channel_id" value="{{ old('youtube_channel_id', $priest->youtube_channel_id) }}" placeholder="UCxxxxxxxxxxxxxxxx">
                <p class="hint">Found in YouTube Studio → Settings → Channel</p>
            </div>
            <div class="form-group">
                <label>Subscriber Count (Demo)</label>
                <input type="number" name="youtube_subscribers" value="{{ old('youtube_subscribers', $priest->youtube_subscribers) }}" placeholder="125000">
                <p class="hint">Will be auto-fetched after YouTube API is added</p>
            </div>
        </div>

        <div class="form-group">
            <label>YouTube Channel URL</label>
            <input type="url" name="youtube_url" value="{{ old('youtube_url', $priest->youtube_url) }}" placeholder="https://youtube.com/@channelname">
        </div>

        <div class="form-section" style="margin-top:24px;">Contact & Social</div>

        <div class="form-row">
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone', $priest->phone) }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $priest->email) }}">
            </div>
        </div>

        <div class="form-group">
            <label>Location / City</label>
            <input type="text" name="location" value="{{ old('location', $priest->location) }}" placeholder="e.g. Varanasi, Uttar Pradesh">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Facebook URL</label>
                <input type="url" name="facebook_url" value="{{ old('facebook_url', $priest->facebook_url) }}">
            </div>
            <div class="form-group">
                <label>Instagram URL</label>
                <input type="url" name="instagram_url" value="{{ old('instagram_url', $priest->instagram_url) }}">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Save Profile</button>
        </div>
    </form>
</div>
@endsection
