<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <style>
        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: #0b1220;
        }

        .card {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, .85);
            border: 1px solid rgba(255, 255, 255, .35);
            border-radius: 16px;
            padding: 1.25rem;
            box-shadow: 0 10px 30px rgba(2, 6, 23, .25);
        }

        .bg-animated {
            position: fixed;
            inset: 0;
            z-index: -1;
            background: radial-gradient(900px 600px at 20% 10%, rgba(14, 165, 233, .25), transparent 60%), radial-gradient(800px 600px at 80% 20%, rgba(168, 85, 247, .2), transparent 60%), linear-gradient(180deg, #0b1220, #0b1220);
        }

        .center {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .title {
            text-align: center;
            margin-bottom: .5rem
        }

        .muted {
            color: #475569;
            text-align: center;
            margin-bottom: 1rem
        }

        a {
            color: #0ea5e9
        }
    </style>
</head>

<body>
    <div class="bg-animated"></div>
    <main class="container">
        <div class="center">
            <div class="card">
                <h2 class="title">Masuk Admin</h2>
                <p class="muted">Gunakan akun yang telah terdaftar.</p>

                @if ($errors->any())
                <article style="border-color:#fecaca; background:rgba(254,226,226,.8)">
                    <ul style="margin:.5rem 1rem">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </article>
                @endif

                <form method="POST" action="{{ route('login.attempt') }}">
                    @csrf
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>

                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required>

                    <label>
                        <input type="checkbox" name="remember" value="1"> Ingat saya
                    </label>

                    <button type="submit">Masuk</button>
                </form>

                <p class="muted" style="margin-top:1rem">
                    Kembali ke <a href="{{ route('home') }}">Beranda</a>
                </p>
            </div>
        </div>
    </main>
    <script>
        document.getElementById('email')?.focus();
    </script>
</body>

</html>