<?php
//Nota: Cada frm que usuario passa se depara primeiro com o controller que valida a informação

//a classe Home herda da classe Controller
Class Home extends Controller
{
    public function index()
    {
        //carrega os dados até o modelo da classe user para ser validado
        $user = $this->load_model("User");

        //verifica se o usuario esta conectado
        $data['user_data'] = $user->ckeck_login();
        //se estiver atribua oa seus dados
        if(is_array($data['user_data'])){
            $data['user_data'] = $user_data;
        }

        //matriz de dados que vai para a view
        $data['page_title'] = "Home";
        //a classe Controller tem o método view(), que será usado aqui.
        $this->view("index",$data);
    }
}

