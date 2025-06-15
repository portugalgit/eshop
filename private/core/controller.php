<?php
//classe responsável por controlar a lógica de carregar as views (as páginas que o usuário vai ver).
Class Controller
{
    //Declaração do método público chamado view.
    //Ele recebe dois parâmetros:
    //$path: o caminho (nome) da view que queremos carregar, por exemplo "home", "produto/lista", etc.
    //$data: um array opcional (padrão vazio) que pode conter dados que você quer passar para a view — como variáveis para exibir na página.
    public function view($path,$data = [])
    {   //método verifica se o arquivo da view realmente existe.
        if(file_exists("../private/views/" .$path. ".php"))
        {
            //Inclui o arquivo da visualização
            include "../private/views/" .$path. ".php";
        }
    }
}