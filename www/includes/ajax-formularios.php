<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// print_r($_POST);die;
    require 'acceso.php';

    $timeZone = 'America/Costa_Rica';  // GMT-6
	date_default_timezone_set($timeZone);
	$hoy = date('Y-m-d H:i:s');

	if($_POST['funcion'] == 'enviarFormContacto') {
        $nombre = $_POST['name'];
        $email = $_POST['email'];
        $asunto = $_POST['subject'];
        $mensaje = $_POST['message'];

        include 'modulos/sendmail.php';

		$return['titulo'] = 'Gracias por contactarnos.';
        $return['mensaje'] = 'El mensaje fue enviado y uno de nuestros agentes de servicio al cliente te contactará lo mas pronto posible!';
        $return['status'] = 'success';

        echo json_encode($return);
        exit();
	}
	
	// elseif($_POST['funcion'] == 'guardarTestimonio') {
	// 	// echo "entró";die;
	// 	$insertTestimonioResults = insertTestimonio($conn,$_POST['fullname'],$_POST['testimonio']);

	// 	if($insertTestimonioResults['status'] === 'success'){
	// 		$return['titulo'] = 'Bendiciones '.$_POST['fullname'];
	// 	}else {
	// 		$return['titulo'] = 'Parece que hubo un error.';
	// 	}

	// 	$return['mensaje'] = $insertTestimonioResults['mensaje'];
	// 	$return['status'] = $insertTestimonioResults['status'];

	// 	echo json_encode($return);
	// 	exit();
	// }