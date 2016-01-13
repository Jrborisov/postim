<?php

class SiteController extends Controller
{
    public $wid;
    public function init(){
        parent::init();
        $this->wid=new columnWidget();
    }
    public function actionChangePasswordSetting(){
        $password = yii::app()->db->createCommand()
            ->Select('password')
            ->from('tbl_user')
            ->where('id=:id', array(':id' => yii::app()->user->info['id']))
            ->queryRow();
        if(!CPasswordHelper::verifyPassword($_POST['password'],$password['password'])){
            echo 'не верный пароль';
            exit;
        }
        $password=CPasswordHelper::hashPassword($_POST['newpassword']);
        $command = Yii::app()->db->createCommand();
        $command->update('tbl_user', array(
            'password'=>$password,
        ), 'id=:id', array(':id'=>yii::app()->user->info['id']));
        echo "пароль успешно изменен";
    }
    public function actionChangeSettings(){
        if(isset ($_POST['ajax'])){
           if(isset($_POST['name'])){
               dateUser::setInfoProfile('name',$_POST['name']);
               echo "изменения сохранены";
           }
            if(isset($_POST['email'])){
                dateUser::setInfoProfile('email',$_POST['email']);
                echo "изменения сохранены";
            }
            if(isset($_POST['sex'])){
                dateUser::setInfoProfile('sex',$_POST['sex']);
                echo "изменения сохранены";
            }
            if(isset($_POST['city'])){
                dateUser::setInfoProfile('city',$_POST['city']);
                echo "изменения сохранены";
            }
            if(isset($_POST['description'])){
                dateUser::setInfoProfile('description',$_POST['description']);
                echo "изменения сохранены";
            }
            if(isset($_POST['above_ten_news'])){
                dateUser::setInfoRecord_setting('above_ten_news',$_POST['above_ten_news']);
                echo "изменения сохранены";
            }
            if(isset($_POST['above_ten_comments'])){
                dateUser::setInfoRecord_setting('above_ten_comments',$_POST['above_ten_comments']);
                echo "изменения сохранены";
            }
            if(isset($_POST['ignored_users'])){
                dateUser::setInfoRecord_setting('ignored_users',$_POST['ignored_users']);
                echo "изменения сохранены";
            }
            if(isset($_POST['ignored_topics'])){
                dateUser::setInfoRecord_setting('ignored_topics',$_POST['ignored_topics']);
                echo "изменения сохранены";
            }

        }

    }
    public function actionImgload()
    {
        $types = array('image/gif', 'image/png', 'image/jpeg');
         if(in_array($_FILES["file"]["type"],$types)){
             Cmkdir::createDir(Yii::getPathOfAlias('webroot').'/user_photo/'.yii::app()->user->info['id']);
             $df= new resizecrop();
             $df->crop($_FILES["file"]["tmp_name"], Yii::getPathOfAlias('webroot').'/user_photo/'.yii::app()->user->info['id'].'/'.'default_big_photo.png');
             $df->resize(Yii::getPathOfAlias('webroot').'/user_photo/'.yii::app()->user->info['id'].'/'.'default_big_photo.png', Yii::getPathOfAlias('webroot').'/user_photo/'.yii::app()->user->info['id'].'/'.'big_photo.png',125,124);
             $df->resize(Yii::getPathOfAlias('webroot').'/user_photo/'.yii::app()->user->info['id'].'/'.'default_big_photo.png', Yii::getPathOfAlias('webroot').'/user_photo/'.yii::app()->user->info['id'].'/'.'icon_photo.png',27,27);
             $command = Yii::app()->db->createCommand();
             $command->update('tbl_profile', array(
                 'photo'=>'/user_photo/'.yii::app()->user->info['id'].'/'.'icon_photo.png',
                 'big_photo'=>'/user_photo/'.yii::app()->user->info['id'].'/'.'big_photo.png',
             ), 'id_profile=:id', array(':id'=>yii::app()->user->info['id']));
             echo '/user_photo/'.yii::app()->user->info['id'].'/';

         }





    }
    public function actionSetting(){
        $userInfo=dateUser::getInfo(yii::app()->user->info['id']);
        $this->layout="authorizedView";
        $this->render("mysetting", array('userInfo'=>$userInfo));
    }

