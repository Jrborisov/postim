<?php

class UsersController extends Controller
{
    public function actions(){
        return array(
            'insertdb'=>'application.actions.insertdbAction',


        );
    }
	public function actionIndex()
	{

        $resalt=Users::model()->findall();
		$this->render('index',array('rez'=>$resalt));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

    public function actionInsert()
    {
        $model = new Users;

        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='users-insert-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            if ($model->validate()) {
                // form inputs are valid, do something here
             $post=new Users();
             $post->lastname=  $_POST['Users']['lastname'];
             $post->name=$_POST['Users']['name'];
             $post->save();
            header('location:?r=users/index');
           return;


            }
        }
        $this->render('insert', array('model' => $model));
    }
}