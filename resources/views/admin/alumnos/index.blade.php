@extends('adminlte::page')
@section('title', 'Alumnos')

@section('content_header')
    <h1>Lista Alumnos</h1>
@stop

@section('content')
    @livewire('admin.alumnos-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop