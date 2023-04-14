<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	require 'acceso.php';

	if($SEOLINKS == 1) {
		// echo "SI usa SEOLINKS";
		$urlChunks = explode('/', $urlAfter);
		// echo "<pre>";
		// print_r($urlChunks);
		// echo "</pre>";
		if($multilenguaje == 1) {
			//echo "SI usa SEOLINKS y multilenguaje";
			$lang = $urlChunks['1'];
			$page = $urlChunks['2'];
			$extra = (isset($urlChunks['3'])) ? $urlChunks['3']: '';
			$gallery = (isset($urlChunks['4'])) ? $urlChunks['4']: '';
		}else {
			// echo "SI usa SEOLINKS pero NO multilenguaje";die;
			$lang = $langDefault;
			$page = $urlChunks['1'];
			$extra = (isset($urlChunks['2'])) ? $urlChunks['2']: '';
			$gallery = (isset($urlChunks['3'])) ? $urlChunks['3']: '';
		}
	}else {
		// echo "NO usa SEOLINKS";
		$page =(isset($_GET['page'])) ? $_GET['page']: 'inicio';
		$extra =(isset($_GET['marca'])) ? $_GET['marca']: '';
		$gallery =(isset($_GET['gallery'])) ? $_GET['gallery']: '';
		$lang =(isset($_GET['lang'])) ? $_GET['lang']: $langDefault;
	}
	
	if(isset($_SESSION['mensaje_error'])){
		$mensaje.= $_SESSION['mensaje_error'];
		unset($_SESSION['mensaje_error']);
	}else{
		$mensaje.='';
	}
	
	//FRONTCONTROLLER
	
	//SIEMPRE INCLUIR
	include 'modulos/menu.php';
	//SIEMPRE INCLUIR

	switch ($page) {
		case '404':
			include 'modulos/404.php';
		break;
		default:
			// include 'modulos/selectorIdioma.php';
			include 'modulos/banner.php';
			include 'modulos/contenidos.php';
			include 'modulos/profesionales.php';
			// include 'modulos/profesionalesHome.php';
			// include 'modulos/antes_y_despues.php';
			// include 'modulos/categoria.php';
			include 'modulos/servicios.php';
		break;
	}

	if($lang == 'es') {
		$footer = $footer;
	} else if($lang == 'en') { 
		$footer = $footer_en;
	}

	echo $twig-> render($tpl, array(
		'logo' => $logo,
		'scriptExtraTop' => $scriptExtraTop,
		'analytics' => $analytics,
		'footer' => $footer,
		'baseURL' => $baseURL,
		'menu' => $elementosMenu,
		'banner' => $banner,
		'videos' => $videos,
		'profesionales' => $profesionales,
		'contenidos' => $contenidos,
		'hiddenform' => $hiddenform,
		'scriptExtraBottom' => $scriptExtraBottom,
		'ogTags' => $ogTags,
		'metaimagen' => $metaimagen,
		'metatitle' => $metatitle,
		'metadescription' => $metadescription,
		'titulo' => $titulo,
		'idioma' => $idioma,
		'servicios' => $servicios,
	));
 