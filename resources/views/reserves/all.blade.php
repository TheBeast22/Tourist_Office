@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Reserves</h1>
@stop

@section('content')
<ul>
@foreach($customers as $customer)
  <li>{{$customer->name}} reserved: </li>
  @foreach(($customer->reservedHotels) as $hotel)
  <ul>
    <li>{{$hotel->name}} <a href='{{route("rating_form",["customer_id"=>$customer->id,"hotel_id"=>$hotel->id])}}'>rate</a></li>
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
