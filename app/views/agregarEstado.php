<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Informacion de contagiados</title>
    <!-- ICONOS -->
    <script src="https://kit.fontawesome.com/a665ad6c22.js" crossorigin="anonymous"></script>
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
    			<ul class="navbar-nav me-auto">
    				<li class="nav-item"><a class="nav-link active" href="#">Agregar estado</a></li>
    				<li class="nav-item"><a class="nav-link" href="index.php?controller=Direccion&action=agregarContagio">Agregar contagio</a></li>
    				<li class="nav-item"><a class="nav-link" href="index.php?controller=Direccion&action=consulta">Consulta</a></li>
    			</ul>
    		</div>
    	</div>
	</nav>
	<!-- FORMULARIO -->
	<div class="container col-lg-12 col-md-9 col-sm-12 col-xs-12">
		<div class="row mt-5">
			<h1 class="text-center p-2">Agregar estado</h1>
			<div class="col-lg-4 align-items-center p-2">
				<form action="index.php?controller=Estado&action=registrar" method="POST">
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Nombre del estado:</label>
						<input class="form-control" type="text" name="nombre" id="nombre">
					</div>
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Habitamtes mujeres</label>
						<input class="form-control" type="number" min="0" name="poblacionM" id="poblacionM">
					</div>
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Habitamtes hombres</label>
						<input class="form-control" type="number" min="0" name="poblacionH" id="poblacionH">
					</div>
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Total de habitamtes</label>
						<input class="form-control" type="number" readonly="" min="0" name="poblacionT" id="poblacionT">
					</div>
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Edad promedio</label>
						<input class="form-control" type="number" min="0" name="edadP" id="edadP">
					</div>
					<button type="submit" class="btn btn-primary col-lg-12" id="btnGurdar">Guardar</button>
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
							<th class="col">Edad Promedio</th>
							<th class="col">Accion</th>
						</tr>
					</thead>
					<tbody id="t-body">

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- MODAL PARA EDITAR -->
	<div class="modal fade" id="modalUpdateEstado" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="modalTitle">Modificar</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			        <form action="index.php?controller=Estado&action=editar" method="POST">
			        	<div class="form-group col-sm-6">
			        		<input class="form-control" type="hidden" name="idestado" id="idestado">
			        		<label for="" class="form-label">Nombre</label>
			        		<input class="form-control" type="text" name="nombreeditar" id="nombreeditar">
			        	</div>
			        	<div class="form-group col-sm-6">
			        		<label for="" class="form-label">Pblacion Hombres</label>
			        		<input class="form-control" type="number" name="poblacionHeditar" id="poblacionHeditar">
			        	</div>
			        	<div class="form-group col-sm-6">
			        		<label for="" class="form-label">Problacion Mujeres</label>
			        		<input class="form-control" type="number" name="poblacionMeditar" id="poblacionMeditar">
			        	</div>
			        	<div class="form-group col-sm-6">
			        		<label for="" class="form-label">Poblacion Total</label>
			        		<input class="form-control" type="number" readonly="" name="poblacionTeditar" id="poblacionTeditar">
			        	</div>
			        	<div class="form-group col-ms-6">
						<label class="form-label" for="">Edad promedio</label>
						<input class="form-control" type="number" min="0" name="edadPeditar" id="edadPeditar">
					</div>
			        	<button type="submit" class="btn btn-primary">Save changes</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" onclick="cancelar()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			      </div>
		    </div>
  		</div>
	</div>
	<!-- SCRIPT -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="public/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="public/js/estado.js"></script>
  </body>
</html>