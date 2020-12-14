
@extends('adminlte::page')
<!-- csrf_field  Sirve para que no cualquier aplicacion le envie datos  -->
@section('title', 'Home')

@section('content')
<h1 class="display-2 text-center">Universal Bands</h1>

<div class="jumbotron text-center">
		<h1>¡¡Bienvenido administrador!!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
		</div>
		<div class="container">
			<div class="row">
			<div class="col-sm-4 text-center border">
				<h2>columna UNO</h2>
				<p>Este es el contenido de la columna UNO</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>
			</div>
			<div class="col-sm-4 text-center border">
				<h2>columna DOS</h2>
				<p>Este es el contenido de la columna DOS</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				</p>
			</div>
			<div class="col-sm-4 text-center border">
				<h2>columna TRES</h2>
				<p>Este es el contenido de la columna TRES</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				</p>
			</div>
		</div>
										<br><br>
	

		


			</div>
		</div>
		<br><br>
		
		
		
	</div>


@section('js')
        <script>
     
     Swal.fire({
  title: '¡¡Hola!!, Te deseo un feliz Día :3 ',
  width: 600,
  padding: '3em',
  backdrop: `
    rgba(0,0,123,0.4)
    url("https://media1.tenor.com/images/0bb0310b2307afff6a809cfc3338d117/tenor.gif?itemid=10240802")
    left top
    no-repeat
  `
})
        </script>
@stop
@endsection