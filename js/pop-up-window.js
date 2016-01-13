




function pop_up_window_passwordRecovery(){
    var parent_popup2=document.getElementById('parent_popup2');
    var parent_popup=document.getElementById('parent_popup');
    var parent_popup3=document.getElementById('parent_popup3');
    $('.parent_popup1:first').css('display','none');
    $('.parent_popup1:eq(1)').css('display','block');
    $('.parent_popup1:last').css('display','none');
    parent_popup.style.display='none';
    parent_popup2.style.display='none';
    parent_popup3.style.display='block';

    document.onclick=pop_up_window_close;
    document.body.onkeydown=key;


}
function pop_up_window(){
    var parent_popup2=document.getElementById('parent_popup2');
    var parent_popup=document.getElementById('parent_popup');
    $('.parent_popup1:first').css('display','block');
    $('.parent_popup1:last').css('display','none');
    parent_popup.style.display='block';
    parent_popup2.style.display='none';

   document.onclick=pop_up_window_close;
   document.body.onkeydown=key;


}
function pop_up_window_registration(){
    var parent_popup=document.getElementById('parent_popup');
    var parent_popup2=document.getElementById('parent_popup2');
    if(parent_popup.style.display=='block'){
        parent_popup.style.display='none';
        parent_popup2.style.display='block';
        $('.parent_popup1:last').css('display','block');
        $('.parent_popup1:first').css('display','none');
    }
    $('.parent_popup1:last').css('display','block');
    parent_popup2.style.display='block';
    document.body.onkeydown=key;
    document.onclick=pop_up_window_close;


}
function pop_up_window_close(e){


    var parent_popup=document.getElementById('parent_popup');
    var parent_popup2=document.getElementById('parent_popup2');
    var parent_popup3=document.getElementById('parent_popup3');
    if(e.target.textContent=='ВОЙТИ'){
       return;
    }


    if(e.target.parentElement.getAttribute('class')=='close'){
        parent_popup.style.display='none';
        parent_popup2.style.display='none';
        $('.parent_popup1:last').css('display','none');
        $('.parent_popup1:first').css('display','none');
        $('.parent_popup1:eq(1)').css('display','none');
        var div=document.getElementById('hidden-field');
        div.style.display='none';
        var hiddenEmail=document.getElementById('email-hidden');
        var hiddenLogin=document.getElementById('login-hidden');
        $('#login-hidden1').css('display','none');
        var hiddenPassword=document.getElementById('password-hidden');
        var hiddenPassword1=document.getElementById('password1-hidden');
        hiddenEmail.style.display = 'none';
        hiddenLogin.style.display = 'none';
        hiddenPassword.style.display = 'none';
        hiddenPassword1.style.display = 'none';
        $('#enterbutton').css('background-color','');
        $('#g-recaptcha').text('');
 //убирает выделение с полей регистрации

        var email=document.getElementsByName('email-registration');
        var login=document.getElementsByName('login-registration');
        var password=document.getElementsByName('password-registration');
        var password1=document.getElementsByName('password1-registration');
        email[0].style.border='';
        login[0].style.border='';
        password[0].style.border='';
        password1[0].style.border='';
//убирает выделение с полей авторизации
        var  login=document.getElementsByName('login-authorization');
        var password= document.getElementsByName('password-authorization');
        login[0].style.border='';
        password[0].style.border='';
        return;
    }


    var parent= e.target.parentNode;
    while(parent.parentNode){
        if((parent.getAttribute('class')=='popup') || (e.target.getAttribute('class')=='popup')){

            return;
        }
        parent=parent.parentNode;
    }

    $('.form-authorization-input').css('border','').next().css('display','none');
    $('.form-registration-input').css('border','').next().css('display','none');
    $('.parent_popup1:last').css('display','none');
    $('.parent_popup1:first').css('display','none');
    $('.parent_popup1:eq(1)').css('display','none');
    $('#enterbutton').css('background-color','');
    $('#g-recaptcha').text('');
  if(parent_popup.style.display=='block'){
        parent_popup.style.display='none';

  }
  if(parent_popup2.style.display=='block'){
        parent_popup2.style.display='none';

    }
    if(parent_popup3.style.display=='block'){
        parent_popup3.style.display='none';

    }
}
function key(e){
    if(e.which==27){
        $('#enterbutton').css('background-color','');
        $('.parent_popup1:first').css('display','none');
        $('.parent_popup1:last').css('display','none');
        var parent_popup3=document.getElementById('parent_popup3');
        var parent_popup=document.getElementById('parent_popup');
        var parent_popup2=document.getElementById('parent_popup2');
        var div=document.getElementById('hidden-field');
        $('#g-recaptcha').text('');
        div.style.display='none';
        if(parent_popup.style.display=='block'){
            parent_popup.style.display='none';
        }
        if(parent_popup2.style.display=='block'){
            parent_popup2.style.display='none';
        }
        if(parent_popup3.style.display=='block'){
            parent_popup3.style.display='none';
        }
        var hiddenEmail=document.getElementById('email-hidden');
        var hiddenLogin=document.getElementById('login-hidden');
        var hiddenPassword=document.getElementById('password-hidden');
        var hiddenPassword1=document.getElementById('password1-hidden');
        hiddenEmail.style.display = 'none';
        hiddenLogin.style.display = 'none';
        hiddenPassword.style.display = 'none';
        hiddenPassword1.style.display = 'none';
        var email=document.getElementsByName('email-registration');
        var login=document.getElementsByName('login-registration');
        var password=document.getElementsByName('password-registration');
        var password1=document.getElementsByName('password1-registration');
        email[0].style.border='';
        login[0].style.border='';
        password[0].style.border='';
        password1[0].style.border='';
        $('#login-hidden1').css('display','none');
        var  login=document.getElementsByName('login-authorization');
        var password= document.getElementsByName('password-authorization')
        login[0].style.border='';
        password[0].style.border='';

        $('#g-recaptcha').text('');



    }

}