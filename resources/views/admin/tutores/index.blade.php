@extends('adminlte::page')
@section('title', 'Alumnos')

@section('content_header')
    <h1>Lista Tutores</h1>
@stop

@section('content')
    @livewire('admin.tutores-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop