<!DOCTYPE html>

<?php
//Codificando valor para metodo GET
$on = "on";
$string_get_on = base64_encode($on);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <div class="">
            <div id="menu-files"><!--Menu-->
            <nav id="menu">
                <ul>
                    <li><a href="?fiscais=<?php echo $string_get_on; ?>">Boletos e Notas fiscais</a></li>
                    <li><a href="?contrato=<?php echo $string_get_on; ?>">Contrato</a></li>
                    <li><a href="?docs=<?php echo $string_get_on; ?>">Documentação do(s) serviço(s)</a></li>
                    <li><a href="?sla=<?php echo $string_get_on; ?>">SLA contratada</a>
                </ul>
            </nav>
        </div><!--#Menu-->
        
        </div><br>
        
    </body>
</html>
