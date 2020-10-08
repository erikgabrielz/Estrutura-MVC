<?php
    class homeController extends Controller{
        public function index(){
            $dados['title'] = "Página principal";
            $this->loadView("home", $dados);
        }
    }
?>