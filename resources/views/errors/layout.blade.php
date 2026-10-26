<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <title>@yield('title', 'Geo Creaciones en Madera')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'DM Sans', ui-sans-serif, system-ui, sans-serif;
            background: linear-gradient(180deg, #fafaf9 0%, #f5f5f4 100%);
            color: #1c1917;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            text-align: center;
        }
        .card {
            max-width: 28rem;
            width: 100%;
            background: #fff;
            border-radius: 1rem;
            padding: 2.5rem 2rem;
            box-shadow: 0 4px 24px rgba(28, 25, 23, 0.08);
            border: 1px solid #e7e5e4;
        }
        .logo { height: 4rem; width: auto; margin: 0 auto 1.5rem; display: block; }
        .code { font-size: 3rem; font-weight: 700; color: #d97706; line-height: 1; margin-bottom: 0.5rem; }
        h1 { font-size: 1.25rem; font-weight: 600; color: #292524; margin-bottom: 0.75rem; }
        p { font-size: 0.9375rem; color: #57534e; line-height: 1.6; margin-bottom: 1.5rem; }
        .actions { display: flex; flex-direction: column; gap: 0.75rem; }
        a.btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.9375rem;
            text-decoration: none;
            transition: background 0.15s;
        }
        a.btn-primary { background: #d97706; color: #fff; }
        a.btn-primary:hover { background: #b45309; }
        a.btn-secondary { background: #fff; color: #44403c; border: 2px solid #e7e5e4; }
        a.btn-secondary:hover { border-color: #d6d3d1; }
        .footer-note { margin-top: 2rem; font-size: 0.8125rem; color: #a8a29e; }
    </style>
</head>
<body>
    <div class="card">
        <img src="{{ asset('img/Logo.png') }}" alt="Geo Creaciones en Madera" class="logo">
        @yield('content')
    </div>
    <p class="footer-note">Geo Creaciones en Madera · Bogotá</p>
</body>
</html>
