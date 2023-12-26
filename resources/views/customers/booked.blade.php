@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Customers</h1>
@stop

@section('content')
<ul>
    @foreach($customers as $customer)
    <li>
        {{$customer->name}}
        <a href='{{route("one_customer",["customer"=>$customer])}}'>Info</a>
        <a href='{{route("edit_customer",["customer"=>$customer])}}'>edit</a>
        <a href='{{route("customer_ratings",["customer"=>$customer])}}'>ratings</a>
        <a href='{{route("delete_customer",["customer"=>$customer])}}'>delete</a>
    </li>

    @endforeach
</ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
