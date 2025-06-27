<?php
//Nota: Cada frm que usuario passa se depara primeiro com o controller que valida a informação

class Logout extends Controller
{
    public function index()
    {
        //carrega os dados até o modelo da classe user para ser validado
        $user = $this->load_model("User");
        //sair
        $user->logout();

    }
}