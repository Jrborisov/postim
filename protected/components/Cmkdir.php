<?php
class cmkdir{
   static function  createDir($patch){
        if(!is_dir($patch)){
            mkdir($patch,0777,true);
        }

    }
}