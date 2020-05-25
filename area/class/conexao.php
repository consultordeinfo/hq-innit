<?php

//Abrindo a sessão
session_start();

//Chamando classe de modelo de conexao
require_once 'DB.php';

//Buscando usuário no banco USERS
if (isset($_POST['login_user']) && isset($_POST['senha_user'])) {

    # Os parâmetros podem ficar em um array
    $vetParametros = array(
        "secret" => "6LcR874UAAAAAN_qhOFUgSzoUDeJr-Ct19f80iCh",
        "response" => $_POST["g-recaptcha-response"],
        "remoteip" => $_SERVER["REMOTE_ADDR"]
    );

# Abre a conexão e informa os parâmetros: URL, método POST, parâmetros e retorno numa string
    $curlReCaptcha = curl_init();
    curl_setopt($curlReCaptcha, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($curlReCaptcha, CURLOPT_POST, true);
    curl_setopt($curlReCaptcha, CURLOPT_POSTFIELDS, http_build_query($vetParametros));
    curl_setopt($curlReCaptcha, CURLOPT_RETURNTRANSFER, true);

# A resposta é um objeto json em uma string, então só decodificar em um array (true no 2º parâmetro)
    $vetResposta = json_decode(curl_exec($curlReCaptcha), true);

# Fecha a conexão
    curl_close($curlReCaptcha);

# Analisa o resultado (no caso de erro, pode informar os códigos)
    if ($vetResposta["success"]) {

        //Preparando SELECT na tabela USERs
        $stmt = DB::prepare("SELECT * FROM tb_user WHERE tb_user_login = ? AND tb_user_pass = ?");

        $stmt->bindParam(1, $_POST['login_user'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['senha_user'], PDO::PARAM_STR);

        $stmt->execute();

        $obj = $stmt->fetch(PDO::FETCH_ASSOC);

        //Preenchendo as variáveis de sessão com os valores do bd
        if ($obj) {
            $_SESSION['user_id'] = (int) $obj['tb_user_id'];
            $_SESSION['user_nome'] = (string) $obj['tb_user_nome'];
            $_SESSION['user_sobrenome'] = (string) $obj['tb_user_sobrenome'];
            $_SESSION['user_login'] = (string) $obj['tb_user_login'];
            $_SESSION['user_pass'] = (string) $obj['tb_user_pass'];
            $_SESSION['user_fone_celular'] = (string) $obj['tb_user_fone_celular'];
            $_SESSION['user_fone_fixo'] = (string) $obj['tb_user_fone_fixo'];
            $_SESSION['user_empresa'] = (string) $obj['tb_user_empresa'];
            $_SESSION['user_ativo'] = (int) $obj['tb_user_ativo'];


            //Verificação de usuário
            if ($_SESSION['user_login'] == true && $_SESSION['user_pass'] == true) {

                if ($_SESSION['user_ativo'] == 1) {

                    //Carregando variáveis de sessão para Logs
                    $_SESSION['down_boleto'] = 'down_boleto';
                    $_SESSION['down_nfe'] = 'down_nfe';
                    $_SESSION['down_contrato'] = 'down_contrato';
                    $_SESSION['down_proposta'] = 'down_proposta';
                    $_SESSION['down_doc_ti'] = 'down_doc_ti';
                    $_SESSION['alter_perfil'] = 'down_perfil';

                    header('Location: ../index.php');
                } else {
                    //Mensagem de erro
                    $_SESSION['loginErro'] = "Usuário não ativado!";
                    header('Location: ../../client_area.php');
                }
            }
        } else {
            //Mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou Senha Inválidos";
            header('Location: ../../client_area.php');
        }
    } else {
        //Mensagem de erro
        $_SESSION['loginErro'] = "Opss! Por favor, selecione: Não sou um robô.";
        header('Location: ../../client_area.php');
    }



    //Buscando usuário no banco USERS_DIRECTOR
} else if (isset($_POST['login_director']) && isset($_POST['senha_director'])) {

    # Os parâmetros podem ficar em um array
    $vetParametros = array(
        "secret" => "6LcR874UAAAAAN_qhOFUgSzoUDeJr-Ct19f80iCh",
        "response" => $_POST["g-recaptcha-response"],
        "remoteip" => $_SERVER["REMOTE_ADDR"]
    );

# Abre a conexão e informa os parâmetros: URL, método POST, parâmetros e retorno numa string
    $curlReCaptcha = curl_init();
    curl_setopt($curlReCaptcha, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($curlReCaptcha, CURLOPT_POST, true);
    curl_setopt($curlReCaptcha, CURLOPT_POSTFIELDS, http_build_query($vetParametros));
    curl_setopt($curlReCaptcha, CURLOPT_RETURNTRANSFER, true);

# A resposta é um objeto json em uma string, então só decodificar em um array (true no 2º parâmetro)
    $vetResposta = json_decode(curl_exec($curlReCaptcha), true);

# Fecha a conexão
    curl_close($curlReCaptcha);

# Analisa o resultado (no caso de erro, pode informar os códigos)
    if ($vetResposta["success"]) {

        //Preparando SELECT na tabela USERs
        $stmt = DB::prepare("SELECT * FROM tb_user_directors WHERE tb_user_directors_login = ? AND tb_user_directors_pass = ?");

        $stmt->bindParam(1, $_POST['login_director'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['senha_director'], PDO::PARAM_STR);

        $stmt->execute();

        $obj = $stmt->fetch(PDO::FETCH_ASSOC);

        //Preenchendo as variáveis de sessão com os valores do bd
        if ($obj) {
            $_SESSION['director_id'] = (int) $obj['tb_user_directors_id'];
            $_SESSION['director_nome'] = (string) $obj['tb_user_directors_nome'];
            $_SESSION['director_login'] = (string) $obj['tb_user_directors_login'];
            $_SESSION['director_pass'] = (string) $obj['tb_user_directors_pass'];
            $_SESSION['director_empresa'] = (string) $obj['tb_user_directors_empresa'];
            $_SESSION['director_ativo'] = (int) $obj['tb_user_directors_ativo'];


            //Verificação de usuário
            if ($_SESSION['director_login'] == true && $_SESSION['director_pass'] == true) {

                if ($_SESSION['director_ativo'] == 1) {

                    //Carregando variável de sessão para Log
                    $_SESSION['down_doc_ti'] = 'down_doc_ti';

                    //Variável codificada para acesso a área restrita de documentos de TI
                    $var = base64_encode('on');

                    header('Location: ../index.php?down=' . $var);
                } else {
                    //Mensagem de erro
                    //Variável codificada para acesso a área restrita de documentos de TI
                    $var = base64_encode('on');

                    header('Location: ../index.php?docs=' . $var);
                    $_SESSION['loginErro'] = "Usuário não ativado!";
                }
            } else {
                //Mensagem de erro
                $_SESSION['loginErro'] = "Usuário ou Senha Inválidos";
                header('Location: ../index.php?docs=' . $var);
            }
        } else {
            //Mensagem de erro
            //Variável codificada para acesso a área restrita de documentos de TI
            $var = base64_encode('on');

            header('Location: ../index.php?docs=' . $var);
            $_SESSION['loginErro'] = "Acesso negado!";
        }
    } else {
        //Mensagem de erro
         $var = base64_encode('on');
        $_SESSION['loginErro'] = "Opss! Por favor, selecione: Não sou um robô.";
        header('Location: ../index.php?docs=' . $var);
    }
}
?>