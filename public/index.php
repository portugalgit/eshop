<?php

//INICIO DA SESSÃO
session_start();
//Carrega configurações ou dependências com init.php.
include "../private/init.php";
//Ao instanciar a classe App, o __construct() é automaticamente executado.
//arbitro do jogo
$app = new App();