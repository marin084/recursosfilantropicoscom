<?php
    if($page === 'servicios' OR $page === 'services') {
        $getServiciosResults = getServicios($conn, $lang);
        // echo "<pre>"; print_r($getServiciosResults); echo "</pre>"; die;
        // print_r(count($getServiciosResults));die;
        $count = 1;
        foreach ($getServiciosResults as $servicio) {
            // print_r($servicio);die;
            
            $arr = explode(' ', $servicio['nombre']);
        // echo $arr[0]; // will print Test
        // echo count($arr);
        // echo (substr(strstr($servicio['nombre'], " "), 1));
        // die;

            if ($count % 2 == 0) {
                if (count($arr) > 1) {
                    $titulo = '<h2 class="display-4 text-slab text-white text-uppercase mt-0 mb-5">
                            ' . $arr[0] . ' <span class="text-primary font-weight-bold">' . substr(strstr($servicio['nombre'], " "), 1) . '</span>
                        </h2>';
                } else {
                    $titulo = '<h2 class="display-4 text-slab text-white text-uppercase mt-0 mb-5">
                            ' . $servicio['nombre'] . '
                        </h2>';
                }
                
                $servicios .= '<div class="d-block d-lg-none" id="'.scanear_string($servicio['nombre']).'">
                    <div style="height:400px; background-image: URL(\'' . $baseURL . '/assets/uploads/' . $servicio['imagen'] . '\'); background-size: cover; background-position: center;">
                    </div>
                </div>';

                $servicios .= '<div class="bg-dark">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-5 overlay overlay-gradient overlay-op-6 d-none d-lg-block" data-bg-img="' . $baseURL . '/assets/uploads/' . $servicio['imagen'] . '""></div>
                        <div class="col-lg-7 p-5 p-lg-7 divider-arrow divider-arrow-l divider-dark">
                            <hr class="hr-lg mt-0 mb-2 w-10 ml-0 hr-primary" />
                            '. $titulo. '
                            <span class="text-grey">' . $servicio['contenido'] . '</span>
                        </div>
                        </div>
                    </div>
                </div>';
            } else {
                if (count($arr) > 1) {
                    $titulo = '<h2 class="display-4 text-slab text-uppercase mt-0 mb-5">
                            ' . $arr[0] . ' <span class="text-primary font-weight-bold">' . substr(strstr($servicio['nombre'], " "), 1) . '</span>
                        </h2>';
                } else {
                    $titulo = '<h2 class="display-4 text-slab text-uppercase mt-0 mb-5">
                            ' . $servicio['nombre'] . '
                        </h2>';
                }
            
                $servicios .= '<div class="d-block d-lg-none" id="'.scanear_string($servicio['nombre']). '">
                    <div style="height:400px; background-image: URL(\'' . $baseURL . '/assets/uploads/' . $servicio['imagen'] . '\'); background-size: cover; background-position: center;">
                    </div>
                </div>';

                $servicios .= '<div class="bg-light">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-7 p-5 p-lg-7 divider-arrow divider-arrow-r divider-white">
                            <hr class="hr-lg mt-0 mb-2 w-10 ml-0 hr-primary" />
                            '. $titulo. '
                            <span>' . $servicio['contenido'] . '</span>
                        </div>
                        <div class="col-lg-5 overlay overlay-gradient overlay-op-6 d-none d-lg-block" data-bg-img="' . $baseURL . '/assets/uploads/' . $servicio['imagen'] . '""></div>
                        </div>
                    </div>
                </div>';
            }

            $count++;
        }

    
        // $servicios .= '<div class="d-block d-lg-none" id="elaboracion_de_casos_y_propuestas">
        //     <div style="height:400px; background-image: URL(\'assets/img/elaboracion-de-casos-y-propuestas.jpg\'); background-size: cover; background-position: center;"></div>
        // </div>
    
        // <div class="bg-light">
        //     <div class="container-fluid">
        //         <div class="row">
        //             <div class="col-lg-7 p-5 p-lg-7 divider-arrow divider-arrow-r divider-white">
        //                 <hr class="hr-lg mt-0 mb-2 w-10 ml-0 hr-primary" />
        //                 <h2 class="display-4 text-slab text-uppercase mt-0 mb-5">Elaboración <span class="text-primary font-weight-bold">de casos y propuestas</span></h2>
        //                 <p>Investigación, escritura e ilustración de documentos de captación de fondos. Estas propuestas normalmente se hacen con base en proyectos previamente definidos. Sin embargo, las propuestas se pueden confeccionar con la información que disponga el cliente.</p>
        //                 <p><em>"La mejor propuesta es la que es aprobada."</em></p>
        //             </div>
        //             <div class="col-lg-5 overlay overlay-gradient overlay-op-6 d-none d-lg-block" data-bg-img="assets/img/elaboracion-de-casos-y-propuestas.jpg"></div>
        //         </div>
        //     </div>
        // </div>';x
            
        // $servicios .= '<div class="d-block d-lg-none" id="capacitacion">
        //     <div style="height:400px; background-image: URL(\'assets/img/capacitacion.jpg\'); background-size: cover; background-position: center;">
        //     </div>
        // </div>
        
        // <div class="bg-dark">
        //     <div class="container-fluid">
        //         <div class="row">
        //             <div class="col-lg-5 overlay overlay-gradient overlay-op-6 d-none d-lg-block" data-bg-img="assets/img/capacitacion.jpg"></div>
        //                 <div class="col-lg-7 p-5 p-lg-7 divider-arrow divider-arrow-l divider-dark">
        //                     <hr class="hr-lg mt-0 mb-2 w-10 ml-0 hr-primary" />
        //                     <h2 class="display-4 text-slab text-white text-uppercase mt-0 mb-5">Capacitación</h2>
        //                     <p class="text-grey">Ofrecemos cursos y talleres diseñados a la medida para juntas directivas, gerentes y profesionales en captación de recursos. Los temas incluyen:</p>
        //                     <p class="text-grey">
        //                         <ul class="text-grey">
        //                             <li>Principios de captación de recursos.</li>
        //                             <li>Campañas capitales.</li>
        //                             <li>Montaje de casos</li>
        //                             <li>Solicitudes cara a cara ante donantes de patrimonio con alto valor económico.</li>
        //                             <li>"Fundraising" en tiempos de crisis.</li>
        //                             <li>Funciones y responsabilidades de juntas directivas.</li>
        //                             <li>¿Cómo montar una oficina de recaudación de fondos?</li>
        //                             <li>Donantes recurrentes e irrestrictos.</li>
        //                             <li>Exploración de prospectos locales.</li>
        //                             <li>Producción de expedientes.</li>
        //                             <li>Actividades empresariales para organizaciones de bien social.</li>
        //                             <li>Ensamble de propuestas.</li>
        //                         </ul>
        //                     </p>
        //                 </div>
        //             </div>
        //         </div>
        //     </div>
        // </div>';
    } elseif ($page === '' OR $page === 'inicio' OR $page === 'home') {
        $servicios .= '<div id="features" class="bg-white">
            <div class="bg-dark text-white p-3 p-lg-4 text-center divider-arrow divider-arrow-b divider-dark">
                <div class="container">
                <hr class="hr-lg mt-0 mb-2 w-10 mx-auto hr-primary" />
                <h2 class="text-center text-uppercase font-weight-bold my-0">
                    Servicios
                </h2>
                </div>
            </div>
            <div class="container p-4 py-lg-6">
                <div class="row text-center">';
                $getServiciosResults = getServicios($conn, $lang);
                // echo "<pre>"; print_r($getServiciosResults); echo "</pre>"; die;
                foreach($getServiciosResults AS $servicio) {
                    $servicios .= '<div class="col-lg-4 py-2 px-4">
                        <i class="'.$servicio['icon'].' icon-2x text-primary" data-animate="fadeIn" data-animate-delay="0.1"></i>
                        <h4 class="mt-2">
                        ' . $servicio['nombre'] . '
                        </h4>
                        '.$servicio['preview'];
                        // $servicios .= '<p><a href="'.$baseURL.'/servicios/#'.$servicio['alias'].'">Ver mas >></a></p>';
                    $servicios .= '</div>';
                }
                $servicios .= '</div>
            </div>
        </div>';
        // $servicios.='<section id="servicios" class="about-section section text-center">
        //     <div class="container">
        //         <div class="members-block">';
        //         if($lang == 'es'){
        //             $servicios.='<h2 class="section-title">Áreas de atención</h2>';
        //         }elseif ($lang == 'en') {
        //             $servicios.='<h2 class="section-title">Attention Areas</h2>';
        //         }
        //         $servicios.='<div class="row">';
        //             $getServiciosResults = getServicios($conn,$lang);
        //             // echo "<pre>"; print_r($getServiciosResults); echo "</pre>"; die;
        //             foreach($getServiciosResults AS $servicio) {
        //                 $servicios.='<div class="item col-6 col-lg-4">
        //                     <div class="item-inner">';
        //                         if($multilenguaje == 1) {
        //                             if($lang == 'es'){
        //                                 $servicios.='<a href="/'.$lang.'/servicios/'.$servicio['alias'].'/">';
        //                             }elseif ($lang == 'en') {
        //                                 $servicios.='<a href="/'.$lang.'/services/'.$servicio['alias'].'/">';
        //                             }
        //                         }else {
        //                             $servicios.='<a href="/'.$page.'/'.$servicio['alias'].'/">';
        //                         }
        //                         $servicios.='<div class="member-profile img-hover-zoom">
        //                                 <img class="img-fluid" src="/assets/uploads/'.$servicio['imagen'].'" alt="'.$servicio['nombre'].'">
        //                             </div>
        //                             <h3 class="member-nameHome">'.$servicio['nombre'].'</h3>
        //                         </a>
        //                     </div>
        //                 </div>';
        //             }
        //             $servicios.='</div>
        //         </div>
        //     </div>
        // </section>';
    }