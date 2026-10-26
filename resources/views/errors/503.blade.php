@extends('errors.layout')

@section('title', 'Sitio en mantenimiento - Geo Creaciones en Madera')

@section('content')
    <div class="code">503</div>
    <h1>Estamos en mantenimiento</h1>
    <p>
        Actualizamos el sitio para ofrecerte un mejor servicio.
        Vuelve en unos minutos o escríbenos por WhatsApp.
    </p>
    <div class="actions">
        <a href="{{ url('/') }}" class="btn btn-primary">Reintentar</a>
        @php
            $wa = preg_replace('/[^0-9]/', '', config('geo.whatsapp_number', ''));
            $msg = urlencode(config('geo.whatsapp_message', 'Hola, consulta sobre sus servicios.'));
        @endphp
        @if($wa)
        <a href="https://wa.me/{{ $wa }}?text={{ $msg }}" class="btn btn-secondary" target="_blank" rel="noopener">WhatsApp</a>
        @endif
    </div>
@endsection
