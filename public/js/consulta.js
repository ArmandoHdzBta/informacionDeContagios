function init() {
	//funcio para rellenar el select de los estados
	$.post('index.php?controller=Estado&action=mostrar', function(data, status) {
		data = JSON.parse(data);
		for (dato of data){
			$("#listEstados").append('<option value="'+dato.idestado+'">'+dato.nombre+'</option>');
			$("#listEstadosDosSem").append('<option value="'+dato.idestado+'">'+dato.nombre+'</option>');
		}
	});
}

init();