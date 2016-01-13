$(document).ready(function(){
    $('<div class="parent_confirmationMail"><div class="confirmationMail">Для завершения процесса регистрации, перейдите, пожалуйста, по ссылке высланной на ваш e-mail, <a href="site/Resend">выслать повторно</a> </div><img class="closeConfirmationMail" src="/images/close.png" alt="Закрыть"/></div>').insertBefore('#heder');
    $('#heder').css('marginTop','40px');
    $('#colum1').css('marginTop','100px');
    $('#colum2').css('marginTop','100px');
    $('.closeConfirmationMail').hover(function(){
        $(this).attr('src','/images/closeHover.png');
    },
    function(){
        $(this).attr('src','/images/close.png');
    });

    $('#menu-profile').css('marginTop','80px');

    $('.closeConfirmationMail').click(function(){
        $('.parent_confirmationMail').remove();
        $('#menu-profile').css('marginTop','');
        $('#heder').css('marginTop','');
        $('#colum1').css('marginTop','60px');
        $('#colum2').css('marginTop','60px');
        $.ajax({
          type: 'POST',
          url: 'site/DeleteСookie',
          data: 'name=confirmationMail',
          success: function(data){
          }
       });

    });

});