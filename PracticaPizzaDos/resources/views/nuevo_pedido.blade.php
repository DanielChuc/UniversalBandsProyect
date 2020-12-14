@extends('layouts.app')
<!-- csrf_field  Sirve para que no cualquier aplicacion le envie datos  -->
@section('content')
<div class="container">
    <div class="row">
        <form method="POST" action="/pedidost/guardar">
        {{ csrf_field() }} 
            <div class="form-group">
                <label for="cliente_id">Cliente: </label>
                <select class="form-control" id="cliente_id" name="cliente_id">
                @foreach($clientes as $c)
                <option value="{{$c->id}}" >{{$c->nombre}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pizza_id">Pizza: </label>
                <select class="form-control" id="pizza_id" name="pizza_id">
                @foreach($pizzas as $p)
                <option value="{{$p->id}}" >{{$p->nombre}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad de Pizzas</label>
                <input type="number" min=1 max=100 step=1 class="form-control" id="cantidad" placeholder="Numero de pizzas">
            </div>
            <button type="submit" class="btn btn-primary">Realizar Pedido</button>
        </form>
    </div>
</div>
@endsection