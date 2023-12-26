@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Customer</h1>
@stop

@section('content')
<form method="post" action='{{route("update_customer",["customer"=>$customer])}}'>
    {{csrf_field()}}
    <input type="text" value="{{$customer->name}}" name="name">
    <input type="tel" value="{{$customer->mobile}}" name="mobile">
    <input type="text" value="{{$customer->gender}}" name="gender">
    <input type="email" value="{{$customer->email}}" name="email">
    <button type="submit">update data</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
