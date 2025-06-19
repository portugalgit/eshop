<?php
//classe responsável por controlar a lógica de carregar as views (as páginas que o usuário vai ver).
Class Controller
{
    //carregar as paginas de visualização
    public function view($path,$data = [])
    {   //método verifica se o arquivo da view realmente existe.
        if(file_exists("../private/views/" .THEME . $path . ".php"))
        {
            //Inclui o arquivo da visualização
            include "../private/views/" .THEME . $path . ".php";
        }
    }

    //carregar o modelo que interage com a base de dados
    public function load_model($model)
    {   //método verifica se o arquivo da view realmente existe.
        if(file_exists("../private/models/" . strtolower($model) . ".class.php"))
        {
            //Inclui o arquivo da visualização
            include "../private/models/" . strtolower($model) . ".class.php";
            return $a = new $model();
        }
        return false;
    }
}