<?php
//Nota: Cada frm que usuario passa se depara primeiro com o controller que valida a informação

class Signup extends Controller
{
    public function index()
    {
        //pega os dados do frm signup
        $data['page_title'] = "signup";

       //se o metodo de solicitação for POST
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //carrega os dados até o modelo da classe user para ser validado
            $user = $this->load_model("User");
            //faz a inscrição
            $user->signup($_POST);
        }
        
        $this->view('signup',$data);
    }
}