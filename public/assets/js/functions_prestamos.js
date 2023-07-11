let tableListClientes;
let tablePrestamos;
var table;


$(document).ready(function () {
	/** Inicializar Datatable de detalle cuotas préstamos */
	table = $('#tableCuotas').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"columnDefs": [
			{targets: [1], className: 'text-center'},
			{targets: [2], className: 'text-center'},
			{targets: [3], className: 'text-center'},
			{targets: [4], className: 'text-center'},
			{targets: [5], className: 'text-center'},

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
	/** Datatable de listado de clientes con prestamos */
	tableListClientes = $('#tableListClientes').dataTable({
		"aProcessing": true, "aServerSide": true, "language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		}, "ajax": {
			"url": " " + base_url + "/Prestamos/getClientesLoan", "dataSrc": ""
		}, "columns": [{"data": "idpersona"}, {"data": "identificacion"}, {"data": "nombres"}, {"data": "telefono"}, {"data": "prestamos"}, {"data": "options"}],

		"resonsieve": "true", "bDestroy": true, "iDisplayLength": 10, "order": [[0, "desc"]]

	});
	/** Datatable de listado de préstamos */
	tablePrestamos = $('#tablePrestamos').dataTable({
		"aProcessing": true, "aServerSide": true, "language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		}, /*"ajax": {
			"url": " " + base_url + "/Prestamos/getClientesLoan",
			"dataSrc": ""
		},
		"columns": [
			{"data": "idpersona"},
			{"data": "identificacion"},
			{"data": "nombres"},
			{"data": "telefono"},
			{"data": "prestamos"},
			{"data": "options"}
		],*/
		'dom': 'lBfrtip', 'buttons': [{
			"extend": "copyHtml5", "text": "<i class='far fa-copy'></i> Copiar", "titleAttr": "Copiar", "className": "btn btn-secondary"
		}, {
			"extend": "excelHtml5", "text": "<i class='fas fa-file-excel'></i> Excel", "titleAttr": "Esportar a Excel", "className": "btn btn-success"
		}, {
			"extend": "pdfHtml5", "text": "<i class='fas fa-file-pdf'></i> PDF", "titleAttr": "Esportar a PDF", "className": "btn btn-danger"
		}, {
			"extend": "csvHtml5", "text": "<i class='fas fa-file-csv'></i> CSV", "titleAttr": "Esportar a CSV", "className": "btn btn-info"
		}],

		"resonsieve": "true", "bDestroy": true, "iDisplayLength": 10, "order": [[0, "desc"]]

	});

}); /** Fin Document Ready */

/** Evento para guardar el prestamo*/
document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector("#formPrestamo")) {
		let formPrestamo = document.querySelector("#formPrestamo");
		formPrestamo.onsubmit = function (e) {
			e.preventDefault();

			let fecha = $("#datePicker").val();
			let cuota = $("#valorCuota").html();
			let interes = $("#Interes").html();
			let total = $("#montoTotal").html();

			if (total == '0,00') {
				alerta("", "Falta ejecutar CALCULAR préstamo.", "error");
				return false;
			}

			//==============================================================================

			arrayData()


			//============================================================================

			/** Crear un objeto FormData */
			let formData = new FormData(formPrestamo);
			//formData.append('data', JSON.stringify(dataArray));
			//formData.append('datos', JSON.stringify(dataArray));


			/** Agrega otras variables al objeto FormData */
			formData.append('fecha_prestamo', fecha);
			formData.append('valor_cuota', cuota);
			formData.append('valor_interes', interes);
			formData.append('valor_total', total);

			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + '/Prestamos/setPrestamo';
			request.open("POST", ajaxUrl, true);
			request.send(formData);

			/*request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {

						btnLimpiarForm();
						alerta("Prestamos", objData.msg, "success");
						tableListClientes.api().ajax.reload();
					} else {
						alerta("Error", objData.msg, "error");
					}
				}
			}*/
		}

	}
});

/** Fin document addEventListener */
function arrayData() {
	/** Obtener los datos de la DataTable */
		// Get a reference to the DataTable

// Fetch the data from the DataTable
	var data = table.rows().data().toArray();

// Convert the DataTable data into a plain array
	var dataArray = data.map(function (row) {
		return row.map(function (cell) {
			return cell;
		});
	});
// Send the array through a function call or do whatever you need with it
	console.log(dataArray);

}


