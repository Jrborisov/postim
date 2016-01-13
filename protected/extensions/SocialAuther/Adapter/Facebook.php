<?php


class Facebook extends AbstractAdapter
{
    public function __construct($config)
    {
        parent::__construct($config);

        $this->socialFieldsMap = array(
            'socialId'   => 'id',
            'email'      => 'email',
            'name'       => 'name',
            'socialPage' => 'link',
            'sex'        => 'gender',
            'birthday'   => 'birthday'
        );

        $this->provider = 'facebook';
    }
    public function getName()
    {
        $result = "";

        if (isset($this->userInfo['name'])) {
            $result =  $this->userInfo['name'];
            $pos=strpos($result,' ');
            $name=substr($result,0,$pos);
        }
        return $name;
    }
    public function getLastName()
    {
        $result = "";

        if (isset($this->userInfo['name'])) {
            $result =  $this->userInfo['name'];
            $pos=strpos($result,' ');
            $name=substr($result,$pos,strlen($result));
        }
        return $name;
    }

    /**
     * Get url of user's avatar or null if it is not set
     *
     * @return string|null
     */
    public function getAvatar()
    {
        $result = 'http://postim.by/images/default_big_photo.png';
        if (isset($this->userInfo['username'])) {
            $result = 'http://postim.by/images/default_big_photo.png';
        }

        return $result;
    }

    /**
     * Authenticate and return bool result of authentication
     *
     * @return bool
     */
    public function authenticate()
    {
        $result = false;

        if (isset($_GET['code'])) {
            $params = array(
                'client_id'     => $this->clientId,
                'redirect_uri'  => $this->redirectUri,
                'client_secret' => $this->clientSecret,
                'code'          => $_GET['code']
            );

            parse_str($this->get('https://graph.facebook.com/oauth/access_token', $params, false), $tokenInfo);

            if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {
                $params = array('access_token' => $tokenInfo['access_token']);
                $userInfo = $this->get('https://graph.facebook.com/me', $params);

                if (isset($userInfo['id'])) {
                    $this->userInfo = $userInfo;
                    $result = true;
                }
            }
        }

        return $result;
    }

    /**
     * Prepare params for authentication url
     *
     * @return array
     */
    public function prepareAuthParams()
    {
        return array(
            'auth_url'    => 'https://www.facebook.com/dialog/oauth',
            'auth_params' => array(
                'client_id'     => $this->clientId,
                'redirect_uri'  => $this->redirectUri,
                'response_type' => 'code',
                'scope'         => 'email,user_birthday'
            )
        );
    }
}