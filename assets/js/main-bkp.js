$(document).ready(function(){

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
            alert(txtLoginEmail.val() + ' | ' + txtSenha.val());
            $.ajax({
                method: "POST",
                url: $('#url-enter').data('url'),
                data: {
                    loginemail: $(txtLoginEmail).val(),
                    senha: $(txtSenha).val()
                },
                beforeSend: function (){
                    $(btnLogin).html('<i class="fa fa-spinner fa-pulse fa-lg"></i>');
                },
                success: function(data){
                    alert(data);
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