/** Calcula la amortizacion del prestamo metodo frances */
function btnCalcular() {
	let table = $('#tableCuotas').DataTable();

	let llenarTabla = document.querySelector('#tableCuotas tbody');
	let txtIdentificacion = document.querySelector('#txtIdentificacion').value;
	let montoCredito = document.querySelector('#txtMonto').value;
	let plazoMeses = document.querySelector('#txtCuotas').value;
	let tasaInteresAnual = document.querySelector('#txtInteres').value;
	let listPago = document.querySelector('#listFormPago').value;
	let listMoneda = document.querySelector('#listMoneda').value;
	let fechaInicio = document.querySelector('#datePicker').value;

	/** Eliminar cualquier carácter que no sea un dígito */
	montoCredito = montoCredito.replace(/\./g, "");


	/** Creamos un objeto dayjs con la fecha de inicio */
	let mesActual = dayjs(fechaInicio).add(1, 'month');

	if (txtIdentificacion == '' || montoCredito == '' || plazoMeses == '' || tasaInteresAnual == '' || listPago == '' || listMoneda == '' || fechaInicio == '') {
		alerta("Atención", "Todos los campos son obligatorios.", "error");
		return false;
	}

	// Borrar el contenido de la DataTable
	while (llenarTabla.firstChild) {
		llenarTabla.removeChild(llenarTabla.firstChild);
	}

	/** Calculamos la tasa de interés mensual */
	const tasaInteresMensual = tasaInteresAnual / 12 / 100;
	/** inicializamos variables a cero (0) *!/
	let pagoInteres = 0, pagoCapital = 0, cuotaMes = 0;

	/** Calculamos la cuota mensual */
	cuotaMes = montoCredito * (tasaInteresMensual / (1 - Math.pow(1 + tasaInteresMensual, -plazoMeses)));

	/** formato de numeros */
	const formatter = new Intl.NumberFormat('es-CO', {
		//style: 'currency',
		currency: 'USD',
		minimumFractionDigits: 0,
		round: Math.round
	})

	/** agregamos los valores calculados */
	const montoTotal = cuotaMes * plazoMeses
	const intereses = montoTotal - montoCredito

	document.querySelector("#valorCuota").innerHTML = formatter.format((cuotaMes.toFixed(0)));
	document.querySelector("#Interes").innerHTML = formatter.format((intereses.toFixed(0)));
	document.querySelector("#montoTotal").innerHTML = formatter.format((montoTotal.toFixed(0)));

	//!* Array para almacenar los detalles de cada cuota *!/
	//const detallesCuotas = [];

	for (let i = 1; i <= plazoMeses; i++) {

		pagoInteres = montoCredito * tasaInteresMensual;
		pagoCapital = cuotaMes - pagoInteres;
		montoCredito = montoCredito - pagoCapital;

		// * Formato fechas
		let fecha = mesActual.format('DD-MM-YYYY');
		//!* Avanzamos la fecha de vencimiento al próximo mes *!/
		mesActual = mesActual.add(1, 'month');

		var row = document.createElement('tr');
		row.innerHTML = `
			<td style="text-align: center;">${[i]}</td>
			<td style="text-align: center;">${fecha}</td>
			<td style="text-align: right;">${formatter.format((cuotaMes.toFixed(0)))}</td>
			<td style="text-align: right;">${formatter.format((pagoInteres.toFixed(0)))}</td>
			<td style="text-align: right;">${formatter.format((pagoCapital.toFixed(0)))}</td>
			<td style="text-align: right;">${formatter.format((montoCredito.toFixed(0)))}</td>
		`;
		llenarTabla.appendChild(row)
	}

}

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

function openModalClientes() {
	$('#modalListClientes').modal('show');
}

/** funcion para limpiar el fomulario */
function btnLimpiarForm() {
	$("#tableCuotas tr").slice(1).remove();
	document.getElementById("formPrestamo").reset();
	$('#listFormPago').select2('val', '1');
	$('#listMoneda').select2('val', '1');
	$("#valorCuota").html("0,00");
	$("#Interes").html("0,00");
	$("#montoTotal").html("0,00");

}

