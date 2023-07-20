//et tableCuotas;
let tableListClientes;
let tablePrestamos;


/** Evento para guardar el prestamo*/
document.addEventListener('DOMContentLoaded', function () {
	/** Guardar Préstamo */
	if (document.querySelector("#formPrestamo")) {
		let formPrestamo = document.querySelector("#formPrestamo");
		formPrestamo.onsubmit = function (e) {
			e.preventDefault();

			let fecha = $("#datePicker").val();
			let cuota = $("#valorCuota").html();
			let interes = $("#Interes").html();
			let total = $("#montoTotal").html();

			/** Obtén la referencia a la DataTable */
			let dataTable = $('#tableCuotas').DataTable();

			/** Verifica si la DataTable no tiene registros */
			if (dataTable.data().count() === 0) {
				alerta("", "Falta ejecutar CALCULAR préstamo.", "error");
				return false;
			}

			/** Obtener los datos de la DataTable */
			var tabla = document.getElementById("tableCuotas");
			var filas = tabla.getElementsByTagName("tr");
			var matriz = [];

			for (var i = 1; i < filas.length; i++) { // Comenzamos desde 1 para omitir la fila de encabezados
				var celdas = filas[i].getElementsByTagName("td");
				var filaMatriz = [];

				for (var j = 0; j < celdas.length; j++) {
					filaMatriz.push(celdas[j].textContent);
				}

				matriz.push(filaMatriz);
			}

			/** Crear un objeto FormData */
			let formData = new FormData(formPrestamo);
			formData.append('datos', JSON.stringify(matriz));

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
					} else {
						alerta("Error", objData.msg, "error");
					}
				}
			}
		}
	}
});
/** Fin document addEventListener */

/** Inicializar Datatable de detalle cuotas préstamos */
$(document).ready(function () {
	tableCuotas = $('#tableCuotas').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"columnDefs": [
			{'className': "textcenter", "targets": [0]},
			{'className': "textcenter", "targets": [1]},
			{'className': "textright", "targets": [2]},
			{'className': "textright", "targets": [3]},
			{'className': "textright", "targets": [4]},
			{'className': "textright", "targets": [5]}
		],
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"bDestroy": true,
	});
	/** Calcula la amortizacion del prestamo metodo frances */
	$('#btnCalcular').on('click', function () {

		//let llenarTabla = document.querySelector('#tableCuotas tbody');
		let txtIdentificacion = document.querySelector('#txtIdentificacion').value;
		let montoCredito = document.querySelector('#txtMonto').value;
		let cantidadPagos = document.querySelector('#txtCuotas').value;
		let tasaInteresAnual = document.querySelector('#txtInteres').value;
		let frecuenciaPago = document.querySelector('#listFormPago').value;
		let listMoneda = document.querySelector('#listMoneda').value;
		let fechaInicio = document.querySelector('#datePicker').value;

		/** Eliminar cualquier carácter que no sea un dígito */
		montoCredito = montoCredito.replace(/\./g, "");

		/** Creamos un objeto dayjs con la fecha de inicio */
		let fechaActual = dayjs(fechaInicio).add(1, 'month');

		if (txtIdentificacion == '' || montoCredito == '' || cantidadPagos == '' || tasaInteresAnual == '' || cantidadPagos == '' || listMoneda == '' || fechaInicio == '') {
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
			currency: 'USD',
			minimumFractionDigits: 0,
			round: Math.ceil
		})

		/** agregamos los valores calculados */
		const montoTotal = cuotaMes * cantidadPagos
		const intereses = montoTotal - montoCredito

		document.querySelector("#valorCuota").innerHTML = formatter.format((cuotaMes.toFixed(0)));
		document.querySelector("#Interes").innerHTML = formatter.format((intereses.toFixed(0)));
		document.querySelector("#montoTotal").innerHTML = formatter.format((montoTotal.toFixed(0)));

		const table = $('#tableCuotas').DataTable();
		table.clear();

		/** Calcular calendario de amortización */
		for (let i = 1; i <= cantidadPagos; i++) {
			pagoInteres = Math.abs(montoCredito * tasaInteresPeriodica);
			pagoCapital = Math.abs(cuotaMes - pagoInteres);
			montoCredito = Math.abs(montoCredito - pagoCapital);
			/** Formato fechas */
			const fechaPago = fechaActual.format('DD-MM-YYYY');
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
			table.row.add([
				i,
				fechaPago,
				formatter.format((cuotaMes.toFixed(0))),
				formatter.format((pagoInteres.toFixed(0))),
				formatter.format((pagoCapital.toFixed(0))),
				formatter.format((montoCredito.toFixed(0)))
			]);
		}
		table.draw();
	})
});

/** funcion buscar clientes */
function fntBuscarCliente(idpersona) {
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

				$('#modalListClientes').modal('hide');
			} else {
				alerta("", objData.msg, "error");
			}
		}
	}
}

/** funcion para limpiar el fomulario */
function btnLimpiarForm() {
	let tabla = $('#tableCuotas').DataTable();
	/** Borra todos los datos de la DataTable */
	tabla.clear().draw();
	document.getElementById("formPrestamo").reset();
	$("#listFormPago").val("Diario").trigger("change");
	$("#listMoneda").val("COP").trigger("change");
	$("#valorCuota").html("0");
	$("#Interes").html("0");
	$("#montoTotal").html("0");

}

/** modal busca de clientes */
function openModalClientes() {
	$('#modalListClientes').modal('show');
}

$(document).ready(function () {
	/** Datatable de listado de clientes con prestamos */
	tableListClientes = $('#tableListClientes').dataTable({
		"aProcessing": true, "aServerSide": true, "language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		}, "ajax": {
			"url": " " + base_url + "/Prestamos/getClientesLoan", "dataSrc": ""
		}, "columns": [
			{"data": "idpersona"},
			{"data": "identificacion"},
			{"data": "nombres"},
			{"data": "telefono"},
			{"data": "prestamos"},
			{"data": "options"}
		],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]

	});
	/** Datatable de listado de préstamos */
	tablePrestamos = $('#tablePrestamos').dataTable({
		"aProcessing": true, "aServerSide": true, "language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		}, "ajax": {
			"url": " " + base_url + "/Prestamos/getPrestamos",
			"dataSrc": ""
		},
		"columns": [
			{"data": "idprestamo"},
			{"data": "cliente"},
			{"data": "fecha"},
			{"data": "forma_pago"},
			{"data": "num_cuotas"},
			{"data": "valor_cuota"},
			{"data": "monto_credito"},
			{"data": "monto_total"},
			{"data": "abonos"},
			{"data": "saldo"},
			{"data": "estado"},
			{"data": "options"}
		],
		"columnDefs": [
			{'className': "textcenter", "targets": [3]},
			{'className': "textcenter", "targets": [4]},
			{'className': "textright", "targets": [5]},
			{'className': "textright", "targets": [6]},
			{'className': "textright", "targets": [7]},
			{'className': "textright", "targets": [8]},
			{'className': "textcenter", "targets": [9]}
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
/** Fin Document Ready */


