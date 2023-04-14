<?php
	if (empty($extra)) {
		$getListBannerResults = getListBanner($conn,"es",$page);
		// print_R($getListBannerResults);die;
		foreach($getListBannerResults AS $bannerData) {
			// echo "<pre>";print_r($bannerData);echo "</pre>";die;
			$bannerIndividual.='<div class="sub-header" data-parallax="scroll" data-speed="0.2" data-natural-width="1920" data-natural-height="720" data-image-src="'.$baseURL.'/assets/uploads/'.$bannerData['img'].'">
				<div class="container">
					<div class="row">
						<div class="col-md-7">
							<div class="header-txt">
								<h1 class="entry-title">
									<div>&nbsp;</div>';
									if(empty($bannerData['titulo'])) {
										$bannerIndividual.='&nbsp;&nbsp;';
									}
									else{
										$bannerIndividual.= $bannerData['titulo'];
									}
									$bannerIndividual.='<div>&nbsp;</div>
								</h1>
								<p>'.$bannerData['texto'].'</p>
							</div>
						</div>
					</div>
				</div>
			</div>';
		}
	}