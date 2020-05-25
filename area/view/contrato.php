<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
require_once './../admin/modelo/ContratoPDO.php';

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
            <?php require_once './class/sub_menu_file.php'; ?>
        </div><br>
        
        <div class="container">
            <!-- DIV destinanda a NOTAS FISCAIS-->
            <div class="border">
                <div>
                    <div><h4 class="text-left">Contratos / Propostas / Adendos</h4></div><br>
                    <table border="1" class="table table-bordered table-responsive boleto-nfe">
                        <thead style="color: #fff; background: #adadad;">
                            <tr>
                                <th>Assinatura</th>
                                <th>Tipo documento</th>
                                <th>Baixar documento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contratos = new ContratoPDO();

                            foreach ($contratos->selectAllID($_SESSION['user_id']) as $file => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value->tb_contrato_data_assinatura; ?></td>
                                    <td><?php echo $value->tb_contrato_tipo_documento; ?></td>
                                    <td class="text-center">
                                        <form action="./class/GerarLogs.php" method="post">
                                            <button type="submit" name="log_contrato" style="width: 45px; height: 45px; border: none;"><img src="./images/icon/downloadupdates.png"/></button>
                                            <input type="hidden" name="download" value="<?php echo $caminho . $value->tb_contrato_hash_documento; ?>"/>
                                            
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
