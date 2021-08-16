@extends('adminlte::page')
@section('title', 'Tutores')

@section('content_header')
    <h1>Lista Tutores</h1>
@stop

@section('content')
@if (session('mensaje'))
<div class="alert alert-success">
    <strong>{{ session()->pull('mensaje') }} </strong>
</div>
@endif
    @livewire('admin.tutores-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop