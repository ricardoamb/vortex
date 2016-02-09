$(document).ready(function(){

    if ($(".login-error-email").length){
        $('#inputEmail').css('border-color','#FF0000');
    }

    if ($(".login-error-senha").length){
        $('#inputPassword').css('border-color','#FF0000');
    }


    $('#btn-login').click(function(){
        $.ajax({
            url: 'login/enter',
            success: function(data) {
                alert(data);
            }
        });
    });

    $('#login-form').submit(function(){
        return false;
    });

});