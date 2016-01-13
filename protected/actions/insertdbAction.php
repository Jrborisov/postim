<?php

class InsertdbAction extends CAction{

  public function run(){
      yii::app()->controller->render('test');
  }
}