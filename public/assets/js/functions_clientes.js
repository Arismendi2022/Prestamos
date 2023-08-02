let tableClientes;

document.addEventListener('DOMContentLoaded', function () {
	tableClientes = $('#tableClientes').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"ajax": {
			"url": " " + base_url + "/Clientes/getClientes",
			"dataSrc": ""
		},
		"columns": [
			{"data": "idcliente"},
			{"data": "identificacion"},
			{"data": "nombres"},
			{"data": "apellidos"},
			{"data": "email"},
			{"data": "telefono"},
			{"data": "options"}
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

	if (document.querySelector("#formCliente")) {
		let formCliente = document.querySelector("#formCliente");
		formCliente.onsubmit = function (e) {
			e.preventDefault();
			let strIdentificacion = document.querySelector('#txtIdentificacion').value;
			let strNombre = document.querySelector('#txtNombre').value;
			let strApellido = document.querySelector('#txtApellido').value;
			let intGenero = document.querySelector('#listStatus').value;
			let strEmail = document.querySelector('#txtEmail').value;
			let intTelefono = document.querySelector('#txtTelefono').value;
			let strDirFiscal = document.querySelector('#txtDirFiscal').value;
			let strCiudad = document.querySelector('#txtCiudad').value;

			if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || strDirFiscal == '') {
				alerta("Atención", "Todos los campos son obligatorios.", "error");
				return false;
			}

			let elementsValid = document.getElementsByClassName("valid");
			for (let i = 0; i < elementsValid.length; i++) {
				if (elementsValid[i].classList.contains('is-invalid')) {
					alerta("Atención", "Por favor verifique los campos en rojo.", "error");
					return false;
				}
			}
			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + '/Clientes/setCliente';
			let formData = new FormData(formCliente);
			request.open("POST", ajaxUrl, true);
			request.send(formData);
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						$('#modalFormCliente').modal("hide");
						formCliente.reset();
						alerta("Clientes", objData.msg, "success");
						tableClientes.api().ajax.reload();
					} else {
						alerta("Error", objData.msg, "error");
					}
				}
				return false;
			}
		}
	}

});
/* Ver cliente */
function fntViewInfo(idcliente) {
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Clientes/getCliente/' + idcliente;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			if (objData.status) {

				document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
				document.querySelector("#celNombre").innerHTML = objData.data.nombres;
				document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
				document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
				document.querySelector("#celEmail").innerHTML = objData.data.email;
				document.querySelector("#celDirFiscal").innerHTML = objData.data.direccion;
				document.querySelector("#celCiudad").innerHTML = objData.data.ciudad;
				document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
				$('#modalViewCliente').modal('show');
			} else {
				alerta("Error", objData.msg, "error");
			}
		}
	}}
/* editar cliente */
function fntEditInfo(element, idcliente) {
	rowTable = element.parentNode.parentNode.parentNode;
	document.querySelector('#titleModal').innerHTML = "Actualizar Cliente";
	document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
	document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
	document.querySelector('#btnText').innerHTML = "Actualizar";
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Clientes/getCliente/' + idcliente;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {

		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			if (objData.status) {
				document.querySelector("#idUsuario").value = objData.data.idcliente;
				document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
				document.querySelector("#txtNombre").value = objData.data.nombres;
				document.querySelector("#txtApellido").value = objData.data.apellidos;
				document.querySelector("#txtTelefono").value = objData.data.telefono;
				document.querySelector("#txtEmail").value = objData.data.email;
				document.querySelector("#txtDirFiscal").value = objData.data.direccion;
				document.querySelector("#txtCiudad").value = objData.data.ciudad;

				if(objData.data.genero == 1){
					document.querySelector("#listStatus").value = 1;
				}else{
					document.querySelector("#listStatus").value = 2;
				}
				$('#listStatus').select2();
			}
		}
		$('#modalFormCliente').modal('show');
	}
}
/* Eliminar cliente */
function fntDelInfo(idcliente) {
	confirmarBorrado("Eliminar Cliente", "¿Realmente quiere eliminar el cliente?", "warning").then((borrar) => {
		if (borrar) {
			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + '/Clientes/delCliente';
			let strData = "idUsuario=" + idcliente;
			request.open("POST", ajaxUrl, true);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send(strData);
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						alerta("Eliminar!", objData.msg, "success");
						tableClientes.api().ajax.reload();
					} else {
						alerta("Atención!", objData.msg, "error");
					}
				}
			}
		}

	});
}
/* Modal formulario clientes */
function openModal() {
	document.querySelector('#idUsuario').value = "";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo Cliente";
	document.querySelector("#formCliente").reset();
	$('#modalFormCliente').modal('show');
	$('#listStatus').select2();
}