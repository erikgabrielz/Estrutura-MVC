<?php
    define("ENVIRONMENT", "development");
    define("BASE_TITLE", "Estrutura MVC - ");

    global $config;
    $config = array();

    if(ENVIRONMENT == 'development'){
        define("BASE_URL", "http://localhost");
        $config['dbname'] = '';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }else{
        define("BASE_URL", "http://localhost");
        $config['dbname'] = '';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }
?>