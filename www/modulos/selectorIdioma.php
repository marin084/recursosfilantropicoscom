<?php
    if($multilenguaje == 1) {
        if($lang == 'es') {
            $getPageOtherLangResults = getPageOtherLang($conn,'en',$page);
            // echo $getPageOtherLangResults;die;
            $idioma.= '<li>
                <a href="/en/'.$getPageOtherLangResults[0]['alias'].'/">
                    <img src="'.$baseURL.'/assets/images/flag_en.jpg" alt="English">
                </a>
            </li>';
        } elseif ($lang == 'en') {
            $getPageOtherLangResults = getPageOtherLang($conn,'es',$page);
            // print_r($getPageOtherLangResults[0]['alias']);die;
            $idioma.= '<li>
                <a href="/es/'.$getPageOtherLangResults[0]['alias'].'/">
                    <img src="'.$baseURL.'/assets/images/flag_es.jpg" alt="Español">
                </a>
            </li>';
        }
    }