<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <?php require_once './class/sub_menu_file.php';// Requisitando o Sub-menu para a área 'ARQUIVOS' ?>
        </div><br>
        
        <div class="container-fluid">
            <form action="./class/conexao.php" method="post">
                <div class="container container_login modal-body">
                    <h4 class="text-center">Arquivos restritos, autentique-se.</h4>

                    <label id="login-label-restrito">
                        <input class="form-control" type="text" name="login_director" id="nome" placeholder="* Seu usuário" />
                    </label><br>

                    <label id="pass-label-restrito">
                        <input class="form-control" type="password" name="senha_director" id="nome" placeholder="* Sua senha" />
                    </label><br>

                    <div class="form-group">
                        <div class="g-recaptcha"  data-sitekey="6LcR874UAAAAALLc2eRf7hrGO6RBJLk2bUpMfiQJ"></div><br>
                        <input class="btn btn-default" type="submit" name="enviar" id="enviar" value="&#xf0aa; Enviar" /><br>
                            <?php
                            if (isset($_SESSION['loginErro'])) {
                                echo '<br>';
                                echo '<p style="color:red; font-family:verdana; font-size:14px; padding-left:20px;">' . $_SESSION['loginErro'] . '</p>';
                                unset($_SESSION['loginErro']);
                            }
                            ?>
                        
                    </div>
            </form>
        </div>
    </body>
</html>
