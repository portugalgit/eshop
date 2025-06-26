<?php

Class User
{
    //definir uma variaver para receber a informação dos erros
    private $error = "";

    //metodo responsavel pelo recebimento e verificação dados do frm_signup
    public function signup($POST)
    {
        //os dados serão tratados como matriz da tabela
        $data = array();

        //instanciar a classe ou seja chama o BD para adicionar os dados na tabela
        $db = Database::getInstance();

        //remove espaço vazio na entrada dos dados ao frm
        $data['name']       = trim($POST['name']);
        $data['email']      = trim($POST['email']);
        $data['password']   = trim($POST['password']);
        $password2          = trim($POST['password2']);

        //definir regular expression default validar o email se estiver tudo bem
        if(empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
        {
            //mensagem de saida
            $this->error .= "Porfavor digite um email valido!<br>";
        }

        //definir regular expression default validar o nome se estiver tudo bem
        if (empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])) 
        {
            //mensagem de saida
            $this->error .= "Porfavor digite um nome valido!<br>";
        }

        //validar a password
        if($data['password'] !== $password2)
        {
            //mensagem de saida
            $this->error .= "A password não corresponde!<br>";
        }

        //definir o tamanho da password
        if(strlen($data['password']) < 4)
        {
            //mensagem de saida
            $this->error .= "A password deve ter pelo menos 4 caracteres<br>";
        }

        // VERIFICAÇÃO SE O EMAIL EXISTE
        $sql = "select * from users where email = :email limit 1";
        //compara na tabela e os dados de entrada
        $arr['email'] = $data['email'];
        //verifica a consulta
        $check = $db->read($sql,$arr);
        //se for uma matriz
        if(is_array($check)){
            $this->error .= "O email já esta em uso na tabela";
        }

        //url associado a usuario
        $data['url_address'] = $this->get_random_string_max(60);
        
        //fechar o array que traz o emai
        $arr = false;
        //VERIFICAÇÃO DA URL ADDRESS
        $sql = "select * from users where url_address = :url_address limit 1";
        //compara na tabela e os dados de entrada
        $arr['url_address'] = $data['url_address'];
        //verifica a consulta
        $check = $db->read($sql,$arr);
        //se for uma matriz
        if(is_array($check)){
        //nova url associado a usuario
        $data['url_address'] = $this->get_random_string_max(60);
        }

        //inserir os dados na tabela senão existir erros
        if($this->error == ""){
           
            //classificação
            $data['rank'] = "customer";
            //data de inserção formato guardado
            $data['date'] = date("Y-m-d H:i:s");
            $data['password'] = hash('sha1',$data['password']);

            //criar a query para inserir os dados na tabela users
            $query = "insert into users (url_address,name,email,password,rank,date) values (:url_address,:name,:email,:password,:rank,:date)";
            //pega o metodo "write" executa a query e adiciona na tabela os dados do formulario
            $result = $db->write($query,$data);

            //se forem bem adicionados
            if($result){

                //busca o frm login
                header("Location:" . ROOT . "login");
                //fecha
                die;
            }
        }
        $_SESSION['error'] = $this->error;
    }

    public function login($POST)
    {

    }

    public function get_user($url)
    {
        
    }

    //criar string aleatoria para a senha
    private function get_random_string_max($length)
    {
        //matriz de números
         $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
         $text = "";

        //obtendo um comprimento aleatorio
        $Length = rand(4, $length);

        //faz um loop 
        for($i = 0; $i < $Length; $i++){
            //e obtenha um valor aleatorio de 1 á 61
            $random = rand(0, count($array) - 1);
            //e adicione ao text
            $text .= $array[$random];
        }
        //retorna o text
        return $text;
    }
}