// Función para alertas
function alerta(titulo, msg, icono) {
	Swal.fire({
		icon: icono,
		title: titulo,
		text: msg,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Aceptar'
	})
}

function validar(titulo, msg, icono) {
	Swal.fire({
		icon: icono,
		title: titulo,
		text: msg,
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: "Si, eliminar!",
		cancelButtonText: "No, cancelar!",
	}).then((result) => {
		if (result.isConfirmed) {

			return true;
		}
	});
}
