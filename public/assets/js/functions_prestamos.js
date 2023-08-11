//et tableCuotas;
let tableListClientes;
let tablePrestamos;

/** Evento para guardar el prestamo*/
document.addEventListener('DOMContentLoaded', function () {
	/** Datatable de listado de préstamos */
	tablePrestamos = $('#tablePrestamos').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"ajax": {
			"url": " " + base_url + "/Prestamos/getPrestamos", "dataSrc": ""
		},
		"columns": [
			{"data": "idprestamo"},
			{"data": "cliente"},
			{"data": "fecha_prestamo"},
			{"data": "forma_pago"},
			{"data": "nro_cuotas"},
			{"data": "valor_cuota"},
			{"data": "monto_prestamo"},
			{"data": "total_pagar"},
			{"data": "abonos"},
			{"data": "saldo"},
			{"data": "estado"},
			{"data": "options"}
		],
		"columnDefs": [
			{'className': "textcenter", "targets": [0]},
			{'className': "textcenter", "targets": [2]},
			{'className': "textcenter", "targets": [3]},
			{'className': "textcenter", "targets": [4]},
			{'className': "textright", "targets": [5]},
			{'className': "textright", "targets": [6]},
			{'className': "textright", "targets": [7]},
			{'className': "textright", "targets": [8]},
			{'className': "textright", "targets": [9]},
			{'className': "textcenter", "targets": [10]}
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
/** Fin document addEventListener */

/** Calcula la amortizacion del prestamo metodo frances */
$(document).ready(function () {
	$('#btnCalcular').on('click', function () {
		/** Array para guardar los datos de amortización */
		const amortizationData = [];

		let txtIdentificacion = document.querySelector('#txtIdentificacion').value;
		let montoCredito = document.querySelector('#txtMonto').value;
		let cantidadPagos = document.querySelector('#txtCuotas').value;
		let tasaInteresAnual = document.querySelector('#txtInteres').value;
		let frecuenciaPago = document.querySelector('#listFormPago').value;
		let listMoneda = document.querySelector('#listMoneda').value;
		let fechaActual = dayjs(document.querySelector('#datePicker').value);

		/** Eliminar cualquier carácter que no sea un dígito */
		montoCredito = montoCredito.replace(/\./g, "");

		if (txtIdentificacion == '' || montoCredito == '' || cantidadPagos == '' || tasaInteresAnual == '' || cantidadPagos == '' || listMoneda == '' || fechaActual == '') {
			alerta("Atención", "Todos los campos son obligatorios.", "error");
			return false;
		}

		/** Convertir la tasa de interés anual a tasa de interés periódica */
		var tasaInteresPeriodica;
		if (frecuenciaPago === 'Mensual') {
			tasaInteresPeriodica = tasaInteresAnual / 12 / 100;
		} else if (frecuenciaPago === 'Semanal') {
			tasaInteresPeriodica = tasaInteresAnual / 52 / 100;
		} else if (frecuenciaPago === 'Diario') {
			tasaInteresPeriodica = tasaInteresAnual / 365 / 100;
		} else if (frecuenciaPago === 'Quincenal') {
			tasaInteresPeriodica = tasaInteresAnual / 24 / 100;
		} else {
			throw new Error('Frecuencia de pago no válida');
		}

		/** para calcular la amortización del crédito utilizando el método francés */
		cuotaMes = montoCredito * (tasaInteresPeriodica / (1 - Math.pow(1 + tasaInteresPeriodica, -cantidadPagos)));

		/** formato de numeros */
		const formatter = new Intl.NumberFormat('es-CO', {
			//style: 'currency',
			currency: 'USD', minimumFractionDigits: 0, round: Math.ceil
		})

		/** agregamos los valores calculados */
		const montoTotal = cuotaMes * cantidadPagos
		const intereses = montoTotal - montoCredito

		document.querySelector("#valorCuota").innerHTML = formatter.format((cuotaMes.toFixed(0)));
		document.querySelector("#Interes").innerHTML = formatter.format((intereses.toFixed(0)));
		document.querySelector("#montoTotal").innerHTML = formatter.format((montoTotal.toFixed(0)));

		/** Calcular calendario de amortización */
		for (let i = 1; i <= cantidadPagos; i++) {
			pagoInteres = Math.abs(montoCredito * tasaInteresPeriodica);
			pagoCapital = Math.abs(cuotaMes - pagoInteres);
			montoCredito = Math.abs(montoCredito - pagoCapital);

			/** Pasar a la siguiente fecha de pago según la frecuencia */
			switch (frecuenciaPago) {
				case "Mensual":
					fechaActual = fechaActual.add(1, "month");
					break;
				case "Semanal":
					fechaActual = fechaActual.add(1, "week");
					break;
				case "Diario":
					fechaActual = fechaActual.add(1, "day");
					break;
				case "Quincenal":
					fechaActual = fechaActual.add(15, "day");
					break;
			}
			amortizationData.push({
				nroCuota: i,
				Fecha: fechaActual.format('YYYY-MM-DD'),
				Cuota: formatter.format((cuotaMes.toFixed(0))),
				Interes: formatter.format((pagoInteres.toFixed(0))),
				Capital: formatter.format((pagoCapital.toFixed(0))),
				Saldo: formatter.format((montoCredito.toFixed(0)))
			});
		}
		$('#btnActionForm').attr('disabled', false);
		saveAmortizationData(amortizationData);
	})

});

/** Guardar Préstamo */
function saveAmortizationData(data) {
	if (document.querySelector("#formPrestamos")) {
		let formPrestamos = document.querySelector("#formPrestamos");
		formPrestamos.onsubmit = function (e) {
			e.preventDefault();

			let fecha = $("#datePicker").val();
			let cuota = $("#valorCuota").html();
			let interes = $("#Interes").html();
			let total = $("#montoTotal").html();

			/** Crear un objeto FormData */
			let formData = new FormData(formPrestamos);
			formData.append('datos', JSON.stringify(data));

			/** Agrega otras variables al objeto FormData */
			formData.append('fecha_prestamo', fecha);
			formData.append('valor_cuota', cuota);
			formData.append('valor_interes', interes);
			formData.append('valor_total', total);

			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + '/Prestamos/setPrestamo';
			request.open("POST", ajaxUrl, true);
			request.send(formData);

			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {

						alerta("Guardar!", objData.msg, "success");
						btnLimpiarForm();
						tableListClientes.api().ajax.reload();
						tablePrestamos.api().ajax.reload();
					} else {
						alerta("Error", objData.msg, "error");
					}
				}
			}
		}
	}
}

/** funcion buscar clientes */
function fntBuscarCliente(idcliente) {
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Prestamos/getClienteLoan/' + idcliente;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			if (objData.status) {
				document.querySelector("#idUsuario").value = objData.data.idcliente;
				document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
				document.querySelector("#txtNombre").value = objData.data.nombres;

				$('#modalListClientes').modal('hide');
			} else {
				alerta("", objData.msg, "error");
			}
		}
	}
}

