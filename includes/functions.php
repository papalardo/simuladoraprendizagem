<?php

function base_url($url = ''){
$site = URL_BASE . $url;
 return $site;
}

function redirect($redirect){
    header('location:'. base_url($redirect));

}
