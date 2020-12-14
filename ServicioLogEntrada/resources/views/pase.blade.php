@extends('adminlte::page')
<!-- csrf_field  Sirve para que no cualquier aplicacion le envie datos  -->
@section('title', 'Validación de Bandas')


@section('content')



<div class="jumbotron text-center">

<div class="container">
<div class="row justify-content-center h-100">
    <p>
  <h1 class="text-center text-danger " > Evento Actual: {{$evento->nombre}}</h1>
   
    </p>
</div>
    <div class="row justify-content-center h-100">
        <form method="POST" action="/introducirt/validar/{{$evento->id}}">
        {{ csrf_field() }} 
        
                <label class="text-center " for="banda_id"> Banda: </label>
                <br>
                <input type="text" class="form-control justify-content-center" id="banda_id" name="codigo" required>
                <br>
                 <button type="submit" class="btn btn-primary">Validar</button>
        </form>
        


    </div>
    @if($valido > 0)

    <div class="row justify-content-center h-100">
    <p>
    <h3> Estatus:  
    @if ($valido == 2)
    Aprobado 

    <p>
<br>
    <br>


    


 ¡¡¡Deséale al cliente {{$cliente->nombre}} un feliz evento!!! :3
   <br>
   Su código es: {{$codigo}}
   <br>
   En el evento: {{$evento->nombre}}
       
    
    </p>

    
    @else 
    Rechazado
    </h3>
    @endif
    </p>
</div>

@endif
    <div>
    </div>
</div>
<br>
<a href="/introducirt/validar/{{$evento->id}}"><button class="btn btn-dark btn-sm " > refrescar</button> </a>

</div>


@endsection