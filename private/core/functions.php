<?php
//Debug
function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

//Mensagens de erro
function check_error()
{
    if(isset($_SESSION['error']) && $_SESSION['error'] != "")
    {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}