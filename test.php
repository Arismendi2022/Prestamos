<?php
	function removePhoneNumber($phoneNumber) {
		// Eliminar guiones
		$phoneNumber = str_replace('-', '', $phoneNumber);
		
		return $phoneNumber;
	}

// Ejemplo de uso
	$phoneNumber = "350-847-3267";
	$formattedNumber = removePhoneNumber($phoneNumber);
	echo $formattedNumber;  // Salida: 1234567890
