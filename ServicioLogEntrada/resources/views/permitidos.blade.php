@extends('adminlte::page')

@section('title', 'Compra exitosa')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">

        <div class="container">
			<div class="row">
			<div class="col-sm-12 text-center border bg-dark ">
            <h1 class="text-white">Compra realizada con exito!!</h1>
			
            </div>
            <div class="container">
			<div class="row">
			<div class="col-sm-12 text-center border">
            <h5>El cliente:   {{$banda->cliente->nombre}}  {{$banda->cliente->apellido}}</h5> 
            <br>
            <h5>Se registro en el evento {{$evento->nombre}} </h5>
            <br>
        <h5>Su código es:   {{$banda->codigo}}</h5> 
        <br>
			
			</div>
      
        <br>
        <br>
        
      
       <br>
        </div>
    </div>
</div>
@endsection




