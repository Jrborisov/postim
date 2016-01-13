$(document).ready(function(){

        $('.form-registration-input').click(function(){
            $(this).css('border','');

        });
        $('.form-registration-input').keypress(function(){
            $(this).attr('alt','true');
        });

        $('.form-registration-input').blur(function(){
           if($(this).attr('alt')!='false') {
               if ($(this).val() == '') {
                   $(this).next().text('Необходимо заполнить поле').css('display', 'block');
                   $(this).css('border', '2px solid #f77e74');
               } else {
                   $(this).next().css('display', 'none');
               }
           }
        });

        $('.form-registration-input:first').blur(function(){
           if($(this).attr('alt')!='false') {
            if( !chekMail($(this).val())){
                $(this).next().text('Введите корректный e-mail').css('display','block');
                $(this).css('border','2px solid #f77e74');
            }else{
                $(this).next().css('display','none');
            }
           }
        });

        $('.form-registration-input:eq(2)').blur(function(){
         if($(this).attr('alt')!='false') {
             if ($(this).val().length < 8) {
                 $(this).next().text('Длина пароля не может быть меньше 8 символов').css('display', 'block');
                 $(this).css('border', '2px solid #f77e74');
             } else {
                 $(this).next().css('display', 'none');
             }
         }
        });
        $('.form-registration-input:eq(3)').blur(function(){
         if($(this).attr('alt')!='false') {
            if($(this).val()!=$('.form-registration-input:eq(2)').val()){
                $(this).next().text('Пароли не совпадают').css('display','block');
                $(this).css('border','2px solid #f77e74');
            }else{
                $(this).next().css('display','none');
            }
         }
        });


    }
);

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

var xmlHttp = createXmlHttpRequestObject();
function chekMail(mail){


    return isValidEmailAddress(mail);
}
function createXmlHttpRequestObject() {
    // will store the reference to the XMLHttpRequest object
    var xmlHttp;
    // if running Internet Explorer
    if (window.ActiveXObject) {
        try {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {
            xmlHttp = false;
        }
    }
    // if running Mozilla or other browsers
    else {
        try {
            xmlHttp = new XMLHttpRequest();
        }
        catch (e) {
            xmlHttp = false;
        }
    }
    // return the created object or display an error message
    if (!xmlHttp)

        alert("Error creating the XMLHttpRequest object.");
    else
        return xmlHttp;
}

function Registration(){
var email=document.getElementsByName('email-registration');
var    emailText=email[0].value;
var login=document.getElementsByName('login-registration');
var    loginText=login[0].value;
var password=document.getElementsByName('password-registration');
var    passwordText=password[0].value;
var password1=document.getElementsByName('password1-registration');
var    password1Text=password1[0].value;
var validate=true;
var hiddenEmail=document.getElementById('email-hidden');
var hiddenLogin=document.getElementById('login-hidden');
var hiddenPassword=document.getElementById('password-hidden');
var hiddenPassword1=document.getElementById('password1-hidden');
    if($('.form-registration-input').val()==''){
        $('.form-registration-input').css('border','2px solid #f77e74');
        $('.form-registration-input').next().css('display','block').text('Необходимо заполнить поле');

    }
    if(hiddenEmail.style.display=='block'){
        validate=false;
    }
    if(hiddenLogin.style.display=='block'){
        validate=false;
    }
    if(hiddenPassword.style.display=='block'){
        validate=false;
    }
    if(hiddenPassword1.style.display=='block'){
        validate=false;
    }







    if(validate){
        if(xmlHttp){
            try{
                xmlHttp.open('GET','site/Registration?login='+loginText+'&email='+emailText+'&password='+passwordText+'&password1='+password1Text+'&ajax=1',false);
                xmlHttp.onreadystatechange=readyRegistration;
                xmlHttp.send();
            }catch (e){
                alert('шибка отправки аякс'+ e.toString()) ;
                xmlHttp.open('GET','site/Registration?login='+loginText+'&email='+emailText+'&password='+passwordText+'&password1='+password1Text+'&ajax=1',false);
                xmlHttp.onreadystatechange=readyRegistration;
                xmlHttp.send();
            }
        }
    }

}

function readyRegistration(){
    if(xmlHttp.readyState==4){
        if(xmlHttp.status==200){
            try{
                responses();
            } catch (e){
                alert('произошла ошибка ответа сервера'+ e.toString())
            }
        }
    }
}

function responses(){
    var respon=xmlHttp.responseText;
    var div = document.getElementById('email-hidden');
    var div1 = document.getElementById('login-hidden');
    if(respon=='Электронная почта уже занята'){

        div.style.display = 'block';
        div1.style.display='none';
        div.innerHTML = respon;
        return;
    }
    if(respon=='Логин уже занят'){

        div1.style.display = 'block';
        div.style.display='none';
        div1.innerHTML = respon;
        return;
    }
    div1.style.display = 'none';
    div.style.display='none';



}
function validateRegistration() {
    var hiddenEmail=document.getElementById('email-hidden');
    var hiddenLogin=document.getElementById('login-hidden');
    var hiddenPassword=document.getElementById('password-hidden');
    var hiddenPassword1=document.getElementById('password1-hidden');
    var buf=true;
    if(hiddenEmail.style.display=='block'){
       buf=false;
    }
    if(hiddenLogin.style.display=='block'){
        buf=false;
    }
    if(hiddenPassword.style.display=='block'){
        buf=false;
    }
    if(hiddenPassword1.style.display=='block'){
        buf=false;
    }

return buf;
}