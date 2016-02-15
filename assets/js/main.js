$(document).ready(function(){

    /////                      /////
    /////                      /////
    //                            //
    //         SCROLLBARS         //
    //                            //
    /////                      /////
    /////                      /////

    $('.menu-layer').perfectScrollbar();
    $('.search-layer').perfectScrollbar();
    $('.message-list').perfectScrollbar();
    $('.messages').perfectScrollbar();
    $('#notifications').perfectScrollbar();
    $('#settings').perfectScrollbar();

    /////                      /////
    /////                      /////
    //                            //
    //         LT ADJUSTS         //
    //                            //
    /////                      /////
    /////                      /////

    var loginTitle = $('#loginTitle');
    var btnLogin = $('#btn-login');
    var loginSrc = $('.login-screen');
    $(loginTitle).html('Entrar no Sistema');
    $('#email').val('').focus();
    $('#senha').val('');

    /////                       /////
    /////                       /////
    //                             //
    //       LOGIN STRUCTURE       //
    //                             //
    /////                       /////
    /////                       /////

    $(btnLogin).click(function(){
        if($(loginTitle).hasClass('errTitle')) $(loginTitle).removeClass('errTitle').html('Entrar no Sistema');
        var txtLoginEmail = $('#email');
        var txtSenha = $('#senha');
        if(txtLoginEmail.val() != '' && txtSenha.val() != '')
        {
            $.ajax({
                method: "POST",
                url: "login/enter",
                data: {
                    loginemail: $(txtLoginEmail).val(),
                    senha: $(txtSenha).val()
                },
                beforeSend: function(){
                    $(btnLogin).html('<i class="fa fa-spinner fa-pulse fa-lg"></i>');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            }).done(function(data){
                switch (data)
                {
                    case 'logged':
                        $(location).attr('href', '/');
                        break;
                    case 'login':
                        Lobibox.notify(
                            'error',
                            {
                                position: "top right",
                                width: $(window).width(),
                                delay: 5000,
                                title: 'Login / E-Mail Incorreto',
                                msg: 'O Login / E-mail digitado não corresponde a um usuário válido. Verifique e tente novamente!'
                            }

                        );
                        $(btnLogin).html('Entrar');
                        $(loginTitle).html('<i class="fa fa-warning" style="margin-right:10px;"></i> Verifique os dados').addClass('errTitle');
                        $(txtSenha).val('');
                        $(txtLoginEmail).val('').focus();
                        shake(loginSrc);
                        break;
                    case 'senha':
                        Lobibox.notify(
                            'error',
                            {
                                position: "top right",
                                width: $(window).width(),
                                delay: 5000,
                                title: 'Senha Incorreta',
                                msg: 'A Senha digitada está incorreta. Verifique e tente novamente!'
                            }
                        );
                        $(btnLogin).html('Entrar');
                        $(loginTitle).html('<i class="fa fa-warning" style="margin-right:10px;"></i> Verifique os dados').addClass('errTitle');
                        $(txtSenha).val('').focus();
                        shake(loginSrc);
                        break;
                    case 'activation':
                        Lobibox.notify(
                            'error',
                            {
                                position: "top right",
                                width: $(window).width(),
                                delay: 5000,
                                title: 'Usuário Inativo',
                                msg: 'Você não ativou sua conta por favor verifique seu e-mail e tente novamente'
                            }
                        );
                        $(btnLogin).html('Entrar');
                        shake(loginSrc);
                        break;
                    case 'error':
                        Lobibox.notify(
                            'error',
                            {
                                position: "top right",
                                width: $(window).width(),
                                delay: 5000,
                                title: 'Login / E-Mail Incorreto',
                                msg: 'O Login / E-mail digitado está incorreto. Tente Novamente!'
                            }
                        );
                        $(btnLogin).html('Entrar');
                        $(loginTitle).html('<i class="fa fa-warning" style="margin-right:10px;"></i> Verifique os dados').addClass('errTitle');
                        $(txtSenha).val('');
                        $(txtLoginEmail).val('').focus();
                        shake(loginSrc);
                }
            });
        }
        else
        {
            shake(loginSrc);
            $(loginTitle).html('<i class="fa fa-warning" style="margin-right:10px;"></i> Verifique os dados').addClass('errTitle');
        }
    });

    /////                        /////
    /////                        /////
    //                              //
    //  RECOVER PASSWORD STRUCTURE  //
    //                              //
    /////                        /////
    /////                        /////

    var forgotMail = $('#forgot-email');
    var btnRecovery = $('.recovery-login');
    $(btnRecovery).click(function(){
        if($(forgotMail).val() != "")
        {
            var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            if(filter.test(forgotMail.val()))
            {
                $.ajax({
                    method: "POST",
                    url: "login/recovery",
                    data: {
                        email: $(forgotMail).val()
                    },
                    beforeSend: function(){
                        $(btnRecovery).html('<i class="fa fa-spinner fa-pulse fa-lg"></i>');
                    }
                }).done(function(recover) {
                    $('.recovery-login').html('Enviar');
                    switch (recover)
                    {
                        case 'ok':
                            $('.panel-body').hide();
                            $('#pane-login').fadeIn(1000);
                            $('.login-screen').removeClass('forgot-password create-account');
                            $('#email').val('').focus();
                            $('#senha').val('');
                            $('#loginTitle').html('Entrar no Sistema');
                            Lobibox.notify(
                                'success',
                                {
                                    position: "top right",
                                    width: $(window).width(),
                                    delay: false,
                                    title: 'NOVA SENHA ENVIADA EM SEU E-MAIL!',
                                    msg: 'Uma nova senha foi enviada para o e-mail: ' + $(forgotMail).val() + '.<br> O e-mail pode demorar alguns minutos para chegar.'
                                }
                            );
                            break;
                        case 'errorEmail':
                            Lobibox.notify(
                                'error',
                                {
                                    position: "top right",
                                    width: $(window).width(),
                                    delay: 5000,
                                    title: 'NOVA SENHA NÃO ENVIADA',
                                    msg: 'Ocorreu um erro no envio da nova senha. Tente novamente.'
                                }
                            );
                            break;
                        case 'errorNoEmail':
                            Lobibox.notify(
                                'error',
                                {
                                    position: "top right",
                                    width: $(window).width(),
                                    delay: 5000,
                                    title: 'E-MAIL NÃO ENCONTRADO!',
                                    msg: 'O e-mail que você digitou não foi encontrado em nossa base de dados. Verifique.'
                                }
                            );
                            break;
                        default:
                            Lobibox.notify(
                                'error',
                                {
                                    position: "top right",
                                    width: $(window).width(),
                                    delay: 5000,
                                    title: 'ERRO NOS DADOS!',
                                    msg: 'Ocorreu um erro inesperado no envio dos dados para o servidor remoto. Tente novamente.'
                                }
                            );
                            break;
                    }
                });
                return true;
            } else {
                Lobibox.notify(
                    'error',
                    {
                        position: "top right",
                        width: $(window).width(),
                        delay: 5000,
                        title: 'E-MAIL INVÁLIDO!',
                        msg: 'O e-mail que você digitou não é um endereço de e-mail válido.'
                    }
                );
                return false;
            }
        } else {
            Lobibox.notify(
                'error',
                {
                    position: "top right",
                    width: $(window).width(),
                    delay: 5000,
                    title: 'E-MAIL NÃO DIGITADO!',
                    msg: 'Digite seu endereço de e-mail.'
                }
            );
            return false;
        }
    })
    $(forgotMail).keypress(function(e) {
        if(e.which == 13) {
            $(btnRecovery).click();
            return false;
        }
    });

    /////                        /////
    /////                        /////
    //                              //
    //   CREATE ACCOUNT STRUCTURE   //
    //                              //
    /////                        /////
    /////                        /////

    var createAccountButton = $('#create-account-button');
    $(createAccountButton).click(function(){
        var caNome = $('#ca-nome');
        var caLogin = $('#ca-login');
        var caEmail = $('#ca-email');
        var caEmailConfirm = $('#ca-email-confirm');
        var validEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var caError = 0;
        var caErMessage = '';
        if($(caNome).val() == ''){
            caErMessage += '<i class="fa fa-arrow-right"></i> O campo <strong>Nome</strong> é obrigatório.';
            caError = caError + 1;
        }
        if($(caLogin).val() == ''){
            if(caError > 0){
                caErMessage += '<br><i class="fa fa-arrow-right"></i> O campo <strong>Login</strong> é obrigatório.';
            }else{
                caErMessage += '<i class="fa fa-arrow-right"></i> O campo <strong>Login</strong> é obrigatório.';
            }
            caError = caError + 1;
        }else{
            var loginLogic = /^[a-zA-Z0-9]+$/;
            if(!loginLogic.test($(caLogin).val())){
                if(caError > 0){
                    caErMessage += '<br><i class="fa fa-arrow-right"></i> O campo <strong>Login</strong> não pode possuir espaços ou caracteres especiais. Somente letras e números.';
                }else{
                    caErMessage += '<i class="fa fa-arrow-right"></i>  O campo <strong>Login</strong> não pode possuir espaços ou caracteres especiais. Somente letras e números.';
                }
                caError = caError + 1;
            }
        }
        if($(caEmail).val() == ''){
            if(caError > 0){
                caErMessage += '<br><i class="fa fa-arrow-right"></i> O campo <strong>E-mail</strong> é obrigatório.';
            }else{
                caErMessage += '<i class="fa fa-arrow-right"></i> O campo <strong>E-mail</strong> é obrigatório.';
            }
            caError = caError + 1;
        }else{
            if(!validEmail.test($(caEmail).val())){
                if(caError > 0){
                    caErMessage += '<br><i class="fa fa-arrow-right"></i> O campo <strong>E-mail</strong> não é um endereço de e-mail válido.';
                }else{
                    caErMessage += '<i class="fa fa-arrow-right"></i> O campo <strong>E-mail</strong> não é um endereço de e-mail válido.';
                }
                caError = caError + 1;
            }
        }
        if($(caEmailConfirm).val() == ''){
            if(caError > 0){
                caErMessage += '<br><i class="fa fa-arrow-right"></i> O campo <strong>Confirmação de E-mail</strong> é obrigatório.';
            }else{
                caErMessage += '<i class="fa fa-arrow-right"></i> O campo <strong>Confirmação de E-mail</strong> é obrigatório.';
            }
            caError = caError + 1;
        }else{
            if($(caEmailConfirm).val() != $(caEmail).val()){
                if(caError > 0){
                    caErMessage += '<br><i class="fa fa-arrow-right"></i> O campo <strong>E-mail</strong> não é igual ao campo <strong>Confirmação de E-mail</strong>.';
                }else{
                    caErMessage += '<i class="fa fa-arrow-right"></i> O campo <strong>E-mail</strong> não é igual ao campo <strong>Confirmação de E-mail</strong>.';
                }
                caError = caError + 1;
            }else{
                if(!validEmail.test($(caEmailConfirm).val())){
                    if(caError > 0){
                        caErMessage += '<br><i class="fa fa-arrow-right"></i> O campo <strong>Confirmação de E-mail</strong> não é um endereço de e-mail válido.';
                    }else{
                        caErMessage += '<i class="fa fa-arrow-right"></i> O campo <strong>Confirmação de E-mail</strong> não é um endereço de e-mail válido.';
                    }
                    caError = caError + 1;
                }
            }
        }
        if(caError > 0)
        {
            Lobibox.notify(
                'error',
                {
                    position: "top right",
                    width: $(window).width(),
                    delay: 7000,
                    title: 'OCORRERAM ALGUNS ERROS:',
                    msg: caErMessage
                }
            );
            shake(loginSrc);
        }else{
            $.ajax({
                method: "POST",
                url: "login/register",
                data: {
                    nome: $(caNome).val(),
                    login: $(caLogin).val(),
                    email: $(caEmail).val(),
                    emailConfirm: $(caEmailConfirm).val()
                },
                beforeSend: function(){
                    $(createAccountButton).html('<i class="fa fa-spinner fa-pulse fa-lg"></i>');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            }).done(function(data) {
                $(createAccountButton).html('Cadastrar');
                switch (data) {
                    case 'login':
                        Lobibox.notify(
                            'error',
                            {
                                position: "top right",
                                width: $(window).width(),
                                delay: 5000,
                                title: 'LOGIN EXISTENTE',
                                msg: 'O escolhido já está cadastrado, por favor, escolha outro.'
                            }
                        );
                        shake(loginSrc);
                        break;
                    case 'email':
                        Lobibox.notify(
                            'error',
                            {
                                position: "top right",
                                width: $(window).width(),
                                delay: 5000,
                                title: 'E-MAIL JÁ CADASTRADO',
                                msg: 'O e-mail digitado á está cadastrado, por favor, realize o login.'
                            }
                        );
                        shake(loginSrc);
                        break;
                    case 'noAuth':
                        var noAuthMsg = 'O Usuário cadastrado não possui autorização prévia para usar o sistema.<br>';
                        noAuthMsg += 'O cadastro será efetuado mas o login não será liberado.<br>';
                        noAuthMsg += 'Aguarde a aprovação de um administrador do sistema.<br>';
                        Lobibox.notify(
                            'info',
                            {
                                position: "top right",
                                width: $(window).width(),
                                delay: false,
                                title: 'USUÁRIO NÃO AUTORIZADO',
                                msg: noAuthMsg
                            }
                        );
                        shake(loginSrc);
                        break;
                    case 'auth':
                        Lobibox.notify(
                            'info',
                            {
                                position: "top right",
                                width: $(window).width(),
                                delay: 5000,
                                title: 'USUÁRIO AUTORIZADO',
                                msg: 'Esse usuário está autorizado e o registro se dará em procedimento.'
                            }
                        );
                        shake(loginSrc);
                        break;
                }
            });
        }
    });

    $('.ca-input').keypress(function(e){
        if(e.which == 13) {
            $(createAccountButton).click();
            return false;
        }
    });

    /////                      /////
    /////                      /////
    //                            //
    //    AVOID DEFAULT EVENTS    //
    //                            //
    /////                      /////
    /////                      /////

    $('#login-form').submit(function(){ return false; });
    $('#recovery-login-form').submit(function(){ return false; });
    $('#create-account-form').submit(function(){ return false; });

    /////                      /////
    /////                      /////
    //                            //
    // don't mess below this line //
    //  it may shit on your face  //
    //                            //
    /////                      /////
    /////                      /////

    ///// Logout Click Function /////
    $('.logout').click(function(){
        Lobibox.confirm({
            msg: 'Deseja realmente sair do sistema?',
            title: 'Sair?',
            closeButton: false,
            buttons: {
                yes: {
                    'class': 'btn btn-blue-grey btn-ripple',
                    closeOnClick: true,
                    text: 'Sim'
                },
                no: {
                    'class': 'btn btn-blue-grey btn-ripple',
                    closeOnClick: true,
                    text: 'Não'
                }
            },
            callback: function(lobibox, type){
                var btnType;
                if (type === 'yes'){
                    $(location).attr('href', '/logout');
                }
            }
        });
    });

    ///// Shake Login Form Function /////
    function shake(el)
    {
        var element = $(el);
        $(element).animate({left: "+=10"}, 100, function() {
            $(element).animate({left: "-=20"}, 100, function() {
                $(element).animate({left: "+=20"}, 100, function() {
                    $(element).animate({left: "-=20"}, 100, function() {
                        $(element).animate({left: "+=10"}, 100);
                    });
                });
            });
        });
    }

    ///// Lobibox Defaults Configuration /////
    Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
        soundPath: "../assets/sounds/",
        soundExt: ".ogg",
        iconSource: "fontAwesome",
        delayIndicator: false,
        delay: 5000,
        showClass: 'bounceInLeft',
        hideClass: 'bounceOutRight'
    });

});

