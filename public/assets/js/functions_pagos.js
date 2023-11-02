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
		"searching": false,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]
	});

	/** guardamos los pagos de los prestamos*/
	if (document.querySelector("#formPagos")) {
		let formPagos = document.querySelector("#formPagos");
		formPagos.onsubmit = function (e) {
			e.preventDefault();

			let idPrestamo = document.querySelector('#nroPrestamo').textContent;

			let selectedCheckboxes = document.querySelectorAll('input[name="id[]"]:checked');
			let selectPagos = [];

			selectedCheckboxes.forEach(function (checkbox) {
				if (checkbox.checked && !checkbox.disabled) {
					var data = {
						id: checkbox.getAttribute('data-id'),
						ncuota: checkbox.getAttribute('data-ncuota'),
						cuota: checkbox.getAttribute('data-cuota')
					};
					selectPagos.push(data);
				}
			});

			/** Crear un objeto FormData */
			let formData = new FormData(formPagos);
			formData.append('idPrestamo', idPrestamo);
			formData.append('datos', JSON.stringify(selectPagos));

			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + '/Pagos/setPagos';
			//let formData = new FormData(formPagos);
			request.open("POST", ajaxUrl, true);
			request.send(formData);
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {

						$('#modalFormPagos').modal("hide");
						formPagos.reset();
						alerta("Pagos", objData.msg, "success");
						tablePagos.api().ajax.reload();
						tableClientesPrestamos.api().ajax.reload();
					} else {
						alerta("Error", objData.msg, "error");
					}
				}
			}

		}
	}

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
			{"data": "idprestamo"},
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
function fntAddCliente(idprestamo) {

	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Pagos/getClientePrestamo/' + idprestamo;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			if (objData.status) {

				document.querySelector("#idCliente").value = objData.data.idcliente;
				document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
				document.querySelector("#txtNombre").value = objData.data.cliente;
				document.querySelector("#montoTotal").innerHTML = objData.data.monto_prestamo;
				document.querySelector("#nroPrestamo").innerHTML = objData.data.idprestamo;
				document.querySelector("#plazoPrestamo").innerHTML = objData.data.forma_pago;
				document.querySelector("#tipoMoneda").innerHTML = objData.data.moneda;

				$('#modalClientesPrestamos').modal('hide');
			} else {
				alerta("", objData.msg, "error");
			}
		}
	}

	tableCuotas = $('#tableQuotas').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"

		},
		"ajax": {
			"url": " " + base_url + '/Pagos/getDetalle/' + idprestamo,
			"dataSrc": ""
		},
		"columns": [
			{"data": "checkbox"},
			{"data": "nro_cuota"},
			{"data": "fecha_cuota"},
			{"data": "valor_cuota"},
			{"data": "estado"}
		],

		"columnDefs": [
			{'className': "textcenter", "targets": [0]},
			{'className': "textcenter", "targets": [1]},
			{'className': "textcenter", "targets": [2]},
			{'className': "textright", "targets": [3]},
			{'className': "textcenter", "targets": [4]}
		],

		"bDestroy": true,
		"ordering": false,
		"searching": false,
		"bPaginate": false, //Ocultar paginación
		"scrollY": '34vh',
		"scrollCollapse": true,
	});

}

/**  final fntAddCliente*/
function fntPagosCuotas() {
	$('input:checkbox').on('change', function () {

		let total = 0;
		$('input:checkbox:enabled:checked').each(function () {
			total += isNaN(parseFloat($(this).attr('data-cuota').replace(/[$€,.]/g, ''))) ? 0 : parseFloat($(this).attr('data-cuota').replace(/[$€,.]/g, ''));
		});

		const numero = total;
		const totalPago = new Intl.NumberFormat('es-CO').format(numero);

		$("#txtMonto").val(totalPago);

		if (totalPago != 0) {
			$('#btnActionForm').attr('disabled', false);
		} else {
			$('#btnActionForm').attr('disabled', true);
		}

	});

}

/** imprimir recibo de pago */
function fntImprimirPago() {

	alerta('', 'En construción...', 'warning')

}

/** modalformulario pagos*/
function openModal() {
	btnLimpiarForm()
	document.querySelector('#idCliente').value = "";
	$('#modalFormPagos').modal('show');
}

/** modal busca de clientes con préstamos */
function modalClientesPrestamos() {
	tableClientesPrestamos.api().ajax.reload();
	$('#modalClientesPrestamos').modal('show');
}

/** funcion para limpiar el fomulario */
function btnLimpiarForm() {
	$('#tableQuotas tbody').empty(); // Elimina todas las filas del cuerpo de la tabla
	document.querySelector('#idCliente').value = "";
	document.querySelector("#formPagos").reset();
	$("#montoTotal").html('0,00');
	$("#nroPrestamo").html('0');
	$("#plazoPrestamo").html('');
	$("#tipoMoneda").html('');

}
