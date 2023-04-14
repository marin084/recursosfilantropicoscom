<?php
	if(!empty($gallery)) {
		$getMarcasdetalleResults = getMarcasdetalle($conn,$extra,$lang);

		$marcas.='<section class="single_portfolio_area section_padding_50">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
					
					<!-- Single Portfolio Title -->
						<div class="single_portfolio_title">
							<h4>'.$getMarcasdetalleResults[0]['titulo'].'</h4>
						</div>
						<div class="line"></div>
						
						<div class="single_portfolio_content">';

							$getMarcasImagenesListResults = getMarcasImagenesList($conn,$gallery);

							// echo "<pre>";
							// print_r($getMarcasImagenesListResults);
							// echo "</pre>";
							// die;

							if($getMarcasImagenesListResults['status'] === 'SUCCESS') {
								$marcas.='<div class="gallery_full_width_images_area row clearfix">';
								
								foreach ($getMarcasImagenesListResults['data'] AS $imagen) {

									$marcas.='<div class="gra single_gallery_item col-md-3 col-sm-6">
										<div class="single_gallery_content">
											<img src="/assets/img/gallery/'.$gallery.'/'.$imagen['image'].'" alt="'.$gallery.'">
											<!-- Single gallery Item hover caption -->';
											$marcas.='<a class="gallery_img" href="/assets/img/gallery/'.$gallery.'/'.$imagen['image'].'">';
											$marcas.='<div class="hover_overlay">
													<div class="table">
														<div class="table_cell">
															<div class="gallery_info">
																<h5>Agrandar</h5>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
									</div>';
								}
							}
							
							$marcas.='</div>
						</div>
					</div>
				</div>
			</div>
		</section>';

		$metatitle.= ' | '.$getMarcasdetalleResults[0]['titulo'];
		$tpl = 'marcasDescripcion.html';
	}elseif(!empty($extra) AND (empty($gallery))) {
		$getMarcasdetalleResults = getMarcasdetalle($conn,$extra,$lang);

		// print_r($getMarcasdetalleResults);die;

		$marcas.='<section class="single_portfolio_area section_padding_50">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">

						<!-- Single Portfolio Title -->
						<div class="single_portfolio_title">
							<h4>'.$getMarcasdetalleResults[0]['titulo'].'</h4>
						</div>
						<div class="line"></div>
						
						<div class="single_portfolio_content">
							'.$getMarcasdetalleResults[0]['descripcion'].'
							<div class="line"></div>';

							$getMarcasImagenesListAlbumsResults = getMarcasImagenesListAlbums($conn,$getMarcasdetalleResults[0]['id']);

							// print_r($getMarcasImagenesListAlbumsResults);die;

							if($getMarcasImagenesListAlbumsResults['status'] === 'SUCCESS') {
								$marcas.='<div class="gallery_full_width_images_area row clearfix">';

								foreach ($getMarcasImagenesListAlbumsResults['data'] AS $imagen) {
									// echo "<pre>";
									// print_r($imagen);
									// echo "</pre>";
									// die;
									$marcas.='<div class="gra single_gallery_item col-md-3 col-sm-6">
										<div class="single_gallery_content">
											<img src="/assets/img/gallery/'.$imagen['album'].'/'.$imagen['cover'].'" alt="'.$imagen['album'].'">
											<!-- Single gallery Item hover caption -->
											<a href="'.$imagen['album'].'">
												<div class="hover_overlay">
													<div class="table">
														<div class="table_cell">
															<div class="gallery_info">
																<h5>Ver Galería</h5>
															</div>
														</div>
													</div>
												</div>
											</a>
										</div>
									</div>';
								}
								$marcas.='</div>
								<div class="line"></div>';
							}

							$marcas.='<div class="text-center portfolio-menu">';
							if($getMarcasdetalleResults[0]['url'] != NULL) {
								$marcas.='<a href="'.$getMarcasdetalleResults[0]['url'].'" rel="nofollow" target="_blank" class="redessociales"><img alt="Página Web" src="/assets/img/redessociales/globe-solid.svg"></a>';
							}
							if($getMarcasdetalleResults[0]['facebook'] != NULL) {
								$marcas.='<a href="'.$getMarcasdetalleResults[0]['facebook'].'" rel="nofollow" target="_blank" class="redessociales"><img alt="Instagram" src="/assets/img/redessociales/facebook.svg"></a>';
							}
							if($getMarcasdetalleResults[0]['instagram'] != NULL) {
								$marcas.='<a href="'.$getMarcasdetalleResults[0]['instagram'].'" rel="nofollow" target="_blank" class="redessociales"><img alt="Facebook" src="/assets/img/redessociales/instagram.svg"></a>';
							}
							$marcas.='</div>
							<div class="line"></div>
						</div>
					</div>
				</div>
			</div>
		</section>';

		$metatitle.= ' | '.$getMarcasdetalleResults[0]['titulo'];
		$tpl = 'marcasDescripcion.html';
	}else{
		$marcas.='<section class="single_portfolio_area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">

						<div class="gallery_full_width_images_area row clearfix mt_50">';

							$getMarcasListResults = getMarcasList($conn,$lang);

							// echo "<pre>";
							// print_r($getMarcasListResults);
							// echo "</pre>";
							// die;
							foreach ($getMarcasListResults AS $value) {
								$marcas.='<!-- Single gallery Item Start -->
								<div class="gra col-xs-12 col-sm-4 single_gallery_item">
									<div class="single_gallery_content">
									<img src="/assets/img/marcas/'.$value['imagen'].'" alt="">
										<!-- Single gallery Item hover caption -->
										<a href="'.$value['alias'].'">
											<div class="hover_overlay">
												<div class="table">
													<div class="table_cell">
														<div class="gallery_info">';
															// <h5>'.$value['titulo'].'</h5>
															$marcas.='<!--<p>Graphic</p>-->
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>';
							}
						$marcas.='</div>
					</div>
				</div>
			</div>
		</section>';
	}
