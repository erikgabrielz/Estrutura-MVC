<?php
    class erroController extends Controller{
        public function index(){
            $dados = array();
            $dados['title'] = "Página não encontrada!";
            $this->loadTemplate("erro", $dados);
        }
    }
?>