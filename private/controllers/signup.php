<?php
/*
* Controlador da Classe Usuarios
*/
class Signup extends Controller
{
    public function index()
    {
        //pega o frm signup
        $data['page_title'] = "signup";
        //se o frm signup tiver preenchido
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //pega os dados e verifica no modelo da classe user
            $user = $this->load_model("User");
            //entrega os dados no metodo signup
            $user->signup($_POST);
        }
        
        $this->view('signup',$data);
    }
}