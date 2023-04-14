<?php
	$elementosMenu .= '<div class="header-block order-12">
		<a href="#" class="btn btn-link btn-icon header-btn float-right d-lg-none" data-toggle="off-canvas" data-target=".navbar-main" data-settings=\'{"cloneTarget":true, "targetClassExtras": "navbar-offcanvas"}\'>
			<i class="fa fa-bars"></i>
		</a>
	</div>';
	$elementosMenu.= '<div class="navbar navbar-expand-md navbar-static-top">
            <div class="navbar-main collapse">
              <ul class="nav navbar-nav navbar-nav-stretch float-lg-right dropdown-effect-fade">';
			$getContenidosResults = getMenu($conn, $lang);
			foreach ($getContenidosResults as $value) {
				$elementosMenu .= '<li class="nav-item">';
				if($multilenguaje == 1) {
					$elementosMenu.='<a href="'. $baseURL.'/'.$lang.'/'.$value['aliasTraduccion']. '/" data-toggle="scroll-link" class="nav-link ';
				}else {
					$elementosMenu.='<a href="'.$baseURL.'/'.$value['aliasTraduccion']. '/" data-toggle="scroll-link" class="nav-link ';
				}
				if($page === $value['aliasTraduccion']) {
					$elementosMenu.='active';
				}
				$elementosMenu.='">
				'. $value['traduccion'] . '</a> </li>';
			}
              $elementosMenu.= '</ul>
            </div>
          </div>';
	
	
	
	// <nav class="main-nav navbar navbar-expand-md" role="navigation">
	// 	<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
	// 		<span class="toggle-title">Menu</span>
	// 		<span class="navbar-toggler-icon"></span>
	// 	</button> 
	// 	<div id="navbar-collapse" class="navbar-collapse collapse justify-content-center bgblack">
	// 		<ul class="nav navbar-nav">';
	// 		$getContenidosResults = getMenu($conn,$lang);
	// 		foreach ($getContenidosResults as $value) {
	// 			$elementosMenu.='<li class="nav-item">';
	// 			if($multilenguaje == 1) {
	// 				$elementosMenu.='<a href="/'.$lang.'/'.$value['aliasTraduccion'].'/" class="nav-link ';
	// 			}else {
	// 				$elementosMenu.='<a href="/'.$value['aliasTraduccion'].'/" class="nav-link ';
	// 			}
	// 					if($page === $value['aliasTraduccion']) {
	// 						$elementosMenu.='active';
	// 					}
	// 					$elementosMenu.='">
	// 					'.$value['traduccion'].'
	// 				</a>
	// 			</li>';
	// 		}
	// 		$elementosMenu.='</ul>
	// 	</div>
	// </nav>';