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
	<nav class="navbar navbar-expand-md navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand">Informacion de contagiados</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="navbar-nav ">
    				<li class="nav-item"><a class="nav-link" href="index.php?controller=Direccion&action=agregarEstado">Agregar estado</a></li>
    				<li class="nav-item"><a class="nav-link" href="index.php?controller=Direccion&action=agregarContagio">Agregar contagio</a></li>
    				<li class="nav-item"><a class="nav-link active" href="#">Consulta</a></li>
    			</ul>
    		</div>
    	</div>
	</nav>
	<!-- FORMULARIO -->
	<div class="container col-lg-12 col-md-9 col-sm-12 col-xs-12">
		<div class="row mt-5">
			<h1 class="text-center p-2">Consultar contagiados en 1 semana</h1>
			<div class="col-lg-4 align-items-center p-2">
				<form action="index.php?controller=Consulta&action=consultaSemana" method="POST">
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Estado:</label>
						<select class="form-select" name="estado" id="listEstados">

						</select>
					</div>
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Fecha inicio:</label>
						<input class="form-control" type="date" name="fechaInicio" id="">
					</div>
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Fecha final:</label>
						<input class="form-control" type="date" name="fechaFinal" id="">
					</div>
					<button type="submit" class="btn btn-primary col-lg-12">Buscar</button>
				</form>
			</div>
			<div class="col-lg-8 p-1">
				<table class="table">
					<thead>
						<tr>
							<th class="col">Estado</th>
							<th class="col">Total de contagios</th>
						</tr>
					</thead>
					<tbody>
						<?php if (isset($t)){ ?>
							<tr>
								<td><?php echo $t[0]['estado']; ?></td>
								<td><?php echo $t[0]['total']; ?></td>
							</tr>
						<?php }else{?>
							<tr>
								<td class="table-info" colspan="2">No hay resultados</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row mt-5">
			<h1 class="text-center p-2">Compara contagiados en 2 semanas diferentes</h1>
			<div class="col-lg-4 align-items-center p-2">
				<form action="index.php?controller=Consulta&action=consultaDosSemana" method="POST">
					<div class="form-group col-ms-6">
						<label class="form-label" for="">Estado:</label>
						<select class="form-select" name="estado" id="listEstadosDosSem">

						</select>
					</div>
					<div class="row">
						<label class="form-label" for="">Semana 1</label>
						<div class="form-group col-lg-6 col-ms-6 col-md-6">
							<label class="form-label" for="">Fecha inicio:</label>
							<input class="form-control" type="date" name="fechaInicio1" id="">
						</div>
						<div class="form-group col-lg-6 col-ms-6 col-md-6">
							<label class="form-label" for="">Fecha final:</label>
							<input class="form-control" type="date" name="fechaFinal1" id="">
						</div>
					</div>
					<div class="row">
						<label class="form-label" for="">Semana 2</label>
						<div class="form-group col-lg-6 col-ms-6 col-md-6">
							<label class="form-label" for="">Fecha inicio:</label>
							<input class="form-control" type="date" name="fechaInicio2" id="">
						</div>
						<div class="form-group col-lg-6 col-ms-6 col-md-6">
							<label class="form-label" for="">Fecha final:</label>
							<input class="form-control" type="date" name="fechaFinal2" id="">
						</div>
					</div>
					<button type="submit" class="btn btn-primary col-lg-12">Comparar</button>
				</form>
			</div>
			<div class="col-lg-8 p-1">
				<?php if (isset($t1) && isset($t2)){ ?>
					<div class="alert alert-success">
						<?php echo ($t1[0]['total'] > $t2[0]['total']) ? "La semana 1 tubo ".($t1[0]['total'] - $t2[0]['total'])." mas contagiados que la semana 2" :  "La semana 2 tubo ".($t2[0]['total'] - $t1[0]['total'])." mas contagiados que la semana 1"; ?>
					</div>
				<?php }else{?>
					<div class="alert alert-danger">
						<h4>No hay resultados</h4>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- SCRIPT -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="public/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="public/js/consulta.js"></script>
  </body>
</html>