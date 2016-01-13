<?php
class profile
{
    private $data ="";

    public function __Construct($id)
    {
        $this->data = yii::app()->db->createCommand()
            ->Select()
            ->from('tbl_profile p')
            ->where('p.id_profile=:id', array(':id' => $id))
            ->join('tbl_record_setting s', 'p.id_profile=s.id_record_setting')
            ->join('tbl_info i', 'i.id_info=p.id_profile')
            ->queryRow();
    }
    public function IssetUser(){
        if(empty( $this->data)){
            return false;
        }else{
            return true;
        }
    }
    public function getData(){
        return $this->data;
    }
}
