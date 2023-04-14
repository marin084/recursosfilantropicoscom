<?php
  if ($page === '' or $page === 'inicio' or $page === 'home') {
    $getProfesionalesResults = getProfesionales($conn,$lang);
    // echo "<pre>"; print_r($getProfesionalesResults); echo "</pre>"; die;
    $profesionales .= '<div id="team" class="bg-white">
      <div class="bg-dark text-white p-3 p-lg-4 text-center divider-arrow divider-arrow-b divider-dark">
        <div class="container">
          <hr class="hr-lg mt-0 mb-2 w-10 mx-auto hr-primary" />
          <h2 class="text-center text-uppercase font-weight-bold my-0">
            Nuestro Equipo
          </h2>
        </div>
      </div>
      <div class="container py-5 py-lg-6">
        <div class="row">';
        foreach ($getProfesionalesResults as $profesional) {
            $profesionales .= '<div class="col-6 col-lg-3 pb-4">
            <div class="product-card overlay-hover bg-shadow carta">
              <!-- Hover content -->
              <a href="'.$baseURL.'/nosotros/'. strtolower(str_replace(' ','-',scanear_string($profesional['nombre']))).'">
                <div class="overlay-hover-content overlay-op-9 overlay-gradient">
                  <h3 class="mt-auto mb-0">
                    ' . $profesional['nombre'] . '
                  </h3>
                  <p class="mb-0 text-sm d-lg-block">' . $profesional['cargo'] . '</p>
                </div>
                <img class="card-img-top img-fluid w-100 w-md-auto" src="'. $baseURL.'/assets/uploads/'. $profesional['imagen']. '"
                  alt=" ' . $profesional['nombre'] . '">
              </a>
            </div>
          </div>';
        }
        $profesionales.= '</div>
      </div>
    </div>';
  } elseif ($page === 'nosotros' && empty($extra)) {
    $getProfesionalesResults = getProfesionales($conn, $lang);

    $profesionales .= '<div id="team" class="bg-white">
      <div class="container py-5 py-lg-6">
        <div class="row">';
        foreach ($getProfesionalesResults as $profesional) {
          $profesionales .= '<div class="col-6 col-lg-3 pb-4">
            <div class="product-card overlay-hover bg-shadow carta">
              <a href="' . $baseURL . '/nosotros/' . strtolower(str_replace(' ', '-', scanear_string($profesional['nombre']))) . '">
                <div class="overlay-hover-content overlay-op-9 overlay-gradient">
                  <h3 class="mt-auto mb-0">' . $profesional['nombre'] . '</h3>
                  <p class="mb-0 text-sm d-lg-block">' . $profesional['cargo'] . '</p>
                </div>
                <img class="card-img-top img-fluid w-100 w-md-auto" src="' . $baseURL . '/assets/uploads/' . $profesional['imagen'] . '" alt=" ' . $profesional['nombre'] . '">
              </a>
            </div>
          </div>';
        }
        $profesionales .= '</div>
      </div>
      <div class="bg-dark text-white p-3 p-lg-4 text-center divider-arrow divider-arrow-t divider-dark">
        <div class="container">
          <h2 class="text-center text-uppercase font-weight-bold my-0">Nuestro Equipo</h2>
          <hr class="hr-lg mt-2 mb-0 w-10 mx-auto hr-primary" />
        </div>
      </div>
    </div>';
  } else {
    if ($page === 'nosotros' && isset($extra) ) {
      $profesionales .= '<div id="content" class="p-0 clearfix">
        <div class="container py-3" id="about">
          <div class="row">
            <div class="col-12">';
            $tpl = 'personas.html';
            $getProfesionalesDetalleResults = getProfesionalesDetalle($conn, $lang,$extra);
            // print_r($getProfesionalesDetalleResults);die;
            $nombre = $getProfesionalesDetalleResults[0]['nombre'];
            $foto = $getProfesionalesDetalleResults[0]['imagen'];
            $cargo = $getProfesionalesDetalleResults[0]['cargo'];
            $bio = $getProfesionalesDetalleResults[0]['bio'];

            $arr = explode(' ', $nombre);
            if (count($arr) > 1) {
              $titulo = '<h2 class="title-divider">
                '.$arr[0]. ' <span class="font-weight-normal text-muted">'.substr(strstr($nombre, " "), 1).'</span>
              </h2>';
            } else {
              $titulo = '<h2 class="title-divider">
                '.$nombre.'
              </h2>';
            }

            $profesionales .= $titulo. '

            <div class="row pb-5">
              <div class="col-md-5">
                <img src="'.$baseURL.'/assets/uploads/'.$foto.'" alt="'.$nombre.'" class="img-fluid rounded" />
              </div>
              <div class="col-md-7">
                <p class="lead">'.$cargo.'</p>
                '.$bio.'
              </div>
            </div>';
            

            $profesionales .= '<div class="row">';
              $getProfesionalesRestResults = getProfesionalesRest($conn, $lang, $extra);
              foreach ($getProfesionalesRestResults as $profesional) {
                  $profesionales .= '<div class="col-6 col-md-4 col-lg-2 pb-4">
                  <div class="product-card overlay-hover bg-shadow carta">
                    <!-- Hover content -->
                    <a href="'.$baseURL.'/nosotros/'. strtolower(str_replace(' ','-',scanear_string($profesional['nombre']))).'">
                      <div class="overlay-hover-content overlay-op-9 overlay-gradient">
                        <h3 class="mt-auto mb-0">
                          ' . $profesional['nombre'] . '
                        </h3>
                      </div>
                      <img class="card-img-top img-fluid w-100 w-md-auto" src="'. $baseURL.'/assets/uploads/'. $profesional['imagen']. '"
                        alt=" ' . $profesional['nombre'] . '">
                    </a>
                  </div>
                </div>';
              }
            $profesionales.= '</div>
            </div>
          </div>
        </div>
      </div>
      ';
    }
  }