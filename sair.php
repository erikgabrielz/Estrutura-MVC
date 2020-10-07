<?php
    //inicializa ou continua a sessão
    session_start();
    
    //destói a sessão fb_access_token
    unset($_SESSION['fb_access_token']);
    
    //zera a $_SESSION
    $_SESSION = array();
    
    //destroi a sessão
    session_destroy();

    //manda para o index
    header("Location: index.php");
?>