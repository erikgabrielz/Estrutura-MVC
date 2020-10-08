<?php
    session_start();
    require_once('config.php');

    spl_autoload_register(function ($class){
        if(strpos($class, "Controller") && file_exists("controllers/".$class.".php")){
            require_once("controllers/".$class.".php");
        }elseif(file_exists("models/".$class.".php")){
            require_once("Models/".$class.".php");
        }elseif(file_exists("system/".$class.".php")){
            require_once("system/".$class.".php");
        }
    });

    $s = new system();
    $s->run();
?>