<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../admin/modelo/' . $class_name . '.php';
}

$arquivos = new ArquivosPDO();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>DELETANDO ARQUIVOS</title>
    </head>
    <body>
        <h3> TDOS ARQUIVOS</h3><br><br>
        <table border="1">
            <thead>
                <tr>
                    <th>Boletos</th>
                    <th>Contratos</th>
                    <th>NFE</th>
                    <th>SLA</th>
                    <th>Status do Boleto</th>
                    <th>Hash</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($arquivos->selectAll() as $files => $value){ ?>
                
                <tr>
                    <td><?php echo $value->tb_arquivos_boletos; ?></td>
                    <td><?php echo $value->tb_arquivos_contratos; ?></td>
                    <td><?php echo $value->tb_arquivos_nfe; ?></td>
                    <td><?php echo $value->tb_arquivos_sla; ?></td>
                    <td><?php echo $value->tb_arquivos_status_boleto; ?></td>
                    <td><?php echo $value->tb_arquivos_hash_id; ?></td>
                    <th>
                       <form action="teste_deleteID_arquivos.php" method="post">
                          <input type="hidden" name='delete' value='<?php echo $value->tb_arquivos_id; ?>'>
                          <input type="hidden" name='hash' value='<?php echo $value->tb_arquivos_hash_id; ?>'>
                          <input type="image" src="img_delete.png" width="25px">
                       </form>
                    </th>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>

    </body>
</html>
