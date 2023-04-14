<?php
    $blogHome.='<div id="blog" class="padding-top60 padding-bottom10">
        <div class="container">
            <div class="row">
                <div class="post-heading-left text-center C0022ac">
                    <h2>Blog</h2>
                </div>
                <div class="col-sm-12 margin-bottom40 padding0">';

                $getBlogHomeResults = getBlogHome($conn,'es');
                // print_r($getBlogHomeResults);die;
                foreach ($getBlogHomeResults as $value) {
                    $blogHome.='<div class="col-sm-4">
                        <div class="post">
                            <div class="imgFecha">
                                <a href="/blog/'.$value['alias'].'/" class="boton">
                                    <img src="'.$baseURL.'/assets/uploads/'.$value['imagen'].'" alt="'.$value['titulo'].'">
                                </a>';
                                // $blog.='<span class="fecha">'.$value['fecha'].'</span>';
                            $blogHome.='</div>
                            <div class="bgBlack">
                                <h2>'.$value['titulo'].'</h2>
                                <p class="descripcion">'.$value['descripcion_corta'].'</p>
                                <a href="/blog/'.$value['alias'].'/" class="boton">Leer más > </a>
                            </div>
                        </div>
                    </div>';
                }

                $blogHome.='</div>
            </div>
        </div>
    </div>';