    public function actionProfile($id){

            $this->layout="authorizedView";
            $profile=new Profile($id);
            if($profile->IssetUser()){

                $this->render('profile',array('ProfileInfo'=>$profile->getData()));
            }else{
                throw new ExceptionClass(312,'пользователь не найден');
            }

    }
    public function actionResend(){
        $headers =  'From: Postim.by <noreply@postim.by>' . "\r\n";
        mail(Yii::app()->user->info['email'],"Подтверждение почты для Postim.by","Приветствуем, ".Yii::app()->user->info['login']."!\r\n\r\nДля подтверждения электронной почты и завершения процесса регистрации, пройдите, пожалуйста, по ссылке:"."http://postim.by/site/OfficialAcknowledgement?id=".Yii::app()->user->info['id']."\r\nЕсли вы получили это письмо по ошибке, просто игнорируйте его.\r\n\r\nС наилучшими пожеланиями, Postim.by",$headers);
        $this->redirect(Yii::app()->homeUrl);
    }
    public function actionLogin(){

        if(isset($_GET['ajax'])){
           $model=new Authorization();
           $model->login=$_GET['login'];
           $model->password=$_GET['password'];
           $model->Identity();

           $ErorrArray= $model->getErrors();
            if(isset  ($ErorrArray)){
                echo $ErorrArray['authenticate'][0];
                exit;
            }
        }

        if(isset($_POST)){
            $model=new Authorization();
            $model->login=$_POST['login-authorization'];
            $model->password=$_POST['password-authorization'];
            if(isset($_POST['remember'])){
                $model->remember=true;
            }
            $model->Identity();


        }
        $this->redirect(Yii::app()->homeUrl);
    }
   //авторизация черз соц сети
    public function actionLoginSocial() {
       $auther = SocialFactory::getAuther($_GET['social']);
        if ((!isset($_GET['code']) &&($_GET['social']!='twitter') )) {
            $this->redirect(Yii::app()->homeUrl);
        } else {
            if ($auther->authenticate()) {

                $UserIdentitySocial= new UserIdentitySocial($auther);
                $UserIdentitySocial-> authenticate();

                Yii::app()->user->login($UserIdentitySocial,3600*24*7);
                $this->redirect(Yii::app()->homeUrl);
            }else{

            }
         }
        }

    public function actionPasswordRecovery(){
        $this->layout="templateRecovery";
        $this->render('index');
    }
    public function actionPasswordChange()
    {
        $this->layout="templateRecovery";
        if (isset($_GET['email'])) {
            $mail = str_replace('.', '_', $_GET['email']);
            if (Yii::app()->request->cookies[$mail] == $_GET['uniqid']) {

                $this->render('Recovery');
                exit;
            } else {
                $this->redirect(Yii::app()->homeUrl);
            }
        }

        if (isset($_POST['email']) && isset($_POST['ajax'])) {
            $email = $_POST['email'];
            $comand = Yii::app()->db->createCommand();
            $em = $comand->select('email,login')
                ->from('tbl_user')
                ->where('email=:email', array(':email' => $email))
                ->queryRow();
            if (empty($em)) {
                echo "Пользователь с такой почтой не найден";
                exit;
            }
            exit;
        }

        $recaptcha=$_POST['g-recaptcha-response'];
        if(!empty($recaptcha)) {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret = '6LcTwBETAAAAAMPw2hm-8ZPGBgNKwgx3yNWv9SED';
            $ip = $_SERVER['REMOTE_ADDR'];
            $url = $google_url . "?secret=" . $secret . "&response=" . $recaptcha . "&remoteip=" . $ip;
            $res = getCurlData::CurlData($url);
            $res = json_decode($res, true);

            if($res['success']) {
        if(isset($_POST['Email'])){
            $email = $_POST['Email'];
            $comand = Yii::app()->db->createCommand();
            $em = $comand->select('email,login')
                ->from('tbl_user')
                ->where('email=:email', array(':email' => $email))
                ->queryRow();
            $uniqid = substr(md5(uniqid()), 5, 15);
            $cookie = new CHttpCookie($_POST['Email'], $uniqid);
            $cookie->expire = time() + (60 * 5);
            $cookie->domain = "postim.by";
            Yii::app()->request->cookies[$_POST['Email']] = $cookie;
            $headers =  'From: Postim.by <noreply@postim.by>' . "\r\n";
            mail($_POST['Email'], "Восстановления пароля  для Postim.by", "Приветствуем, " . $em['login'] . "!\r\n\r\nЧтобы восстановить доступ к своему аккаунту, пройдите, пожалуйста, по ссылке:http://postim.by/passwordChange?email=" . $em['email'] . "&uniqid=" . $uniqid . "\r\nЕсли вы получили это письмо по ошибке, просто игнорируйте его.\r\n\r\nС наилучшими пожеланиями, Postim.by",$headers);
            yii::app()->user->setFlash('aLetterSent', "Инструкции по восстановлению пароля отправлены на указанный  адрес электронной почты");
            $this->redirect(Yii::app()->homeUrl);

        }
            }
        }else{
            yii::app()->user->setFlash('errorPasswordRecovery', "Необходимо разгадать капчу");
            $this->redirect('passwordRecovery');
        }

        }

