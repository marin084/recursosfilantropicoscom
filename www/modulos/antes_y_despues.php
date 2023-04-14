<?php
    $antes_y_despues.='<div class="row">';
    $get_antes_y_despuesResults = get_antes_y_despues($conn,$lang);
    // echo "<pre>"; print_r($getDoctoresResults); echo "</pre>"; die;
    $cuenta = 0;
    foreach($get_antes_y_despuesResults AS $ayd) {
        $antes_y_despues.='<div class="col-6 text-right"><p class="logo-blue">';
        if($lang == 'es'){$antes_y_despues.='Antes';} else {$antes_y_despues.='Before';}
        $antes_y_despues.='</p></div>';
        $antes_y_despues.='<div class="col-6 text-left"><p class="logo-blue">';
        if($lang == 'es'){$antes_y_despues.='Después';} else {$antes_y_despues.='After';}
        $antes_y_despues.='</p></div>';
        $antes_y_despues.='<div class="col-lg-12 text-center pb-3">
            <img class="img-fluid w-50" src="'.$baseURL.'/assets/uploads/'.$ayd['imagen'].'" alt="'.$ayd['nombre'].'">
        </div>';
        // if($count % 2 == 0) {
            $antes_y_despues.= '<div class="col-md-12 container dark ">
                <div class="d-block border-thin mx-auto w-50"></div>
            </div>';
        // }
        $cuenta++;
        $delay = $delay+200;
    }
    $antes_y_despues.='</div>';

    // $antes_y_despues.='<div class="row">';
    // $get_antes_y_despuesResults = get_antes_y_despues($conn,$lang);
    // // echo "<pre>"; print_r($getDoctoresResults); echo "</pre>"; die;
    // foreach($get_antes_y_despuesResults AS $ayd) {
    //     $antes_y_despues.='<div class="col-lg-12 pb-5">
    //         <div class="row">
    //             <div class="col-md-6 col-lg-4 text-center">
    //                 <img class="img-fluid" src="'.$baseURL.'/assets/uploads/'.$ayd['imagen'].'" alt="'.$ayd['nombre'].'">
    //             </div>
    //             <div class="col-md-6 col-lg-8 antesydespues">
    //                 <div class="nombre pb-3">'.$ayd['nombre'].'</div>
    //                 <div class="descripcion">'.$ayd['descripcion'].'</div>
    //             </div>
    //         </div>
    //     </div>';
    // }
    // $antes_y_despues.='</div>';