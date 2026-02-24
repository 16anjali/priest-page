<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel – @yield('title', 'Dashboard')</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Lora:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Lora',serif; background:#f5f0ea; color:#2C1A0E; display:flex; min-height:100vh; }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            background: linear-gradient(180deg, #3a0a0a, #1a0505);
            color: #c0a070;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            top: 0; left: 0; bottom: 0;
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(212,175,55,0.15);
            font-family: 'Cinzel', serif;
            color: #F5C842;
            font-size: 0.95rem;
            letter-spacing: 1px;
        }

        .sidebar-brand span { display:block; font-size:0.7rem; color:#a08060; margin-top:4px; font-family:'Lora',serif; }

        .sidebar-nav { padding: 20px 0; flex: 1; }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #a08060;
            text-decoration: none;
            font-size: 0.88rem;
            transition: background 0.2s, color 0.2s;
        }

        .nav-item:hover, .nav-item.active {
            background: rgba(212,175,55,0.1);
            color: #F5C842;
        }

        .nav-item i { width: 18px; text-align: center; }

        .nav-label {
            padding: 20px 20px 8px;
            font-size: 0.65rem;
            letter-spacing: 3px;
            color: #5a3a20;
            text-transform: uppercase;
            font-family: 'Cinzel', serif;
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(212,175,55,0.1);
        }

        .view-site-btn {
            display: block;
            text-align: center;
            background: rgba(255,107,0,0.15);
            border: 1px solid rgba(255,107,0,0.3);
            color: #FF9500;
            padding: 10px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.8rem;
            font-family: 'Cinzel', serif;
            transition: background 0.2s;
        }

        .view-site-btn:hover { background: rgba(255,107,0,0.25); }

        /* MAIN */
        .main-content {
            margin-left: 240px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: white;
            padding: 16px 30px;
            border-bottom: 1px solid #e8ddd0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar h1 {
            font-family: 'Cinzel', serif;
            font-size: 1.1rem;
            color: #3a0a0a;
        }

        .page-body { padding: 30px; flex: 1; }

        /* FLASH MESSAGES */
        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
    @stack('styles')
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-brand">
        🕉 Priest Admin
        <span>Manage Website Content</span>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-label">Content</div>
        <a href="{{ route('admin.bhandara.index') }}" class="nav-item {{ request()->routeIs('admin.bhandara.*') ? 'active' : '' }}">
            <i class="fas fa-utensils"></i> Bhandara Events
        </a>
        <a href="{{ route('admin.priest.edit') }}" class="nav-item {{ request()->routeIs('admin.priest.*') ? 'active' : '' }}">
            <i class="fas fa-user-circle"></i> Priest Profile
        </a>
    </nav>

    <div class="sidebar-footer">
        <a href="{{ route('home') }}" target="_blank" class="view-site-btn">
            <i class="fas fa-external-link-alt"></i> View Website
        </a>
    </div>
</aside>

<div class="main-content">
    <div class="topbar">
        <h1>@yield('title', 'Admin Dashboard')</h1>
        <span style="font-size:0.8rem; color:#a08060;">Demo Admin Panel</span>
    </div>

    <div class="page-body">
        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-error">
                ❌ Please fix the following errors:
                <ul style="margin-top:8px; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</div>

@stack('scripts')
</body>
</html>
