<?php
	if($lang === 'es') {
		$contenidos.='<section class="section_padding_100 ">
			<div class="divied-40"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3 style="font-size:50px;">Error 404</h3>
						<p style="font-size:20px;">Página no encontrada.</p>
					</div>
				</div>
			</div>
			<div class="divied-40"></div>
		</section>';
	} else if ($lang === 'en') {
		$contenidos.='<section class="section_padding_100">
			<div class="divied-40"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3 style="font-size:50px;">404 error!</h3>
						<p style="font-size:20px;">We couldn`t find this page.</p>
					</div>
				</div>
			</div>
			<div class="divied-40"></div>
		</section>';
	}
	$tpl = 'home.html';