/** funcion para limpiar el fomulario */
function btnLimpiarForm() {
	document.querySelector("#formPrestamos").reset();
	$('#listFormPago').select2();
	$('#listMoneda').select2();
	$("#valorCuota").html("0");
	$("#Interes").html("0");
	$("#montoTotal").html("0");
	$('#btnActionForm').attr('disabled', true);
}

/** modal busca de clientes */
function openModalClientes() {
	$('#modalListClientes').modal('show');
}

/**  Ver prestamo */
function fntViewLoan(idprestamo) {
	tableCuotas = $('#tableViewCuotas').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"

		},
		"ajax": {
			"url": " " + base_url + '/Prestamos/getAmortizacion/' + idprestamo,
			"dataSrc": ""
		},
		"columns": [
			{"data": "nro_cuota"},
			{"data": "fechaPago"},
			{"data": "valor_cuota"},
			{"data": "saldo"},
			{"data": "estado"}
		],
		"columnDefs": [
			{'className': "textcenter", "targets": [0]},
			{'className': "textcenter", "targets": [1]},
			{'className': "textright", "targets": [2]},
			{'className': "textright", "targets": [3]},
			{'className': "textcenter", "targets": [4]}
		],

		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": false,
		"autoWidth": false,
		"responsive": true,
		"bDestroy": true,
	});

	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Prestamos/getPrestamo/' + idprestamo;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			if (objData.status) {

				document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
				document.querySelector("#celNombre").innerHTML = objData.data.nombres;
				document.querySelector("#celEmail").innerHTML = objData.data.email;
				document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
				document.querySelector("#celDireccion").innerHTML = objData.data.direccion;
				document.querySelector("#celCiudad").innerHTML = objData.data.ciudad;
				document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
				document.querySelector("#celMontoCredito").innerHTML = objData.data.monto_prestamo;
				document.querySelector("#celMontoTotal").innerHTML = objData.data.total_pagar;
				document.querySelector("#celTotalIntereses").innerHTML = objData.data.total_interes;
				document.querySelector("#celFechaCredito").innerHTML = objData.data.fechaPrestamo;
				document.querySelector("#celFormaPago").innerHTML = objData.data.forma_pago;
				document.querySelector("#celInteres").innerHTML = objData.data.interes;
				document.querySelector("#celnroCuotas").innerHTML = objData.data.nro_cuotas;
				document.querySelector("#celnroCredito").innerHTML = objData.data.idprestamo;
				$('#modalViewLoan').modal('show');
			} else {
				alerta("Error", objData.msg, "error");
			}
		}
	}

	//$('#modalViewLoan').modal('show');
}

/** Datatable de listado de clientes con prestamos */
$(document).ready(function () {
	tableListClientes = $('#tableListClientes').dataTable({
		"aProcessing": true, "aServerSide": true, "language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		}, "ajax": {
			"url": " " + base_url + "/Prestamos/getClientesLoan",

			"dataSrc": ""
		}, "columns": [
			{"data": "idcliente"},
			{"data": "identificacion"},
			{"data": "nombres"},
			{"data": "telefono"},
			{"data": "prestamo"},
			{"data": "options"}
		],

		"columnDefs": [
			{'className': "textcenter", "targets": [0]},
			{'className': "textcenter", "targets": [4]}
			,],

		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]
	});
}); /** Fin Document Ready */

/* Modal formulario préstamos */
function openModal() {
	document.querySelector("#formPrestamos").reset();
	$('#modalFormPrestamo').modal('show');
	//$('#listStatus').select2();
}


