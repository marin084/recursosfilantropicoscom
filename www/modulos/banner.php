<?php
	$getListBannerResults = getListBanner($conn,$lang,$page);
	// echo "<pre>"; print_r($getListBannerResults); echo "</pre>"; die;
	foreach ($getListBannerResults as $bannerData) {
		$banner .= '<div style="height:400px; background-image: URL(\''.$baseURL.'/assets/uploads/'.$bannerData['img'].'\'); background-size: cover; background-position: center;"></div>';
	}
	// $banner .= '<div id="highlighted">
	// 	<div class="slider-wrapper rev_slider_wrapper fullscreen-container bg-black" data-page-class="slider-appstrap-theme">
	// 		<div class="rev_slider fullscreenbanner" data-toggle="slider-rev" data-settings="{"startwidth":1100, "startheight":620, "delay":10000}">
	// 			<ul>';
	// 			foreach($getListBannerResults AS $bannerData) {
	// 				$banner .= '<li class="slide" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
	// 						data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-rotate="0"
	// 						data-saveperformance="off" data-title="Slide">
	// 						<img src="' . $baseURL . '/assets/uploads/'. $bannerData['img'].'" class="rev-slidebg bg-white" alt="Background image" data-bgcolor="#ffffff"
	// 						data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off"
	// 						data-no-retina />
	// 						<div class="tp-caption text-white" data-x="["center","center","center","center"]"
	// 						data-hoffset="["0","0","0","0"]" data-y="["middle","middle","middle","middle"]"
	// 						data-voffset="["-30","-30","-30","-20"]" data-fontsize="["70","70","70","70"]"
	// 						data-lineheight="["70","70","70","60"]" data-width="none" data-height="none" data-whitespace="nowrap"
	// 						data-type="text" data-basealign="slide" data-responsive_offset="off"
	// 						data-frames="[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":1000,"split":"chars","splitdelay":0.05,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]"
	// 						data-textAlign="["center","center","center","center"]" data-paddingtop="[10,10,10,10]"
	// 						data-paddingright="[0,0,0,0]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[0,0,0,0]">Captando
	// 						fondos para<br>América Latina</div>
	// 				</li>';
	// 			}
	// 			$banner .= '</ul>
	// 			<div class="tp-bannertimer tp-bottom"></div>
	// 		</div>
	// 	</div>
	// </div>';
	
	// 	$banner .= '<section class="top-banner bannerContainer">
	// 		<div class="imgHero" style="background: url(' . $baseURL . '/assets/uploads/' . $bannerData['img'] . '); background-repeat: no-repeat; background-size: cover;">
		
	// 			<div class="content">
	// 				<h1 class="h1Home';
	// 				if($bannerData['id'] == 1) {
	// 					$banner.=' letrasHome';
	// 				}
	// 				if($bannerData['alineacion'] == 'left'){
	// 					$banner.=' text-left';
	// 				}elseif ($bannerData['alineacion'] == 'center') {
	// 					$banner.=' text-center';
	// 				}elseif ($bannerData['alineacion'] == 'right') {
	// 					$banner.=' text-right';
	// 				}
	// 				$banner.='"';
	// 				if(isset($bannerData['color'])){
	// 					$banner.=' style="color:'.$bannerData['color'].';"';
	// 				}
	// 				$banner.='>
	// 				'.$bannerData['titulo'].'</h1>
	// 				<div class="pHome';
	// 				if($bannerData['alineacion'] == 'left'){
	// 					$banner.=' text-left';
	// 				}elseif ($bannerData['alineacion'] == 'center') {
	// 					$banner.=' text-center';
	// 				}elseif ($bannerData['alineacion'] == 'right') {
	// 					$banner.=' text-right';
	// 				}
	// 				$banner.='"';
	// 				if(isset($bannerData['color'])){
	// 					$banner.=' style="color:'.$bannerData['color'].';"';
	// 				}
	// 				$banner.='>'.$bannerData['texto'].'</div>';
	// 				if(!empty($bannerData['textbnt']) && !empty($bannerData['link'])) {
	// 					$banner.='<div class="header-btn">
	// 						<a href="'.$bannerData['link'].'" class="btn-custom btn-green">'.$bannerData['textbnt'].'</a>
	// 					</div>';
	// 				}
	// 			$banner.='</div>
	// 		</div>
	// 	</section>';