//funcion principal
function init() {
	//se ejecutan las otras dos funciones
	listar();
	suma();
}
//funcion que nos permite obtener los resultados del cotrolador estado
function listar() {
	//ajax para recuperar los datos
	$.ajax({
		url: 'index.php?controller=Estado&action=mostrar',
		//tipo de dato que se devuelve
		dataType: 'json',
	})
	//si se ejecuta correctamente
	.done(function(datos) {
		//recorremos el JSON que se devuelve
		for (dato of datos){
			//pintamos los datos con structura HTML con los respectivos datos
			$("#t-body").append('<tr>'+
									'<td>'+dato.nombre+'</td>'+
									'<td>'+dato.poblacion_m+'</td>'+
									'<td>'+dato.poblacion_h+'</td>'+
									'<td>'+dato.poblacion_total+'</td>'+
									'<td>'+dato.edad_promedio+'</td>'+
									'<td>'+
										'<button onclick="editar('+dato.idestado+')" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateEstado"><i class="fas fa-pen"></i></button>'+
										'<button onclick="borrar('+dato.idestado+')" class="btn btn-danger"><i class="fas fa-trash"></i></button>'+
									'</td>'+
								'</tr>');
		}
	});

}
//funcion que nos permite pintar los valores en inputs al seleccionar
function editar(idestado){
	//metodo post para enviar y obtener los resultados
	$.post('index.php?controller=Estado&action=mostrarSeleccionado', {idestado: idestado}, function(data, status) {
		//se convierte lo se devuelve a JSON
		data = JSON.parse(data);
		//se recorre ej JSON para mostrar los valores obteneidos
		for (dato of data){
			$("#idestado").val(dato.idestado);
			$("#nombreeditar").val(dato.nombre);
			$("#poblacionHeditar").val(dato.poblacion_h);
			$("#poblacionMeditar").val(dato.poblacion_m);
			$("#poblacionTeditar").val(dato.poblacion_total);
			$("#edadPeditar").val(dato.edad_promedio);
		}
	});
}
//funcion que nos permite borrar
function borrar(idestado) {
	//enviamos por el metodo post el id
	$.post('index.php?controller=Estado&action=eliminar', {idestado: idestado}, function(data, status) {
		//si se ejecuta bien mostrara un mensjae al igual si hay un error
		if (status) {
			alert("Estado borrado");
		}else{
			alert("Estado no borrado");
		}
	});
}
//funcion que nos ayuda a sumar los inputs de forma dinamica
function suma() {
	//se declaran variables iniciales
	var suma = 0, totalM = 0, totalH = 0;
	//con el metodo keyup sabemos cuando halla cambios el el input
	$("#poblacionH").keyup(function(event) {
		//obtenemos el valor dei input y lo convertimos a entero
		totalH = parseInt($(this).val());
		//se hace la suma del input actual mas el segundo input
		suma = totalM + totalH;
		//en este input se pinta el resultado
		$("#poblacionT").val(suma);
	});
	$("#poblacionM").keyup(function(event) {
		totalM = parseInt($(this).val());
		suma = totalM + totalH;
		$("#poblacionT").val(suma);
	});
	$("#poblacionHeditar").keyup(function(event) {
		totalH = parseInt($(this).val());
		totalM = parseInt($("#poblacionMeditar").val());
		suma = totalM + totalH;
		$("#poblacionTeditar").val(suma);
	});
	$("#poblacionMeditar").keyup(function(event) {
		totalM = parseInt($(this).val());
		totalH = parseInt($("#poblacionHeditar").val());
		suma = totalM + totalH;
		$("#poblacionTeditar").val(suma);
	});
}
//funcion que nos permite linpiar los inputs
function cancelar() {
	$("#idestado").val("");
	$("#nombreeditar").val("");
	$("#poblacionHeditar").val("");
	$("#poblacionMeditar").val("");
	$("#poblacionTeditar").val("");
}

init();