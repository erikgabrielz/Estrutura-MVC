<?php
    class homeController extends Controller{
        public function index(){
            $dados = array();
            $dados['title'] = "Home";
            $this->loadTemplate("home", $dados);
        }
    }
?>