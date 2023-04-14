<?php
    $features.='<div id="features" class="container-padding8040">
    <div class="container">
        <div class="row">';

        $getfeaturesResults = getfeatures($conn,'es');
        // print_r($getfeaturesResults);die;
        foreach ($getfeaturesResults as $value) {
            $features.='<div class="col-sm-3 col-xs-6 col-lg-3"> <!-- 1 -->
                <a href="'.$baseURL.'/'.$value['url'].'">
                    <div class="affa-feature-img animation" data-animation="animation-fade-in-down">
                        <img src="'.$baseURL.'/assets/uploads/'.$value['imagen'].'" alt="'.$value['titulo'].'">
                        <h4>'.$value['titulo'].'</h4>
                    </div>
                </a>
            </div>';
        }

        $features.='</div>
    </div>
</div>';