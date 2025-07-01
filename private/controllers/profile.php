<?php
// Nota: Toda requisição feita pelo usuário passa primeiro pelo Controller, que é responsável por validar e tratar as informações recebidas

// A classe Profile herda da classe base Controller
Class Profile extends Controller
{
    public function index()
    {
        // Carrega o modelo "User" para lidar com dados e validações do usuário
        $user = $this->load_model("User");

        // Verifica se o usuário está autenticado
        $user_data = $user->ckeck_login(true);

        // Se a autenticação for bem-sucedida, armazena os dados do usuário
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

       // Define o título da página para ser enviado à view
        $data['page_title'] = "Profile";

         // Renderiza a view "profile", passando os dados coletados
        $this->view("profile",$data);
    }
}

