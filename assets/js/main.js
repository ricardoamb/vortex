$(document).ready(function(){

    $('.menu-layer').perfectScrollbar();
    $('.search-layer').perfectScrollbar();
    $('.message-list').perfectScrollbar();
    $('.messages').perfectScrollbar();
    $('#notifications').perfectScrollbar();
    $('#settings').perfectScrollbar();

    if ($(".login-error-email").length){
        $('#inputEmail').css('border-color','#FF0000');
    }

    if ($(".login-error-senha").length){
        $('#inputPassword').css('border-color','#FF0000');
    }

    var btnLogin = $('#btn-login');
    var loginTitle = $('#loginTitle');
    var loginSrc = $('.login-screen');

    $(btnLogin).click(function(){
        if($(loginSrc).hasClass('err')) $(loginSrc).removeClass('err');
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
                                title: 'Login / E-Mail Incorreto',
                                msg: 'O Login / E-mail digitado não corresponde a um usuário válido. Verifique e tente novamente!'
                            }

                        );
                        $(txtSenha).val('');
                        $(txtLoginEmail).val('').focus();
                        shake(loginSrc);
                        break;
                    case 'senha':
                        Lobibox.notify(
                            'error',
                            {
                                title: 'Senha Incorreta',
                                msg: 'A Senha digitada está incorreta. Verifique e tente novamente!'
                            }
                        );
                        $(txtSenha).val('').focus();
                        shake(loginSrc);
                        break;
                    case 'activation':
                        Lobibox.notify(
                            'error',
                            {
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
            if(!$(loginSrc).hasClass('err')){
                $(loginSrc).addClass('err');
            }
            shake(loginSrc);
            $(loginTitle).html('<i class="fa fa-warning" style="margin-right:10px;"></i> Verifique os dados').addClass('errTitle');
        }
    });

    $('#login-form').submit(function(){
        return false;
    });

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
        position: "top right",
        width: $(window).width(),
        delayIndicator: false,
        delay: 5000,
        showClass: 'bounceInLeft',
        hideClass: 'bounceOutRight'
    });

});

