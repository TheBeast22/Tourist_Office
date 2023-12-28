@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Rating</h1>
@stop

@section('content')
<center><h1></h1><center><br><br>
<form method="post" action='{{route("add_rating")}}'>
    {{csrf_field()}}
    <input type="hidden" value="{{$request->customer_id}}" name="customer_id">
    <input type="hidden" value="{{$request->hotel_id}}" name="hotel_id"> 
    <div class="form-group col-md-4">
    <input type="number" min="0" max="5" name="rate" class="form-control">
    </div>
    <div class="form-group col-md-4">
    <textarea name="comment" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Rate</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
