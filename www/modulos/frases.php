<?php
    $getfrasesResults = getFrases($conn,'es');
    //print_r($getfrasesResults);die;
    foreach ($getfrasesResults as $value) {
        $frases.='<div id="frase" class="bg-color bg-parallax" data-parallax="scroll" data-speed="0.2" data-natural-width="1920" data-natural-height="1080" data-image-src="'.$baseURL.'/assets/uploads/'.$value['imagen_fondo'].'">
            <div class="bg-overlay"> <!-- class="bg-overlay" -->
                <div class="container">
                    <div class="row">

                        <div class="col-sm-10 col-md-6 col-sm-offset-1 col-md-offset-0">
                            <div class="row">
                                <div class="col-sm-12">';
                                if(!empty($value['imagen_principal'])) {
                                    $frases.='<img src="'.$baseURL.'/assets/uploads/'.$value['imagen_principal'].'" alt="'.$value['autor'].'" class="animation" data-animation="animation-fade-in-down">';
                                }
                                $frases.='</div>
                            </div>
                        </div>
                        
                        <div class="col-sm-10 col-md-6 col-sm-offset-1 col-md-offset-0 margin-bottom40 text-center-xs text-center-sm container-padding10060 frases">
                            <p class="fraseHome">'.$value['frase'].'</p>
                            <h5 class="margin-bottom30 text-right autorHome">'.$value['autor'].'</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }