<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

	if (!isset($_POST['tipo_form'])) die ();

	require 'acceso.php';

	$timeZone = 'America/Costa_Rica';  // GMT-6
	date_default_timezone_set($timeZone);
	$hoy = date('Y-m-d H:i:s');

	$mensaje ='';

// 	print_r($_POST['tipo_form']);die;
// 	print_r($_POST);die;

	//----------------------------------------------------------------------------------------------------------------//
	//AGREGAR VENTA A BASE DE DATOS DTH
	//----------------------------------------------------------------------------------------------------------------//
	if($_POST['tipo_form'] == "contactform") {
		$nombre = isset($_POST['name']) ? $_POST['name'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
		// $lang = isset($_POST['lang']) ? $_POST['lang'] : '';
    $lang = 'es';
		$mensajeIngresado = isset($_POST['comment']) ? $_POST['comment'] : '';

		if($nombre === '' OR $email === '' OR $mensajeIngresado === '') {
			$mensaje.= '<div class="alert alert-danger alert-dismissible ed-alert" role="alert">
			<!-- .container -->
				<div class="container">
					<div class="post-heading-left">';
					if($lang == 'es') {
						$mensaje.= '<h2>Atención!!</h2>';
					}elseif($lang == 'en') {
						$mensaje.= '<h2>Attention!!</h2>';
					}
					$mensaje.= '</div>
					<!-- .row -->
					<div class="row">
						<div class="col-sm-7 margin-bottom50">';
						if($lang == 'es') {
							$mensaje.= '<p class="margin-bottom30">Todos los campos son requeridos.</p>';
						}elseif($lang == 'en') {
							$mensaje.= '<p class="margin-bottom30">All fields are required.</p>';
						}
						$mensaje.= '</div>
					</div>
				</div>
			<!-- .container end -->
			</div>';

			$_SESSION['mensaje_error'] = $mensaje;
		}else {
			include 'modulos/sendmail.php';
			$_SESSION['mensaje_error'] = $elmensaje;
		}

    if($SEOLINKS == 1) {
      header("Location: ".$baseURL."/contacto/");
    }else {
      header("Location: ".$baseURL."/index.php?page=contacto");
    }
		exit();
	}elseif($_POST['tipo_form'] == "enviar_contactoForm") {
		$nombre = $_POST['name'];
		$correo = $_POST['email'];
		$telefono = $_POST['phone'];
		$mensaje = $_POST['message'];
		$brand = $_POST['brand'];

		include 'modulos/sendmail.php';

		echo json_encode($return);
		exit();
  }
