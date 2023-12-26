@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Show Customer</h1>
@stop

@section('content')
<form method="post" action='{{route("email_customer")}}'>
    {{csrf_field()}}
    <label>Customer Email:</label>
    <input type="email" name="email">
    <button type="submit">search</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
