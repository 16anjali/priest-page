<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $priest->name }} – Vedic Priest & Spiritual Guide</title>
    <meta name="description" content="{{ $priest->short_bio }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Hindi&family=Cinzel:wght@400;600;700&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --saffron:     #FF6B00;
            --saffron-lt:  #FF9500;
            --gold:        #D4AF37;
            --gold-lt:     #F5C842;
            --maroon:      #7B1C1C;
            --maroon-lt:   #A52A2A;
            --cream:       #FFF8F0;
            --cream-dark:  #F5EDDF;
            --brown:       #5C3A1E;
            --text:        #2C1A0E;
            --text-muted:  #7A5C3C;
            --white:       #FFFFFF;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Lora', serif;
            background: var(--cream);
            color: var(--text);
            line-height: 1.7;
        }

        /* ── NAVBAR ─────────────────────────────────── */
        nav {
            background: var(--maroon);
            padding: 0 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }

        .nav-brand {
            font-family: 'Cinzel', serif;
            color: var(--gold-lt);
            font-size: 1.1rem;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .nav-links { display: flex; gap: 28px; list-style: none; }
        .nav-links a {
            color: #e0c8a0;
            text-decoration: none;
            font-size: 0.88rem;
            letter-spacing: 0.5px;
            transition: color 0.2s;
            font-family: 'Cinzel', serif;
        }
        .nav-links a:hover { color: var(--gold-lt); }

        /* ── HERO ───────────────────────────────────── */
        .hero {
            background: linear-gradient(135deg, var(--maroon) 0%, #4a0f0f 50%, #2a0808 100%);
            padding: 80px 5% 60px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '🕉';
            position: absolute;
            font-size: 20rem;
            opacity: 0.04;
            top: -60px;
            right: -40px;
            line-height: 1;
        }

        .hero-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .hero-img-wrap {
            flex-shrink: 0;
            position: relative;
        }

        .hero-img {
            width: 260px;
            height: 320px;
            object-fit: cover;
            border-radius: 12px;
            border: 4px solid var(--gold);
            box-shadow: 0 0 40px rgba(212,175,55,0.4), 0 20px 60px rgba(0,0,0,0.5);
        }

        .hero-img-wrap::before {
            content: '';
            position: absolute;
            inset: -10px;
            border: 1px solid rgba(212,175,55,0.3);
            border-radius: 16px;
        }

        .hero-text { flex: 1; }

        .hero-tag {
            display: inline-block;
            background: rgba(212,175,55,0.15);
            border: 1px solid rgba(212,175,55,0.4);
            color: var(--gold-lt);
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            letter-spacing: 2px;
            margin-bottom: 16px;
            font-family: 'Cinzel', serif;
        }

        .hero-name {
            font-family: 'Cinzel', serif;
            font-size: 2.6rem;
            color: var(--white);
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .hero-title {
            color: var(--gold-lt);
            font-size: 1.1rem;
            margin-bottom: 20px;
            font-style: italic;
        }

        .hero-bio {
            color: #d0b090;
            font-size: 1rem;
            margin-bottom: 30px;
            max-width: 480px;
        }

        .hero-stats {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .stat-box {
            text-align: center;
        }

        .stat-num {
            font-family: 'Cinzel', serif;
            font-size: 1.6rem;
            color: var(--gold-lt);
            display: block;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #a08060;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }

        .btn-primary {
            background: linear-gradient(135deg, var(--saffron), var(--saffron-lt));
            color: white;
            padding: 12px 28px;
            border-radius: 6px;
            text-decoration: none;
            font-family: 'Cinzel', serif;
            font-size: 0.85rem;
            letter-spacing: 1px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 15px rgba(255,107,0,0.4);
        }

        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(255,107,0,0.5); }

        .btn-outline {
            border: 1px solid var(--gold);
            color: var(--gold-lt);
            padding: 12px 28px;
            border-radius: 6px;
            text-decoration: none;
            font-family: 'Cinzel', serif;
            font-size: 0.85rem;
            letter-spacing: 1px;
            transition: background 0.2s;
        }

        .btn-outline:hover { background: rgba(212,175,55,0.1); }

        /* ── SECTION COMMON ─────────────────────────── */
        section { padding: 70px 5%; }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-tag {
            display: inline-block;
            color: var(--saffron);
            font-size: 0.78rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 10px;
            font-family: 'Cinzel', serif;
        }

        .section-title {
            font-family: 'Cinzel', serif;
            font-size: 2rem;
            color: var(--maroon);
            margin-bottom: 12px;
        }

        .section-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--saffron), var(--gold));
            margin: 0 auto;
            border-radius: 2px;
        }

        .container { max-width: 1100px; margin: 0 auto; }

        /* ── SUBSCRIBER BANNER ──────────────────────── */
        .sub-banner {
            background: linear-gradient(135deg, var(--maroon), #6a1010);
            padding: 40px 5%;
        }

        .sub-inner {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
        }

        .sub-left { display: flex; align-items: center; gap: 20px; }

        .yt-icon {
            background: #FF0000;
            color: white;
            width: 56px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .sub-count {
            font-family: 'Cinzel', serif;
            font-size: 2.4rem;
            color: var(--gold-lt);
            line-height: 1;
        }

        .sub-text {
            color: #c0a070;
            font-size: 0.9rem;
        }

        .btn-subscribe {
            background: #FF0000;
            color: white;
            padding: 14px 32px;
            border-radius: 6px;
            text-decoration: none;
            font-family: 'Cinzel', serif;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.2s;
            white-space: nowrap;
        }

        .btn-subscribe:hover { background: #cc0000; }

        /* ── YOUTUBE VIDEOS ─────────────────────────── */
        .videos-section { background: var(--cream-dark); }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
        }

        .video-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .video-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .video-thumb {
            position: relative;
            padding-top: 56.25%;
            background: #1a0a0a;
        }

        .video-thumb img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 52px;
            height: 52px;
            background: rgba(255,0,0,0.85);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: transform 0.2s;
        }

        .video-card:hover .play-btn { transform: translate(-50%, -50%) scale(1.1); }

        .video-duration {
            position: absolute;
            bottom: 8px;
            right: 8px;
            background: rgba(0,0,0,0.8);
            color: white;
            font-size: 0.75rem;
            padding: 2px 6px;
            border-radius: 3px;
        }

        .video-info { padding: 14px 16px; }

        .video-title {
            font-family: 'Cinzel', serif;
            font-size: 0.88rem;
            color: var(--text);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .video-meta {
            display: flex;
            gap: 12px;
            font-size: 0.78rem;
            color: var(--text-muted);
        }

        /* ── BHANDARA ───────────────────────────────── */
        .bhandara-section { background: var(--cream); }

        .bhandara-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        .bhandara-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            border-top: 4px solid var(--saffron);
            transition: transform 0.2s;
        }

        .bhandara-card.featured {
            border-top-color: var(--gold);
            box-shadow: 0 4px 24px rgba(212,175,55,0.2);
        }

        .bhandara-card:hover { transform: translateY(-3px); }

        .bhandara-body { padding: 22px; }

        .bhandara-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #FFF3E0;
            color: var(--saffron);
            border: 1px solid #FFD580;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-family: 'Cinzel', serif;
            margin-bottom: 12px;
        }

        .bhandara-badge.gold {
            background: #FFFBEA;
            color: #B8860B;
            border-color: var(--gold);
        }

        .bhandara-title {
            font-family: 'Cinzel', serif;
            font-size: 1.05rem;
            color: var(--maroon);
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .bhandara-desc {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 16px;
        }

        .bhandara-meta { display: flex; flex-direction: column; gap: 6px; }

        .meta-row {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            color: var(--brown);
        }

        .meta-row i {
            color: var(--saffron);
            width: 16px;
        }

        .past-tag {
            display: inline-block;
            background: #f0f0f0;
            color: #888;
            padding: 2px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            margin-top: 10px;
        }

        /* ── ABOUT SECTION ──────────────────────────── */
        .about-section {
            background: linear-gradient(135deg, #3a0a0a, #1a0505);
        }

        .about-inner {
            max-width: 750px;
            margin: 0 auto;
            text-align: center;
        }

        .about-inner .section-title { color: var(--gold-lt); }
        .about-inner .section-tag { color: var(--saffron-lt); }

        .about-text {
            color: #d0b090;
            font-size: 1.05rem;
            line-height: 1.9;
        }

        .contact-cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 36px;
        }

        .contact-card {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(212,175,55,0.2);
            padding: 12px 20px;
            border-radius: 8px;
            color: #c0a070;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.2s;
        }

        .contact-card i { color: var(--gold-lt); }
        .contact-card:hover { background: rgba(255,255,255,0.08); }

        /* ── FOOTER ─────────────────────────────────── */
        footer {
            background: #0f0505;
            padding: 30px 5%;
            text-align: center;
        }

        .footer-social { display: flex; justify-content: center; gap: 16px; margin-bottom: 16px; }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #3a2010;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a08060;
            text-decoration: none;
            transition: border-color 0.2s, color 0.2s;
        }

        .social-btn:hover { border-color: var(--gold); color: var(--gold-lt); }

        .footer-text { color: #5a3a20; font-size: 0.85rem; }

        /* ── DEMO BADGE ─────────────────────────────── */
        .demo-badge {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #1a1a2e;
            color: #6af0ff;
            border: 1px solid #00cfff;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.75rem;
            letter-spacing: 1px;
            z-index: 999;
            font-family: monospace;
        }

        /* ── RESPONSIVE ─────────────────────────────── */
        @media (max-width: 768px) {
            .hero-inner { flex-direction: column; text-align: center; }
            .hero-img { width: 200px; height: 240px; }
            .hero-name { font-size: 1.8rem; }
            .hero-stats { justify-content: center; }
            .hero-btns { justify-content: center; }
            .sub-inner { justify-content: center; text-align: center; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

<!-- ════ NAVBAR ════ -->
<nav>
    <a href="#" class="nav-brand">🕉 {{ $priest->name }}</a>
    <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#videos">Videos</a></li>
        <li><a href="#bhandara">Bhandara</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>

<!-- ════ HERO ════ -->
<section class="hero">
    <div class="hero-inner">
        <div class="hero-img-wrap">
            <img
                src="{{ $priest->image_url }}"
                alt="{{ $priest->name }}"
                class="hero-img"
                onerror="this.src='https://placehold.co/260x320/7B1C1C/F5C842?text=Pandit+Ji&font=cinzel'"
            >
        </div>
        <div class="hero-text">
            <span class="hero-tag">🙏 Jai Shri Ram</span>
            <h1 class="hero-name">{{ $priest->name }}</h1>
            <p class="hero-title">{{ $priest->title }}</p>
            <p class="hero-bio">{{ $priest->short_bio }}</p>

            <div class="hero-stats">
                <div class="stat-box">
                    <span class="stat-num">{{ $priest->formatted_subscribers }}</span>
                    <span class="stat-label">Subscribers</span>
                </div>
                <div class="stat-box">
                    <span class="stat-num">25+</span>
                    <span class="stat-label">Years</span>
                </div>
                <div class="stat-box">
                    <span class="stat-num">500+</span>
                    <span class="stat-label">Kathas</span>
                </div>
                <div class="stat-box">
                    <span class="stat-num">{{ $upcomingBhandara->count() }}</span>
                    <span class="stat-label">Upcoming</span>
                </div>
            </div>

            <div class="hero-btns">
                <a href="#bhandara" class="btn-primary">🍛 View Bhandara</a>
                <a href="{{ $priest->youtube_url ?? '#videos' }}" target="_blank" class="btn-outline">
                    <i class="fab fa-youtube"></i> Watch Videos
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ════ SUBSCRIBER BANNER ════ -->
<div class="sub-banner">
    <div class="sub-inner">
        <div class="sub-left">
            <div class="yt-icon"><i class="fab fa-youtube"></i></div>
            <div>
                <div class="sub-count">{{ $priest->formatted_subscribers }}</div>
                <div class="sub-text">YouTube Subscribers</div>
            </div>
        </div>
        <div style="color:#c0a070; font-style:italic; font-size:0.95rem; max-width:300px; text-align:center;">
            "Join our growing family of devotees. Watch Katha, Aarti & spiritual discourses."
        </div>
        <a href="{{ $priest->youtube_url ?? '#' }}" target="_blank" class="btn-subscribe">
            <i class="fab fa-youtube"></i> Subscribe Now
        </a>
    </div>
</div>

<!-- ════ YOUTUBE VIDEOS ════ -->
<section class="videos-section" id="videos">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">▶ Latest Uploads</span>
            <h2 class="section-title">Watch Recent Videos</h2>
            <div class="section-divider"></div>
        </div>

        <div class="video-grid">
            @foreach($youtubeVideos as $video)
            <a href="https://youtube.com/watch?v={{ $video['id'] }}" target="_blank" class="video-card">
                <div class="video-thumb">
                    <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}" loading="lazy">
                    <div class="play-btn"><i class="fas fa-play"></i></div>
                    <span class="video-duration">{{ $video['duration'] }}</span>
                </div>
                <div class="video-info">
                    <div class="video-title">{{ $video['title'] }}</div>
                    <div class="video-meta">
                        <span><i class="fas fa-eye"></i> {{ $video['views'] }} views</span>
                        <span><i class="fas fa-clock"></i> {{ $video['published_at'] }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div style="text-align:center; margin-top:36px;">
            <a href="{{ $priest->youtube_url ?? '#' }}" target="_blank" class="btn-primary">
                View All Videos on YouTube
            </a>
        </div>
    </div>
</section>

<!-- ════ BHANDARA ════ -->
<section class="bhandara-section" id="bhandara">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">🍛 Seva & Prasad</span>
            <h2 class="section-title">Bhandara Updates</h2>
            <div class="section-divider"></div>
        </div>

        @if($upcomingBhandara->count())
        <h3 style="font-family:'Cinzel',serif; color:var(--saffron); margin-bottom:20px; font-size:1rem; letter-spacing:2px;">
            ✨ UPCOMING BHANDARA
        </h3>
        <div class="bhandara-grid" style="margin-bottom:50px;">
            @foreach($upcomingBhandara as $event)
            <div class="bhandara-card {{ $event->is_featured ? 'featured' : '' }}">
                <div class="bhandara-body">
                    @if($event->is_featured)
                        <span class="bhandara-badge gold">⭐ Featured Event</span>
                    @else
                        <span class="bhandara-badge">🍛 Bhandara</span>
                    @endif
                    <h3 class="bhandara-title">{{ $event->title }}</h3>
                    <p class="bhandara-desc">{{ $event->description }}</p>
                    <div class="bhandara-meta">
                        <div class="meta-row">
                            <i class="fas fa-calendar"></i>
                            <span>{{ $event->formatted_date }}</span>
                            @if($event->event_time)
                            <span>at {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}</span>
                            @endif
                        </div>
                        <div class="meta-row">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $event->location }}</span>
                        </div>
                        @if($event->address)
                        <div class="meta-row">
                            <i class="fas fa-map"></i>
                            <span>{{ $event->address }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if($pastBhandara->count())
        <h3 style="font-family:'Cinzel',serif; color:#888; margin-bottom:20px; font-size:0.9rem; letter-spacing:2px;">
            PAST EVENTS
        </h3>
        <div class="bhandara-grid">
            @foreach($pastBhandara as $event)
            <div class="bhandara-card" style="opacity:0.65;">
                <div class="bhandara-body">
                    <h3 class="bhandara-title">{{ $event->title }}</h3>
                    <p class="bhandara-desc">{{ $event->description }}</p>
                    <div class="bhandara-meta">
                        <div class="meta-row">
                            <i class="fas fa-calendar"></i>
                            <span>{{ $event->formatted_date }}</span>
                        </div>
                        <div class="meta-row">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $event->location }}</span>
                        </div>
                    </div>
                    <span class="past-tag">✓ Completed</span>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if($upcomingBhandara->count() === 0 && $pastBhandara->count() === 0)
        <div style="text-align:center; color:var(--text-muted); padding:40px;">
            <i class="fas fa-calendar-times" style="font-size:3rem; margin-bottom:16px; opacity:0.3;"></i>
            <p>No Bhandara events scheduled at the moment. Check back soon.</p>
        </div>
        @endif
    </div>
</section>

<!-- ════ ABOUT ════ -->
<section class="about-section" id="about">
    <div class="about-inner">
        <div class="section-header">
            <span class="section-tag">About</span>
            <h2 class="section-title" style="color:var(--gold-lt);">About Pandit Ji</h2>
            <div class="section-divider"></div>
        </div>
        <p class="about-text">{{ $priest->bio }}</p>

        <div class="contact-cards" id="contact">
            @if($priest->phone)
            <a href="tel:{{ $priest->phone }}" class="contact-card">
                <i class="fas fa-phone"></i> {{ $priest->phone }}
            </a>
            @endif
            @if($priest->email)
            <a href="mailto:{{ $priest->email }}" class="contact-card">
                <i class="fas fa-envelope"></i> {{ $priest->email }}
            </a>
            @endif
            @if($priest->location)
            <span class="contact-card">
                <i class="fas fa-map-marker-alt"></i> {{ $priest->location }}
            </span>
            @endif
        </div>
    </div>
</section>

<!-- ════ FOOTER ════ -->
<footer>
    <div class="footer-social">
        @if($priest->youtube_url)
        <a href="{{ $priest->youtube_url }}" target="_blank" class="social-btn"><i class="fab fa-youtube"></i></a>
        @endif
        @if($priest->facebook_url)
        <a href="{{ $priest->facebook_url }}" target="_blank" class="social-btn"><i class="fab fa-facebook"></i></a>
        @endif
        @if($priest->instagram_url)
        <a href="{{ $priest->instagram_url }}" target="_blank" class="social-btn"><i class="fab fa-instagram"></i></a>
        @endif
    </div>
    <p class="footer-text">
        © {{ date('Y') }} {{ $priest->name }}. Made with 🙏 for spreading Dharma.
    </p>
</footer>

<!-- Demo badge -->
<div class="demo-badge">🚧 DEMO MODE</div>

</body>
</html>
