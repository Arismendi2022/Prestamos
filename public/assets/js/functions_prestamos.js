let tableListClientes;
let tableCuotas;

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
			{"data": "telefono"},
			{"data": "prestamos"},
			{"data": "options"}
		],

		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]

	});

	if (document.querySelector("#formPrestamo")) {
		let formPrestamo = document.querySelector("#formPrestamo");
		formPrestamo.onsubmit = function (e) {
			e.preventDefault();

			let strIdentificacion = document.querySelector('#txtIdentificacion').value;
			let strNombre = document.querySelector('#txtNombre').value;

			if (strIdentificacion == '' || strNombre == '') {
				alerta("Atención", "Todos los campos son obligatorios.", "error");
				return false;
			}


		}
	}

});


/** Calcula la amortizacion del prestamo metodo frances **/
function btnCalcular() {

	$(function () {
		tableCuotas = $('#tableCuotas').dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
			},
			"columnDefs": [
				{ 'className': "textcenter", "targets": [ 1 ] },
				{ 'className': "textright", "targets": [ 2 ] },
				{ 'className': "textright", "targets": [ 3 ] },
				{ 'className': "textright", "targets": [ 4 ] },
				{ 'className': "textright", "targets": [ 5 ] }
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
	});
	const llenarTabla = document.querySelector('#tableCuotas tbody');

	let txtIdentificacion = document.querySelector('#txtIdentificacion').value;
	let montoCredito = document.querySelector('#txtMonto').value;
	let plazoMeses = document.querySelector('#txtCuotas').value;
	let tasaInteresAnual = document.querySelector('#txtInteres').value;
	let listPago = document.querySelector('#listFormPago').value;
	let listMoneda = document.querySelector('#listMoneda').value;
	let fechaInicio = document.querySelector('#datePicker').value;

	/** Eliminar cualquier carácter que no sea un dígito */
	montoCredito = montoCredito.replace(/,/g, '');

	/** Creamos un objeto dayjs con la fecha de inicio */
	let mesActual = dayjs(fechaInicio).add(1, 'month');

	if (txtIdentificacion == '' || montoCredito == '' || plazoMeses == '' || tasaInteresAnual == '' || listPago == '' || listMoneda == '' || fechaInicio == '') {
		alerta("Atención", "Todos los campos son obligatorios.", "error");
		return false;
	}


	while (llenarTabla.firstChild) {
		llenarTabla.removeChild(llenarTabla.firstChild);
	}

	/** Calculamos la tasa de interés mensual */
	const tasaInteresMensual = tasaInteresAnual / 12 / 100;
	/** inicializamos variables a cero (0) */
	let pagoInteres = 0, pagoCapital = 0, cuotaMes = 0;

	/** Calculamos la cuota mensual */
	cuotaMes = montoCredito * (tasaInteresMensual / (1 - Math.pow(1 + tasaInteresMensual, -plazoMeses)));

	// * formato de numeros
	const formatter = new Intl.NumberFormat('en-US', {
		style: 'currency',
		currency: 'USD',
		minimumFractionDigits: 2,
		round: Math.round

	})

	//* Array para almacenar los detalles de cada cuota */
	//const detallesCuotas = [];

	for (let i = 1; i <= plazoMeses; i++) {

		pagoInteres = montoCredito * tasaInteresMensual;
		pagoCapital = cuotaMes - pagoInteres;
		montoCredito = montoCredito - pagoCapital;

		// * Formato fechas
		let fecha = mesActual.format('DD-MM-YYYY');
		//* Avanzamos la fecha de vencimiento al próximo mes */
		mesActual = mesActual.add(1, 'month');

		const row = document.createElement('tr');
		row.innerHTML = `
			<td>${[i]}</td>
			<td>${fecha}</td>
			<td>${formatter.format((cuotaMes.toFixed(0)))}</td>
			<td>${formatter.format((pagoCapital.toFixed(0)))}</td>
			<td>${formatter.format((pagoInteres.toFixed(0)))}</td>
			<td>${formatter.format((montoCredito.toFixed(0)))}</td>
		`;
		llenarTabla.appendChild(row)
	}

}


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
	document.querySelector('#idUsuario').value = "";
	document.querySelector("#formPrestamo").reset();
	$('#modalFormPrestamos').modal('show');
}

function openModalListC() {
	$('#modalListClientes').modal('show');
}