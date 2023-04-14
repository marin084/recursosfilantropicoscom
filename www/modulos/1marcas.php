<?php
	if(!empty($extra)) {
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
						<div class="single_portfolio_content">
							'.$getMarcasdetalleResults[0]['descripcion'].'
						</div>
					</div>
				</div>

						<div class="row">
							<div class="col-xs-12 mt15">

								<div class="gallery_full_width_images_area row clearfix">';

									$getMarcasImagenesListResults = getMarcasImagenesList($conn,$getMarcasdetalleResults[0]['id']);
									foreach ($getMarcasImagenesListResults AS $imagen) {
										$marcas.='<!-- Single gallery Item Start -->
										<div class="gra col-5 single_gallery_item">
											<div class="single_gallery_content">
												<img src="/assets/img/marcas/marca1/'.$imagen['image'].'" alt="'.$imagen['titulo'].'">
												<!-- Single gallery Item hover caption -->
												<a class="gallery_img" href="/assets/img/marcas/marca1/'.$imagen['image'].'">
													<div class="hover_overlay">
														<div class="table">
															<div class="table_cell">
																<div class="gallery_info">
																	<h5>'.$imagen['titulo'].'</h5>
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

		$metatitle.= ' | '.$getMarcasdetalleResults[0]['titulo'];
		$tpl = 'marcasDescripcion.html';
	}else{
		$marcas.='<section class="single_portfolio_area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">

						<div class="gallery_full_width_images_area row clearfix mt_50">';

							$getMarcasListResults = getMarcasList($conn,$lang);
							foreach ($getMarcasListResults AS $value) {
								$marcas.='<!-- Single gallery Item Start -->
								<div class="gra col-xs-12 col-sm-3 single_gallery_item">
									<div class="single_gallery_content">
									<img src="/assets/img/marcas/'.$value['imagen'].'" alt="">
										<!-- Single gallery Item hover caption -->';
										if($value['url'] <> ''){
												$marcas.='<a href="'.$value['url'].'" target="_blank">';
									  }else{
												$marcas.='<a href="'.$value['alias'].'">';
									  }
											$marcas.='<div class="hover_overlay">
												<div class="table">
													<div class="table_cell">
														<div class="gallery_info">';
															// $marcas.='<h5>'.$value['titulo'].'</h5>';
															// $marcas.='<p>Graphic</p>';
														$marcas.='</div>
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
