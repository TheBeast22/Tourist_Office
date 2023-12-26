@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer Ratings</h1>
@stop

@section('content')
@php
$i = 0;
@endphp
  <h4>{{$customer->name}} rated: </h4>
  @foreach(($customer->hotelsRatingWithRatedHotels) as $hotel)
  <ul>
    <li>{{$hotel->name}} -> {{$hotel->pivot->rate}} <a href='{{route("edit_rating",["rating"=>$ratings[$i++]])}}'>edit</a></li>
  </ul>
  @endforeach
</ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
