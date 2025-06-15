<?php
/*classe que será responsável por controlar a lógica de roteamento 
(ou seja, decidir qual controlador/método deve ser chamado com base na URL).*/
Class App
{
    //ATRIBUTOS DA CLASSE
    //$controller: define o nome do controlador padrão (arquivo home.php dentro de /controllers/).
    //$method: define o método padrão que será chamado no controlador (geralmente index()).
    //$params: guardará os parâmetros adicionais passados na URL (como IDs, etc.).
    protected $controller = "home";
    protected $method ="index";
    protected $params;
 
    //CONSTRUTOR
    //O método __construct() é executado automaticamente quando a classe App é instanciada.
    public function __construct()
    {
        //PEGAR A URL (http://localhost/eshop/public/)
        //E chama o método parseURL() para quebrar a URL digitada pelo usuário em partes e armazena isso na variável $url.
        $url = $this->parseURL();

       //VERIFICAR SE O CONTROLADOR EXISTE
       //Verifica se o primeiro segmento da URL (ex: produto em produto/ver/5) corresponde a um arquivo de controlador válido
       if(file_exists("../private/controllers/". strtolower($url[0]).".php"))
       {
            //Se existir, define $this->controller com esse nome (em minúsculo) e remove o item da URL com unset.
            $this->controller = strtolower($url[0]);
            unset($url[0]);
       }
            //CARREGAR O CONTROLADOR
            //Inclui o arquivo do controlador (ex: home.php, produto.php).
            require "../private/controllers/" . $this->controller .".php";
            //Cria uma nova instância da classe correspondente e a armazena em $this->controller.
            $this->controller = new  $this->controller;

        //verificar se o metodo existe dentro da classe instanciada
        //Verifica se o segundo item da URL (ex: ver em produto/ver/5) foi definido.
       if(isset($url[1]))
       {
            //Se sim, converte para minúsculas e verifica se o método existe na classe instanciada.
            $url[1] = strtolower($url[1]);
            //Se existir, atualiza $this->method com ele e remove o item da URL.
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
       }

       //PEGAR OS PARÂMETROS
       //O que sobrou da URL (como 5 em produto/ver/5) será tratado como parâmetros.
       //Se não houver parâmetros, define como ["home"].
       $this->params = (count($url) > 0) ? $url : ["home"];

       //CHAMAR O MÉTODO COM OS PARÂMETROS
       //Chama o método dinamicamente, passando os parâmetros.
       //Exemplo: se for produto/ver/5, vai chamar:$produto = new Produto();$produto->ver(5);
       call_user_func_array([$this->controller, $this->method], $this->params);
    }

    //MÉTODO AUXILIAR
    //Este método retorna a URL dividida em partes, por exemplo:
    //produto/ver/5 → ['produto', 'ver', '5'].
    private function parseURL()
    {
        //1.Verifica se $_GET['url'] existe (definido via .htaccess geralmente).
        //2.Remove barras extras no início/fim.
        //3.Limpa a string para evitar injeções com FILTER_SANITIZE_URL.
        //4.Divide a URL em partes com explode.
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/",filter_var(trim($url,"/"), FILTER_SANITIZE_URL));
    }

}