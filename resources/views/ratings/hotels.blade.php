@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Hotels Ratings</h1>
@stop

@section('content')
<ul>
@foreach($hotels as $hotel)
  <li>{{$hotel->name}} rated by: </li>
  @foreach(($hotel->customersRatedWithRate) as $customer)
  <ul>
    <li>{{$customer->name}} -> {{$customer->pivot->rate}}</li>
  </ul>
  @endforeach
@endforeach
</ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
