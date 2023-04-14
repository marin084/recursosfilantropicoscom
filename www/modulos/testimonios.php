<?php
    $testimonios.='<div id="testimonios" class="bg-grey padding-top60 padding-bottom60">
    	<div class="container">
            <div class="post-heading-left text-center C0022ac">
                <h2>Testimonios</h2>
            </div>
		</div>
        <div class="carousel-slider affa-portfolios-slider2">';

        $getTestimoniosResults = getTestimonios($conn,'es');
        // print_r($getTestimoniosResults);die;
        foreach ($getTestimoniosResults as $value) {
            
            $testimonios.='<div class="slick-slide">
            	<div class="container">
                    <div class="row">
                    	<div class="col-lg-10 col-lg-offset-1">
                        	<div class="slide-txt testimonioDiv text-center">
                                <p class="testimonio">'.$value['testimonio_testimonio'].'</p>
                                <p class="titulo">- '.$value['nombre_testimonio'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
		
        $testimonios.='</div>
        <div class="container padding-top60">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-offset-0 text-center">
                    <a href="'.$baseURL.'/testimonios/" class="btn-custom">Escribe tu testimonio</a>
                </div>
            </div>
        </div>
    </div>';