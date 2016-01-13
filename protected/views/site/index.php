<span class="passwordRecovery">Восстановление пароля</span>
<form class="form-passwordRecovery" method="post" name="form-passwordRecovery" action="passwordChange" onsubmit="return validatePasswordRecovery()"   >
    <input  class="form-passwordRecovery-input" name="Email" type="text" placeholder="Электронная почта"  alt="false" >
    <div class="hidden" id="login-hidden1"></div>
    <div class="clear"></div>
    <div class="g-recaptcha" data-sitekey="6LcTwBETAAAAALQKxUXJ7s9y3xw1ndWt4JkI7tYN"></div>
    <?php if(Yii::app()->user->hasFlash('errorPasswordRecovery')):?>
        <div id="g-recaptcha">
            <?php echo Yii::app()->user->getFlash('errorPasswordRecovery'); ?>
        </div>
    <?php endif; ?>
    <input class="passwordRecovery-button" name="button" type="submit" value="Отправить"  >
</form>

