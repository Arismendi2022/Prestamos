let tablePagos;
let tableClientesPrestamos;
let tableCuotas;

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

				document.querySelector("#idUsuario").value = objData.data.idcliente;
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
		"scrollY": '50vh',
		"scrollCollapse": true,
	});

	/** hacer clic en el control Seleccionar todos */
	/*$('#select-all').on('click', function(){
		/!** Obtener todas las filas con la búsqueda aplicada *!/
			// Inicializar la DataTable
		var table = $('#tableQuotas').DataTable();
		var rows = table.rows({ 'search': 'applied' }).nodes();
		/!** Marque/desmarque las casillas de todas las filas de la tabla *!/
		$('input[type="checkbox"]', rows).prop('checked', this.checked);
	});*/

	/** Haga clic en la casilla de verificación para establecer el estado del control "Seleccionar todos" */
	/*	$('#tableQuotas tbody').on('change', 'input[type="checkbox"]', function(){
			/!** Si la casilla de verificación no está marcada *!/
			if(!this.checked){
				var el = $('#select-all').get(0);
				/!** Si el control "Seleccionar todos" está marcado y tiene la propiedad 'indeterminada' *!/
				if(el && el.checked && ('indeterminate' in el)){
					// Establecer el estado visual del control "Seleccionar todos"
					// Como 'indeterminada'
					el.indeterminate = true;
				}
			}
		});*/


} /**  final fntAddCliente*/

function fntPagosCuotas(idamortizacion) {
	$('input:checkbox').on('change', function () {
		//console.log('chand', $(this).val())
		let total = 0;

		$('input:checkbox:enabled:checked').each(function () {
			total += isNaN(parseFloat($(this).attr('data-cuota').replace(/[$€,.]/g, ''))) ? 0 : parseFloat($(this).attr('data-cuota').replace(/[$€,.]/g, ''));
		});

		const numero = total;
		const numeroFormateado = new Intl.NumberFormat('es-ES').format(numero);

		$("#txtMonto").val(numeroFormateado);

		if (total != 0) {
			$('#btnActionForm').attr('disabled', false);
		} else {
			$('#btnActionForm').attr('disabled', true);
		}

	});

}

/** guardamos los pagos de los prestamos*/
if (document.querySelector("#formPagos")) {
	let formPagos = document.querySelector("#formPagos");
	formPagos.onsubmit = function (e) {
		e.preventDefault();


	}

};


/** imprimir recibo de pago */
function fntImprimirPago() {

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
	$('#tableQuotas tbody').empty(); // Elimina todas las filas del cuerpo de la tabla
	document.querySelector("#formPagos").reset();
	$("#montoTotal").html('0.00');
	$("#nroPrestamo").html('');
	$("#plazoPrestamo").html('');
	$("#tipoMoneda").html('');

}
