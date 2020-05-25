<!DOCTYPE html>

<html>
    <head>

        <?php require_once './class/header.php'; //Todos os metages das paginas ?>

        <meta charset="UTF-8">
        <meta name="description"
              content="Possuímos varias vertentes, entre elas: Outsourcing de TI, Gestão por Processos,
              Arquitetura Corporativa, Apps e Sistemas Web.">
        
        <title>HQ-InnIT - Inovações e Gestão em soluções de TI</title>

    </head>
    <body>
        <?php
        // Carregando menu
        require_once './class/menu.php';
        ?>

        <?php
        // Carregando carrossel principal
        require_once './class/banner-principal.php';
        ?>

        <?php
        // Carregando Missão e valores
        require_once './class/MissaoValores.php';
        ?>
        
        <?php
        // Carregando Missão e valores
        require_once './class/parceiros.php';
        ?>

        <?php
        // Carregando alerta para contato
        require_once './class/alert-contato.php';
        ?>

        <?php
        // Carregando API Google Maps
        require_once './class/localiza.php';
        ?>

        <?php 
        //Requisição para o rodapé
        require_once './class/footer.php'; 
        ?>

        <a href="#"><img class="seta-up" src="./images/icon/img-top-page.png" alt="Ícone para retornar ao topo da página" /></a> <!--Manda para o menu-->
        
    </body>
</html>
