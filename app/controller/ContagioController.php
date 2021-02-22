<?php
require 'app/models/Conexion.php';
require 'app/models/Contagio.php';

use Models\Conexion;
use Models\Contagio;

class ContagioController
{
	//funcion para crear un contagio y poder registrarlo
	function agregar()
	{
		$contagio = new Contagio();
		$contagio->estado = $_POST['estado'];
		$contagio->cantidad = $_POST['cantidad'];
		$contagio->fecha = date('Y-m-d', strtotime($_POST['fecha']));
		$contagio->create();
		//redireccionamos con un header location a la vista de agregarContagio
		header("location: index.php?controller=Direccion&action=agregarContagio");
	}
	//funcion para mostra todos los contagios
	public function mostrar()
	{
		echo json_encode(Contagio::all());
	}
	//funcion para mostrar el elemento seleccionado
	public function mostrarSeleccionado()
	{
		$idcontagio = $_POST['idcontagio'];
		$res = Contagio::selectEstado($idcontagio);
		echo json_encode($res);
	}
	public function editar()
	{
		$contagio = new Contagio();
		$contagio->idcontagio = $_POST['idcontagio'];
		$contagio->estado = $_POST['estadoEdit'];
		$contagio->cantidad = $_POST['cantidadEdit'];
		$contagio->fecha = date('Y-m-d', strtotime($_POST['fechaEdit']));
		$contagio->update();
		//redireccionamos con un header location a la vista de agregarContagio
		header("location: index.php?controller=Direccion&action=agregarContagio");
	}
	//funcion que nos permite eliminar un registro
	public function eliminar()
	{
		$idcontagio = $_POST['idcontagio'];
		//en viamos por parametro el id del estado a eliminar
		Contagio::delete($idcontagio);
	}
}

?>