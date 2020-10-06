<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="ie-edge" />

        <title><?php echo isset($viewData['title']) ? BASE_TITLE.$viewData['title'] : BASE_TITLE; ?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/template.css" />
    </head>

    <body>
        <header>   
            Cabeçalho
        </header>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        <footer>
            Rodapé
        </footer>
    </body>
</html>