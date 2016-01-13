<?php

class LoadImgController extends CController{
    public function actionIndex(){
        $model=new LoadImg;
        if(isset($_POST['LoadImg'])){
            $model->image=$_POST['LoadImg']['image'];
            $model->image=CUploadedFile::getInstance($model,'image');
            if($model->validate()){
                $path=Yii::getPathOfAlias('webroot').'/upload/'.$model->image->getName();
                $model->patch='/upload/'.$model->image->getName();
                $model->name=$model->image->getName();
                $model->save();
                $model->image->saveAs($path);
                $this->redirect(array('pop'));
            }
        }
        $this->render('index', array('model'=>$model));
    }

    public function ActionPop(){
        $model=new LoadImg;
        $model=$model->select();
        $this->render('pop', array('model'=>$model));
    }
}