<?php

Class Controller
{
     /**
     * Carrega uma página de visualização (view)
     *
     * @param string $path Caminho relativo da view
     * @param array $data Dados que podem ser usados na view
     */
    public function view($path,$data = [])
    { 
          
        //se o arquivo da view existe
        if(file_exists("../private/views/" .THEME . $path . ".php"))
        {
            // Inclui o arquivo da view para exibição
            include "../private/views/" .THEME . $path . ".php";
        }else{
             // Se o arquivo da view não existir, exibe a página 404
            include "../private/views/" .THEME . "404.php";
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