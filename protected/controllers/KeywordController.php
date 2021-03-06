<?php

class KeywordController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','keywordImport','ChooseCompany','CompanyKeywords', 'KeywordPosition', 'ImportPositions'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','admin','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
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

		public function actionkeywordImport()
	{
		$this->render('keywordImport');
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Keyword;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Keyword']))
		{
			$model->attributes=$_POST['Keyword'];
			if($model->save())
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

		if(isset($_POST['Keyword']))
		{
			$model->attributes=$_POST['Keyword'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionChooseCompany()
	{
		$model=new Keyword;

		if(isset($_POST['Keyword']))
		{
			$CompanyId=$_POST['Keyword']['company_id'];
			$date=$_POST['Keyword']['date'];
			$this->redirect(array('CompanyKeywords','id'=>$CompanyId,'date'=>$date));
		}

		$this->render('ChooseCompany',array(
			'model'=>$model,
		));
	}

	public function actionCompanyKeywords($id=NULL, $date)
	{	
		$criteria = new CDbCriteria();
		if ($id==NULL) {
			$result = Yii::app()->db->createCommand('select company from o_user WHERE id="'.Yii::app()->user->id.'"')->queryAll();
 			$id = $result[0]['company'];
		}
		//$id = $_POST['Keyword']['company_id'];
        $criteria->condition = '`company_id` = "'.$id.'" group by keyword';
        //$criteria->group = '`keyword`';
        $criteria->join = 'left JOIN `o_keyword_position` ON `o_keyword_position`.`date` = "'.$date.'"';

		$dataProvider=new CActiveDataProvider('Keyword', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),));
		if (!Yii::app()->user->role==7) {
			$this->render('CompanyKeywords',array(
			'dataProvider'=>$dataProvider,
		));
		} else {
			$this->render('CompanyKeywordsClient',array(
			'dataProvider'=>$dataProvider,
			));
		}

	}

	public function actionKeywordPosition()
	{
		$this->render('KeywordPosition',array(
			'dataProvider'=>$dataProvider,
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
	{
		$dataProvider=new CActiveDataProvider('Keyword');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Keyword('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Keyword']))
			$model->attributes=$_GET['Keyword'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

		public function actionImportPositions()
	{	

		// $file=file_get_contents('report.htm');

		// require_once 'simple_html_dom.php';


		// $html= str_get_html($file); 
		// $stack = $html->find('table tr');


		// foreach($stack as $element) {
		// 	$cur_keyword = $element->find('td', 0)->plaintext;
		// 	$cur_pos = $element->find('td', 1)->plaintext;
		// 	Yii::app()->db->createCommand("select id from keyword where keyword = ".$cur_keyword."")->queryAll();
		// 	Yii::app()->db->createCommand("INSERT INTO keyword_position(`date`, `keyword_id`, `keyword_position`) VALUES (".date('Y-m-d').", ".$sql.", ".$cur_pos.")")->execute();

  //   	}



		$this->render('ImportPositions',array(
			'model'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Keyword the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Keyword::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Keyword $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='keyword-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
