function init() {
	//se ejecuta la funcion mostrar
	mostrar();
	//funcio para rellenar el select de los estados
	$.post('index.php?controller=Estado&action=mostrar', function(data, status) {
		data = JSON.parse(data);
		for (dato of data){
			$("#listEstados").append('<option value="'+dato.idestado+'">'+dato.nombre+'</option>')
		}
	});
	$.post('index.php?controller=Estado&action=mostrar', function(data, status) {
		data = JSON.parse(data);
		for (dato of data){
			$("#listEstadosEdit").append('<option value="'+dato.idestado+'">'+dato.nombre+'</option>')
		}
	});
}

function mostrar() {
	$.ajax({
		url: 'index.php?controller=Contagio&action=mostrar',
		dataType: 'json',
	})
	.done(function(data) {
		for (dato of data){
			$("#t-body").append('<tr>'+
									'<td>'+dato.estado+'</td>'+
									'<td>'+dato.cantidad+'</td>'+
									'<td>'+dato.fecha+'</td>'+
									'<td>'+
										'<button onclick="editar('+dato.idcontagio+')" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateContagio"><i class="fas fa-pen"></i></button>'+
										'<button onclick="borrar('+dato.idcontagio+')" class="btn btn-danger"><i class="fas fa-trash"></i></button>'+
									'</td>'+
								'</tr>')
		}
	});

}

function editar(idcontagio) {
	//metodo post para enviar y obtener los resultados
	$.post('index.php?controller=Contagio&action=mostrarSeleccionado', {idcontagio: idcontagio}, function(data, status) {
		//se convierte lo se devuelve a JSON
		data = JSON.parse(data);
		//se recorre ej JSON para mostrar los valores obteneidos
		for (dato of data){
			$("#idcontagio").val(dato.idcontagio);
			$("#modalTitle").text('Modificar contagio de' + dato.estado);
			$("#cantidadEdit").val(dato.cantidad);
			$("#fechaEdit").val(dato.fecha);
		}
	});
}

function borrar(idcontagio) {
	//enviamos por el metodo post el id
	$.post('index.php?controller=Contagio&action=eliminar', {idcontagio: idcontagio}, function(data, status) {
		//si se ejecuta bien mostrara un mensjae al igual si hay un error
		if (status) {
			alert("Registro borrado");
		}else{
			alert("Registro no borrado");
		}
	});
}

function cancelar() {
	$("#idcontagio").val("");
	$("#modalTitle").text("");
	$("#cantidadEdit").val("");
	$("#fechaEdit").val("");
}

init();