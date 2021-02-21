<?php
//definimos el nombre del espacio de trabajo
namespace Models;
//clase extado y extiende de la clase conexion para la base de datos
class Estado extends Conexion
{
	//atributos de la clase
	public $idestado;
	public $nombre;
	public $poblacion_hombres;
	public $poblacion_mujeres;
	public $poblacion_total;
	//funcion contructor que nos ayudara a ejecutar el contructor de la clase conexion
	function __construct()
	{
		//se utiliza esto para que se pueda hacer uso de la clase Conexion
		//significa que tambien se va a correr el contructor padre
		parent::__construct();
	}
	//funcion que nos permite registrar en la BD un registro
	public function create()
	{
		//consulta SQL y a los valores a insertar seles coloca un ?
		$sql = "INSERT INTO estado(nombre, poblacion_h, poblacion_m, poblacion_total) VALUES (?,?,?,?)";
		//preparamos la consulta
		$pre = mysqli_prepare($this->con, $sql);
		//agregamos los datos 1.- tipo de dato, 2.- los valores
		$pre->bind_param('siii', $this->nombre, $this->poblacion_hombres, $this->poblacion_mujeres, $this->poblacion_total);
		//ejecutamos la consulta
		$pre->execute();
	}
	//funcion estatica que nos ayuda a obtener todos los registros de la BD
	static function all()
	{
		//objeto para la conexion a la BD
		$conexion = new Conexion();
		//consulta SQL
		$sql = "SELECT * FROM estado ORDER BY nombre ASC";
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
	//funcion estatica que nos permite mostrar los datos de un registro en espesifico
	static function selectEstado($idestado)
	{
		//objeto para la conexion a la BD
		$conexion = new Conexion();
		//consulta SQL
		$sql = "SELECT * FROM estado WHERE idestado = ?";
		//preparamos la consulta
		$pre = mysqli_prepare($conexion->con, $sql);
		//añadimos los parameros 1.- tipo de dato, 2.- los valores
		$pre->bind_param('i', $idestado);
		//ejecutamos la consulta
		$pre->execute();
		//obtnemos los resultados
		$res = $pre->get_result();
		//los recorremos cada uno y los guadramos en un arreglo $t[]
		while ($y = mysqli_fetch_assoc($res)) {
			$t[] = $y;
		}
		//retornamos todos los registros almacenados en $t
		return $t;
	}
	public function update()
	{
		//consulta SQL
		$sql = "UPDATE estado SET nombre=?, poblacion_h=?, poblacion_m=?, poblacion_total=? WHERE idestado = ?";
		//se prepara la consulta
		$pre = mysqli_prepare($this->con, $sql);
		//añadimos los parameros 1.- tipo de dato, 2.- los valores
		$pre->bind_param('siiii', $this->nombre, $this->poblacion_hombres, $this->poblacion_mujeres, $this->poblacion_total, $this->idestado);
		//ejecutamos la consulta
		$pre->execute();
	}
	static function delete($idestado)
	{
		//objeto para la conexiona la BD
		$conexion = new Conexion();
		//consulta SQL
		$sql = "DELETE FROM estado WHERE idestado = ?";
		//se prepara la consulta
		$pre = mysqli_prepare($conexion->con, $sql);
		//añadimos los parameros 1.- tipo de dato, 2.- los valores
		$pre->bind_param('i',$idestado);
		//ejecutamos la consulta
		$pre->execute();
	}
}

?>