<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title','Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <style>
        body {
            min-height: 100vh;
            background: #0b1220;
        }

        .bg-animated {
            position: fixed;
            inset: 0;
            z-index: -2;
            background: radial-gradient(1000px 700px at 10% 10%, rgba(14, 165, 233, .25), transparent 60%), radial-gradient(900px 600px at 80% 10%, rgba(168, 85, 247, .18), transparent 60%), linear-gradient(180deg, #0b1220, #0b1220);
        }

        .orb {
            position: absolute;
            width: 40vmax;
            height: 40vmax;
            border-radius: 50%;
            filter: blur(50px) saturate(130%);
            opacity: .22;
            animation: float 22s ease-in-out infinite;
        }

        .orb-1 {
            background: radial-gradient(circle at 30% 30%, #22d3ee, #2563eb);
            top: -15%;
            left: -10%;
        }

        .orb-2 {
            background: radial-gradient(circle at 60% 30%, #a78bfa, #6366f1);
            top: -10%;
            right: -10%;
            animation-delay: 6s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate3d(0, 0, 0)
            }

            50% {
                transform: translate3d(2%, -3%, 0)
            }
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background: rgba(30, 41, 59, .5);
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }

        .topbar .brand {
            color: #e2e8f0;
            font-weight: 700;
        }

        .container-glass {
            max-width: 1080px;
            margin: 0 auto;
            padding: 1rem;
        }

        .panel {
            background: rgba(255, 255, 255, .75);
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 16px;
            padding: 1rem;
            box-shadow: 0 10px 30px rgba(2, 6, 23, .25);
        }

        nav ul li a {
            color: #cbd5e1;
        }

        nav ul li a:hover {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="bg-animated"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <header class="topbar">
        <div class="container-glass">
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}"><span class="brand">Beranda</span></a></li>
                </ul>
                <ul>
                    <li><a href="{{ route('posts.index') }}">Posts</a></li>
                    <li><a href="{{ route('categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('tags.index') }}">Tags</a></li>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    @auth
                    <li>
                        <details role="list">
                            <summary aria-haspopup="listbox">{{ auth()->user()->name }}</summary>
                            <ul role="listbox">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </details>
                    </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container-glass">
            <div class="panel">
                @yield('content')
            </div>
        </div>
    </main>
</body>

</html>