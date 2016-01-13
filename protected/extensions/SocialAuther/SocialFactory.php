<?php

class SocialFactory{

    public static function getAuther($query){
        switch($query){
            case 'vk':{
                $vkAdapterConfig = array(
                    'client_id'     => '5088327',
                    'client_secret' => 'Hn7Toih2jduSjZVtoLdl',
                    'redirect_uri'  => 'http://postim.by/site/loginSocial?social=vk',
                );

                $vkAdapter = new Vk($vkAdapterConfig);

                return new SocialAuther($vkAdapter);
            }
            break;
            case 'odnoklassniki':{

                $config=array(
                    'client_id'     => '1157164544',
                    'client_secret' => 'F78F6B84D8E11B35C5D34933',
                    'redirect_uri'  => 'http://postim.by/site/loginSocial?social=odnoklassniki',
                    'public_key'    => 'CBAPOJPFEBABABABA'
                );

                $Adapter= new Odnoklassniki($config);
                return new SocialAuther($Adapter);
            }
            break;
            case 'google':{

                $config=array(
                    'client_id'     => '861975962705-pckglm9l7gudsb955hjrsnoi9b1rda64.apps.googleusercontent.com',
                    'client_secret' => 'obr_ggsbDweLlfnGlP9KZuGu',
                    'redirect_uri'  => 'http://postim.by/site/loginSocial?social=google'
                );

                $Adapter= new Google($config);
                return new SocialAuther($Adapter);

            }
            break;
            case 'facebook':{

                $config=array(
                    'client_id'     => '205848659751771',
                    'client_secret' => '45a56d2200daf26d5e2e0e639c6cbc75',
                    'redirect_uri'  => 'http://postim.by/site/loginSocial?social=facebook'
                );

                $Adapter= new Facebook($config);
                return new SocialAuther($Adapter);

            }
            case 'twitter':{

                $config=array(
                    'client_id'     => 'IXuThMKRMMLS1s8tsKc6dlioq',
                    'client_secret' => 'RcsL58rQyFTrBquk8L1w9b3fsfpzj0DBEbKIoO4LmoSTTUZR1x',
                    'redirect_uri'  => 'http://postim.by/site/loginSocial?social=twitter'
                );

                $Adapter= new Twitter($config);
                return new SocialAuther($Adapter);

            }
        }
    }
}