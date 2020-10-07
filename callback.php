<?php

    //carrega a classe do facebook
    require 'fb.php';

    //cria um helper
    $helper = $fb->getRedirectLoginHelper();

    try{
        //inicializa a sessão
        $_SESSION['fb_access_token'] = (string) $helper->getAccessToken();
    
    }catch(Facebook\Exceptions\FacebookResponseException $e){
        echo "Erro: ".$e->getMessage();
        exit();
    }catch(Facebook\Exceptions\FacebookSDKException $e){
        echo "Erro SDK: ".$e->getMessage();
        exit();
    }
    //redireciona para o index
    header("Location: index.php");
?>