<?php
	function scanear_string($string){
		$string = trim($string);
		$string = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),$string);
		$string = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),$string);
		$string = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),$string);
		$string = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),$string);
		$string = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),$string);
		$string = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'),array('n', 'N', 'c', 'C',),$string);
		//Esta parte se encarga de eliminar cualquier caracter extraño
		$string = str_replace(array("\\", "¨", "º", "-", "~","#", "@", "|", "!", "\"","·", "$", "%", "&", "/","(", ")", "?", "'", "¡","¿", "[", "^", "`", "]","+", "}", "{", "¨", "´",">", "< ", ";", ",", ":","."),'',$string);
		//return strtoupper($string);
		return $string;
	}

	function getSettings($conn) {
		$sql ="SELECT * FROM sys_settings;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$getSettings = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($getSettings), true);
		return $return;
	}

	function getMenu($conn,$lang) {
		$sql ="SELECT id,traduccion,aliasTraduccion,orden,suborden,idPadre,esPadre,externo,url FROM view_menu WHERE `lang`='$lang' AND `status`='published' AND showMenu='1' AND idPadre='0' ORDER BY orden ASC;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$getMenu = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($getMenu), true);
		return $return;
	}

	function getMenuHijos($conn,$lang,$idPadre) {
		$sql ="SELECT * FROM view_menu WHERE `lang`='$lang' AND `showMenu`='1' AND idPadre='$idPadre' ORDER BY orden ASC;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$getMenu = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($getMenu), true);
		return $return;
	}

	function getListBanner($conn,$lang,$page) {
		$sql ="SELECT * FROM `view_banner` WHERE lang='$lang' AND `seccion`='$page' ORDER BY RAND() LIMIT 1;";
		// echo $sql;die;
		// $sql ="SELECT `titulo`,`texto`,`img`,`textbnt`,`link` FROM `view_banner` WHERE `seccion`='$page' ORDER BY RAND() Limit 1;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$getListBanner = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($getListBanner), true);
		return $return;
	}

	function getContenidos($conn,$lang,$seccion) {
		$sql ="SELECT * FROM view_contenidos WHERE `lang`='$lang' AND alias='$seccion';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$getContenidos = $statement->fetchAll(PDO::FETCH_OBJ);

		if (count($getContenidos) === 0) {
			$return['status'] = 'ERROR';
		}else {
			$return = json_decode(json_encode($getContenidos), true);
			$return['status'] = 'SUCCESS';
		}
		return $return;
	}

	function getMarcasList($conn,$lang) {
		$sql ="SELECT `id`,`titulo`,`descripcion`,`imagen`,`alias` FROM `view_marcas` WHERE `lang`='$lang' AND `status`='1';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$getMarcasList = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($getMarcasList), true);
		return $return;
	}

	function getMarcasdetalle($conn,$marca,$lang) {
		$sql ="SELECT `id`,`titulo`,`alias`,`descripcion`,`imagen`, url, facebook, instagram FROM `view_marcas` WHERE `lang`='$lang' AND `alias`='$marca';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$getServiciosdetalle = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($getServiciosdetalle), true);
		return $return;
	}

	function getMarcasImagenesListAlbums($conn,$marca) {
		$sql ="SELECT nombreAlbum As album, cover FROM view_marcas_album WHERE idmarca='$marca' AND status=1;";
		// echo $sql;die;
		$statement = $conn->prepare($sql);
		$statement->execute();
		$getMarcasImagenesList = $statement->fetchAll(PDO::FETCH_ASSOC);

		if (count($getMarcasImagenesList) === 0) {
			$return['status'] = 'ERROR';
		}else {
			$return['data'] = json_decode(json_encode($getMarcasImagenesList), true);
			$return['status'] = 'SUCCESS';
		}
		return $return;
	}

	function getMarcasImagenesList($conn,$gallery) {
		$sql ="SELECT `image`, `titulo`, `alias` FROM `view_marcas_imagenes` WHERE `nombreAlbum`='$gallery' AND `status`='1';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$getMarcasImagenesList = $statement->fetchAll(PDO::FETCH_ASSOC);

		if (count($getMarcasImagenesList) === 0) {
			$return['status'] = 'ERROR';
		}else {
			$return['data'] = json_decode(json_encode($getMarcasImagenesList), true);
			$return['status'] = 'SUCCESS';
		}
		return $return;
	}

	function listaClientes($conn,$lang,$tipoCliente,$rand,$limit) {
		$sql ="SELECT * FROM view_clientes WHERE lang='$lang'";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$listaClientes = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($listaClientes), true);
		return $return;
	}

	function listaRegistros($conn,$tipoCliente) {
		$query ="SELECT * FROM registros WHERE tipo_cliente='$tipoCliente';";
		$rs = $this->db->Execute($query);
		$data = $rs->GetArray();
		return $data;
	}

	function urlTraduccion($conn,$page,$langTraduccion) {
		$sql ="SELECT `aliasTraduccion` FROM `view_menu` WHERE `id`= (SELECT `idMenu` FROM `traducciones_menu` WHERE `alias`='$page') AND `lang`='$langTraduccion';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$urlTraduccion = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($urlTraduccion), true);
		return $return;
	}

	function getfeatures($conn,$lang) {
		$sql ="SELECT titulo,url,(SELECT filename_disk FROM directus_files WHERE id=imagen) AS imagen FROM contenidos_website WHERE position = 'features' ORDER BY orden ASC;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getVideosHome($conn,$lang) {
		$sql ="SELECT titulo, codigo_youtube, (SELECT filename_disk FROM directus_files WHERE id=thumbnail) AS imagen FROM videos WHERE status = 'Published' ORDER BY created_on DESC LIMIT 3;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getfaq($conn,$lang) {
		$sql = "SELECT pregunta, respuesta FROM faq WHERE status = 'published';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getVideo($conn,$lang,$idVideo) {
		$sql ="SELECT titulo, fecha_ingreso, detalle_del_video FROM view_videos WHERE codigo_youtube = '$idVideo';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getVideoslist($conn,$lang) {
		$sql = "SELECT titulo, codigo_youtube, fecha_ingreso, detalle_del_video FROM view_videos WHERE status = 'Published' ORDER BY fecha_ingreso DESC;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getImageneslist($conn, $lang) {
		$sql = "SELECT id, imagen, texto_alternativo FROM view_galerias;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getVideosRecomendados($conn,$lang,$extra) {
		$sql ="SELECT titulo, codigo_youtube, fecha_ingreso FROM view_videos WHERE codigo_youtube != '$extra' AND status = 'Published' ORDER BY RAND() LIMIT 3;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}
	
	function getBlogHome($conn,$lang) {
		$sql ="SELECT titulo, descripcion_corta, alias, (SELECT filename_disk FROM directus_files WHERE id=imagen) AS imagen FROM blog WHERE status = 'Published' ORDER BY created_on DESC LIMIT 3;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getBlogs($conn,$lang,$alias) {
		$sql ="SELECT titulo, autor, contenido, fecha, imagen FROM view_blog WHERE lang='$lang' AND alias = '$alias';";
		// echo $sql;die;
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}


	function getBlogsList($conn,$lang) {
		$sql ="SELECT titulo, autor, descripcion_corta, fecha, imagen, alias FROM view_blog WHERE lang='$lang' AND status = 'published' ORDER BY fecha DESC LIMIT 2;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getBlogsRecomendados($conn,$lang,$extra) {
		// $sql ="SELECT titulo, descripcion_corta, alias, (SELECT filename_disk FROM directus_files WHERE id=imagen) AS imagen FROM blog WHERE alias != '$extra' AND status = 'Published' ORDER BY RAND() LIMIT 3;";
		$sql ="SELECT titulo, descripcion_corta, alias, imagen FROM view_blog WHERE alias != '$extra' AND id IN (
		SELECT DISTINCT idBlogItem FROM view_tags_x_blogitem WHERE idTag IN (
		SELECT idTag FROM view_tags_x_blogitem WHERE idBlogItem IN (
		SELECT id FROM blog WHERE alias = '$extra'))) ORDER BY RAND() LIMIT 3;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getTestimonios($conn,$lang) {
		$sql ="SELECT nombre_testimonio, testimonio_testimonio FROM testimonios WHERE status = 'Published' ORDER BY RAND() LIMIT 4;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}
	
	function getFrases($conn,$lang) {
		$sql ="SELECT frase, (SELECT filename_disk FROM directus_files WHERE id=imagen_principal) AS imagen_principal, (SELECT filename_disk FROM directus_files WHERE id=imagen_fondo) AS imagen_fondo, autor FROM frases WHERE status = 'Published' ORDER BY created_on DESC LIMIT 1;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getProfesionales($conn,$lang) {
		$sql ="SELECT nombre,bio,cargo,imagen,alias FROM view_profesionales WHERE lang = '$lang' ORDER BY orden;";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getProfesionalesDetalle($conn, $lang, $persona)
	{
		$sql = "SELECT nombre,bio,cargo,imagen FROM view_profesionales WHERE lang = '$lang' and alias='$persona';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getProfesionalesRest($conn, $lang, $persona)
	{
		$sql = "SELECT nombre,bio,cargo,imagen FROM view_profesionales WHERE lang = '$lang' and alias !='$persona';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getTrips($conn, $lang) {
		$sql = "SELECT nombre, descripcion, descripcion_hidden, imagen FROM view_trips WHERE lang = '$lang';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function get_antes_y_despues($conn,$lang) {
		$sql ="SELECT nombre,descripcion,imagen FROM view_antes_y_despues WHERE lang='$lang';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getcategorias($conn,$lang) {
		$sql ="SELECT nombre,descripcion,imagen,alias FROM view_categorias WHERE lang='$lang';";
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getServicios($conn,$lang) {
		$sql ="SELECT nombre,contenido,preview,imagen,icon,alias FROM view_servicios WHERE lang='$lang'";
		// echo $sql;die;
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getServiciosEspecifico($conn,$lang,$servicio) {
		$sql ="SELECT nombre,contenido,imagen FROM view_servicios WHERE lang='$lang' AND alias = '$servicio';";
		// echo $sql;die;
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	function getPageOtherLang($conn,$lang,$page) {
		$sql ="SELECT alias FROM view_contenidos WHERE lang ='$lang' AND idMenu = (SELECT idMenu FROM view_contenidos WHERE alias = '$page');";
		// echo $sql;die;
		$statement = $conn->prepare($sql);
		$statement->execute();
		$featureslist = $statement->fetchAll(PDO::FETCH_OBJ);

		$return = json_decode(json_encode($featureslist), true);
		return $return;
	}

	