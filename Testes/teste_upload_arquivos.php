<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>UPLOAD DE ARQUIVOS</title>
    </head>
    <body>
        <form action="teste_diretorio_arquivos_boleto.php" method="post" enctype="multipart/form-data">
            Selecione o arquivo desejado:
            <input type="file" name="fileToUpload" id="fileToUpload" ><br><br>
            <input type="submit" name="send" value="Carregar arquivo" >
        </form>
    </body>
</html>
