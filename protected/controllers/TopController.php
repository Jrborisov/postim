<?php

class TopController extends Controller
{
    public $wid;
    public function init(){
        parent::init();
        $this->wid=new columnWidget();
    }
    public $title="Лучшие посты за сутки – Postim.by";
    public $top='style="background-color:#524a5f"';
public function actionIndex()
	{
        if(!yii::app()->user->isGuest){

           $this->layout="templateAuthorized";
        }
        $this->render('index');
	}
	
}