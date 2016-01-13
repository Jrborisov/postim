<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        $data=new data();
        $data=$data->getdata();
		$this->render('index',array('data'=>$data));
	}
}