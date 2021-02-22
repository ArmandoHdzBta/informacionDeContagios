<?php

namespace Models;

class Contagio extends Conexion
{
	//atributos
	public $idcontagio;
	public $estado;
	public $cantidad;
	public $fecha;
	//funcion contructor que nos ayudara a ejecutar el contructor de la clase conexion
	function __construct()
	{
		//se utiliza esto para que se pueda hacer uso de la clase Conexion
		//significa que tambien se va a correr el contructor padre
		parent::__construct();
	}
	//funcio para registrar contagio
	public function create()
	{
		//sentencia SQL
		$sql = "INSERT INTO contagio(estado, cantidad, fecha) VALUES (?,?,?)";
		//se prepara la consulta
		$pre = mysqli_prepare($this->con, $sql);
		//se le pasan los parametros a la consulta con su respectivo tipo de dato
		$pre->bind_param('iis',$this->estado, $this->cantidad, $this->fecha);
		//ejecutamos la consulta
		$pre->execute();
	}
	//funcion para mostrar todos los contagios
	static function all()
	{
		//objeto para la conexion a la BD
		$conexion = new Conexion();
		//consulta SQL
		$sql = "SELECT idcontagio, estado.nombre AS estado, contagio.cantidad, contagio.fecha FROM contagio INNER JOIN estado ON contagio.estado = estado.idestado";
		//se prepara la consulta
		$pre = mysqli_prepare($conexion->con, $sql);
		//ejecutamos la consulta
		$pre->execute();
		//obtenemos todos los resulatados
		$res = $pre->get_result();
		//los recorremos cada uno y los guadramos en un arreglo $t[]
		while ($y = mysqli_fetch_assoc($res)) {
			$t[] = $y;
		}
		//retornamos todos los registros almacenados en $t
		return $t;
	}
	static function selectEstado($idcontagio)
	{
		//objeto para la conexion a la BD
		$conexion = new Conexion();
		//consulta SQL
		$sql = "SELECT idcontagio, estado.nombre AS estado, contagio.cantidad, contagio.fecha FROM contagio INNER JOIN estado ON contagio.estado = estado.idestado WHERE idcontagio = ?";
		//se prepara la consulta
		$pre = mysqli_prepare($conexion->con, $sql);
		//se le pasan los parametros a la consulta con su respectivo tipo de dato
		$pre->bind_param('i',$idcontagio);
		//ejecutamos la consulta
		$pre->execute();
		//obtenemos todos los resulatados
		$res = $pre->get_result();
		//los recorremos cada uno y los guadramos en un arreglo $t[]
		while ($y = mysqli_fetch_assoc($res)) {
			$t[] = $y;
		}
		//retornamos todos los registros almacenados en $t
		return $t;
	}
	//funcio para actualizar un registro
	public function update()
	{
		//consulta SQL
		$sql = "UPDATE contagio SET estado = ?, cantidad = ?, fecha = ? WHERE idcontagio = ?";
		//se prepara la consulta
		$pre = mysqli_prepare($this->con, $sql);
		//añadimos los parameros 1.- tipo de dato, 2.- los valores
		$pre->bind_param('iisi', $this->estado, $this->cantidad, $this->fecha, $this->idcontagio);
		//ejecutamos la consulta
		$pre->execute();
	}
	//funcion para borrar un registro en la BD
	public function delete($idcontagio)
	{
		//objeto para la conexiona la BD
		$conexion = new Conexion();
		//consulta SQL
		$sql = "DELETE FROM contagio WHERE idcontagio = ?";
		//se prepara la consulta
		$pre = mysqli_prepare($conexion->con, $sql);
		//añadimos los parameros 1.- tipo de dato, 2.- los valores
		$pre->bind_param('i',$idcontagio);
		//ejecutamos la consulta
		$pre->execute();
	}
}

?>