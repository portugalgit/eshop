<?php
// Nota: Toda requisição (formulário ou rota) do usuário passa primeiro pelo Controller, que valida as informações recebidas.

// A classe Home herda da classe base Controller
Class Home extends Controller
{
    public function index()
    {
        // Carrega o modelo "User" para lidar com dados e validações do usuário
        $user = $this->load_model("User");
         
        // Verifica se o usuário está autenticado
        $user_data = $user->ckeck_login();
        
        // Se a autenticação for bem-sucedida, armazena os dados do usuário
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        // Define o título da página para ser enviado à view
        $data['page_title'] = "Home";
       
        // Renderiza a view "index", passando os dados definidos
        $this->view("index",$data);
    }
}

