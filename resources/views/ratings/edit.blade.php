@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Rating</h1>
@stop

@section('content')
<form method="post" action='{{route("update_rating",["rating"=>$rating])}}'>
    {{csrf_field()}}
    <input type="number" value="{{$rating->rate}}" min="0" max="5" name="rate">
    <button type="submit">update rate</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
