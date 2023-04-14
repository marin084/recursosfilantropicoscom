<?php
	$getContenidosResults = getContenidos($conn,$lang,$page);

	if($getContenidosResults['status'] == 'SUCCESS') {
		// echo "<pre>"; print_r($getContenidosResults); echo "</pre>"; die;
		$titulo.= $getContenidosResults[0]['metatitle'];
		$metatitle.= $getContenidosResults[0]['metatitle'];
		$metadescription.= $getContenidosResults[0]['metadescription'];
		$metaimagen = $getContenidosResults[0]['metaimage'];
		$tpl = $getContenidosResults[0]['archivo'];

		$ogTags.='<meta property="fb:app_id" content="1196127573829477" />';
		$ogTags.='<meta property="og:type" content="website" />';

		if($page == 'contacto') {
			$contenidos.=$mensaje;
		}

		$contenidos.= $getContenidosResults[0]['contenido'];

		$ogTags.='<meta property="og:title" content="'.$metatitle.'" />';
		$ogTags.='<meta property="og:description" content="'.$metadescription.'" />';
		$ogTags.='<meta property="og:url" content="'.$baseURL.$urlAfter.'" />';
		$ogTags.='<meta property="og:image" content="'.$baseURL.'/assets/images/'.$metaimagen.'" />';
	}else {
		if($SEOLINKS == 1) {
			if($multilenguaje == 1) {
				header("Location: /".$lang."/404/");
			}else {
				header("Location: /404/");
			}
		}else {
			if($multilenguaje == 1) {
				header("Location: /index.php?lang=".$lang."page=404");
			}else {
				header("Location: /index.php?page=404");
			}
		}
	}
