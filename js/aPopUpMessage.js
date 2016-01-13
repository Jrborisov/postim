$(document).ready(function(){
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
    });

});