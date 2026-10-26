@extends('errors.layout')

@section('title', 'Error del servidor - Geo Creaciones en Madera')

@section('content')
    <div class="code">500</div>
    <h1>Algo salió mal</h1>
    <p>
        Ocurrió un error inesperado. Ya estamos trabajando en ello.
        Intenta de nuevo en un momento.
    </p>
    <div class="actions">
        <a href="{{ url('/') }}" class="btn btn-primary">Ir al inicio</a>
        @php
            $wa = preg_replace('/[^0-9]/', '', config('geo.whatsapp_number', ''));
            $msg = urlencode('Hola, tuve un problema al usar la web.');
        @endphp
        @if($wa)
        <a href="https://wa.me/{{ $wa }}?text={{ $msg }}" class="btn btn-secondary" target="_blank" rel="noopener">WhatsApp</a>
        @endif
    </div>
@endsection
