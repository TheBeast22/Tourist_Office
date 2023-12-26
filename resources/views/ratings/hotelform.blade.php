@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Show Hotel Ratings</h1>
@stop

@section('content')
<form method="post" action='{{route("hotel_ratings")}}'>
    {{csrf_field()}}
    <label>Hotel Name:</label>
    <input type="text" name="name">
    <button type="submit">show ratings</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
