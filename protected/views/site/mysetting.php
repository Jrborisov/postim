<div class="setting-profile">
    <div class="setting-avatar">
        <img src="<?=$userInfo['big_photo']?>">
        <div class="clear"></div>
        <label class="change-photo" >
            <input class="fileinput"  name="file" type="file" style="display: none" />
            <a>Изменить аватар</a>
        </label>
    </div>

    <form class="form_profile_info">
        <label class="label-name-user">
            <span>Имя пользователя</span>
            <input style="margin-left: 170px" type="text" class="input-form-setting-info" name="name"  value="<?=$userInfo['name']?>" >
            <a class="flash-message" id="flash-message-1"></a>
        </label>
        <div class="clear-profile-setting"></div>
        <label class="label-email" >
            <span>Адрес электронной почты</span>
            <input style="margin-left: 228px" type="text" class="input-form-setting-info" name="email"  value="<?=$userInfo['email']?>">
            <a class="flash-message" id="flash-message-2"></a>
        </label>
        <div class="clear-profile-setting"></div>
        <label class="label-sex">
            <span>Пол</span>
            <select style="margin-left: 60px" name="sex"  class="select-form-setting-info" >
                <?php
                if($userInfo['sex']=="")
                {
                ?>
                <option value="" selected>Не выбран</option>
                <option value="Мужской">Мужской</option>
                <option value="Женский">Женский</option>
                <?php }elseif($userInfo['sex']=="Мужской"){
                ?>
                <option value="">Не выбран</option>
                <option value="Мужской" selected>Мужской</option>
                <option value="Женский">Женский</option>
                <?php }else{
                ?>
                <option value="">Не выбран</option>
                <option value="Мужской" >Мужской</option>
                <option value="Женский" selected>Женский</option>
                <?php }?>
            </select>
            <a class="flash-message-select"></a>
        </label>
        <div class="clear-profile-setting"></div>
        <label class="label-city">
            <span>Город</span>
            <input style="margin-left: 69px" type="text" class="input-form-setting-info" name="city"  value="<?=$userInfo['city']?>">
            <a class="flash-message" id="flash-message-3"></a>
        </label>
    </form>
</div>
<div class="clear"></div>
<div class="about-me">
О себе:
<textarea class="about-me-input" name="description" placeholder="Не более 300 символов"><?=$userInfo['description']?></textarea>
<a class="flash-message-a"></a>
</div>
<div class="setting-tape">
Настройка ленты:
    <div class="setting-checkbox">
        <input <?php if($userInfo['above_ten_news']==1){?>checked<?php }?> type="checkbox" name="above_ten_news" class="setting-checkbox-input">
        <a class="flash-message"></a>
        <span>Показывать новости с рейтингом выше - 10</span>

    </div>
    <div class="setting-checkbox">
        <input <?php if($userInfo['above_ten_comments']==1){?>checked<?php }?> type="checkbox" name="above_ten_comments" class="setting-checkbox-input">
        <a class="flash-message"></a>
        <span>Показывать комментарии с рейтингом выше -10<span>
    </div>

    <div class="ignored">
        <div class="ignored-topics">
            Игнорируемые темы:
            <textarea class="ignored-topics-textarea" name="ignored_topics"><?=$userInfo['ignored_topics']?></textarea>
            <a class="flash-message-a"></a>
        </div>
        <div class="ignored-users">
            Игнорируемые пользователи:
            <textarea class="ignored-users-textarea" name="ignored_users"><?=$userInfo['ignored_users']?></textarea>
            <a class="flash-message-a"></a>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php if(empty (yii::app()->user->info['id_social'])){ ?>
<div class="change-the-password">
    <span> Смена пароля:</span>
    <div class="clear"></div>
    <div class="float-right">
  <label>
      <span id="current-password">Текущий пароль</span>
      <input name="current-password" class="password-field" type="password" >
      <a class="field-current-password"></a>
  </label>
    <label>
        <span id="new-password">Новый пароль</span>
        <input  name="new-password" class="password-field" type="password" >
        <a class="field-new-password"></a>
    </label>
    <label>
        <span id="new-password2">Повторите пароль</span>
        <input name="new-password2" class="password-field" type="password" >
        <a class="field-new-password2"></a>
    </label>
        <a class="flash-message-a" id="flash-mes"></a>
    </div>
</div>
<input type="button" class="save-button" value="Изменить пароль">
<?php }?>
<div class="bottom"></div>

