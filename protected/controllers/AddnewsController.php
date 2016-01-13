<?php
class AddnewsController extends Controller{
    public $wid;
    public $title="Добавить пост на Postim.by";
    public $addnew='style="background-color:#524a5f"';
    public function actionIndex()
    {
        $this->layout="templateAuthorized";
        $this->render('index');
    }
  public function init(){
      parent::init();
      $this->wid=new columnWidget();
      $this->wid->addWidget("familiarise");
  }

  public function actionAddImg(){
      if(isset($_POST)) {

          try{
           $idImg = substr(md5(uniqid(rand(1, 150))), 5, 17);
           $Npatch = '/postImg/' . yii::app()->user->info['id'] . '/' . strftime('%d.' . '%m.' . '%Y');
           $patch = Yii::getPathOfAlias('webroot') . $Npatch;
           Cmkdir::createDir($patch);

          if ($file = file_get_contents(($_POST['imgName']))) {
              if (!file_put_contents($patch . "/" . $idImg . '.jpg', $file)) {
                  Throw new Exception('В Файл не записано');
              }
          }
          $df = new resizecrop();
          if ($df->resizePostImg($patch . "/" . $idImg . '.jpg', $patch . "/" . $idImg . '.jpg') && ($df->imgError)) {
              echo $Npatch . "/" . $idImg . '.jpg';
          } else {
              Throw new Exception('Размеры не изменены');
          }
     } catch (Exception $e){
              echo "Ошибка";
              exit;
          }
      }
  }

    public function actionAddImgfile()
    {
        $types = array('image/gif', 'image/png', 'image/jpeg');
        if(in_array($_FILES["imgName"]["type"],$types)){
            $idImg = substr(md5(uniqid(rand(1, 150))), 5, 17);
            $Npatch = '/postImg/' . yii::app()->user->info['id'] . '/' . strftime('%d.' . '%m.' . '%Y');
            $patch = Yii::getPathOfAlias('webroot') . $Npatch;
            Cmkdir::createDir($patch);
            $file= new resizecrop();
            $file->resizePostImg($_FILES["imgName"]['tmp_name'],$patch . "/" . $idImg . '.jpg');
            echo $Npatch . "/" . $idImg . '.jpg';

        }

    }
}