    public function actionUpdatePassword(){

        $password=CPasswordHelper::hashPassword($_POST['password']);
        $email=$_POST['email'];

        $command = Yii::app()->db->createCommand();
        $command->update('tbl_user', array(
            'password'=>$password,
        ), 'email=:email', array(':email'=>$email));
        yii::app()->user->setFlash('aLetterSent', "Пароль вашего профеля успешно изменен");
        $this->redirect(Yii::app()->homeUrl);

    }
    public function actionDeleteСookie(){
      $cookie = new CHttpCookie($_POST['name'],'');
		$cookie->expire = 0;
		$cookie->domain="postim.by"; 
		Yii::app()->request->cookies[$_POST['name']] = $cookie;
    }
    public function actionRegistration(){
   
         $model=new Registration();

              if ($_GET['ajax']) {
                  $model->login = $_GET['login'];
                  $model->email = $_GET['email'];
                  $model->password = $_GET['password'];
                  $model->password2 = $_GET['password1'];
                  if (!$model->validate()) {
                      $ErorrArray = $model->getErrors();;
                      if (isset($ErorrArray['email'][0])) {
                          echo $ErorrArray['email'][0];
                          exit;
                      }
                      if (isset($ErorrArray['login'][0])) {
                          echo $ErorrArray['login'][0];
                          exit;
                      }
                  }
              }


        $recaptcha=$_POST['g-recaptcha-response'];
        if(!empty($recaptcha)) {
            $google_url = "https://www.google.com/recaptcha/api/siteverify";
            $secret = '6LcTwBETAAAAAMPw2hm-8ZPGBgNKwgx3yNWv9SED';
            $ip = $_SERVER['REMOTE_ADDR'];
            $url = $google_url . "?secret=" . $secret . "&response=" . $recaptcha . "&remoteip=" . $ip;
            $res = getCurlData::CurlData($url);
            $res = json_decode($res, true);

            if($res['success']) {
                if($_POST){

                    $model->login=$_POST['login-registration'];
                    $model->email=$_POST['email-registration'];
                    $model->password=$_POST['password-registration'];
                    $model->password2=$_POST['password1-registration'];

                    if( $model->validate()){
                        $model->save();
                        $id=$model->id;
                        $model=new Authorization();
                        $model->login=$_POST['login-registration'];
                        $model->password=$_POST['password-registration'];
                        $model->remember=true;
                        $model->Identity();
                        $headers =  'From: Postim.by <noreply@postim.by>' . "\r\n";
                        mail(Yii::app()->user->info['email'],"Подтверждение почты для Postim.by","Приветствуем, ".Yii::app()->user->info['login']."!\r\n\r\nДля подтверждения электронной почты и завершения процесса регистрации, пройдите, пожалуйста, по ссылке:"."http://postim.by/site/OfficialAcknowledgement?id=".Yii::app()->user->info['id']."\r\nЕсли вы получили это письмо по ошибке, просто игнорируйте его.\r\n\r\nС наилучшими пожеланиями, Postim.by",$headers);

                    }
                }
            }
        }else{
            yii::app()->user->setFlash('error', "Необходимо разгадать капчу");
            $this->redirect(Yii::app()->user->returnUrl);
        }

        $this->redirect(Yii::app()->user->returnUrl);

    }
    public function actionOfficialAcknowledgement($id){
       $command = Yii::app()->db->createCommand();
       $command->update('tbl_profile', array(
        'activated'=>'activated',
	), 'id_profile=:id_profile', array(':id_profile'=>$id));
	
	        $cookie = new CHttpCookie('confirmationMail','');
		$cookie->expire = 0;
		$cookie->domain="postim.by"; 
		Yii::app()->request->cookies['confirmationMail'] = $cookie;
	           
        $this->redirect(Yii::app()->homeUrl);          
                 
                  
	
    }
	public function actionIndex()
	{
          $this->redirect(Yii::app()->homeUrl);  
	}

	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    public function actionError(){
        $error=Yii::app()->errorHandler->error;
        $this->render('404',array('error'=>$error));
    }


}