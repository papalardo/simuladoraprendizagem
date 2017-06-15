<?php

require 'DB.php';

if (SYSTEM_STATUS == 'fase_teste') {
//Fazer o teste de conexao com o banco
$teste = DB::getInstance();


if ($teste) {
    echo 'Conectado com o banco!';
} else {
    echo '<br><br><br> Tem algo errado com o banco!';
}
}
