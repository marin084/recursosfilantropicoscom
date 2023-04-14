<?php
    $categorias.='<div class="col-xl-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">';
        $getcategoriasResults = getcategorias($conn,$lang);
        // echo "<pre>"; print_r($getcategoriasResults); echo "</pre>"; die
        $count = 1;
        foreach($getcategoriasResults AS $listaCategorias) {
            // echo "<pre>"; print_r($listaCategorias); echo "</pre>"; die;
            $categorias.='<li class="nav-item waves-effect waves-light col-4">
                <a class="';
                if($count == 1){
                    $categorias.='active';
                }
                $categorias.='" data-toggle="tab" href="#'.$listaCategorias['alias'].'" role="tab">
                <img class="img-fluid" src="'.$baseURL.'/assets/uploads/'.$listaCategorias['imagen'].'" alt="">
                </a>
            </li>';
            $count++;
        }
        $categorias.='</ul>
    </div>';


    // $categorias.='<div class="col-xl-12">
    //     <ul class="nav nav-tabs" id="myTab" role="tablist">
    //         <li class="nav-item waves-effect waves-light col-4">
    //             <a class="active" data-toggle="tab" href="#especialidades_odontologicas" role="tab">
    //             <img class="img-fluid" src="/assets/images/servicios_especialidades_odontologicas.jpg" alt="">
    //             </a>
    //         </li>
    //         <li class="nav-item waves-effect waves-light col-4">
    //             <a class="" data-toggle="tab" href="#estudios_radiologicos" role="tab">
    //             <img class="img-fluid" src="/assets/images/servicios_estudios_radiologicos.jpg" alt="">
    //             </a>
    //         </li>
    //         <li class="nav-item waves-effect waves-light col-4">
    //             <a class="" data-toggle="tab" href="#servicios_de_laboratorio_dental" role="tab">
    //             <img class="img-fluid" src="/assets/images/servicios_de_laboratorio_dental.jpg" alt="">
    //             </a>
    //         </li>
    //     </ul>
    // </div>';