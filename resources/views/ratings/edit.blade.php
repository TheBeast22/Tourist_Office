@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Rating</h1>
@stop

@section('content')
<center><h1></h1><center><br><br>
<form method="post" action='{{route("update_rating",["rating"=>$rating])}}'>
    {{csrf_field()}}
    <div class="form-group col-md-4">
    <input type="number" value="{{$rating->rate}}" min="0" max="5" name="rate">
    </div>
    <div class="form-group col-md-4">
    <input type="text" value="{{$rating->comment}}" name="comment">
    </div>
    <button type="submit" class="btn btn-primary">Edit Rate</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
