<?php

class PriceController extends Controller{

    function actionIndex(){


        $model=DataPrice::model()->findall();
        $this->render('index',array('model'=>$model));
    }

    function actionInsert(){

        $model=new DataPrice();
        $form=new CForm('application.views.price.form', $model );
        if($form->submitted('price') && $form->validate()){
            $model->save();
            $this->redirect(array('index'));}
        else {
            $this->render('insert', array('form' => $form));
        }
    }





}