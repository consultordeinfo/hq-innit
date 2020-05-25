<?php


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
if ($vetResposta["success"]) echo "<p>Captcha OK!</p>\n";

else {
    echo "$<p>Problemas:</p>\n";
    foreach ($vetResposta["error-codes"] as $strErro) echo "$strTab<p>Erro: $strErro</p>\n";
}

