<?php

Class Produto extends Controller
{
    public function index()
    {
        //a classe Controller tem o método view(), que será usado aqui.
        $this->view("produto");
    }
    
}