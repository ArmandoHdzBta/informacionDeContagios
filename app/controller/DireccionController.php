<?php

class DireccionController
{
	//funciones que nos devuelen una vista
	public function agregarEstado()
	{
		require 'app/views/agregarEstado.php';
	}
	public function agregarPersona()
	{
		require 'app/views/agregarPersona.php';
	}
	public function agregarPersonaContagiada()
	{
		require 'app/views/agregarPersonaContagiada.php';
	}
	public function consulta()
	{
		require 'app/views/consulta.php';
	}
}

?>