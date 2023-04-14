<?php
    $getfaqListResults = getfaq($conn,'es');
    // print_r($getfaqListResults);die;
    if ( count($getfaqListResults) != 0 ) {
        $faq.= '<div class="col-12 text-uppercase titulo pb-3">Preguntas Frecuentes</div>
            <div class="post container">
                <div class="row pb-3">';
                    foreach ($getfaqListResults as $value) {
                        $faq.= '<div class="col-12 pb-4">
                            <div class="col-12">
                                <h3>'.$value['pregunta'].'</h3>
                                <p>'.$value['respuesta'].'</p>
                            </div>
                        </div>';
                    }
                $faq.= '</div>
            </div>
        <div>';
    }