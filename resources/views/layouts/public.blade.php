<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Portal Berita')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <style>
        :root {
            --primary: #0ea5e9;
            --secondary: #6366f1;
            --glass-bg: rgba(255, 255, 255, 0.75);
            --glass-border: rgba(255, 255, 255, 0.45);
            --text-muted: #6b7280;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            background: #0b1220;
            color: #0f172a;
            line-height: 1.6;
        }

        /* Typography */
        h1,
        h2,
        h3,
        h4 {
            color: #0f172a;
            line-height: 1.25;
            font-weight: 700;
            letter-spacing: -0.01em
        }

        h1 {
            font-size: 2rem
        }

        h2 {
            font-size: 1.5rem
        }

        h3 {
            font-size: 1.125rem
        }

        p {
            margin: .25rem 0 .9rem;
            color: #334155
        }

        a {
            color: #0ea5e9;
            text-decoration: none
        }

        a:hover {
            text-decoration: underline
        }

        small,
        .muted {
            color: #64748b
        }

        /* Animated gradient background */
        .bg-animated {
            position: fixed;
            inset: 0;
            z-index: -2;
            background: radial-gradient(1200px 800px at 10% 10%, rgba(14, 165, 233, 0.25), transparent 60%),
                radial-gradient(1000px 700px at 90% 20%, rgba(99, 102, 241, 0.2), transparent 60%),
                radial-gradient(900px 700px at 50% 90%, rgba(16, 185, 129, 0.18), transparent 60%),
                linear-gradient(180deg, #0b1220 0%, #0b1220 100%);
            filter: saturate(1.1) contrast(1.05);
        }

        .orbs {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }

        .orb {
            position: absolute;
            width: 42vmax;
            height: 42vmax;
            border-radius: 50%;
            filter: blur(50px) saturate(130%);
            opacity: .25;
            animation: float 22s ease-in-out infinite;
            will-change: transform;
        }

        .orb.orb-1 {
            background: radial-gradient(circle at 30% 30%, #22d3ee, #2563eb);
            top: -10%;
            left: -10%;
            animation-delay: 0s;
        }

        .orb.orb-2 {
            background: radial-gradient(circle at 70% 30%, #34d399, #10b981);
            top: -20%;
            right: -15%;
            animation-delay: 4s;
        }

        .orb.orb-3 {
            background: radial-gradient(circle at 30% 70%, #a78bfa, #6366f1);
            bottom: -20%;
            left: -10%;
            animation-delay: 8s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
            }

            50% {
                transform: translate3d(2%, -3%, 0) scale(1.05);
            }
        }

        /* Glass container */
        header.hero {
            padding: 3rem 0;
            color: #e2e8f0;
            border-radius: 16px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background: linear-gradient(120deg, rgba(14, 165, 233, .35), rgba(99, 102, 241, .35));
            border: 1px solid rgba(255, 255, 255, .25);
        }

        header.hero h1 {
            margin: 0;
            font-weight: 700;
            color: #ffffff;
        }

        header.hero p {
            margin-top: .5rem;
            color: #cbd5e1
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .logo {
            font-weight: 700;
            letter-spacing: 0.3px;
            font-size: 1.1rem;
            color: #e2e8f0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.2rem;
        }

        .card {
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 16px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.80);
            box-shadow: 0 10px 30px rgba(2, 6, 23, .25);
            transition: transform .2s ease, box-shadow .2s ease;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 45px rgba(2, 6, 23, .35);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #0b1220;
        }

        .card .content {
            padding: 1rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Media wrapper for consistent ratio and hover */
        .card-media {
            position: relative;
            overflow: hidden;
            aspect-ratio: 16/9;
            background: #0b1220;
            display: block
        }

        .card-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.02);
            transition: transform .5s ease
        }

        .card:hover .card-media img {
            transform: scale(1.06)
        }

        .card-media:after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(2, 6, 23, 0) 40%, rgba(2, 6, 23, .35) 100%)
        }

        /* Card text system */
        .card .title {
            margin: .5rem 0;
            font-weight: 700;
            color: #0f172a
        }

        .card .meta {
            font-size: .8rem;
            color: #64748b;
            margin-bottom: .35rem
        }

        .card .excerpt {
            color: #475569;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden
        }

        .card .actions {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .card .readmore {
            color: #0ea5e9;
            font-weight: 600;
            text-decoration: none
        }

        .card .readmore:hover {
            text-decoration: underline
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            font-size: .8rem;
            color: #0c4a6e;
            background: rgba(14, 165, 233, .15);
            padding: .25rem .6rem;
            border-radius: 999px;
            text-decoration: none;
            border: 1px solid rgba(14, 165, 233, .25);
        }

        .footer {
            color: var(--text-muted);
            font-size: .9rem;
            padding: 2rem 0;
        }

        .article h1 {
            margin-top: .5rem;
        }

        .article .meta {
            color: #6b7280;
            font-size: .9rem;
            margin-bottom: 1rem;
        }

        .tags a {
            margin-right: .5rem;
        }

        /* Navigation links */
        nav ul li a {
            color: #cbd5e1;
            font-weight: 600;
            letter-spacing: .01em
        }

        nav ul li a:hover {
            color: #fff;
            text-decoration: none
        }

        /* Container glass wrap */
        .shell {
            background: linear-gradient(180deg, rgba(255, 255, 255, .06), rgba(255, 255, 255, .02));
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 20px;
            padding: 0 1rem;
            box-shadow: 0 10px 30px rgba(2, 6, 23, .2);
        }
    </style>
</head>

<body>
    <div class="bg-animated"></div>
    <div class="orbs">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
    </div>
    <main class="container shell">
        <div class="navbar">
            <a class="logo" href="{{ route('home') }}">Portal<span style="color:#0ea5e9">Berita</span></a>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ url('/posts') }}">Posts</a></li>
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="contrast" style="margin:0">Logout</button>
                        </form>
                    </li>
                    @endguest
                </ul>
            </nav>
        </div>
        @yield('hero')
        @yield('content')
        <footer class="footer">&copy; {{ date('Y') }} Portal Berita. All rights reserved.</footer>
    </main>
</body>

</html>