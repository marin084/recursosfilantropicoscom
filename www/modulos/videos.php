<?php
    if ($page === 'video' OR $page === 'blog') {
        if(!empty($extra)) {
            $getVideosResults = getVideo($conn,'es', $extra);
            // print_r($getVideosResults);die;
            $videos.= '<div class="col-md-12 video-container">
                <iframe src="https://www.youtube.com/embed/'.$extra. '?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-12">
                <div class="text-center pt-3">
                    <div class="videoDetails">
                        <h2>'.$getVideosResults[0]['titulo'].'</h2>
                        <p class="fecha">'.$getVideosResults[0]['fecha_ingreso'].'</p>
                        <p class="descripcion">'.$getVideosResults[0]['detalle_del_video'].'</p>
                    </div>
                </div>
            </div>';
        }else{
            $getVideosListResults = getVideoslist($conn,'es');
            // print_r($getVideosListResults);die;
            if ( count($getVideosListResults) != 0 ) {
                $videos.= '<div class="col-12 text-uppercase titulo pt-5 pb-3">Videos</div>
                    <div class="post container">
                        <div class="row">';
                        foreach ($getVideosListResults as $value) {
                            $videos .= '<div class="col-md-6 pb-5">
                                <div class="col-12">
                                    <a href="/video/'.$value['codigo_youtube'].'/'.$value['titulo'].'">
                                        <img class="img-fluid" src="https://img.youtube.com/vi/'.$value['codigo_youtube'].'/maxresdefault.jpg" alt="'.$value['titulo'].'">
                                    </a>
                                    <h3 class="title pt-2">'.$value['titulo'].'</h3>
                                </div>
                            </div>';
                        }
                        $videos .= '</div>
                    </div>
                </div>';
            }
        }
    }