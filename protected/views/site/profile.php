
<div class="profile_info">
    <img src="<?= $ProfileInfo['big_photo']?>">
    <div class="profile_info_block">
        <h1 class="user_name"><?= $ProfileInfo['name']?></h1>
        <span class="info_user" >Зарегистрирован:<?= $ProfileInfo['registration_date']?></span>
        <?php if(!empty($ProfileInfo['city'])){
         echo" <span class='info_user' id='city'>Город:{$ProfileInfo['city']}</span>";
        }?>
        <span class="info_user" id="rating">Рейтинг: <?= $ProfileInfo['rating']?></span>
        <span class="info_user" id="fans">Подписчики: <?= $ProfileInfo['fans']?></span>
    </div>
    <div class="clear"></div>
    <?php if(!empty($ProfileInfo['description'])){
       echo"<div class='profile_info_description'>{$ProfileInfo['description']}</div>";

    }  ?>

    <div class="info_record">Добавил <?=$ProfileInfo['number_of_records']?> пост, из них <?=$ProfileInfo['best_records']?>
        в разделе «Лучшее» <img src="/images/gal.png"> <span>По рейтингу</span>  </div>
</div>
