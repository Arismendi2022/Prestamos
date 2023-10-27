let tableUsuarios;
let rowTable;

document.addEventListener('DOMContentLoaded', function () {
	tableUsuarios = $('#tableUsuarios').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"ajax": {
			"url": " " + base_url + "/Usuarios/getUsuarios",
			"dataSrc": ""
		},
		"columns": [
			{"data": "idusuario"},
			{"data": "nombres"},
			{"data": "apellidos"},
			{"data": "email_user"},
			{"data": "telefono"},
			{"data": "nombrerol"},
			{"data": "estado"},
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
	
	if (document.querySelector("#formUsuario")) {
		let formUsuario = document.querySelector("#formUsuario");
		formUsuario.onsubmit = function (e) {
			e.preventDefault();
			let strIdentificacion = document.querySelector('#txtIdentificacion').value;
			let strNombre = document.querySelector('#txtNombre').value;
			let strApellido = document.querySelector('#txtApellido').value;
			let strEmail = document.querySelector('#txtEmail').value;
			let strDireccion = document.querySelector('#txtDireccion').value;
			let strTelefono = document.querySelector('#txtTelefono').value;
			let intTipousuario = document.querySelector('#listRolid').value;
			let strPassword = document.querySelector('#txtPassword').value;
			let intStatus = document.querySelector('#listStatus').value;
			
			if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || strDireccion == '' || strTelefono == '' || intTipousuario == '') {
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
			let ajaxUrl = base_url + '/Usuarios/setUsuario';
			let formData = new FormData(formUsuario);
			request.open("POST", ajaxUrl, true);
			request.send(formData);
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						
						$('#modalFormUsuario').modal("hide");
						formUsuario.reset();
						alerta("Usuarios", objData.msg, "success");
						tableUsuarios.api().ajax.reload();
					} else {
						alerta("Error", objData.msg, "error");
					}
				}
			}
		}
	}
});
/** Actualizar Perfil **/
if (document.querySelector("#formPerfil")) {
	let formPerfil = document.querySelector("#formPerfil");
	formPerfil.onsubmit = function (e) {
		e.preventDefault();
		let strIdentificacion = document.querySelector('#txtIdentificacion').value;
		let strNombre = document.querySelector('#txtNombre').value;
		let strApellido = document.querySelector('#txtApellido').value;
		let strTelefono = document.querySelector('#txtTelefono').value;
		let strPassword = document.querySelector('#txtPassword').value;
		let strPasswordConfirm = document.querySelector('#txtPasswordConfirm').value;
		
		if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strTelefono == '') {
			alerta("Atención", "Todos los campos son obligatorios.", "error");
			return false;
		}
		
		if (strPassword != "" || strPasswordConfirm != "") {
			if (strPassword != strPasswordConfirm) {
				alerta("Atención", "Las contraseñas no son iguales.", "info");
				return false;
			}
			if (strPassword.length < 5) {
				alerta("Atención", "La contraseña debe tener un mínimo de 5 caracteres.", "info");
				return false;
			}
		}
		
		let elementsValid = document.getElementsByClassName("valid");
		for (let i = 0; i < elementsValid.length; i++) {
			if (elementsValid[i].classList.contains('is-invalid')) {
				alerta("Atención", "Por favor verifique los campos en rojo.", "error");
				return false;
			}
		}
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + '/Usuarios/putPerfil';
		let formData = new FormData(formPerfil);
		request.open("POST", ajaxUrl, true);
		request.send(formData);
		request.onreadystatechange = function () {
			if (request.readyState != 4) return;
			if (request.status == 200) {
				let objData = JSON.parse(request.responseText);
				if (objData.status) {
					$('#modalFormPerfil').modal("hide");
					swal.fire({
						title: "",
						text: objData.msg,
						icon: "success",
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Aceptar',
						closeOnConfirm: false,
					}).then((result) => {
						if (result.isConfirmed) {
							location.reload();
						}
					});
				} else {
					alerta("Error", objData.msg, "error");
				}
			}
			return false;
		}
	}
}

/** Actualizar Datos Fiscales **/
if (document.querySelector("#formDataFiscal")) {
	let formDataFiscal = document.querySelector("#formDataFiscal");
	formDataFiscal.onsubmit = function (e) {
		e.preventDefault();
		let strNit = document.querySelector('#txtNit').value;
		let strNombreFiscal = document.querySelector('#txtNombreFiscal').value;
		let strDirFiscal = document.querySelector('#txtDirFiscal').value;
		
		if (strNit == '' || strNombreFiscal == '' || strDirFiscal == '') {
			alerta("Atención", "Todos los campos son obligatorios.", "error");
			return false;
		}
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + '/Usuarios/putDFical';
		let formData = new FormData(formDataFiscal);
		request.open("POST", ajaxUrl, true);
		request.send(formData);
		request.onreadystatechange = function () {
			if (request.readyState != 4) return;
			if (request.status == 200) {
				let objData = JSON.parse(request.responseText);
				if (objData.status) {
					$('#modalFormPerfil').modal("hide");
					swal.fire({
						title: "",
						text: objData.msg,
						icon: "success",
						confirmButtonColor: '#3085d6',
						confirmButtonText: "Aceptar",
						closeOnConfirm: false,
					}, function (isConfirm) {
						if (isConfirm) {
							location.reload();
						}
					});
				} else {
					alerta("Error", objData.msg, "error");
				}
			}
			return false;
		}
	}
}

