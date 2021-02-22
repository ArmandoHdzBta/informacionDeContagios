<?php
require 'app/models/Conexion.php';
require 'app/models/Consulta.php';

use Models\Conexion;
use Models\Consulta;

class ConsultaController
{
	//funcion para los contagios de una semana
	public function consultaSemana()
	{
		$fechaInicio = date('Y-m-d', strtotime($_POST['fechaInicio']));
		$fechaFinal = date('Y-m-d' , strtotime($_POST['fechaFinal']));
		$idestado = $_POST['estado'];
		$res = Consulta::contagioSemana($fechaInicio,$fechaFinal,$idestado);
		foreach ($res as $dato) {
			$t[] = $dato;
		}
		require 'app/views/Consulta.php';
	}
	public function consultaDosSemana()
	{
		$fechaInicioSem1 = date('Y-m-d', strtotime($_POST['fechaInicio1']));
		$fechaFinalSem1 = date('Y-m-d' , strtotime($_POST['fechaFinal1']));
		$fechaInicioSem2 = date('Y-m-d', strtotime($_POST['fechaInicio2']));
		$fechaFinalSem2 = date('Y-m-d' , strtotime($_POST['fechaFinal2']));
		$idestado = $_POST['estado'];
		$resSem1 = Consulta::contagioSemana($fechaInicioSem1,$fechaFinalSem1,$idestado);
		$resSem2 = Consulta::contagioSemanaComp($fechaInicioSem2,$fechaFinalSem2,$idestado);
		foreach ($resSem1 as $dato) {
			$t1[] = $dato;
		}
		foreach ($resSem2 as $dato) {
			$t2[] = $dato;
		}
		require 'app/views/Consulta.php';
	}
}

?>