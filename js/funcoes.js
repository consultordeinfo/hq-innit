/* 
 FUNÇOES JAVASCRIPT
 */

/*Função de auto carregamento*/
window.onload = function () {
    
    

        $('.seta-up').hide();

        var nav = $('.seta-up');
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('.seta-up').show();
                nav.addClass("fixar-seta-up");
            } else {
                nav.removeClass("fixar-seta-up");
            }
        });
   
};

// VALIDAR FORMULARIOS DE PROPSTAS

function validarFormulario() {
    // Verificando o campo nome
    if (document.frmContato.nome.value === "") {
        alert("CAMPO OBRIGATÓRIO!\nPor favor, preencha o NOME completo!");
        document.frmContato.nome.focus();
        return false;


    }// verificando os caracteres do email
    else if (document.frmContato.email.value === "" || document.frmContato.email.value.indexOf('@') === -1 || document.frmContato.email.value.indexOf('.') === -1) {
        alert("CAMPO OBRIGATÓRIO!\nPor favor, digite um EMAIL válido!");
        document.frmContato.email.focus();
        return false;

    } else if (document.frmContato.tel_cel.value === "") {
        alert("CAMPO OBRIGATÓRIO!\nPor favor, digite um Nº CELULAR válido!");
        document.frmContato.tel_cel.focus();
        return false;

    } else if (document.frmContato.empresa.value === "") {
        alert("CAMPO OBRIGATÓRIO!\nPor favor, digite NOME DA EMPRESA válido!");
        document.frmContato.empresa.focus();
        return false;

    } else if (document.frmContato.messager.value === "") {
        alert("CAMPO OBRIGATÓRIO!\nPor favor, digite uma MENSAGEM para que possamos entender o que necessita!");
        document.frmContato.messager.focus();
        return false;

    } else {

    }

}




