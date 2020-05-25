<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
require_once './../admin/modelo/VisitaPDO.php';

//Unindo caminho e diretório
$caminho = '../area/file_tools/';


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-12 border">
                <a href="http://191.252.185.40/glpi/" target="_blank">
                    <input type="button" name="btnTicket" id="btnTicket" value="Abrir chamado"/>
                </a>
                
                <h4 class="text-center">Dias de visitas agendadas</h4><br>
                <p class="text-uppercase">* As datas de visitas agendadas poderão ser alteradas sem prévio aviso.</p>
                <div>
                    <table class="table table-bordered table-responsive" border="1">
                        <thead style="color: #fff; background: #adadad;">
                            <tr>
                                <th>Visita para:</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $visitas = new VisitaPDO();
                            
                            foreach ($visitas->selectAllID($_SESSION['user_id']) as $file => $value) { 
                            ?>
                            <tr>
                                <td><?php echo $value->tb_visita_dia_preventiva; ?></td>
                                <td><?php echo $value->tb_visita_status; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><br>

            </div><br>

            

        </div>
    </body>
</html>
