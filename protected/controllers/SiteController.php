<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
			'yiichat'=>array('class'=>'YiiChatAction'),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$userag = $_SERVER['HTTP_USER_AGENT'];
		if ((strpos($userag, 'Android') || strpos($userag, 'iPhone') || strpos($userag, 'iPad')) && Yii::app()->user->isGuest) {
		$this->redirect('site/login'); } else {
		$this->render('index'); }
	}
	
	public function actionChat()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('chat');
	}
	
	public function actionPrivate()
	{
		if($_POST['users_private']){
			
			$chat_id=ChatFunc::generateChatId();
			ChatFunc::invitePeople($chat_id, $_POST['users_private']);
			$this->redirect('/site/private?chat='.$chat_id);
		
		}else{
			$chat_id=$_GET['chat'];
		}
		
		$this->render('private', array('chat_id'=>$chat_id));
		
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionRegistration()
	{
		$model=new User;
		$model->scenario='registration';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				Yii::app()->user->setFlash('registration','Регистрация прошла успешно. Вы сможете авторизироваться после подтверждения администратора');
		}

		$this->render('registration',array(
			'model'=>$model,
		));
	}

	/**
	 * Displays the contact page
	 */
	
	
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

		public function actionClientLogin()
	{	$this->layout='//layouts/formLayoutcolumn1';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('clientLogin',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{	$role = Yii::app()->user->role;
		Yii::app()->user->logout();
		
		if ($role==7) {
			$this->redirect('http://dr-intellectus.com/');
		} else {
			$this->redirect(Yii::app()->homeUrl);
		}
		
	}
	public function actionAjaxMessage(){
		
		$invited=ChatFunc::InviteMessage();
		if(isset($invited))
    	echo $invited['login'].'+'.$invited['chat_id'];
	}
	
	public function actionChatAjaxUpdate($chat){
		$posts=ChatFunc::GetMessages($chat);
		echo $posts;
	}
}