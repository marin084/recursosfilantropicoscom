<?php
	$REQUEST_URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$URL_OF_CURRENT_PAGE = "http://$_SERVER[HTTP_HOST]".dirname($_SERVER["PHP_SELF"])."/".basename(__FILE__);

	$user_ip = getenv('REMOTE_ADDR');
	$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
	$country = $geo["geoplugin_countryName"];
	$city = $geo["geoplugin_city"];

	if ($REQUEST_URL == $URL_OF_CURRENT_PAGE ) die ("Direct access not premitted");

	require './vendor/autoload.php';
	use Mailgun\Mailgun;

	$mg = new Mailgun('key-5813b6af26f84f3f055f6d83f6be0564');

	// $mgClient = new Mailgun('key-5813b6af26f84f3f055f6d83f6be0564');
	$domain = "mg.paramcr.com";

	$cuerpo ='<html class="js no-touch cssanimations csstransitions">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="robots" content="index, follow">
			<title>Mensaje de contacto | Cirugias y Hernias</title>
		</head>
		<body style="">
			<section class="slice">
				<!-- Invoice wrapper -->
				<div id="invoice" class="new">

					<div class="this-is">
						<strong>Notificación de mensaje enviado desde la página web</strong>
					</div>

					<section class="invoice-financials">
						<br>
						<div class="invoice-notes">
							<h2>Recibimos el siguiente mensaje proveniente del <em><u>Formulario de Contacto</u></em>:</h2>
							<p>'.$mensaje.'</p>
						</div>
					</section>

					<section id="parties">
						<div>
							<h2>Datos del remitente:</h2>
						</div>
					</section>
					<section id="parties">
						<div class="invoice-to">
							<div id="hcard-Hiram-Roth" class="vcard">
								<div><b>Nombre:</b> '.$nombre.'</div>
								<div><b>Email:</b> '.$email.'</div>
								<div><b>Asunto:</b> '.$asunto.'</div>
							</div>
						</div>

						<div class="invoice-status">
							<div id="hcard-Admiral-Valdore" class="vcard">
						</div>
					</section>

					<footer>
						<p align="center">Fecha de envio: '.$hoy.'<br>
						IP: '.$_SESSION["ip"].' Pais: '.$country.' | Ciudad: '.$city.'
						<br>Powered by <a href="http://paramcr.com">Param</a></p>
					</footer>
				</div>
			</section>
		</body>
	</html>';

	$result = $mg->sendMessage("$domain",
  	array('from'		=>	'Notificaciones Cirugias y Hernias <no-reply@CirugiasyHernias.com>',
          'to'			=>	$toContacto,
          'subject'		=>	'NOTIFICACIÓN Cirugias y Hernias',
          'html'		=>	$cuerpo
	));