<?php
// Classe responsável por controlar a lógica de carregamento das views e modelos (MVC)

Class Controller
{
    // Método para carregar uma página de visualização (view)
    public function view($path,$data = [])
    {   
        // Verifica se o arquivo da view existe
        if(file_exists("../private/views/" .THEME . $path . ".php"))
        {
            // Inclui o arquivo da view para exibição ao usuário
            include "../private/views/" .THEME . $path . ".php";
        }
    }

    // Método para carregar um modelo que interage com a base de dados
    public function load_model($model)
    {   
        // Verifica se o arquivo do modelo existe
        if(file_exists("../private/models/" . strtolower($model) . ".class.php"))
        {
            // Inclui o arquivo do modelo
            include "../private/models/" . strtolower($model) . ".class.php";

            // Instancia e retorna o objeto do modelo
            return $a = new $model();
        }
        // Retorna false caso o arquivo do modelo não exista
        return false;
    }
}