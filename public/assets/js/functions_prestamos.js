let tableListClientes;

document.addEventListener('DOMContentLoaded', function () {
	tableListClientes = $('#tableListClientes').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"ajax": {
			"url": " " + base_url + "/Prestamos/getClientesLoan",
			"dataSrc": ""
		},
		"columns": [
			{"data": "idpersona"},
			{"data": "identificacion"},
			{"data": "nombres"},
			{"data": "apellidos"},
			{"data": "telefono"},
			{"data": "prestamos"},
			{"data": "options"}
		],

		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]

	});

});

function fntAgregar(idpersona) {
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Prestamos/getClienteLoan/' + idpersona;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {

		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			if (objData.status) {
				document.querySelector("#idUsuario").value = objData.data.idpersona;
				document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
				document.querySelector("#txtNombre").value = objData.data.nombres;
			}
		}
		$('#modalListClientes').modal('hide');
	}

}

function openModal() {
	$('#modalFormPrestamos').modal('show');
}

function openModalListC() {
	$('#modalListClientes').modal('show');
}