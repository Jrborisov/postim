<?php
class dateUser{
    static public function getInfo($id)
    {
        $data = yii::app()->db->createCommand()
            ->Select()
            ->from('tbl_profile p')
            ->where('p.id_profile=:id', array(':id' => $id))
            ->join('tbl_record_setting s', 'p.id_profile=s.id_record_setting')
            ->join('tbl_info i', 'i.id_info=p.id_profile')
            ->queryRow();
        return $data;
    }
    static public function setInfoRecord_setting($key,$value){

            $command = Yii::app()->db->createCommand();
            $command->update('tbl_record_setting', array(
                $key=>$value,
            ), 'id_record_setting=:id', array(':id'=>yii::app()->user->info['id']));

    }
    static public function setInfoProfile($key,$value){
        if(!empty($key) and(!empty($value))){
            $command = Yii::app()->db->createCommand();
            $command->update('tbl_profile', array(
                $key=>$value,
            ), 'id_profile=:id', array(':id'=>yii::app()->user->info['id']));
        }
    }
}


