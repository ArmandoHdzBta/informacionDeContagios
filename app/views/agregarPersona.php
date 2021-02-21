<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Informacion de contagiados</title>
  </head>
  <body>
  	<!-- NAVBAR -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand">Informacion de contagiados</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="navbar-nav ml-auto">
    				<li class="nav-item"><a class="nav-link" href="index.php?controller=Direccion&action=agregarEstado">Agregar estado</a></li>
    				<li class="nav-item"><a class="nav-link active" href="#">Agregar persona</a></li>
    				<li class="nav-item"><a class="nav-link" href="index.php?controller=Direccion&action=agregarPersonaContagiada">Persona contagiada</a></li>
    				<li class="nav-item"><a class="nav-link" href="index.php?controller=Direccion&action=consulta">Consulta</a></li>
    			</ul>
    		</div>
    	</div>
	</nav>
	<!-- FORMULARIO -->
	<div class="container col-lg-12 col-md-9 col-sm-12 col-xs-12">
		<div class="row mt-5">
			<h1 class="text-center p-2">Agregar persona</h1>
			<div class="col-lg-4 align-items-center p-2">
				<form action="">
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Nombre del estado:</label>
						<input class="form-control" type="text" name="" id="">
					</div>
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Habitamtes mujeres</label>
						<input class="form-control" type="number" min="0" name="" id="">
					</div>
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Habitamtes hombres</label>
						<input class="form-control" type="number" min="0" name="" id="">
					</div>
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Total de habitamtes</label>
						<input class="form-control" type="number" min="0" name="" id="">
					</div>
					<button type="submit" class="btn btn-primary col-lg-12">Guardar</button>
				</form>
			</div>
			<div class="col-lg-8 p-1">
				<table class="table">
					<thead>
						<tr>
							<th class="col">Nombre Estado</th>
							<th class="col">Poblacion mujeres</th>
							<th class="col">Poblacion hombres</th>
							<th class="col">Poblacion total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Mexico</td>
							<td>31,528</td>
							<td>28,152</td>
							<td>100,000</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- SCRIPT -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>