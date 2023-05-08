<?php
	$getListBannerResults = getListBanner($conn,$lang,$page);
	// echo "<pre>"; print_r($getListBannerResults); echo "</pre>"; die;
	$banner .= '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
		<ol class="carousel-indicators">';
		
		$COUNTIndicator = 1;
		foreach ($getListBannerResults as $bannerData) {
			$banner .= '<li data-target="#carouselExampleIndicators" data-slide-to="0"';
			if($COUNTIndicator == 1) {
				$banner .= 'class="active"';
			}
			$banner .= '></li>';
			$COUNTIndicator++;
		}
		$banner .= '</ol>
		<div class="carousel-inner">';

		$COUNTHero = 1;
		foreach ($getListBannerResults as $bannerData) {
			$banner .= '<div class="carousel-item ';
			if($COUNTHero == 1) {
				$banner .= 'active';
			}
			$banner .= '">
				<img class="d-block w-100" src="'.$baseURL.'/assets/uploads/'.$bannerData['img'].'" alt="First slide">
			</div>';
			// if() {
			// 	$banner .= '<div class="carousel-caption d-none d-md-block">
			// 		<h5>...</h5>
			// 		<p>...</p>
			// 	</div>';
			// }
			$COUNTHero++;
		}

		$banner .= '</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Siguiente</span>
			</a>
		</div>';