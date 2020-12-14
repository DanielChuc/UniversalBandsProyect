@extends('adminlte::page')
<!-- csrf_field  Sirve para que no cualquier aplicacion le envie datos  -->
@section('title', 'Eventos a Elegir')


@section('content')

  <h1 class="text-center text-danger " >Eventos Disponibles</h1>
<div>
@foreach($evento as $item)
    <tr>
    <div class="jumbotron text-center">
            <h4> Evento: 
    
           <td>{{ $loop->iteration }}</td> 
           </h4>
            <br>
        
           <h5>Nombre:  <td>{{ $item->nombre }}</td> 
           <br>
           Dirección: <td>{{ $item->direccion }}</td>
           <br>
           Descripción: <td>{{ $item->descripcion }}</td> </h5>
            <a href="/introducirt/validar/{{$item->id}}"><button class="btn btn-dark btn-sm " > Validar</button> </a>

        
    </div>
            <td>
        

           
            
            </td>
    </tr>
 @endforeach
 </div>





@endsection