<?php

class Registration extends CActiveRecord{

    public $resolution;
    public  $password2;
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
            array('login, password,email', 'required'),
            array('login,email','logUnique'),
            array('password','MyCompare')
        );
    }

    public function  MyCompare(){
        if($this->password!=$this->password2){
            $this->addError('password','пароли не совпадают');
        }
    }
//проверка не занял ли логин
    public function logUnique()
    {
        $cheked=new Logunique();
        $cheked->Unique($this->login,$this->email);
        if(!$cheked->login){
            $this->addError('login', 'Логин уже занят');
        }
        if(!$cheked->email){
            $this->addError('email', 'Электронная почта уже занята');
        }


    }
    public function hashPassword($password) {
        return CPasswordHelper::hashPassword($password);
    }
    protected function beforeSave() {
        $this->password = $this->hashPassword($this->password);
        $this->role='user';
        return parent::beforeSave();
    }

    public function afterSave(){
        $def=new insertDataDefault($this->id,$this->login,"");
        $def->insert('not activated',$this->email);
    }
    }
