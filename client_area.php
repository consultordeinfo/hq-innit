<!DOCTYPE html>

<?php
session_start();
?>

<html>
    <head>
        
        <?php require_once './class/header.php';//Requisitando o cabeçalho ?>
        <meta charset="UTF-8">
        
        <title>Área Restrita - Clientes</title>
    </head>
    <body>
        <?php require_once './class/menu.php';//Requisitando o menu ?>
        
        <div class="" id="faixa_destque"><!--Faixa de destaque para as páginas-->
            <div class="container principal">
                <div class="vertical"><h1 class="">Área do Cliente</h1></div>
            </div>
        </div><!--#Faixa de destaque para as páginas-->
        
        <?php require_once './class/arestrita.php';//Requisitando formulário para login da ára restrita ?>
        <?php require_once './class/footer.php';//Requisitando rodapé ?>
    </body>
</html>
