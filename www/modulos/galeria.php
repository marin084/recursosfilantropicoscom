<?php
    $getImagenesListResults = getImageneslist($conn,'es');
    // print_r($getImagenesListResults);die;
    $galeria .= '<div class="col-12 text-uppercase titulo pt-3 pb-3">Gallery</div>';
    if ( count($getImagenesListResults) != 0 ) {
        $galeria .= '<div id="gallery">';
            foreach ($getImagenesListResults as $value) {
                $galeria .= '<img src="'.$baseURL.'/assets/uploads/'.$value['imagen'].'" alt="'.$value['texto_alternativo'].'">';
            }
        $galeria.= '</div>';
    }