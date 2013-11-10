<?php

class CommersialOfferController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/formLayoutcolumn1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','create','view','ViewSkyz', 'TestExport'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionViewSkyz($id)
	{	$this->layout='//layouts/column1';
		$this->render('viewSkyz',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CommersialOffer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CommersialOffer']))
		{
			$model->attributes=$_POST['CommersialOffer'];
			
			$model->sales_form = implode(",", $_POST["CommersialOffer"]['sales_form']);
			$model->market_position = implode(",", $_POST["CommersialOffer"]['market_position']);
			$model->marketing_strategy = implode(",", $_POST["CommersialOffer"]['marketing_strategy']);
			$model->price_level = implode(",", $_POST["CommersialOffer"]['price_level']);
			$model->site_tasks_adv = implode(",", $_POST["CommersialOffer"]['site_tasks_adv']);
			$model->site_tasks_mark = implode(",", $_POST["CommersialOffer"]['site_tasks_mark']);
			$model->site_tasks_info = implode(",", $_POST["CommersialOffer"]['site_tasks_info']);
			$model->site_type = implode(",", $_POST["CommersialOffer"]['site_type']);
			$model->additional_languages = implode(",", $_POST["CommersialOffer"]['additional_languages']);
			$model->site_stilistics = implode(",", $_POST["CommersialOffer"]['site_stilistics']);
			$model->firm_style_attributes = implode(",", $_POST["CommersialOffer"]['firm_style_attributes']);
			$model->site_colors = implode(",", $_POST["CommersialOffer"]['site_colors']);
			$model->site_brightness = implode(",", $_POST["CommersialOffer"]['site_brightness']);
			$model->composition = implode(",", $_POST["CommersialOffer"]['composition']);
			$model->design_type = implode(",", $_POST["CommersialOffer"]['design_type']);
			$model->components_basic = implode(",", $_POST["CommersialOffer"]['components_basic']);
			$model->components_web_form = implode(",", $_POST["CommersialOffer"]['components_web_form']);
			$model->components_interactive = implode(",", $_POST["CommersialOffer"]['components_interactive']);
			$model->components_corporative = implode(",", $_POST["CommersialOffer"]['components_corporative']);
			$model->components_people = implode(",", $_POST["CommersialOffer"]['components_people']);
			$model->components_online_consult = implode(",", $_POST["CommersialOffer"]['components_online_consult']);
			$model->components_publication = implode(",", $_POST["CommersialOffer"]['components_publication']);
			$model->cms_type = implode(",", $_POST["CommersialOffer"]['cms_type']);
			$model->modules_type = implode(",", $_POST["CommersialOffer"]['modules_type']);
			$model->menu_structure = implode(",", $_POST["CommersialOffer"]['menu_structure']);
			$model->mainpage_elements = implode(",", $_POST["CommersialOffer"]['mainpage_elements']);
			$model->site_done_before = implode(",", $_POST["CommersialOffer"]['site_done_before']);

			if($model->save())

         		mail('info@dr-intellectus.com', 'Заполненая онлайн-заявка Dr.Intellectus', 
         			"Пришла новая заявка\n Просмотр заявок по ссылке\n http://test.dr-intellectus.ru/commersialOffer/index", "Content-type: text/plain; charset=utf-8");
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CommersialOffer']))
		{
			$model->attributes=$_POST['CommersialOffer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{	$this->layout='//layouts/column1';
		$dataProvider=new CActiveDataProvider('CommersialOffer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CommersialOffer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CommersialOffer']))
			$model->attributes=$_GET['CommersialOffer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionTestExport($id=NULL)
	{ 	
		if(isset($id))
	    	$model = CommersialOffer::model()->findAllByPk($id);
	    else
	    	$model = CommersialOffer::model()->findAll();
 
	    // Export it
	    $this->toExcel($model);
	}

	public function behaviors()
	    {
	        return array(
	            'eexcelview'=>array(
	                'class'=>'ext.eexcelview.EExcelBehavior',
	            ),
	        );
    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CommersialOffer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CommersialOffer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CommersialOffer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='commersial-offer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
