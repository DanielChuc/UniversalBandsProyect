@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            {{$pedido->id}}- {{$pedido->direccion_Envio}}:  {{$pedido->cliente->nombre}}
       <br>
       Lp: {{count($pedido->lineas_Pedidos)}}
       <br>
       @foreach($pedido->lineas_Pedidos as $item)
       <p>
       cantidad: {{$item->cantidad}} + {{$item->pizza->nombre}}
       </p>

       @endforeach
        </div>
    </div>
</div>
@endsection