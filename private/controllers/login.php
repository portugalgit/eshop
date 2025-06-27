<?php
//Nota: Cada frm que usuario passa se depara primeiro com o controller que valida a informação

class Login extends Controller
{
    public function index()
    {
        //pega os dados do frm login
        $data['page_title'] = "login";

        //se o metodo de solicitação for POST
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //carrega os dados até o modelo da classe user para ser validado
            $user = $this->load_model("User");
            //faz o login
            $user->login($_POST);
        }

        $this->view('login',$data);
    }
}