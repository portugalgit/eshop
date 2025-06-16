<?php

class Signup extends Controller
{
    public function index()
    {
        $data['page_title'] = "Signup";
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            debug($_POST);
        }
        
        $this->view('signup',$data);
    }
}