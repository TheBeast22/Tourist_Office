@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>The Customer</h1>
@stop

@section('content')
<ul>
    <li>name: {{$customer->name}}</li>
    <li>mobile: {{$customer->mobile}}</li>
    <li>gender: {{$customer->gender}}</li>
    <li>email: {{$customer->email}}</li>
</ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
