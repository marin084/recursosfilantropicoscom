<?php
	$listaMarcas.='<select class="form-control" name="marca" id="marca">';
		// $listaMarcas.='<option value="NULL">-- Seleccione una de las siguientes opciones --</option>';
		$getMarcasListResults = getMarcasList($conn,$lang);
		foreach ($getMarcasListResults as $value) {
			$listaMarcas.='<option value="'.$value['titulo'].'">'.strtoupper($value['titulo']).'</option>';
		}
	$listaMarcas.='</select>';