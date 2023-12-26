@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Customer</h1>
@stop

@section('content')
<form method="post" action='{{route("add_customer")}}'>
    {{csrf_field()}}
    <lable>name: </lable>
    <input type="text" name="name">
    <label>mobile: </label>
    <input type="tel" name="mobile">
    <label>gender: </label>
    <input type="text" name="gender">
    <label>email: </label>
    <input type="email" name="email">
    <button type="submit">add data</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
