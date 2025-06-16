<?php
//a classe Home herda da classe Controller
//ou seja, pode usar todos os métodos e propriedades definidos em Controller.
Class Home extends Controller
{
    public function index()
    {
        $data['page_title'] = "Home";
        //a classe Controller tem o método view(), que será usado aqui.
        $this->view("index",$data);
    }
}

