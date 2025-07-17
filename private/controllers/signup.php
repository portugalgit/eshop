<?php
// Nota: Toda requisição feita pelo usuário passa primeiro pelo Controller, que valida e processa as informações recebidas

class Signup extends Controller
{
    //METODO PRINCIPAL DA CLASSE SIGNUP
    public function index()
    {
        // Define o título da página para ser utilizado na view
        $data['page_title'] = "signup";

        // Verifica se a requisição foi feita via método POST (formulário enviado)
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            // Carrega o modelo "User" para lidar com dados e validações do usuário
            $user = $this->load_model("User");
            
             // Executa o processo de cadastro do usuári
            $user->signup($_POST);
        }
        // Renderiza a view "signup", passando os dados definidos
        $this->view('signup',$data);
    }
}