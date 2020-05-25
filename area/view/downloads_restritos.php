<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
require_once './../admin/modelo/RedePDO.php';

//Unindo caminho e diretório
$caminho = '../area/file_tools/';

$string_doc = 'on';
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
            <table border="1" class="table table-bordered table-responsive">
                        <thead style="color: #fff; background: #adadad;">
                            <tr>
                                <th>Última atualização</th>
                                <th>Descrição</th>
                                <th>Baixar arquivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rede = new RedePDO();
                            foreach ($rede->selectAllID($_SESSION['director_id']) as $file => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value->tb_rede_data_atualizacao; ?></td>
                                <td><?php echo $value->tb_rede_descricao; ?></td>
                                <td class="text-center">
                                    <form action="./class/GerarLogs.php" method="post">
                                            <button type="submit" name="log_nfe" style="width: 45px; height: 45px; border: none;"><img src="./images/icon/downloadupdates.png"/></button>
                                            <input type="hidden" name="download" value="<?php echo $caminho . $value->tb_rede_hash; ?>"/>
                                            
                                        </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
        </div>
    </body>
</html>
