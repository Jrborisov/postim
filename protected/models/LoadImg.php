<?php

class LoadImg extends CActiveRecord{

    public $image;
    public $patch;
    public $name;
    // другие свойства
    public function tableName()
    {
        return 'Img';
    }
    public function rules(){
        return array(
            //устанавливаем правила для файла, позволяющие загружать
            // только картинки!
            array('image', 'file', 'types'=>'jpg, gif, png'),
        );
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public  function select(){
    return $contct=yii::app()->db->createCommand()
      ->select("patch")
      ->from("Img")
      ->where(array('like', 'name', '%UFWKG%'))
      ->queryRow();
    }
}