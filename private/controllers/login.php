<?php
// Nota: Toda requisição (como formulários) passa primeiro pelo Controller, que valida e processa os dados

// A classe Login herda da classe base Controller
class Login extends Controller
{
    public function index()
    {
       // Define o título da página para ser usado na view
        $data['page_title'] = "login";

        // Verifica se o método da requisição é POST (formulário enviado)
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            // Carrega o modelo "User" para processar a autenticação
            $user = $this->load_model("User");
           
            // Executa o processo de login com os dados enviados pelo formulário
            $user->login($_POST);
        }

        // Renderiza a view "login", passando os dados definidos
        $this->view('login',$data);
    }
}