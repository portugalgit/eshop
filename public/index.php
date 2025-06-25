<?php

//INICIO DA SESSÃO
session_start();

$rota = $_SERVER['REQUEST_SCHEME'] ."://". $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$rota = str_replace("index.php", "", $rota);


define('ROOT',$rota);
define('ASSETS',$rota . "assets/");

//Carrega configurações ou dependências com init.php.
require "../private/core/init.php";

//Ao instanciar a classe App, o __construct() é automaticamente executado.
//arbitro do jogo
$app = new App();