<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentitySocial extends  CUserIdentity
{
    private $_id;
    private  $data;

    public function  __construct($data){
        if(!empty($data)){
            $this->data=$data;

        }

    }
    protected function  checkRegistered(){
        $check=false;
        $command=Yii::app()->db->createCommand();
        $user=$command ->select('id_social')
            ->from('tbl_user')
           ->where('id_social=:id_social',array(':id_social'=>$this->data->getSocialId()))
            ->queryRow();

       // $user=Registration::model()->find('id_social=:id_social',array(':id_social'=>$this->data->getSocialId()));

        if(!empty($user)) {


            $check = true;
        }

           return $check;
        }


	public function authenticate()
	{

       if(!$this->checkRegistered()){
           $email=$this->data->getEmail()?$this->data->getEmail():"";

            // закинуть инфу в таблицы
            $comand = Yii::app()->db->createCommand();
            $comand->insert('tbl_user', array(
                'id_social' => $this->data->getSocialId(),
                'email' => $email,
                'role' => 'user'

            ));
           //форматирование даты


           $id=Yii::app()->db->createCommand()->select('id')
               ->from('tbl_user')
               ->where('id_social=:id_social',array(':id_social'=>$this->data->getSocialId()))
               ->queryRow();
           // создаем дерикторию и сохраняем туда фото
           Cmkdir::createDir(Yii::getPathOfAlias('webroot').'/user_photo/'.$id['id']);
           $df= new resizecrop();
           $df->crop($this->data->getAvatar(), Yii::getPathOfAlias('webroot').'/user_photo/'.$id['id'].'/'.'default_big_photo.png');
           $df->resize(Yii::getPathOfAlias('webroot').'/user_photo/'.$id['id'].'/'.'default_big_photo.png', Yii::getPathOfAlias('webroot').'/user_photo/'.$id['id'].'/'.'big_photo.png',125,124);
           $df->resize(Yii::getPathOfAlias('webroot').'/user_photo/'.$id['id'].'/'.'default_big_photo.png', Yii::getPathOfAlias('webroot').'/user_photo/'.$id['id'].'/'.'icon_photo.png',27,27);
           //вставка значений по умолчанию в базу данных
           $icon='/user_photo/'.$id['id'].'/'.'icon_photo.png';
           $phote='/user_photo/'.$id['id'].'/'.'big_photo.png';
           $def=new insertDataDefault($id['id'],$this->data->getName(),$this->data->getLastName(),$icon,$phote);
           $def->insert();

       }
        $userInformation=Yii::app()->db->createCommand()->select()
            ->from('tbl_user')
            ->where('id_social=:id_social',array(':id_social'=>$this->data->getSocialId()))
            ->join('tbl_profile', 'id_profile=id')
            ->queryRow();


        $this->_id=$userInformation['id'];
        $this->setState('info',$userInformation);


	}



    public function getId()
    {
        return $this->_id;
    }
}