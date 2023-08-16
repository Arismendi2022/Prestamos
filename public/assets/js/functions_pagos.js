let tablePagos;
let tableClientesPrestamos;

document.addEventListener('DOMContentLoaded', function () {
	tablePagos = $('#tablePagos').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"ajax": {
			"url": " " + base_url + "/Pagos/getPagos",
			"dataSrc": ""
		},
		"columns": [
			{"data": "idpago"},
			{"data": "nombre"},
			{"data": "prestamoid"},
			{"data": "fecha_pago"},
			{"data": "monto_pagado"},
			{"data": "cuota_pagada"},
			{"data": "options"}
		],
		"columnDefs": [
			{'className': "textcenter", "targets": [0]},
			{'className': "textcenter", "targets": [2]},
			{'className': "textcenter", "targets": [3]},
			{'className': "textright", "targets": [4]},
			{'className': "textcenter", "targets": [5]}
		],
		'dom': 'lBfrtip',
		'buttons': [
			{
				"extend": "copyHtml5",
				"text": "<i class='far fa-copy'></i> Copiar",
				"titleAttr": "Copiar",
				"className": "btn btn-secondary"
			}, {
				"extend": "excelHtml5",
				"text": "<i class='fas fa-file-excel'></i> Excel",
				"titleAttr": "Esportar a Excel",
				"className": "btn btn-success"
			}, {
				"extend": "pdfHtml5",
				"text": "<i class='fas fa-file-pdf'></i> PDF",
				"titleAttr": "Esportar a PDF",
				"className": "btn btn-danger"
			}, {
				"extend": "csvHtml5",
				"text": "<i class='fas fa-file-csv'></i> CSV",
				"titleAttr": "Esportar a CSV",
				"className": "btn btn-info"
			}
		],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]
	});


});
/** final addEventListener */

/** Datatable listado de clientes con prestamos */
$(document).ready(function () {
	tableClientesPrestamos = $('#tableClientesPrestamos').dataTable({
		"aProcessing": true, "aServerSide": true, "language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		}, "ajax": {
			"url": " " + base_url + "/Pagos/getClientesPrestamo",

			"dataSrc": ""
		}, "columns": [
			{"data": "idcliente"},
			//{"data": "identificacion"},
			{"data": "cliente"},
			{"data": "monto_prestamo"},
			{"data": "estado"},
			{"data": "options"}
		],

		"columnDefs": [
			{'className': "textcenter", "targets": [0]},
			{'className': "textright", "targets": [2]},
			{'className': "textcenter", "targets": [3]},
			{'className': "textcenter", "targets": [4]}
			,],

		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]
	});
}); /** Fin Document Ready */


/** mostrar cliente en form pagos */
function fntAddCliente(idprestamo){
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Pagos/getClientePrestamo/' + idprestamo;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			if (objData.status) {

				document.querySelector("#idUsuario").value = objData.data.idcliente;
				document.querySelector("#txtIdentificacion").value = objData.data['prestamo'].identificacion;
				document.querySelector("#txtNombre").value = objData.data['prestamo'].cliente;
				document.querySelector("#montoTotal").innerHTML = objData.data['prestamo'].monto_prestamo;
				document.querySelector("#nroPrestamo").innerHTML = objData.data['prestamo'].idprestamo;
				document.querySelector("#plazoPrestamo").innerHTML = objData.data['prestamo'].forma_pago;
				document.querySelector("#tipoMoneda").innerHTML = objData.data['prestamo'].moneda;

				$('#modalClientesPrestamos').modal('hide');
			} else {
				alerta("", objData.msg, "error");
			}
		}
	}


}
/** imprimir recibo de pago */
function fntImprimirPago(){

}
/** modalformulario pagos*/
function openModal() {
	btnLimpiarForm()
	$('#modalFormPagos').modal('show');

}
/** modal busca de clientes con préstamos */
function modalClientesPrestamos() {
	$('#modalClientesPrestamos').modal('show');
}

/** funcion para limpiar el fomulario */
function btnLimpiarForm() {
	document.querySelector("#formPagos").reset();
	$("#montoTotal").html('0');
	$("#nroPrestamo").html('');
	$("#plazoPrestamo").html('');
	$("#tipoMoneda").html('');

}
