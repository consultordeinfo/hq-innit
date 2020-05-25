<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
require_once './../admin/modelo/BoletosPDO.php';

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
            <?php require_once './class/sub_menu_file.php'; // Requisitando o Sub-menu para a área 'ARQUIVOS'  ?>
        </div><br>

        <div class="container">
            <!--DIV destinada a BOLETOS-->
            <div class="border">
                <div>
                    <div><h4 class="text-left">Dados bancários</h4></div>
                    <p class="" style="color: #adadad;"><br>
                        Se você optou por transferência bancária, abaixo estão nossos dados.<br><br>
                        <b>Banco Itaú: 341</b><br>
                        <b>Agência: 0024</b><br>
                        <b>C/C: 27887-1</b><br>
                        <b>Favorecido: HQ INNOVAÇÕES G SOLUÇÕES LTDA.</b><br>
                        <b>CNPJ: 30.489.346/0001-66</b><br>
                    </p>
                </div>

            </div>

            <!-- DIV destinanda a NOTAS FISCAIS-->
            <div class="border">
                <div>
                    <div><h4 class="text-left">2ª via de Boletos e NF-e</h4></div><br>
                    <p>Para atualizar seu Boleto vencido 
                        <strong><a href="https://www.itau.com.br/servicos/boletos/atualizar/" target="_blank">clique aqui!</a></strong>
                    </p><br>
                    <table border="1" class="table table-bordered table-responsive boleto-nfe">
                        <thead style="color: #fff; background: #adadad;">
                            <tr>
                                <th>Vencimento</th>
                                <th>Status</th>
                                <th>Baixar boleto</th>
                                <th>Baixar NF-e</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $boletos = new BoletosPDO();

                            foreach ($boletos->selectAllID($_SESSION['user_id']) as $file => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value->tb_boleto_venc_boleto; ?></td>
                                    <td><?php echo $value->tb_boleto_status_boleto; ?></td>
                                    <td class="text-center">
                                        <form action="./class/GerarLogs.php" method="post">
                                            <button type="submit" name="log_boleto" style="width: 45px; height: 45px; border: none;"><img src="./images/icon/downloadupdates.png"/></button>
                                            <input type="hidden" name="download" value="<?php echo $caminho . $value->tb_boleto_hash_boleto; ?>"/>
                                            
                                        </form>
                                    </td>
                                    <td class="text-center">
                                         <form action="./class/GerarLogs.php" method="post">
                                            <button type="submit" name="log_nfe" style="width: 45px; height: 45px; border: none;"><img src="./images/icon/downloadupdates.png"/></button>
                                            <input type="hidden" name="download" value="<?php echo $caminho . $value->tb_boleto_hash_nfe; ?>"/>
                                            
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
