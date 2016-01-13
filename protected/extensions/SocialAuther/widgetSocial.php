<?php

class widgetSocial {

    public static function view(){

        $adapterConfigs = array(
            'vk' => array(
                'client_id'     => '5088327',
                'client_secret' => 'Hn7Toih2jduSjZVtoLdl',
                'redirect_uri'  => 'http://postim.by/site/loginSocial?social=vk'
            ),
            'odnoklassniki' => array(
                'client_id'     => '1157164544',
                'client_secret' => 'F78F6B84D8E11B35C5D34933',
                'redirect_uri'  => 'http://postim.by/site/loginSocial?social=odnoklassniki',
                'public_key'    => 'CBAPOJPFEBABABABA'
            ),
            'google'=>array(
                'client_id'     => '861975962705-pckglm9l7gudsb955hjrsnoi9b1rda64.apps.googleusercontent.com',
                'client_secret' => 'obr_ggsbDweLlfnGlP9KZuGu',
                'redirect_uri'  => 'http://postim.by/site/loginSocial?social=google'
            ),
            'facebook'=>array(
                'client_id'     => '205848659751771',
                'client_secret' => '45a56d2200daf26d5e2e0e639c6cbc75',
                'redirect_uri'  => 'http://postim.by/site/loginSocial?social=facebook'
            ),
            'twitter'=>array(
                'client_id'     => 'IXuThMKRMMLS1s8tsKc6dlioq',
                'client_secret' => 'RcsL58rQyFTrBquk8L1w9b3fsfpzj0DBEbKIoO4LmoSTTUZR1x',
                'redirect_uri'  => 'http://postim.by/site/loginSocial?social=twitter'
            )

        );

      foreach($adapterConfigs as $className=>$params ){
          $class=ucfirst($className);
          $auther = new $class($params);
          $img="<img class=\"imgSocial\" src=". Yii::app()->request->baseUrl.'../images/'.$class.'.png'." alt=''/>";
          echo '<a href="' . $auther->getAuthUrl() . '">'. $img.'</a>';
      }







 }
}