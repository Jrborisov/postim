<?php
class insertDataDefault{
    private $id;
    private $name;
    private $lastName;
    private $photo;
    private $big_phote;
    public function __Construct($id,$name,$lastName,$photo='/images/Icon_profile.png',$big_photo='/images/default_big_photo.png'){
        $this->id=$id;
        $this->name=$name;
        $this->lastName= $lastName;
        $this->photo=$photo;
        $this->big_phote=$big_photo;

    }
    public function insert($activated='activated',$email=""){
        $month=explode(" ","января февраля марта апреля мая июня июля августа сентября октября ноября декабря")[date('n')-1];
        setlocale(LC_TIME,'');
        $comand = Yii::app()->db->createCommand();
        $comand->insert('tbl_profile',array(
            'id_profile'=>$this->id,
            'name'=>$this->name." ".$this->lastName,
            'activated'=>$activated,
            'email'=>$email,
            'photo'=>$this->photo,
            'big_photo'=>$this->big_phote,
            'registration_date'=>strftime('%e '.$month.' %Y')
        ));

        $this->InsertDefault();
    }

    private function InsertDefault(){
        $comand = Yii::app()->db->createCommand();
        $comand->insert('tbl_record_setting',array(
            'above_ten_news'=>0,
            'above_ten_comments'=>0,
            'ignored_topics'=>"",
            'ignored_users'=>""));

        $comand = Yii::app()->db->createCommand();
        $comand->insert('tbl_info',array(
            'rating'=>'0',
            'fans'=>'0',
            'number_of_records'=>'0',
            'best_records'=>'0'
        ));

    }

}