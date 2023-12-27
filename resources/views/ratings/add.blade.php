@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Rating</h1>
@stop

@section('content')
<form method="post" action='{{route("add_rating")}}'>
    {{csrf_field()}}
    <input type="hidden" value="{{$request->customer_id}}" name="customer_id">
    <input type="hidden" value="{{$request->hotel_id}}" name="hotel_id"> 
    <input type="number" min="0" max="5" name="rate">
    <input type="text" name="comment">
    <button type="submit">add rate</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
