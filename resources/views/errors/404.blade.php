@extends('errors.layout')

@section('title', 'Página no encontrada - Geo Creaciones en Madera')

@section('content')
    <div class="code">404</div>
    <h1>Página no encontrada</h1>
    <p>
        El enlace que seguiste no existe o fue movido.
        Puedes volver al inicio o contactarnos.
    </p>
    <div class="actions">
        <a href="{{ url('/') }}" class="btn btn-primary">Ir al inicio</a>
        <a href="{{ url('/') }}#contact" class="btn btn-secondary">Contacto</a>
    </div>
@endsection
