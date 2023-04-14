<?php
    $profesionalesHome.='<section class="mx-auto">';
    if($lang == 'es') {
        $profesionalesHome.='<img class="img-fluid" src="'.$baseURL.'/assets/images/profesionales_home.jpg" alt="Su Salud En Manos Profesionales">';
    }else if ($lang == 'en') {
        $profesionalesHome.='<img class="img-fluid" src="'.$baseURL.'/assets/images/profesionales_home_en.jpg" alt="A Quality Team At Your Service">';
    }
    $profesionalesHome.='</section>

    <section class="content-block team-block">
        <div class="container">
            <div class="row experts">';

                $getDoctoresResults = getDoctores($conn,$lang);
                    // echo "<pre>"; print_r($getDoctoresResults); echo "</pre>"; die;
                    $delay = 200;
                    $cuenta=1;
                    foreach($getDoctoresResults AS $doctor) {

                        $profesionalesHome.='<div class="col-lg-4 col-sm-6 col-xs-12 expert pb-4" data-aos="fade-up" ';
                        if($cuenta != 1) {
                            $profesionalesHome.='data-aos-delay="'.$delay.'"';
                        }
                        $profesionalesHome.='>
                            <div class="expert-img">
                            <img class="img-fluid" src="'.$baseURL.'/assets/uploads/'.$doctor['imagen'].'" alt="'.$doctor['nombre'].' | '.$doctor['especialidad'].'">
                            </div>
                            <div>
                                <div class="expert-name pb-1">'.$doctor['nombre'].'</div>';
                                // $profesionalesHome.='<div class="expert-position">'.$doctor['especialidad'].'</div>';
                                $profesionalesHome.='<div class="expert-description">'.$doctor['bio'].'</div>
                            </div>
                        </div>';
                        $cuenta++;
                        $delay = $delay+200;
                    }

            $profesionalesHome.='</div>
        </div>
    </section>';