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

function confirmarBorrado(titulo, msg, icono) {
	return Swal.fire({
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
			return true;  // Devuelve true si se confirma el borrado
		} else {
			return false; // Devuelve false si se cancela el borrado
		}
	});
}

