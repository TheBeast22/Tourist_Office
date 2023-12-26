<!-- <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

<form method="post" action="{{ route('Companyinfo',['id'=>$Company->id]) }}">
{{ csrf_field()  }}
   Enter The Company Name: <input type="text" name="title"  value="" ></br>
    The Address:<input type="text" name="address" value=""></br>
  Phone:  <input type="string" name="phone" value=""></br>
<input type="submit" value="ADD Company">
</form> -->

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Company</h1>
@stop

@section('content')
<form method="post" action='{{route("add_customer")}}'>
    {{csrf_field()}}
    <lable>The Name of Company: </lable>
    <input type="text" name="name">
    <label>Phone: </label>
    <input type="tel" name="Phone">
    <label>Address: </label>
    <input type="text" name="Address">
    
    <button type="submit">add data</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
