<?php

class DireccionController
{
	//funciones que nos devuelen una vista
	public function agregarEstado()
	{
		require 'app/views/agregarEstado.php';
	}
	public function agregarContagio()
	{
		require 'app/views/agregarContagio.php';
	}
	public function consulta()
	{
		require 'app/views/consulta.php';
	}
}

?>