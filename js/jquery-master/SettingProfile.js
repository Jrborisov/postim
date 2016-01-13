$(document).ready(function(){
    //редактирование имени
    $('.input-form-setting-info:eq(0)').change(function(){
        if(($(this).val().length>=3)&&($(this).val().length<=25)&&(chekValid($(this).val()))){
            ajaxSettingProfile($(this),$(this).attr('name'),$(this).val());
        }else{
            $(this).next().text("только буквы и цифры, не меньше 3 и не больше 25 символов").show().css('color','#F77E74');
        }
    });
    //редактирование почты
    $('.input-form-setting-info:eq(1)').change(function(){
        if(chekEmail($(this).val())){
            ajaxSettingProfile($(this),$(this).attr('name'),$(this).val());

        }else{
            $(this).next().text("введите корректный адрес").show().css('color','#F77E74');
        }
    });
    $('.input-form-setting-info:eq(2)').change(function(){
        if(chekValid($(this).val())){
            ajaxSettingProfile($(this),$(this).attr('name'),$(this).val());
        }else{
            $(this).next().text("не верный формат").show().css('color','#F77E74');
        }

    });
    $('.about-me-input').change(function(){
        if((chekValid($(this).val()))||($(this).val()=='')||($(this).val().length<=300)){
            ajaxSettingProfile($(this),$(this).attr('name'),$(this).val());
        }else{
            if(($(this).val().length<=300)){
                $(this).next().text("не допустимые символы").show().css('color','#F77E74');
            }else{
                $(this).next().text("не больше 300 символов").show().css('color','#F77E74');
            }

        }

    });


    //редактирование пола
    $('.select-form-setting-info').change(function(){
        ajaxSettingProfile($(this),$(this).attr('name'),$(this).val());
    });
    $('.setting-checkbox-input').change(function(){
        var val=$(this).prop('checked')?1:0;
        ajaxSettingProfile($(this),$(this).attr('name'),val);

    });

    $('.ignored-topics-textarea').change(function(){
        if(chekValid($(this).val())||($(this).val()=='')){
            ajaxSettingProfile($(this),$(this).attr('name'),$(this).val());
        }else{
            $(this).next().text("не допустимые символы").show().css('color','#F77E74');
        }

    });
    $('.ignored-users-textarea').change(function(){
        if(chekValid($(this).val())||($(this).val()=='')){
            ajaxSettingProfile($(this),$(this).attr('name'),$(this).val());
        }else{
            $(this).next().text("не допустимые символы").show().css('color','#F77E74');
        }
    });

    $('.save-button').click(function(){

        if($('.password-field:eq(0)').val()==""){
            $('.field-current-password').text("Необходимо заполнить поле").show().css('color','#F77E74');
            exit;
        }
        if($('.password-field:eq(1)').val()=="" || ($('.password-field:eq(1)').val().length<8)){
            $('.field-new-password').text("Длина пароля не может быть меньше 8 символов").show().css('color','#F77E74');
            $('.field-current-password').hide();
            exit;
        }
        if($('.password-field:eq(2)').val()!=$('.password-field:eq(1)').val()){
            $('.field-new-password2').text("пароли не совподают").show().css('color','#F77E74');
            $('.field-new-password').hide();
            exit;
        }
        $.ajax({
            type: 'POST',
            url: 'site/ChangePasswordSetting',
            data: 'password='+$('.password-field:eq(0)').val()+'&newpassword='+$('.password-field:eq(1)').val(),
            async:true,
            success: function(data){
                if(data!=''){
                    if(data=="не верный пароль"){
                        $('.field-current-password').text(data).show().css('color','#F77E74');
                    }else{
                        $('#flash-mes').text(data).show();
                        timer= setTimeout(function() {
                            $('#flash-mes').animate({
                                opacity: "hide"
                            }, 1000);
                        },2500);
                    }
                }
            }
        });

    });
});

function ajaxSettingProfile(elem,name,value){
    $.ajax({
        type: 'POST',
        url: 'site/ChangeSettings',
        data: name+'='+value+'&ajax=setting',
        async:true,
        success: function(data){
            if(data!=''){
                elem.next().text(data).show().css('color','#777777');
                timer= setTimeout(function() {
                    elem.next().animate({
                        opacity: "hide"
                    }, 1000);
                },2500);
                }
        }
    });
}
function chekEmail(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
function chekValid(value) {
    var pattern = new RegExp(/^[а-яА-ЯёЁa-zA-Z0-9, ?!-/.]+$/);
    return pattern.test(value);
}
