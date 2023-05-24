let tableUsuarios;
document.addEventListener('DOMContentLoaded', function () {

	tableUsuarios = $('#tableUsuarios').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
		},
		"ajax":{
			"url": " "+base_url+"/Usuarios/getUsuarios",
			"dataSrc":""
		},
		"columns":[
			{"data":"idpersona"},
			{"data":"nombres"},
			{"data":"apellidos"},
			{"data":"email_user"},
			{"data":"telefono"},
			{"data":"nombrerol"},
			{"data":"estado"},
			{"data":"options"}
		],
		'dom': 'lBfrtip',
		'buttons': [
			{
				"extend": "copyHtml5",
				"text": "<i class='far fa-copy'></i> Copiar",
				"titleAttr":"Copiar",
				"className": "btn btn-secondary"
			},{
				"extend": "excelHtml5",
				"text": "<i class='fas fa-file-excel'></i> Excel",
				"titleAttr":"Esportar a Excel",
				"className": "btn btn-success"
			},{
				"extend": "pdfHtml5",
				"text": "<i class='fas fa-file-pdf'></i> PDF",
				"titleAttr":"Esportar a PDF",
				"className": "btn btn-danger"
			},{
				"extend": "csvHtml5",
				"text": "<i class='fas fa-file-csv'></i> CSV",
				"titleAttr":"Esportar a CSV",
				"className": "btn btn-info"
			}
		],
		"resonsieve":"true",
		"bDestroy": true,
		"iDisplayLength": 10,
		"order":[[0,"desc"]]
	});

	let formUsuario = document.querySelector("#formUsuario");
	formUsuario.onsubmit = function (e) {
		e.preventDefault();
		let strIdentificacion = document.querySelector('#txtIdentificacion').value;
		let strNombre = document.querySelector('#txtNombre').value;
		let strApellido = document.querySelector('#txtApellido').value;
		let strEmail = document.querySelector('#txtEmail').value;
		let intTelefono = document.querySelector('#txtTelefono').value;
		let intTipousuario = document.querySelector('#listRolid').value;
		let strPassword = document.querySelector('#txtPassword').value;
		let intStatus = document.querySelector('#listStatus').value;

		if (strIdentificacion == '' || strApellido == '' || strNombre == '' || strEmail == '' || intTelefono == '' || intTipousuario == '') {
			alerta("Atención", "Todos los campos son obligatorios.", "error");
			return false;
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
					tableUsuarios.api().ajax.reload(function () {
					});
				} else {
					alerta("Error", objData.msg, "error");
				}
			}
		}
	}
});


window.addEventListener("load", function () {
	fntRolesUsuario();
}, false);

function fntRolesUsuario() {
	if (document.querySelector('#listRolid')) {
		let ajaxUrl = base_url + '/Roles/getSelectRoles';
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		request.open("GET", ajaxUrl, true);
		request.send();
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				document.querySelector('#listRolid').innerHTML = request.responseText;
				$('#listRolid').selectpicker('render');
			}
		}
	}
}

function openModal() {
	document.querySelector("#idUsuario").value = "";
	document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
	document.querySelector("#btnActionForm").classList.replace("btn-info", "btn-primary");
	document.querySelector("#btnText").innerHTML = "Guardar";
	document.querySelector("#titleModal").innerHTML = "Nuevo Usuario";
	document.querySelector("#formUsuario").reset();
	$("#modalFormUsuario").modal("show");
}