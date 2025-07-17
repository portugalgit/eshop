<?php
// Nota: Toda requisição do usuário passa primeiro pelo Controller, que valida e trata as ações necessárias

// A classe Logout herda da classe base Controller
class Logout extends Controller
{
    //METODO PRINCIPAL DA CLASSE LOGOUT
    public function index()
    {
        // Carrega o modelo "User" para lidar com dados e validações do usuário
        $user = $this->load_model("User");
        // Executa o processo de logout (encerrar sessão)
        $user->logout();

    }
}