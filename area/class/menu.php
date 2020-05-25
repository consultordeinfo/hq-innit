<!DOCTYPE html>
<?php
//Codificando valor para metodo GET
$on = "on";
$string_get_on = base64_encode($on);
$string_get_off = base64_encode($off);

//Destruindo a sessão
if(isset($_GET['sair']) && $_GET['sair'] == base64_decode($string_get_off)){
    encerrarSessao();
    header('Location: ../client_area.php');
}

function encerrarSessao(){
    session_destroy();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <div class="container-fluid principal" id="menu-up"><!--Topo menu-->

            <div class="container-fluid topo"><!--topo-->

                <div id="logo"><!--logo-->
                    <a href="./index.php"><img class="img-responsive" src="../images/img_site_full.png" alt="Logotipo HQ-InnIT"/></a>
                </div><!--#logo-->

                <div id="menu-principal"><!--Menu-->
                    <nav id="menu">
                        <ul>
                            <li><a href="?start=<?php echo $string_get_on; ?>">Ínicio</a></li>
                            <li><a href="?profile=<?php echo $string_get_on; ?>">Perfil</a></li>
                            <li><a href="?ticket=<?php echo $string_get_on; ?>">Abrir chamado</a></li> <!-- http://191.252.185.40/glpi/ 'Link para GLPI PRODUÇÃO'-->
                            <li><a href="?file=<?php echo $string_get_on; ?>">Arquivos</a></li>
                            <li><a href="?sair=<?php echo $string_get_off; ?>">Sair</a></li>
                        </ul>
                    </nav>
                </div><!--#Menu-->
                

            </div><!--#topo-->
        </div><!--#Topo menu-->
        
    </body>
</html>
