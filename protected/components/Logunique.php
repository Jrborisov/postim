<?php

class Logunique{

    public $login;
    public $email;

    public  function Unique($log,$ema){

        $login= Yii::app()->db->createCommand()
            ->select('login')
            ->from('tbl_user')
            ->where('login=:login',array(':login'=>$log))
            ->queryRow();
        $email=Yii::app()->db->createCommand()
            ->select('email')
            ->from('tbl_user')
            ->where('email=:email',array(':email'=>$ema))
            ->queryRow();
        if((!$login) and (!$email)) {
            $this->login=true;
            $this->email=true;
            return;
        }else{
            if(($login)and($email)){
                $this->login=false;
                $this->email=false;
                return;
            } else{
                if((!$login)and($email)){
                    $this->login=true;
                    $this->email=false;
                    return;
                }else{
                    if(($login)and(!$email)){
                        $this->login=false;
                        $this->email=true;
                        return;
                    }
                }
            }
        }
    }
}