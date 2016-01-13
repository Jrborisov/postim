var xmlHttp = createXmlHttpRequestObject();
$(document).ready(function(){

        $('.form-authorization-input').click(function(){
            $(this).css('border','');

        });

       $('.form-authorization-input').keypress(function(){
           $(this).attr('alt','true');
       });
       $('.form-authorization-input:first').blur(function(){
          if($(this).attr('alt')!='false'){


         if( $(this).val()==''){
             $(this).next().text('Необходимо заполнить поле').css('display','block');
             $(this).css('border','2px solid #f77e74');
         }else{
             $(this).next().css('display','none');
         }
          }
       });
    $('.form-authorization-input:last').blur(function(){
        if($(this).attr('alt')!='false'){


            if( $(this).val()==''){
                $(this).next().text('Необходимо заполнить поле').css('display','block');
                $(this).css('border','2px solid #f77e74');
            }else{
                $(this).next().css('display','none');
            }
        }
    });



//вост пароль
    $('.form-passwordRecovery-input').click(function(){
        $(this).css('border','');

    });
    $('.form-passwordRecovery-input').keypress(function(){
        $(this).attr('alt','true');
    });

    $('.form-passwordRecovery-input:first').blur(function(){
        if($(this).attr('alt')!='false'){


            if( $(this).val()==''){
                $(this).next().text('Необходимо заполнить поле').css('display','block');
                $(this).css('border','2px solid #f77e74');
            }else{
                if(!isValidEmailAddress($(this).val())){
                    $(this).next().text('Введите корректный e-mail').css('display','block');
                    $(this).css('border','2px solid #f77e74');
                    exit;
                }
                $(this).next().css('display','none');
            }
        }
    });



  $('.passwordRecovery-button').click(function(){
      var email=$('.form-passwordRecovery-input').val();
      if($('.form-passwordRecovery-input:first').val()==''){
          $('.hidden').css('display','block').text('Необходимо заполнить поле');
          $('.form-passwordRecovery-input:first').css('border','2px solid #f77e74');
          exit;
      }
      $.ajax({
          type: 'POST',
          url: 'site/passwordChange',
          data: 'email='+email+'&ajax=PasswordRecovery',
          async:false,
          success: function(data){
              if(data!=''){
                $('.hidden').css('display','block').text(data);
                $('.form-passwordRecovery-input:first').css('border','2px solid #f77e74');
              }
          }
      });
  })


});

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
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

function Authorization(){
  var  login=document.getElementsByName('login-authorization');
       login=login[0].value;
  var password= document.getElementsByName('password-authorization');
      password=password[0].value;



    if(xmlHttp){
        try{

            xmlHttp.open('GET','site/login?login='+login+'&password='+password+'&ajax=1',false);
            xmlHttp.onreadystatechange=ready;
            xmlHttp.send();




        }catch (e){
            alert('шибка отправки аякс'+ e.toString()) ;
        }
    }
}
function ready(){
    if(xmlHttp.readyState==4){
        if(xmlHttp.status==200){
            try{
                response();
            } catch (e){
                alert('произошла ошибка ответа сервера'+ e.toString())
            }
        }
    }
}

function response(){
    var respon=xmlHttp.responseText;
    var div=document.getElementById('hidden-field');
    div.innerHTML=respon;
    if(respon){
        div.style.display='block';


    }else{
        div.style.display='none';
    }
}

function validate(){

    var div=document.getElementById('hidden-field');
    var  login=document.getElementsByName('login-authorization');
    var password= document.getElementsByName('password-authorization');
    if(div.style.display=='block'){
        login[0].style.border='2px solid #f77e74';
        password[0].style.border='2px solid #f77e74';
        return false;
    }else
    {
        login[0].style.border='';
        password[0].style.border='';
        return true;
    }
}

function validatePasswordRecovery(){
    if($('.hidden').css('display')=='block') {
        return false;
    }
    else{
        return true;
    }

}
