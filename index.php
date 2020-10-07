<title> Página </title>
<?php
    //carrega a classe do facebook
   require 'fb.php';
   
   //verifica se existe a sessão de login
   if(isset($_SESSION['fb_access_token']) && !empty($_SESSION['fb_access_token'])){

    //pega os dados do usuário logado, como: email, nome e id
    $res = $fb->get('/me?fields=email,name,id', $_SESSION['fb_access_token']);
    //desencoda o json
    $r = json_decode($res->getBody());
    //mostra o nome
    echo "Meu nome: ".$r->name;

    //para sair
    echo '<a href="sair.php" >Sair</a>';

   }else{
        //manda para o login, se não existir sessão
       header("Location: login.php");
       
   }
?>