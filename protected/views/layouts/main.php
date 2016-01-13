<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
	   <title>Лучшие посты за сутки – Postim.by</title>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/postim_logo2.png" type="image/png" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.4.js"></script>
       <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js"></script>
       <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/windowDesign.js"></script>
       <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/pop-up-window.js"></script>
       <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/Authorization.js"></script>
       <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/Registration.js"></script>
       <script src='https://www.google.com/recaptcha/api.js'></script>

	</head>

    <body>
    <?php if(Yii::app()->user->hasFlash('aLetterSent')):?>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/aPopUpMessage.js"></script>
    <div class="parent_confirmationMail"><div class="confirmationMail">
        <?php echo Yii::app()->user->getFlash('aLetterSent'); ?>
    </div><img class="closeConfirmationMail" src="/images/close.png" alt="Закрыть"/></div>
    <?php endif?>
    <div id="heder">
            <div id="heder1">
                <a href="<?=Yii::app()->homeUrl?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo1.png" class="logo1" /></a>
                <ul id="menu">
                    <li> <a style="background-color:#524a5f" href="<?=Yii::app()->homeUrl?>">ЛУЧШЕЕ</a></li>
                    <li> <a href="#">НОВОЕ</a></li>    
                    <li> <a href="#">ИЗБРАННОЕ</a></li>
                </ul>

				 <form class="form-wrapper cf" method="post" action="" >
				 <input  name="poisk" type="text" placeholder="Поиск" required>
				 </form>


                <div id="post"><a href="#">ДОБАВИТЬ ПОСТ</a></div>
                <div id="enterbutton" onclick="pop_up_window()"> <a>ВОЙТИ</a></div>

            </div> <!--heder1 end-->
        </div> <!--heder end-->
        <div style="clear: both"></div>

        <div class="parent_popup1">
            <div id="parent_popup"  class="parent_popup"  >
            <div  class="popup" >
                <a class="close"  title="Закрыть">  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/close.png" alt="Закрыть"/></a>
                <a class="authorization-select" >Войти</a>
                <a class="registration" onclick="pop_up_window_registration()">Регистрация</a>
                <div class="clear"></div>
                <p>Вы можете войти с помощью:</p>
                <div class="img-authorization">
                    <?php widgetSocial::view(); ?>
                </div>
                <p>Или как пользователь сайта Postim.by:</p>
                <form class="form-authorization" method="post" name="form-authorization" onsubmit="return validate()"  >
                    <input  class="form-authorization-input" name="login-authorization" type="text" placeholder="Логин или электронная почта"  alt="false" >
                    <div id="login-hidden1"></div>
                    <input  class="form-authorization-input" name="password-authorization" type="password" placeholder="Пароль" alt="false"  >
                    <div id="hidden-field"></div>
                    <div class="clear"></div>
                    <div class="remember">
                    <span> Запомнить меня</span>
                    <input class="remember-box" type="checkbox" name="remember" checked="checked">
                    <input class="authorization-button" type="submit" value="Войти" onclick="Authorization()" >
                    </div>
                </form>
                <div class="clear"></div>
                <span  class="reestablish-password"><a href="passwordRecovery"> Восстановить пароль</a></span>

            </div>
        </div>
            </div>


    <?php if(Yii::app()->user->hasFlash('error')):?>
        <script >
            $(document).ready(function(){
                pop_up_window_registration();
            });

        </script>
    <?php endif; ?>


<div class="parent_popup1">
        <div id="parent_popup2" class="parent_popup">

            <div class="popup">
                <a class="close" title="Закрыть">  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/close.png" alt="Закрыть"/></a>
                <a class="registration-select">Регистрация</a>
                <a class="authorization" onclick="pop_up_window()" >Войти</a>
                <div class="clear"></div>
                <p>Вы можете зарегистрироваться с помощью:</p>
                <div class="img-authorization">
                     <?php widgetSocial::view(); ?>


                </div>
                <p>Или как пользователь сайта Postim.by:</p>
                <form class="form-registration"  method="post" action="site/registration" onsubmit="return validateRegistration() " >
                    <input  class="form-registration-input" name="email-registration" type="text" placeholder="Электронная почта" alt="false" >
                    <div id="email-hidden"></div>
                    <input  class="form-registration-input" name="login-registration" type="text" placeholder="Логин" alt="false" >
                    <div id="login-hidden"></div>
                    <input  class="form-registration-input" name="password-registration" type="password" placeholder="Пароль" alt="false" >
                    <div id="password-hidden"></div>
                    <input  class="form-registration-input" name="password1-registration" type="password" placeholder="Пароль ещё раз" alt="false" >
                    <div id="password1-hidden"></div>
                    <div class="clear"></div>
                    <div class="g-recaptcha" data-sitekey="6LcTwBETAAAAALQKxUXJ7s9y3xw1ndWt4JkI7tYN"></div>
                    <?php if(Yii::app()->user->hasFlash('error')):?>
                      <div id="g-recaptcha">
                    <?php echo Yii::app()->user->getFlash('error'); ?>
	                  </div>
                    <?php endif; ?>
                    <input class="registration-button" type="submit" value="Зарегистироваться" onclick="Registration()">
                    <div class="clear"></div>
                </form>
            </div>
        </div>
</div>

        <div id="content">
            <div id="colum1">
                <?php echo $content; ?>

            </div><!--end colum1-->

          <div id="colum2">
              <div class="discuss">
              <h1>Обсуждаемое:</h1>
              <a href="#">В Речице пьяный водитель уснул в машине посреди улицы. Пока спал, у него украли деньги, документы и кроссовки. <span>76</span></a>
              <a href="#">В центре Минска МАЗ без водителя разбил 8 припаркованных автомобилей, 2 из них вытолкнул на тротуар <span>35</span></a>
              <a href="#">ГАИ Минска усиливает контроль за скоростью в городе. <span>23</span></a>
              <a href="#">«Надоело жить в грязи»: минский пенсионер за свой счет и в одиночку ремонтирует подъезд дома <span>15</span></a>
          </div>
            <div class="topical">
                <h1>Актуальные темы:</h1>
                <a href="#">Новости</a>
                <a href="#">Фото</a>
                <a href="#">Юмор</a>
                <a href="#">Гродно</a>
                <a href="#">Минск</a>
                <a href="#">Брест</a>
            </div>
            <div class="top_avtor">
                <h1>Топ авторов:</h1>
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Icon_profile.png" alt=""/>Петя</a>
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Icon_profile.png" alt=""/>Jon214</a>
            </div>
          </div>

        </div><!--end content-->

    </body>
</html>