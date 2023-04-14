<?php
    $videosHome.='<div id="Videos" class="padding-top60 padding-bottom60">
        <div class="container">
            <div class="post-heading-left">
                <div class="alignleft float">
                    <img class="floatleft size-90" src="/assets/images/video.png" alt="Lista de Videos">
                    <h2>Videos</h2>
                </div>
                <div class="alignright">
                    <a href="/videos/">
                        <p>Ver Mas ></p>
                    </a>
                </div>
            </div>
            <div class="clr"></div>
            <div class="row">';

            $getVideosHomeResults = getVideosHome($conn,'es');
            // print_r($getVideosHomeResults);die;
            foreach ($getVideosHomeResults as $value) {
                $videosHome.='<div class="col-sm-4">
                    <div class="affa-feature-icon">
                        <a href="/videos/'.$value['codigo_youtube'].'#'.$value['titulo'].'">
                            <img src="'.$baseURL.'/assets/uploads/'.$value['imagen'].'" alt="'.$value['titulo'].'">
                        </a>
                    </div>
                </div>';
            }
            $videosHome.='</div>
        </div>
    </div>';