
<?php


/*

Função para ajudar no uso de links internos
@base_url('www.exemplo.com/')

*/

function base_url($url = ''){
$site = URL_BASE . $url;
 return $site;
}


/*

Função para redirecionamento
@redirect('?pag=login');

*/

function redirect($url){
    header('location:'. base_url($url));'">';
    #echo '<meta http-equiv="Location" content=" ' . $redirect . '">';
    #exit();
}

/*

Função para destruir um cookie
@DestroyCookie('nome_cookie');

*/

function DestroyCookie($name)
    {
        unset($_COOKIE[$name]);
        return setcookie($name, NULL, -1);
    }

/*


*/



?>
