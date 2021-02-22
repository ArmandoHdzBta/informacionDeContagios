<?php
//archivos que se van a ocupar los requerimos
require 'app/models/Conexion.php';
require 'app/models/Estado.php';
//usamos los namespace con el nombre de la respectiva clase
use Models\Conexion;
use Models\Estado;
//clase controlador Estado
class EstadoController
{
	//funcion que nos permite madar los datos y registrar ecibimos los datos por
	//el metodo post
	public function registrar()
	{
		$estado = new Estado();
		$estado->nombre = $_POST['nombre'];
		$estado->poblacion_hombres = $_POST['poblacionH'];
		$estado->poblacion_mujeres = $_POST['poblacionM'];
		$estado->poblacion_total = $_POST['poblacionT'];
		$estado->edad_promedio = $_POST['edadP'];
		$estado->create();
		//redireccionamos con un header location a la vista de agregarEstado
		header("location: index.php?controller=Direccion&action=agregarEstado");
	}
	//funcion que nos devuele todos los datos
	//el resultado lo mostramos como JSON
	public function mostrar()
	{
		$estados = Estado::all();
		echo json_encode($estados);
	}
	//funcion que nos permite recuperar datos (1 registro)
	public function mostrarSeleccionado(){
		//se recibe por metodo post el id del estado a mostar
		$idestado = $_POST['idestado'];
		$res = Estado::selectEstado($idestado);
		echo json_encode($res);
	}
	//funcion que nos permite editar el registro
	public function editar()
	{
		$estado = new Estado();
		$estado->idestado = $_POST['idestado'];
		$estado->nombre = $_POST['nombreeditar'];
		$estado->poblacion_hombres = $_POST['poblacionHeditar'];
		$estado->poblacion_mujeres = $_POST['poblacionMeditar'];
		$estado->poblacion_total = $_POST['poblacionTeditar'];
		$estado->edad_promedio = $_POST['edadPeditar'];
		$estado->update();
		//redireccionamos a la vista agregarEstado
		header("location: index.php?controller=Direccion&action=agregarEstado");
	}
	//funcion que nos permite eliminar un registro
	public function eliminar()
	{
		$idestado = $_POST['idestado'];
		//en viamos por parametro el id del estado a eliminar
		Estado::delete($idestado);
	}
}

?>