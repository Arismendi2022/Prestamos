
function controlTag(e) {
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8) return true;
	else if (tecla==0||tecla==9)  return true;
	patron =/[0-9\s]/;
	n = String.fromCharCode(tecla);
	return patron.test(n);
}

function testText(txtString){
	var stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/);
	if(stringText.test(txtString)){
		return true;
	}else{
		return false;
	}
}

function testEntero(intCant){
	var intCantidad = new RegExp(/^([0-9])*$/);
	if(intCantidad.test(intCant)){
		return true;
	}else{
		return false;
	}
}

function fntEmailValidate(email){
	var stringEmail = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})$/);
	if (stringEmail.test(email) == false){
		return false;
	}else{
		return true;
	}
}
// Valida texto
function fntValidText(){
	let validText = document.querySelectorAll(".validText");
	validText.forEach(function(validText) {
		validText.addEventListener('keyup', function(){
			let inputValue = this.value;
			if(!testText(inputValue)){
				this.classList.add('is-invalid');
			}else{
				this.classList.remove('is-invalid');
			}
		});
	});
}
/** Valida numeros **/
function fntValidNumber(){
	let validNumber = document.querySelectorAll(".validNumber");
	validNumber.forEach(function(validNumber) {
		validNumber.addEventListener('keyup', function(){
			let inputValue = this.value;
			if(!testEntero(inputValue)){
				this.classList.add('is-invalid');
			}else{
				this.classList.remove('is-invalid');
			}
		});
	});
}
/** Valida Email **/
function fntValidEmail(){
	let validEmail = document.querySelectorAll(".validEmail");
	validEmail.forEach(function(validEmail) {
		validEmail.addEventListener('keyup', function(){
			let inputValue = this.value;
			if(!fntEmailValidate(inputValue)){
				this.classList.add('is-invalid');
			}else{
				this.classList.remove('is-invalid');
			}
		});
	});
}
/** Carga las funciones de validación **/
window.addEventListener('load', function() {
	fntValidText();
	fntValidEmail();
	fntValidNumber();
}, false);

/** Función para alertas **/
function alerta(titulo, msg, icono) {
	Swal.fire({
		icon: icono,
		title: titulo,
		text: msg,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Aceptar'
	})
}

/** Función para confirmar borrado **/
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

/** Formato para numero de telefono **/
function formatoPhone($phoneNumber) {
// Eliminar todos los caracteres que no sean dígitos del número de teléfono
	var cleaned = $phoneNumber.toString().replace(/\D/g, '');
// Aplicar el formato de número de teléfono deseado
	var formatted = cleaned.toString().replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
	return formatted;
}

/** Función para mascara de telefono **/
$(document).ready(function() {
	// Selecciona el campo de entrada y aplica la máscara
	$('#txtTelefono').inputmask('999-999-9999');
});


/** Base nav **/
$('#myTab a').on('click', function (e) {
	e.preventDefault()
	$(this).tab('show')
});

/** funcion datetimepicker */
$('#reservaFecha').datetimepicker({
	format: 'DD/MM/YYYY'
});

/** select2 */
$(function () {
	//Initialize Select2 Elements
	 $('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	})
});

/** formatear números en JavaScript */
function formatoMillares(input) {
	const numero = input.value.replace(/\D/g, ''); // Eliminar todos los caracteres que no sean dígitos
	const numeroFormateado = new Intl.NumberFormat('es-CO').format(numero); // Aplicar formato de millares
	input.value = numeroFormateado;
}

