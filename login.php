<?php
    //carrega a classe do Facebook
    require 'fb.php';

    //cria o helper
    $helper = $fb->getRedirectLoginHelper();

    //para adicionar permissões a mais
    $perms = array('email');

    //gera a url de login
    $loginurl = $helper->getLoginUrl('https://localhost/fbLogin/callback.php', $perms);
?>
<!-- botão para fazer login -->
<a href="<?php echo htmlspecialchars($loginurl); ?>">Fazer login com o facebook</a>