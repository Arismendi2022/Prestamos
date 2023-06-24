let tableListClientes;

document.addEventListener('DOMContentLoaded', function () {
	tableListClientes = $('#tableListClientes').dataTable({

		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},

		"order": [[0, "desc"]]
	});

});


function openModal() {
	$('#modalFormPrestamos').modal('show');
}

function openModalListC() {
	$('#modalListClientes').modal('show');
}