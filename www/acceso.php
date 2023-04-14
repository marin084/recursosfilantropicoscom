<?php
	session_start();
	require 'vendor/autoload.php';
	require '_connect/database/DBConexion.php';
	$pdo = PDOConnection::instance();
	$conn = $pdo->getConnection();

	require 'model/mdl_inicio.php';

	$getSettingsResults = getSettings($conn);

	foreach($getSettingsResults as $i => $row) {
		${$row['tipo']} = $row['valor'];
	}

	$baseURL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://'.$_SERVER['SERVER_NAME'] : 'http://'.$_SERVER['SERVER_NAME'];
	$urlAfter = "$_SERVER[REQUEST_URI]";


	$loader = new Twig_Loader_Filesystem('views');
	$twig = new Twig_Environment($loader, array(
		// 'cache' => 'views/cache'
	));

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {$ip = $_SERVER['HTTP_CLIENT_IP'];} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} else {$ip = $_SERVER['REMOTE_ADDR'];}
	$_SESSION["ip"] = $ip;

	$timeZone = 'America/Costa_Rica';	// GMT-6
	date_default_timezone_set($timeZone);
	$hoy = date('Y-m-d H:i:s');

	//INICIALIZAR VARIABLES
	//META DATOS
	$titulo = '';
	$ogTags = '';
	$metatitle = '';
	$metadescription = '';

	//
	$marcas ='';
	$listaMarcas = '';
	$elementosMenu ='';
	$banner ='';
	$features ='';
	$videos ='';
	$videosHome = '';
	$blog = '';
	$blogHome = '';
	$testimonios = '';
	$frases = '';
	$bannerIndividual = '';
	$redesSocialesIdioma = '';
	$profesionales ='';
	$profesionalesHome ='';
	$antes_y_despues = '';
	$clientes ='';
	$totalclientes = '';
	$registros = '';
	$contenidos ='';
	$mensaje ='';
	$tituloSeccion ='';
	$scriptExtraTop ='';
	$scriptExtraBottom ='';
	$hiddenform ='';
	$name ='';
	$lastname ='';
	$email ='';
	$header ='';
	$tpl = '';
	$idioma = '';
	$categorias = '';
	$servicios = '';
	$galeria = '';
	$faq = '';
	$trips = '';
