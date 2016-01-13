<div class="caption-header" >
    Заголовок:<span class="Span-text-Color" >*<span>
    <input type="text" name="news_header" class="news_header">
</div>
<div class="addPhotoAndVideo">
   <label class="label-photo">
       <div class="addPhoto"><img src="<?= Yii::app()->request->baseUrl?>/images/camera.png"><span>Добавить фото</span></div>
       <input type="file" name="imgName" class="photo-file">
   </label>
  <div class="addVideo"><img src="<?= Yii::app()->request->baseUrl?>/images/vidio.png"><span>Добавить видео</span></div>
</div>
<div class="clear"></div>
<div class="container-add-text">
    Текст:<span class="Span-text-Color" >*<span>
    <div class="content-add-div">
        <div id="content-container">
            <div id="editor-wrapper">
                <div id="editor-container"></div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/quill/quill.js"></script>
        <input  name="news_tag" type="text"  placeholder="Укажите несколько тем. Например: Минск, Беларусь, фото">
    </div>
</div>
<div class="container-source">
    Источник:
    <input name="news_source" type="text" placeholder="Укажите источник поста">
</div>
<div class="my-news">
   <input type="checkbox" name="my_news" >
    <span>Это мой пост</span>
</div>
<div class="clear"></div>
<div class="buttons-news">
    <button class="button-news" >Опубликовать</button>
    <a class="button-news-preview">Предпросмотр</a>
</div>
<div class="clearBottom"></div>
<div class="parent_box_insert_video">
    <div class="parent_box_insert_video1">
        <div class="box_insert_video">
                <a class="close_box_insert_video" title="Закрыть"></a>
            <p class="href-to-video">Ссылка на видеоролик</p>
            <input type="text" placeholder="http://" name="href-video-input" class="href-video-input">
            <p class="text-to-video">Вы можете указать ссылку на страницу видеозаписи на таких сайтах, как YouTube,Rutube,Vimeo</p>
        </div>
    </div>

</div>

