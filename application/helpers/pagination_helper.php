<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function is_nullvar($var) {
    if (is_null($var) || $var === 'null') {
        return true;
    } else {
        return false;
    }
}

function buildquery($type, $page, $slug = null) {
        $siteurl = base_url();
            if(is_null($slug)){
        if ($page > 1) {
            $siteurl = $siteurl . $type . '/pagina-' . $page . '/';
        } else {
            $siteurl = $siteurl . $type . '/';
        }
        }else{
           if ($page > 1) {
            $siteurl = $siteurl . $type .'/' . $slug . '/pagina-' . $page . '/';
        } else {
            $siteurl = $siteurl . $type . '/' . $slug . '/';
        } 
        }

    return $siteurl;
}

function pagination($type, $page, $rowcount, $slug = null) {

    $pagination = "<nav aria-label='Navigatie'>";
    $pagination .= "<ul class='pagination justify-content-center'>";
    if ($page > 1) {
        $previous = $page - 1;
        $previous = buildquery($type, $previous, $slug);
    }
    $totalpages = ceil($rowcount / 6);
    if ($page < 2) {
        if ($page == $totalpages) {
        $pagination .= "<li class='page-item disabled'><a class='page-link' aria-label='Precedenta'>Precedenta</a></li>";
        }else{
          $pagination .= "<li class='page-item'><a class='page-link' aria-label='Precedenta'>Precedenta</a></li>";  
        }
    } else {
        $pagination .= "<li class='page-item'><a class='page-link' href='$previous' aria-label='Precedenta'>Precedenta</a></li>";
    }
    for ($i = 1; $i <= $totalpages; $i++) {
        $pagelink = buildquery($type, $i, $slug);
        if($page == $i){
        $pagination .= "<li class = 'page-item active'><a class = 'page-link' href = '$pagelink'>$i</a></li>";
        }else{
         $pagination .= "<li class = 'page-item'><a class = 'page-link' href = '$pagelink'>$i</a></li>";   
        }
    }
    if ($page == $totalpages) {
        $pagination .= "<li class = 'page-item disabled'><a class = 'page-link' aria-label = 'Next'>Urmatoarea</a></li>";
    } else {
        $next = $page + 1;
        $next = buildquery($type, $next, $slug);
        $pagination .= "<li class = 'page-item'><a class = 'page-link' href = '$next' aria-label = 'Next'>Urmatoarea</a></li>";
    }
    $pagination .= "</ul></nav>";
    return $pagination;
}
