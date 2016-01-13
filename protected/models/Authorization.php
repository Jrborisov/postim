<?php

class Authorization extends CActiveRecord{
    public $remember=false;
    public function tableName()
    {
        return 'tbl_user';
    }
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function attributeLabels()
    {

    }

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('login, password', 'required'),
        );
    }

    public  function Identity(){

        $Authorization=new UserIdentity($this->login,$this->password);
        if( $Authorization->authenticate()){
                
            $timeRemember=$this->remember?3600*24*7:0;
            Yii::app()->user->login($Authorization,$timeRemember);
            if( Yii::app()->user->info['activated']=='not activated'){
                $cookie = new CHttpCookie('confirmationMail',Yii::app()->user->info['id']);
		$cookie->expire = time()+60*60*24*180;
		$cookie->domain="postim.by"; 
		Yii::app()->request->cookies['confirmationMail'] = $cookie;
	     }
        }else{
            $this->addError('authenticate','Неверный логин или пароль');
        }
    }

    public function validatePassword($password){
        return CPasswordHelper::verifyPassword($password,$this->password);
    }

    public function hashPassword($password) {
        return CPasswordHelper::hashPassword($password);
    }

}