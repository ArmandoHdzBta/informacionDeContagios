<?php

namespace Models;

class Consulta
{
	static function contagioSemana($fechaInicio, $fechaFinal, $estado)
	{
		//objeto para la conexion a la BD
		$conexion = new Conexion();
		//consulta SQL
		$sql = "SELECT estado.nombre AS estado, SUM(cantidad) AS total FROM contagio INNER JOIN estado ON contagio.estado = estado.idestado WHERE fecha BETWEEN ? AND ? AND estado = ?";
		//se prepara la consulta
		$pre = mysqli_prepare($conexion->con, $sql);
		//se anañed los parametros de la consulta
		$pre->bind_param('ssi', $fechaInicio, $fechaFinal, $estado);
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
	static function contagioSemanaComp($fechaInicio, $fechaFinal, $estado)
	{
		//objeto para la conexion a la BD
		$conexion = new Conexion();
		//consulta SQL
		$sql = "SELECT estado.nombre AS estado, SUM(cantidad) AS total FROM contagio INNER JOIN estado ON contagio.estado = estado.idestado WHERE fecha BETWEEN ? AND ? AND estado = ?";
		//se prepara la consulta
		$pre = mysqli_prepare($conexion->con, $sql);
		//se anañed los parametros de la consulta
		$pre->bind_param('ssi', $fechaInicio, $fechaFinal, $estado);
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
}

?>