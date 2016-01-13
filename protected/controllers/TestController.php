<?php

class TestController extends Controller
{
	public function actionIndex()
	{
        $model=new test();
        $model=$model->select();
		$this->render('index',array('data'=>$model));
	}

    public function actionInsert(){

        if((isset($_POST['name']))and (isset($_POST['lastname']))){

            $model=new test();
            $model->insert($_POST['name'],$_POST['lastname']);
            $this->redirect(array('index'));
        }else{


            $this->render('insert');
        }
    }
}