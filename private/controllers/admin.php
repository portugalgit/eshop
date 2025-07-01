<?php
// Nota: Toda requisição do usuário passa primeiro pelo Controller, que valida as informações recebidas.


// A classe Admin herda da classe base Controller
Class Admin extends Controller
{
    public function index()
    {
        // Carrega o modelo "User" para manipular e validar dados do usuário
        $user = $this->load_model("User");

        // Verifica se o usuário está autenticado e tem permissão de administrador
        $user_data = $user->ckeck_login(true, ["admin"]);

        // Se a autenticação for bem-sucedida, armazena os dados do usuário
        if(is_object($user_data)){
            $data['user_data'] = $user_data;
        }

        // Define o título da página para ser usado na view
        $data['page_title'] = "Admin";

        // Renderiza a view "admin/index", passando os dados coletados
        $this->view("admin/index",$data);
    }
}

