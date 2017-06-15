<?php

require_once 'config/DB.php';
include 'includes/functions.php';

//Abrir os controllers apartir de GET
$pag = $_GET['pag'];
include 'controller/'.$pag.'.php';

//So mostra erros se o sistema estiver em desenvolvimento
if (SYSTEM_STATUS == 'fase_teste'){
    error_reporting(0);
    ini_set("display_errors", 1 );
}

?>

<title>Simulador Logistica</title>

 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0" />
    <title>Bank Fit</title>
    <meta name="description" content="Simulador Logistica" />
    <meta name="robots" content="index, follow" />
    <link rel="icon" type="image/png" href="<?=$url_base?>libs/imgs/icon.png" />
    <meta name="author" content="SENAC" />
    <link href="<?= base_url('libs/css/index.css')?>" rel="stylesheet" />
     <link href="<?= base_url('libs/css/navbar.css')?>" rel="stylesheet" />
    <link href="<?= base_url('libs/css/bootstrap.css')?>" rel="stylesheet" />
    <link href="<?= base_url('libs/css/fullcalendar.css')?>" rel='stylesheet' />
    <script src="<?= base_url('libs/js/jquery.js')?>"></script>
    <script src="<?= base_url('libs/js/bootstrap.js')?>"></script>
