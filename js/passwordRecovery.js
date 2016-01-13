$(document).ready(function(){


    $('.changeOfPassword-input').click(function(){
        $(this).css('border','');
    });
    $('.changeOfPassword-input').keypress(function(){
        $(this).attr('alt','true');
    });

    $('.changeOfPassword-input').blur(function(){
        if($(this).attr('alt')!='false'){


            if( $(this).val()==''){
                $(this).next().text('Необходимо заполнить поле').css('display','block');
                $(this).css('border','2px solid #f77e74');
            }else{

                $(this).next().css('display','none');
            }
        }
    });

    $('.changeOfPassword-input:eq(0)').blur(function(){
        if($(this).attr('alt')!='false') {
            if ($(this).val().length < 8) {
                $(this).next().text('Длина пароля не может быть меньше 8 символов').css('display', 'block');
                $(this).css('border', '2px solid #f77e74');
            } else {
                $(this).next().css('display', 'none');
                $(this).css('border','');
            }
        }
    });
    $('.changeOfPassword-input:eq(1)').blur(function(){
        if($(this).attr('alt')!='false') {
            if($(this).val()!=$('.changeOfPassword-input:eq(0)').val()){
                $(this).next().text('Пароли не совпадают').css('display','block');
                $(this).css('border','2px solid #f77e74');
            }else{
                $(this).next().css('display','none');
                $(this).css('border','');
            }
        }
    });

//кнопка отправка нового пароля
    $('.changeOfPassword-button').click(function(){
        //проверка на заполнение полей
        if($('.changeOfPassword-input:eq(0)').val()==''){

            $('.changeOfPassword-input:eq(0)').next().text('Необходимо заполнить поле').css('display','block');
            $('.changeOfPassword-input:eq(0)').css('border','2px solid #f77e74');
        }
        if($('.changeOfPassword-input:eq(1)').val()==''){

            $('.changeOfPassword-input:eq(1)').next().text('Необходимо заполнить поле').css('display','block');
            $('.changeOfPassword-input:eq(1)').css('border','2px solid #f77e74');
        }

    });
});

function validatePassword(){
    if($('#login-hidden1').css('display')=='block') {
        return false;
    }
    else{
        return true;
    }

}

