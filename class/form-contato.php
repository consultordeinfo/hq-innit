<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container-fluid principal"><!--Formulário-->

            <div class="container-fluid col-lg-6" id="form">
                
                <form class="form-group-lg" name="frmContato" id="" role="form" action="class/send_contato.php" method="post" onsubmit="return validarFormulario()">

                    <label id="nome-label">
                        <input class="form-control" type="text" name="nome" id="nome" placeholder="* Seu nome" />
                    </label><br>

                    <label id="email-label">
                        <input class="form-control"  type="text" name="email" id="email" placeholder="* Seu email" />
                    </label><br>

                    <label id="celular-label">
                        <input class="form-control"  type="text" name="tel_cel" id="tel_cel" placeholder="* Seu celular" />
                    </label><br>

                    <label id="fixo-label">
                        <input class="form-control"  type="text" name="tel_fixo" id="tel_fixo"  placeholder="Seu telefone" />
                    </label><br>

                    <label id="empresa-label">
                        <input class="form-control"  type="text" name="empresa" id="empresa" placeholder="* Nome da empresa" />
                    </label><br>

                    <label id="messager-label">
                        <textarea  class="form-control" name="messager" id="messager" placeholder="* Sua mensagem"></textarea>
                    </label><br>
                    
                    <p id="check"><input type="checkbox" name="newsletter" id="newsletter" checked="" /> Autorizo receber novidades!</p>
                    <p id="obriga">* Campos obrigatórios.</p>
                    
                    <div class="g-recaptcha"  data-sitekey="6LcR874UAAAAALLc2eRf7hrGO6RBJLk2bUpMfiQJ"></div><br>
                    
                    
                    <input class="btn btn-default" type="submit" name="enviar" id="enviar" value="&#xf0aa; Enviar" />
                    <input class="btn btn-default" type="reset" name="limpar" id="limpar" value="&#xf1f8; Limpar" />
                </form>
            </div>

            <div class="container col-lg-6 texto-endereco">
                <h3><img src="images/icon/img-location.png" alt="Ícone que representa localização" /> Nosso endereço</h3>
                <h4>Rua Vinício Ferreira de Oliveira, 261</h4>
                <h4>Santana de Parnaíba - SP</h4>
                <h4>CEP: 06525-095</h4><br>
                <h3><img src="images/icon/img-email.png" alt="Ícone que representa e-mail" id="img-endereco" /> Escreva para nós!</h3>
                <h4>Email: solutions@hq-innit.com.br</h4>
            </div>

        </div><!--#Formulário-->
    </body>
</html>
