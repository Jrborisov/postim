<?php

class Data extends CModel{
    function attributeNames(){}
    protected $data=array(
        array('name'=>'igor','lastname'=>'borisov','mobphone'=>'2953554'),
        array('name'=>'soha','lastname'=>'knot','mobphone'=>'2932544'),
    );

    public  function getdata(){
        return $this->data;
    }
}