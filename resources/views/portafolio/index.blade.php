@extends('layouts.portafolio')

@section('contenido')
    @include('portafolio.parciales.header')

    <main id="contenido" tabindex="-1">
        @include('portafolio.secciones.inicio')
        @include('portafolio.secciones.proyecto-insignia')
        @include('portafolio.secciones.proyectos')
        @include('portafolio.secciones.experiencia')
        @include('portafolio.secciones.foco')
        @include('portafolio.secciones.sobre-mi')
        @include('portafolio.secciones.contacto')
        @include('portafolio.secciones.cv')
    </main>

    @include('portafolio.parciales.footer')
@endsection
