<!DOCTYPE html>

<html>
    <head>
        <?php require_once './class/header.php';//Requisitando o cabeçalho ?>

        <meta charset="UTF-8">
        <meta name="description"
              content="A HQ-InnIT foi criada para proporcionar inovação, tecnologia e
              modelagem de processos para empresas que necessitam alavancar seu negócio.">
        <title>HQ-InnIT - Sobre nós</title>
    </head>
    <body>
        <?php require_once './class/menu.php'; //Requisitando o menu ?>

        <div class="" id="faixa_destque"><!--Faixa de destaque para as páginas-->
            <div class="container principal">
                <div class="vertical"><h1 class="">Empresa</h1></div>
            </div>
        </div><!--#Faixa de destaque para as páginas-->
        
        <?php require_once './class/aempresa.php'; //Requisitando texto sobre a empresa ?>
        
        <?php require_once './class/footer.php';//Requisitando o rodapé ?>
        
        <a href="#"><img class="seta-up" src="./images/icon/img-top-page.png" alt="Ícone para retornar ao topo da página" /></a> <!--Manda para o menu-->

    </body>
</html>
