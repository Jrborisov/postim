<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title><?=$this->title?></title>
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/postim_logo2.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/addnews.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.4.js"></script>
    <script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/profile.js"></script>
    <script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/addNews.js"></script>
    <?php if(isset( Yii::app()->request->cookies['confirmationMail'])&&(Yii::app()->request->cookies['confirmationMail']==Yii::app()->user->info['id'])){
               echo '<script  src="'.  Yii::app()->request->baseUrl.'/js/confirmationMail.js"></script>';     
          }?>
</head>
<body >

<div id="heder">
    <div id="heder1">
        <a href="<?=Yii::app()->homeUrl?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo1.png" class="logo1" /></a>
        <ul id="menu">
            <li> <a <?=isset($this->top)?$this->top:""?> href="<?=Yii::app()->homeUrl?>">ЛУЧШЕЕ</a></li>
            <li> <a href="#">НОВОЕ</a></li>
            <li> <a href="#">ИЗБРАННОЕ</a></li>
        </ul>

        <form class="form-wrapper cf" method="post" action="" >
            <input  name="poisk" type="text" placeholder=" Поиск" required>
        </form>


        <div id="post"><a <?=isset($this->addnew)?$this->addnew:""?> href="<?php echo Yii::app()->request->baseUrl;?>/addnews">ДОБАВИТЬ ПОСТ</a></div>
        <div id="alert-user"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/alert.png" alt=""/></div>
        <p class="new">24</p>
        <div id="icon-profile"><img src="<?php echo dateUser::getInfo(Yii::app()->user->info['id'])['photo'] ?>" alt=""/></div>


    </div> <!--heder1 end-->
</div> <!--heder end-->

 <div id="menu-profile-parent">
     <div id="menu-profile-fixed">
   <div id="menu-profile">
       <a href="http://postim.by/profile/<?=yii::app()->user->info['id']?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mini-icon-profile-1.png" alt=""/>Мой профиль</a>
       <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Share-profile.png" alt=""/>Мои закладки</a>
       <a href="http://postim.by/setting"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/settings-profile.png" alt=""/>Мои настройки</a>
       <a href="http://postim.by/logout"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exit-profile.png" alt=""/>Выход</a>

   </div>
     </div>
</div>


<div style="clear: both"></div>
<div id="content">
    <div id="colum1">
        <?php echo $content; ?>

    </div><!--end colum1-->
    <div id="colum2">
        <?php $this->wid->viewWidget();?>
    </div>
</div><!--end content-->

</body>
</html>