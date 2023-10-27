let tableCapital;

/** muestra listado del capital en DataTable */
document.addEventListener('DOMContentLoaded', function () {
	tableCapital = $('#tableCapital').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"ajax": {
			"url": " " + base_url + "/empresa/getCapital",
			"dataSrc": ""
		},
		"columns": [
			{"data": "idcapital"},
			{"data": "fecha"},
			{"data": "capital"},
			{"data": "cuenta"},
			{"data": "descripcion"},
			{"data": "options"}
		],
		"columnDefs": [
			{'className': "textcenter", "targets": [0]},
			{'className': "textcenter", "targets": [1]},
			{'className': "textright", "targets": [2]},
			{'className': "textcenter", "targets": [3]}
		],
		"resonsieve": "true",
		"bDestroy": true,
		//"ordering": false,
		"searching": false,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]
	});
	recalcularCapital()
	
})

/** agrega capital */
if (document.querySelector("#formCapital")) {
	let formCapital = document.querySelector("#formCapital");
	formCapital.onsubmit = function (e) {
		e.preventDefault();
		
		const intIdCapital = document.querySelector('#idCapital').value;
		const strFecha = document.querySelector('#txtFecha').value;
		const intMonto = document.querySelector('#txtMonto').value;
		const strDescripcion = document.querySelector('#txtDescripcion').value;
		const strCuentas = document.querySelector('#listCuentas').value;
		if (strFecha == '' || intMonto == '' || strDescripcion == '' || strCuentas == '') {
			alerta("Atención", "Todos los campos son obligatorios.", "error");
			return false;
		}
		const request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		const ajaxUrl = base_url + '/empresa/setCapital';
		const formData = new FormData(formCapital);
		request.open("POST", ajaxUrl, true);
		request.send(formData);
		request.onreadystatechange = function () {
			if (request.readyState === 4 && request.status === 200) {
				const objData = JSON.parse(request.responseText);
				if (objData.status) {
					$('#modalFormCapital').modal("hide");
					formCapital.reset();
					alerta("Capital", objData.msg, "success");
					tableCapital.api().ajax.reload();
					recalcularCapital()
				} else {
					alerta("Error", objData.msg, "error");
				}
			}
		}
	}
}

/** editar capital */
function fntEditCapital(idcapital) {
	document.querySelector('#titleModal').innerHTML = "Actualizar Capital";
	document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
	document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
	document.querySelector('#btnText').innerHTML = "Actualizar";
	
	var idcapital = idcapital;
	const request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	const ajaxUrl = base_url + '/empresa/getEditCapital/' + idcapital;
	request.open("GET", ajaxUrl, true);
	request.send();
	
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			
			const objData = JSON.parse(request.responseText);
			if (objData.status) {
				document.querySelector("#idCapital").value = objData.data.idcapital;
				document.querySelector("#txtFecha").value = objData.data.fecha;
				document.querySelector("#txtMonto").value = objData.data.capital;
				document.querySelector("#txtDescripcion").value = objData.data.descripcion;
				document.querySelector("#listCuentas").value = objData.data.cuenta;
				$('#listCuentas').select2();
			}
		}
		$("#modalFormCapital").modal("show");
	}
}

/** borrar capital */
function fntDelCapital(idcapital) {
	confirmarBorrado("Eliminar capital", "¿Realmente quiere eliminar capital?", "warning").then((borrar) => {
		if (borrar) {
			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + '/empresa/delCapital';
			let strData = "idCapital=" + idcapital;
			request.open("POST", ajaxUrl, true);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send(strData);
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						alerta("Eliminar!", objData.msg, "success");
						tableCapital.api().ajax.reload();
						recalcularCapital()
					} else {
						alerta("Atención!", objData.msg, "error");
					}
				}
			}
		}
	})
}

/** llama al modal capital */
function openModal() {
	document.querySelector("#idCapital").value = "";
	document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
	document.querySelector("#btnActionForm").classList.replace("btn-info", "btn-primary");
	document.querySelector("#btnText").innerHTML = "Guardar";
	document.querySelector("#titleModal").innerHTML = "Agregar Capital";
	
	document.querySelector("#formCapital").reset();
	$('#listCuentas').select2();
	$('#modalFormCapital').modal('show');
}

/** calcula el total del capital a la fecha */
function recalcularCapital() {
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/empresa/getPatrimonio';
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			
			if (objData.status) {
				let totalCapital = objData.data.total
				
				$("#totalCapital").html(totalCapital);
			}
		}
	}
	
}
