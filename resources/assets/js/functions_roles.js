let tableRoles;
document.addEventListener('DOMContentLoaded', function () {
	tableRoles = $('#tableRoles').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"ajax": {
			"url": " " + base_url + "roles/getRoles",
			"dataSrc": ""
		},
		"columns": [
			{"data": "idrol"},
			{"data": "nombrerol"},
			{"data": "descripcion"},
			{"data": "estado"},
			{"data": "options"}
		],
		"resonsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order": [[0, "desc"]]
	});

	//Nuevo Rol
	var formRol = document.querySelector("#formRol");
	formRol.onsubmit = function (e) {
		e.preventDefault();

		//const intIdRol = document.querySelector('#idRol').value;
		const strNombre = document.querySelector('#txtNombre').value;
		const strDescripcion = document.querySelector('#txtDescripcion').value;
		const intStatus = document.querySelector('#listStatus').value;
		if (strNombre == '' || strDescripcion == '' || intStatus == '') {
			alerta("Atención", "Todos los campos son obligatorios.", "error");
			return false;
		}
		const request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		const ajaxUrl = base_url + 'roles/setRol';
		const formData = new FormData(formRol);
		request.open("POST", ajaxUrl, true);
		request.send(formData);
		request.onreadystatechange = function () {
			if (request.readyState === 4 && request.status === 200) {

				const objData = JSON.parse(request.responseText);
				if (objData.status) {
					$('#modalFormRol').modal("hide");
					formRol.reset();
					alerta("Roles de usuario", objData.msg, "success");
					tableRoles.api().ajax.reload();
				} else {
					alerta("Error", objData.msg, "error");
				}
			}
		}

	}

});

function openModal() {
	$('#modalFormRol').modal('show');
}

function openModal() {
	document.querySelector("#idRol").value = "";
	document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
	document.querySelector("#btnActionForm").classList.replace("btn-info", "btn-primary");
	document.querySelector("#btnText").innerHTML = "Guardar";
	document.querySelector("#titleModal").innerHTML = "Nuevo Rol";
	document.querySelector("#formRol").reset();
	$('#modalFormRol').modal('show');
}

window.addEventListener('load', function() {
}, false);

// evento click para boton editar rol
function fntEditRol(idrol) {
	document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
	document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
	document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
	document.querySelector('#btnText').innerHTML = "Actualizar";

	var idrol = idrol;
	const request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	const ajaxUrl = base_url + 'Roles/getRol/' + idrol;
	request.open("GET", ajaxUrl, true);
	request.send();

	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {

			const objData = JSON.parse(request.responseText);
			if (objData.status) {
				document.querySelector("#idRol").value = objData.data.idrol;
				document.querySelector("#txtNombre").value = objData.data.nombrerol;
				document.querySelector("#txtDescripcion").value = objData.data.descripcion;

				if (objData.data.estado == 1) {
					var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
				} else {
					var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
				}
				let htmlSelect = `${optionSelect}
																		<option value="1">Activo</option>
																		<option value="2">Inactivo</option>
																	`;
				document.querySelector("#listStatus").innerHTML = htmlSelect;
				$("#modalFormRol").modal("show");
			} else {
				alerta("Error", objData.msg, "error");
			}
		}
	}
}
