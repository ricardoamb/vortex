$(document).ready(function(){

    $('.menu-layer').perfectScrollbar();
    $('.search-layer').perfectScrollbar();
    $('.message-list').perfectScrollbar();
    $('.messages').perfectScrollbar();
    $('#notifications').perfectScrollbar();
    $('#settings').perfectScrollbar();

    var btnLogin = $('#btn-login');
    var loginTitle = $('#loginTitle');
    var loginSrc = $('.login-screen');

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
                $(btnLogin).html('Entrar');
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
                                title: 'Login / E-Mail Incorreto',
                                msg: 'O Login / E-mail digitado não corresponde a um usuário válido. Verifique e tente novamente!'
                            }

                        );
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
                                title: 'Senha Incorreta',
                                msg: 'A Senha digitada está incorreta. Verifique e tente novamente!'
                            }
                        );
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
                                title: 'Usuário Inativo',
                                msg: 'Você não ativou sua conta por favor verifique seu e-mail e tente novamente'
                            }
                        );
                        shake(loginSrc);
                        break;

                }
            });
        }
        else
        {
            shake(loginSrc);
            $(loginTitle).html('<i class="fa fa-warning" style="margin-right:10px;"></i> Verifique os dados').addClass('errTitle');
        }
    });

    $('#login-form').submit(function(){
        return false;
    });

    $('.logout').click(function(){
        Lobibox.confirm({
            msg: 'Deseja realmente sair do sistema?',
            title: 'Sair?',
            closeButton: false,
            //buttons: ['ok', 'cancel', 'yes', 'no'],
            //Or more powerfull way
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
                },
            },
            callback: function(lobibox, type){
                var btnType;
                if (type === 'yes'){
                    $(location).attr('href', '/logout');
                }
            }
        });
    });

    if($('#message').length)
    {
        var msg = $('#message').data('Message');
        var title = $('#message').data('Title');
        var type = $('#message').data('msgType');

        alert(title);
        switch (type)
        {
            case 'error':
                Lobibox.notify(
                    'error',
                    {
                        title: title,
                        msg: msg
                    }
                );
        }

    }

    /////                      /////
    /////                      /////
    //                            //
    // don't mess below this line //
    //  it may shit on your face  //
    //                            //
    /////                      /////
    /////                      /////

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

