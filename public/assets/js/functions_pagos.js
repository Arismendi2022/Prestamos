let tablePagos;

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

function fntImprimirPago(){

}



function openModal() {
	document.querySelector("#formPagos").reset();
	$('#modalFormPagos').modal('show');
}
