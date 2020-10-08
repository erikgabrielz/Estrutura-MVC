<?php
    define("ENVIRONMENT", "development");

    global $config;
    $config = array();

    if(ENVIRONMENT == 'development'){
        define("BASE_URL", "https://localhost");
        $config['dbname'] = 'webservice';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }else{
        define("BASE_URL", "https://localhost");
        $config['dbname'] = 'webservice';
        $config['host'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }
?>