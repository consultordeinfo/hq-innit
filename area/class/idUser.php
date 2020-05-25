<!DOCTYPE html>

<html>
    <head>
        
        <?php require_once '../class/header.php';//Requisitando configurações de cabeçãlho ?>
        
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container"><!--Arquitetura de TI-->

            <div>
                <h4 class="text-right"><b><?php echo $_SESSION['user_empresa']; ?></b></h4>
                <h5 class="text-right">Olá <b><?php echo $_SESSION['user_nome'] ?></b>, bem-vindo(a) à área do cliente!</h5>
            </div>
            
        </div><!--#Arquitetura de TI-->
    </body>
</html>