window.addEventListener("load", function () {
	fntRolesUsuario();
}, false);

function fntRolesUsuario() {
	if (document.querySelector('#listRolid')) {
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let ajaxUrl = base_url + '/Roles/getSelectRoles';
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				document.querySelector('#listRolid').innerHTML = request.responseText;
				$('#listRolid').select2();
			}
		}
	}
}

/** Ver Usuarios */
function fntViewUsuario(idusuario) {
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Usuarios/getUsuario/' + idusuario;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			
			if (objData.status) {
				let estadoUsuario = objData.data.estado == 1 ?
					'<span class="badge badge-success">Activo</span>' :
					'<span class="badge badge-danger">Inactivo</span>';
				
				document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacion;
				document.querySelector("#celNombre").innerHTML = objData.data.nombres;
				document.querySelector("#celApellido").innerHTML = objData.data.apellidos;
				document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
				document.querySelector("#celEmail").innerHTML = objData.data.email_user;
				document.querySelector("#celTipoUsuario").innerHTML = objData.data.nombrerol;
				document.querySelector("#celEstado").innerHTML = estadoUsuario;
				document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
				$('#modalViewUser').modal('show');
			} else {
				alerta("Error", objData.msg, "error");
			}
		}
	}
}

/** Editar Usuarios */
function fntEditUsuario(element, idusuario) {
	rowTable = element.parentNode.parentNode.parentNode;
	document.querySelector('#titleModal').innerHTML = "Actualizar Usuario";
	document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
	document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
	document.querySelector('#btnText').innerHTML = "Actualizar";
	let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	let ajaxUrl = base_url + '/Usuarios/getUsuario/' + idusuario;
	request.open("GET", ajaxUrl, true);
	request.send();
	request.onreadystatechange = function () {
		
		if (request.readyState == 4 && request.status == 200) {
			let objData = JSON.parse(request.responseText);
			
			if (objData.status) {
				document.querySelector("#idUsuario").value = objData.data.idusuario;
				document.querySelector("#txtIdentificacion").value = objData.data.identificacion;
				document.querySelector("#txtNombre").value = objData.data.nombres;
				document.querySelector("#txtApellido").value = objData.data.apellidos;
				document.querySelector("#txtDireccion").value = objData.data.direccion;
				document.querySelector("#txtTelefono").value = objData.data.telefono;
				document.querySelector("#txtEmail").value = objData.data.email_user;
				document.querySelector("#listRolid").value = objData.data.idrol;
				$('#listRolid').select2();
				
				if (objData.data.estado == 1) {
					document.querySelector("#listStatus").value = 1;
				} else {
					document.querySelector("#listStatus").value = 2;
				}
				$('#listStatus').select2();
			}
		}
		
		$('#modalFormUsuario').modal('show');
	}
}

/** Eliminar Usuarios */
function fntDelUsuario(idusuario) {
	confirmarBorrado("Eliminar Usuario", "¿Realmente quiere eliminar el Usuario?", "warning").then((borrar) => {
		if (borrar) {
			const request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + '/Usuarios/delUsuario';
			let strData = "idUsuario=" + idusuario;
			request.open("POST", ajaxUrl, true);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send(strData);
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					const objData = JSON.parse(request.responseText);
					if (objData.status) {
						alerta("Eliminar!", objData.msg, "success");
						tableUsuarios.api().ajax.reload();
					} else {
						alerta("Atención!", objData.msg, "error");
					}
				}
			}
		}
	})
}

/* modal formularuo usuarios */
function openModal() {
	document.querySelector("#idUsuario").value = "";
	document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
	document.querySelector("#btnActionForm").classList.replace("btn-info", "btn-primary");
	document.querySelector("#btnText").innerHTML = "Guardar";
	document.querySelector("#titleModal").innerHTML = "Nuevo Usuario";
	document.querySelector("#formUsuario").reset();
	$("#modalFormUsuario").modal("show");
	$('#listRolid').select2();
	$('#listStatus').select2();
}

/* Modal formulario perfil usuarios*/
function openModalPerfil() {
	$('#modalFormPerfil').modal('show');
}

