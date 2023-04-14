<?php
    if($page === 'blog' OR $page === 'post') {
        if(!empty($extra)) {
            $getBlogsResults = getBlogs($conn,$lang,$extra);
            // echo "<pre>"; print_r($getBlogsResults); echo "</pre>"; die;
            foreach ($getBlogsResults as $value) {
                // echo "<pre>"; print_r($value); echo "</pre>"; die;
                $blog.= '<section id="blog" class="blogInternos">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 pb20 post">
                                <div class="row">
                                    <div class="col-md-4 pb10">
                                        <div class="blogDetails margin-bottom40">
                                            <img class="img-fluid" src="'.$baseURL.'/assets/uploads/'.$value['imagen'].'" alt="'.$value['titulo'].'">
                                        </div>
                                    </div>
                                    <div class="col-md-8 pb10">
                                        <h3 class="title">' . $value['titulo'] . '</h3>
                                        <p class="nombre">'.$value['autor'].'</p>
                                        <p class="fecha">'.$value['fecha'].'</p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="descripcion">'.$value['contenido'].'</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-sm-12">';
                                    if($multilenguaje == 1) {
                                        if($lang == 'es'){
                                            $blog.='<h3 class="section-title-blog">Relacionados</h3>';
                                        }elseif ($lang == 'en') {
                                            $blog.='<h3 class="section-title-blog">Related</h3>';
                                        }
                                    }else {
                                        $blog.='<h3 class="section-title-blog">Relacionados</h3>';
                                    }
                                    $blog.='</div>
                                </div>';

                                $getBlogsRecomendadosResults = getBlogsRecomendados($conn,$lang,$extra);
                                $blog.='<div class="row">';
                                foreach ($getBlogsRecomendadosResults as $value) {
                                    $blog.='<div class="col-sm-12 pb10">
                                        <div class="post">
                                            <div class="pb10">
                                                <a href="/'.$lang.'/'.$page.'/'.$value['alias'].'/" class="boton">
                                                    <img class="img-fluid" src="'.$baseURL.'/assets/uploads/'.$value['imagen'].'" alt="'.$value['titulo'].'">
                                                </a>
                                            </div>
                                            <div class="bgBlack no-space margin-bottom20 gray informacionServicio">
                                                <h3 class="member-name">'.$value['titulo'].'</h3>
                                                <p class="descripcion">'.$value['descripcion_corta'].'</p>
                                                <p class="pb10">';
                                                if ($multilenguaje == 1) {
                                                    if ($lang == 'es') {
                                                        $blog .= '<a href="/' . $lang . '/' . $page . '/' . $value['alias'] . '/" class="btn btn-custom-blog" role="button">Leer Más</a>';
                                                    } elseif ($lang == 'en') {
                                                        $blog .= '<a href="/' . $lang . '/' . $page . '/' . $value['alias'] . '/" class="btn btn-custom-blog" role="button">Read More</a>';
                                                    }
                                                } else {
                                                    $blog .= '<a href="/blog/' . $value['alias'] . '/" class="btn btn-custom-blog" role="button">Leer Más</a>';
                                                }
                                                $blog.='</p>
                                            </div>
                                        </div>
                                    </div>';
                                }
                                $blog.='<div class="clr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>';
            }
        }else{
            $getBlogsListResults = getBlogsList($conn,$lang);
            // echo "<pre>"; print_r($getBlogsListResults); echo "</pre>"; die;
            foreach ($getBlogsListResults as $value) {
                $blog.='<div class="col-12 col-md-6">
                    <div class="post container">
                        <div class="row pt-5">
                            <div class="col-12 pb20">
                                <a href="/post/'.$value['alias'].'/" class="boton">
                                    <img class="img-fluid" src="'.$baseURL.'/assets/uploads/'.$value['imagen'].'" alt="'.$value['titulo'].'">
                                </a>
                            </div>
                            <div class="col-12">
                                <h3 class="title">'.$value['titulo'].'</h3>
                                <p class="autor">'.$value['autor'].'</p>
                                <p class="descripcion">'.$value['descripcion_corta'].'</p>
                                <p class="pb10">';
                                if($multilenguaje == 1) {
                                    if($lang == 'es'){
                                        $blog .= '<a href="/' . $lang . '/' . $page . '/' . $value['alias'] . '/" class="btn btn-custom-blog" role="button">Leer Más</a>';
                                    }elseif ($lang == 'en') {
                                        $blog.='<a href="/'.$lang.'/'.$page.'/'.$value['alias'].'/" class="btn btn-custom-blog" role="button">Read More</a>';
                                    }
                                }else {
                                    $blog.='<a href="/post/'.$value['alias']. '/" class="btn btn-custom-blog" role="button">Leer Más</a>';
                                    
                                }
                                $blog.='</p>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            $blog.='<div class="clr"></div>';
        }
    }