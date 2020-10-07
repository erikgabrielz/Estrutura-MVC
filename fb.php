<?php
    session_start();

    //carrega o autoload do facebook
    require 'Facebook/autoload.php';

    //instancia a classe Facebook
    $fb = new Facebook\Facebook([
        //define o app id
        'app_id' => '1518508458539257',
        //define o token
        'app_secret' => 'e139e053d76a161796abac0d23962ffa',
        //define a versão
        'default_graph_version' => 'v8.0'
    ]);
?>