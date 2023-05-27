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

// Función para confirmar borrado
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

// Formato para numero de telefono
function formatoPhone($phoneNumber) {
// Eliminar todos los caracteres que no sean dígitos del número de teléfono
	var cleaned = $phoneNumber.toString().replace(/\D/g, '');
// Aplicar el formato de número de teléfono deseado
	var formatted = cleaned.toString().replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
	return formatted;
}

// Función para mascara de telefono
$(document).ready(function() {
	// Selecciona el campo de entrada y aplica la máscara
	$('#txtTelefono').inputmask('999-999-9999');
});

/*$(document).ready(function() {
	$('#txtTelefono').inputmask('999-999-9999', { clearMaskOnLostFocus: false });
});*/


// Funcion Menu active bar





