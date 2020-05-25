<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

// Carregando automaticamente a classe
require_once './../admin/modelo/SlaPDO.php';

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
        
        <div class="container img-responsive text-center">
            <h4>
                <p>
                    <strong>Abaixo estão descritos os tempos de respostas para cada chamado.</strong>
                </p>
            </h4>
            <?php
            $sla = new SlaPDO();
            
            foreach ($sla->selectAllID($_SESSION['user_id']) as $file => $value) {
                
            ?>
            <image src="<?php echo $caminho.$value->tb_sla_hash; ?>"/>
            
            <?php } ?>
        </div>
    </body>
</html>
