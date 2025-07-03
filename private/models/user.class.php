<?php

/*
 * Modelo da Classe de Usuários
 */
Class User
{
    // Variável privada para armazenar mensagens de erro
    private $error = "";

    //Método responsável por processar o cadastro (signup)
    public function signup($POST)
    {
        // Inicializa o array de dados
        $data = array();

        // Obtém a instância do banco de dados (singleton)
        $db = Database::getInstance();

        // Limpa os espaços em branco dos dados do formulário
        $data['name']       = trim($POST['name']);
        $data['email']      = trim($POST['email']);
        $data['password']   = trim($POST['password']);
        $password2          = trim($POST['password2']);

        // Validação de email (não vazio e padrão válido)
        if(empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
        {
            $this->error .= "Porfavor digite um email valido!<br>";
        }

        // Validação do nome (não vazio e apenas letras)
        if (empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])) 
        {
            $this->error .= "Porfavor digite um nome valido!<br>";
        }

        // Verifica se as senhas coincidem
        if($data['password'] !== $password2)
        {
            $this->error .= "A password não corresponde!<br>";
        }

        // Verifica o tamanho mínimo da senha
        if(strlen($data['password']) < 4)
        {
            $this->error .= "A password deve ter pelo menos 4 caracteres<br>";
        }

       // Verifica se o e-mail já existe na base de dados
        $sql = "select * from users where email = :email limit 1";
        $arr['email'] = $data['email'];
        $check = $db->read($sql,$arr);
        if(is_array($check)){
            $this->error .= "O email já esta em uso na tabela";
        }

        // Gera um identificador único (URL) para o usuário
        $data['url_address'] = $this->get_random_string_max(60);
        $arr = false;

         // Verifica se o URL gerado já existe
        $sql = "select * from users where url_address = :url_address limit 1";
        $arr['url_address'] = $data['url_address'];
        $check = $db->read($sql,$arr);
        if(is_array($check)){
        // Gera um novo caso exista duplicado
        $data['url_address'] = $this->get_random_string_max(60);
        }

        // Se não houver erros, insere o usuário no banco
        if($this->error == ""){
            $data['rank'] = "customer";
            $data['date'] = date("Y-m-d H:i:s");
            $data['password'] = hash('sha1',$data['password']);

            $query = "insert into users (url_address,name,email,password,rank,date) values (:url_address,:name,:email,:password,:rank,:date)";
            $result = $db->write($query,$data);

            if($result){
                header("Location:" . ROOT . "login");
                die;
            }
        }
         // Salva os erros na sessão
        $_SESSION['error'] = $this->error;
    }


    /**
     * Método responsável por autenticar o login
     */
    public function login($POST)
    {
        //os dados serão tratados como matriz da tabela
        $data = array();

        // Obtém instância do banco de dados
        $db = Database::getInstance();

        // Limpa espaços dos dados recebidos
        $data['email']      = trim($POST['email']);
        $data['password']   = trim($POST['password']);
       
        // Validação de email
        if(empty($data['email']) || !preg_match("/^[a-zA-Z_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email']))
        {
            $this->error .= "Porfavor digite um email valido!<br>";
        }

        // Validação do tamanho da senha
        if(strlen($data['password']) < 4)
        {
            $this->error .= "A password deve ter pelo menos 4 caracteres<br>";
        }

        // Se não houver erros, tenta autenticar o usuário
        if($this->error == ""){
            $data['password'] = hash('sha1',$data['password']);

            $sql = "select * from users where email = :email && password = :password limit 1";
            $result = $db->read($sql,$data);

            if(is_array($result)){  
                $_SESSION['user_url'] = $result[0]->url_address;
                header("Location:" . ROOT . "home");
                die;
            }
                    $this->error .= "Email ou password errado!<br>";
        }

        $_SESSION['error'] = $this->error;
    }

    /**
     * Método para verificar se o usuário está autenticado
     */
    public function ckeck_login($redirect = false, $allowed = array())
    {
        $db = Database::getInstance();

         // Caso haja restrição de acesso por nível (rank)
        if(count($allowed) > 0){  

            $arr['url'] = $_SESSION['user_url'];
            $query = "select * from users where url_address = :url limit 1";
            $result = $db->read($query,$arr);
           
            if(is_array($result))
            {
                 $result = $result[0];
                 if(in_array($result->rank, $allowed)){
                    return $result;
                 }   
            }
                // Redireciona para login se não tiver permissão
                header("Location: " . ROOT . "login");
                die;
         }else{
            // Verifica se a sessão do usuário está ativa
            if(isset($_SESSION['user_url']))
            {
                $arr = false;
                $arr['url'] = $_SESSION['user_url'];
                $query = "select * from users where url_address = :url limit 1";
                $result = $db->read($query,$arr);

                    if(is_array($result))
                {
                    return $result[0];
                }
            }
            //senao existir usuario logado redireciona
            if($redirect){
                header("Location: " . ROOT . "login");
                die;
            }
        }
            return false;
    }

     /**
     * Método responsável por encerrar a sessão do usuário
     */
    public function logout()
    {
        //se tiver uma sessão aberta 
        if(isset($_SESSION['user_url']))
        {
            //fecha a sessão
            unset($_SESSION['user_url']);
        }

            //busca o frm home
            header("Location:" . ROOT . "home");
            //fecha
            die;
    }

    public function get_user($url)
    {
        
    }

     /**
     * Gera uma string aleatória com tamanho variável até um limite
     */
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