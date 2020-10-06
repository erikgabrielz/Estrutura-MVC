<?php
    class Model{
        protected $connect;

        public function __construct(){
            try{
                $this->connect = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
            }catch(PDOExeption $e){
                echo "Erro: ".$e->getMessage();
            }
        }
    }
?>