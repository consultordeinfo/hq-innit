<?php
// Carregando automaticamente a classe
function __autoload($class_name) {
    require_once '../pdo/' . $class_name . '.php';
}

//$news = new NewsPDO();
date_default_timezone_set('America/Sao_Paulo');

// incluir a funcionalidade do recaptcha
# Os parâmetros podem ficar em um array
$vetParametros = array (
    "secret" => "6LcR874UAAAAAN_qhOFUgSzoUDeJr-Ct19f80iCh",
    "response" => $_POST["g-recaptcha-response"],
    "remoteip" => $_SERVER["REMOTE_ADDR"]
);

# Abre a conexão e informa os parâmetros: URL, método POST, parâmetros e retorno numa string
$curlReCaptcha = curl_init();
curl_setopt($curlReCaptcha, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($curlReCaptcha, CURLOPT_POST, true);
curl_setopt($curlReCaptcha, CURLOPT_POSTFIELDS, http_build_query($vetParametros));
curl_setopt($curlReCaptcha, CURLOPT_RETURNTRANSFER, true);

# A resposta é um objeto json em uma string, então só decodificar em um array (true no 2º parâmetro)
$vetResposta = json_decode(curl_exec($curlReCaptcha), true);

# Fecha a conexão
curl_close($curlReCaptcha);

# Analisa o resultado (no caso de erro, pode informar os códigos)
if ($vetResposta["success"]){
    
    // Recebendo os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tel_cel = $_POST['tel_cel'];
    $tel_fixo = $_POST['tel_fixo'];
    $empresa = $_POST['empresa'];
    $texto = $_POST['messager'];
    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');

//    if (isset($_POST['newsletter']) == true) {
//        $newsletter = 1;
//    } else {
//        $newsletter = 0;
//    }


// Configuração para o corpo de email do formulário
    $arquivo_form = "
        <html>
            <h1 style='color: #A8CF45;'>HQ-InnIT - Contato via site</h1>
                <h3><b>Nome:</b> $nome</h3>
                <h3><b>Email:</b> $email</h3>
                <h3><b>Telefone celular:</b> $tel_cel</h3>
                <h3><b>Telefone fixo:</b> $tel_fixo</h3>
                <h3><b>Empresa:</b> $empresa</h3>
                <h3><b>Assunto:</b> $texto</h3>
                <p>Mensagem enviada em <b>$data_envio</b> as <b>$hora_envio</b> horas.</p>
        </html>";

// Configuração para o corpo de email do cliente
    $arquivo_client = "
        <html>
            <div>
                <img  src='http://www.hq-innit.com.br/images/form-site-superior.png' />
            </div>
            <div style='width: 500px; height: 100px; padding-left: 22px;'>
                <h3 >Olá $nome, recebemos sua mensagem e em breve retornaremos seu contato!</h3>
            </div>
            <div>
                <img src='http://www.hq-innit.com.br/images/form-site-inferior.png' />
            </div>
        </html>";

// Configuração para envio de form
// Email do destinatário form
    $emailEnviar_form = "solutions@hq-innit.com.br";
    $destino_form = "solutions@hq-innit.com.br";
    $assunto_form = "Contato - Sr(a) " . $nome . " da Empresa " . $empresa;

// Email do destinatário cliente
    $emailEnviar_client = "solutions@hq-innit.com.br";
    $destino_client = $email;
    $assunto_client = "HQ-InnIT - Contato via Site";

// Configurando formato do email para saida HTML
    $headers = "Content-type: text/html; charset=UTF-8\r\n";

// Enviando email do formulário
    $enviar_form = mail($destino_form, $assunto_form, $arquivo_form, $headers, "-r" . $emailEnviar_form);

// Enviando email do cliente
    $enviar_client = mail($destino_client, $assunto_client, $arquivo_client, $headers, "-r" . $emailEnviar_client);

    if ($enviar_form) {
        //require_once './msgEnviado.php';
        echo '<div style="margin-top: 15px; border: 5px solid #A9ABAE; border-radius: 10px; background-color: #A8CF45">
            <div align="center"><img style="" src="../images/img_site_full.png" />
                <h1>Mensagem enviada com sucesso!</h1>
            </div>
            
            <p style="font-size: 18px; font-family: arial black comic sans ms verdana; text-align: center;" >
                Obrigado Sr(a) <b>' . $nome . '</b>, seu contato é muito importante para nós,<br>
                em breve retornaremos seu contato!
            </p>
        </div>';

        echo "<meta http-equiv='refresh' content='10;URL=../index.php'>";


//        $news->setTb_news_nome($nome);
//        $news->setTb_news_email($email);
//        $news->setTb_news_fone_cel($tel_cel);
//        $news->setTb_news_fone_fixo($tel_fixo);
//        $news->setTb_news_empresa($empresa);
//        $news->setTb_news_assunto($texto);
//        $news->setTb_news_data_envio($data_envio);
//        $news->setTb_news_hora_envio($hora_envio);
//        $news->setTb_news_autoriza($newsletter);
//
//        $news->insert();
        
    } else {
        //require_once './msgErro.php';
        echo '<div style="margin-top: 15px; border: 5px solid #A9ABAE; border-radius: 10px; background-color: #A8CF45">
            <div align="center"><img style="" src="../images/img_site_full.png">
                <h1>Opss! Aconteceu alguma coisa e sua mensagem não foi enviada!</h1>
            </div>
            
            <p style="font-size: 18px; font-family: arial black comic sans ms verdana; text-align: center;" >
                Sr(a) <b>' . $nome . '</b>, pedimos desculpas pelo ocorrido,<br>
                por favor, tente novamente mais tarde ou se preferir entre contato pelo(s) telefone(s);<br>
                (11) 9xxxx-xxxx.
            </p>
        </div>';

        echo "<meta http-equiv='refresh' content='10;URL=../index.php'>";
    }
    
}else {
    echo '<div style="margin-top: 15px; border: 5px solid #A9ABAE; border-radius: 10px; background-color: #A8CF45">
            <div align="center"><img style="" src="../images/img_site_full.png" />
                <h1>Opss! Algo deu errado...</h1>
            </div>
            
            <p style="font-size: 18px; font-family: arial black comic sans ms verdana; text-align: center;" >
                Por favor, selecione <b>Não sou um robo</b> logo abaixo do formulário.<br>
                É necessário para validar seus dados. Obrigado!
            </p>
        </div>';

        echo "<meta http-equiv='refresh' content='10;URL=../contato.php'>";
    

}
