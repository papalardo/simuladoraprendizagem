
<?php


function base_url($url = ''){
$site = URL_BASE . $url;
 return $site;
}

function msg($msg, $tipo_alerta){

    if (isset($msg)){
    return '<div class="alert alert-'. $tipo_alerta .' col-md-6 col-md-offset-3">
        <strong>'. $msg .'</strong>
        </div>';}
}

function redirect($redirect, $msg = '', $tipo_alerta = ''){
    header('location:'. base_url($redirect));'">';
   # echo '<meta http-equiv="Location" content=" ' . $redirect . '">';
    #echo msg($msg, $tipo_alerta);
    #exit();
}
?>
