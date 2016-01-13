<?php

class UserIdentity extends  CUserIdentity{

    private $_id;
    private $login;
    public $password;

    public function  __construct($login,$password){
        $this->login=$login;
        $this->password=$password;

    }

    public function getId()
    {
        return $this->_id;
    }
    public function authenticate()
    {
        $login=Authorization::model()->find('login=:login',array(':login'=>$this->login));
        if(!isset ($login)){
            $login=Authorization::model()->find('email=:email',array(':email'=>$this->login));
        }
        if(isset($login)){


            if($login->validatePassword($this->password)){

                $userInfo=Yii::app()->db->createCommand()->select()
                    ->from('tbl_user')
                    ->where('login=:login',array(':login'=>$login['login']))
                    ->join('tbl_profile', 'id_profile=id')
                    ->queryRow();

                $this->_id=$userInfo['id'];
                $this->setState('info',$userInfo);

                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
}