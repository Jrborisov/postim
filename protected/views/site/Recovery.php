<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/passwordRecovery.js"></script>
<span class="changeOfPassword">Восстановление пароля</span>
<form class="changeOfPassword-form" method="post"  name="changeOfPassword-form" action="updatePassword" onsubmit="return validatePassword()" >
    <input class="changeOfPassword-input" alt="false" placeholder="Новый пароль" type="password" name="password">
    <div  id="login-hidden1"></div>
    <div class="clear"></div>
    <input class="changeOfPassword-input" alt="false" placeholder="Новый пароль ещё раз" type="password">
    <div  id="login-hidden1"></div>
    <input class="emailRecovery" hidden="hidden" type="password" value="<?=$_GET['email']?>" name="email">
    <div class="clear"></div>
    <input class="changeOfPassword-button" type="submit" name="button" value="Отправить"  >


</form>

