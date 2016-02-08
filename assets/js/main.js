$(document).ready(function(){

    Lobibox.notify.DEFAULTS = $.extend({}, Lobibox.notify.DEFAULTS, {
        soundPath: "../../assets/sounds/",   // The folder path where sounds are located
        soundExt: ".ogg",
        iconSource: "fontAwesome",
        position: "top right",
        width: $(window).width(),
        delayIndicator: false,
        delay: 4000,
        showClass: 'bounceInLeft',
        hideClass: 'bounceOutRight'
    });

    if($('#message').length)
    {
        if($('#message').data('status'))
        {
            switch ($('#message').data('type'))
            {
                case 'error':
                    Lobibox.notify('error',{title: $('#message').data('msgTitle'),msg: $('#message').data('msg')});
                    break;
                case 'info':
                    Lobibox.notify('info',{title: $('#message').data('msgTitle'),msg: $('#message').data('msg')});
                    break;
                case 'warning':
                    Lobibox.notify('warning',{title: $('#message').data('msgTitle'),msg: $('#message').data('msg')});
                    break;
                case 'success':
                    Lobibox.notify('success',{title: $('#message').data('msgTitle'),msg: $('#message').data('msg')});
                    break;
                default:
                    Lobibox.notify('info',{title: $('#message').data('msgTitle'),msg: $('#message').data('msg')});
                    break;
            }
        }
    }

    $('body').perfectScrollbar();
    $('.menu-layer').perfectScrollbar();
    $('#notifications').perfectScrollbar();
    $('.message-list').perfectScrollbar();
    $('.message-send-container').perfectScrollbar();

    if ($(".login-error-email").length){
        $('#inputEmail').css('border-color','#FF0000');
    }

    if ($(".login-error-senha").length){
        $('#inputPassword').css('border-color','#FF0000');
    }

});