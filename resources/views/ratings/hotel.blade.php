@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Hotel Ratings</h1>
@stop

@section('content')
  <h4>{{$hotel->name}} rated by: </h4>
  @foreach(($hotel->customersRatedWithRate) as $customer)
  <ul>
    <li>{{$customer->name}} -> {{$customer->pivot->rate}}</li>
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