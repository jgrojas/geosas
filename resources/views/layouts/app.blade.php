<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('components.google-analytics')
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png') }}">
    <title>@yield('title', config('seo.default_title'))</title>
    <meta name="description" content="@yield('meta_description', config('seo.default_description'))">
    <meta name="keywords" content="@yield('meta_keywords', app()->getLocale() === 'es' ? config('seo.keywords') : config('seo.keywords_en'))">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Geo Creaciones en Madera">
    <meta name="geo.region" content="CO-DC">
    <meta name="geo.placename" content="Bogotá">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', config('seo.default_title'))">
    <meta property="og:description" content="@yield('og_description', config('seo.default_description'))">
    <meta property="og:image" content="{{ asset(config('seo.og_image')) }}">
    <meta property="og:site_name" content="{{ config('seo.site_name') }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'es' ? 'es_CO' : 'en_CO' }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="{{ config('seo.twitter_card') }}">
    <meta name="twitter:title" content="@yield('twitter_title', config('seo.default_title'))">
    <meta name="twitter:description" content="@yield('twitter_description', config('seo.default_description'))">
    <meta name="twitter:image" content="{{ asset(config('seo.og_image')) }}">

    {{-- JSON-LD LocalBusiness (Google, Bing, IA) --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": ["LocalBusiness", "ProfessionalService"],
        "name": "Geo Creaciones en Madera",
        "alternateName": "Geo Creaciones",
        "description": {{ json_encode(config('seo.default_description')) }},
        "serviceType": ["Corte láser MDF", "Corte láser acrílico", "Grabado láser", "Diseño láser", "Señalética láser"],
        "url": "{{ url('/') }}",
        "image": "{{ asset(config('seo.og_image')) }}",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Cra 16 52-26",
            "addressLocality": "Bogotá",
            "addressRegion": "Cundinamarca",
            "addressCountry": "CO"
        },
        "geo": {
            "@@type": "GeoCoordinates",
            "latitude": 4.6486259,
            "longitude": -74.0860005
        },
        "email": "{{ config('geo.email') }}",
        "telephone": "{{ preg_replace('/[^0-9]/', '', config('geo.whatsapp_number')) }}",
        "priceRange": "$$",
        "areaServed": ["Bogotá", "Colombia"],
        "knowsAbout": ["corte láser", "grabado láser", "MDF", "acrílico", "diseño láser", "señalética"],
        "openingHoursSpecification": {
            "@@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            "opens": "09:00",
            "closes": "18:00"
        }
    }
    </script>

    @stack('meta')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="antialiased bg-stone-50 text-stone-900 font-sans">
    @include('components.header')
    <main>@yield('content')</main>
    @include('components.footer')
    @include('components.whatsapp-button')
    @stack('scripts')
</body>
</html>
