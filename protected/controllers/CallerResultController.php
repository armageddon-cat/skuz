<?php

class CallerResultController extends Controller
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
				'actions'=>array('index','view', 'my', 'CallerTodayReport', 'CallerYesterdayReport', 'CallerWeekReport', 'CallerMonthReport', 'ChooseReport',
				 'YesterdayFull', 'WeekFull', 'MonthFull', 'QuarterFull'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CallerResult;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CallerResult']))
		{
			$model->attributes=$_POST['CallerResult'];
			$model->date=date('Y-m-d H:i:s');
			$model->caller_res_id=Yii::app()->user->id;
			if($model->save()){
				if($_POST['to_database']){
				$insert_id=$model->getPrimaryKey();
				$client=new Client;
				$client->attributes=$_POST['CallerResult'];
				$client->id=$insert_id;
				$client->save();
				}
				if($model->status_res_id==7){
					$this->redirect(array('callerResult/create','id'=>$model->id));
				} elseif($model->status_res_id==0 || $model->status_res_id==5) {
					$this->redirect(array('callLater/callLaterForm','id'=>$model->id, 'st'=>$model->status_res_id));
				} else {
					$this->redirect(array('callerReport/create','id'=>$model->id, 'st'=>$model->status_res_id));
				}
				
			}
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

		if(isset($_POST['CallerResult']))
		{
			$model->attributes=$_POST['CallerResult'];
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
	{
		$dataProvider=new CActiveDataProvider('CallerResult');

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionMy() {
		$notmodel=new CallerResult;
		if(isset($_POST['CallerResult']['date'])) {
			$date = $_POST['CallerResult']['date'];
			$date = trim($date);
			for($i=6;$i<10;$i++){
					for($j=0;$j<10;$j++){
						$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.$i.' and SUBSTR(date, 1, 10)="'.$date.'" and `status_res_id` = '.$j.'')->queryRow();
					}
				}
				$this->render('my',array('model'=>$model, 'notmodel'=>$notmodel));
		} else {
				for($i=6;$i<10;$i++){
					for($j=0;$j<10;$j++){
						$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.$i.' and SUBSTR(date, 1, 10)="'.date('Y-m-d').'" and `status_res_id` = '.$j.'')->queryRow();
					}
				}
				$this->render('my',array('model'=>$model, 'notmodel'=>$notmodel));
		}
	}
	public function actionYesterdayFull() {
				for($i=6;$i<10;$i++){
					for($j=0;$j<10;$j++){
						$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.$i.' and `date` BETWEEN (NOW()-INTERVAL 48 HOUR) AND (NOW() - INTERVAL 24 HOUR) and `status_res_id` = '.$j.'')->queryRow();
					}
				}
				$this->render('YesterdayFull',array('model'=>$model));
	}

	public function actionWeekFull() {
				for($i=6;$i<10;$i++){
					for($j=0;$j<10;$j++){
						$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.$i.' and date >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) and `status_res_id` = '.$j.'')->queryRow();
					}
				}
				$this->render('WeekFull',array('model'=>$model));
	}

	public function actionMonthFull() {
				for($i=6;$i<10;$i++){
					for($j=0;$j<10;$j++){
						$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.$i.' and date >= DATE_SUB(CURRENT_DATE, INTERVAL 30 DAY) and `status_res_id` = '.$j.'')->queryRow();
					}
				}
				$this->render('MonthFull',array('model'=>$model));
	}

	public function actionQuarterFull() {
				for($i=6;$i<10;$i++){
					for($j=0;$j<10;$j++){
						$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.$i.' and date >= DATE_SUB(CURRENT_DATE, INTERVAL 90 DAY) and `status_res_id` = '.$j.'')->queryRow();
					}
				}
				$this->render('QuarterFull',array('model'=>$model));
	}
	
	public function actionCallerTodayReport() {
	/* $model[6][0] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= 6 and `date` = \'2013-10-23\' and `status_res_id` = 0')->queryRow(); */
					for($j=0;$j<10;$j++){
						$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.Yii::app()->user->id.' and SUBSTR(date, 1, 10)="'.date('Y-m-d').'" and `status_res_id` = '.$j.'')->queryRow();
					}
				$this->render('CallerTodayReport',array('model'=>$model));
	}
	public function actionCallerYesterdayReport() {
						for($j=0;$j<10;$j++){
							$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.Yii::app()->user->id.' and `date` BETWEEN (NOW()-INTERVAL 48 HOUR) AND (NOW() - INTERVAL 24 HOUR) and `status_res_id` = '.$j.'')->queryRow();
						}
					$this->render('CallerYesterdayReport',array('model'=>$model));
		}
		public function actionCallerWeekReport() {
						for($j=0;$j<10;$j++){
							$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.Yii::app()->user->id.' and date >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) and `status_res_id` = '.$j.'')->queryRow();
						}
					$this->render('CallerWeekReport',array('model'=>$model));
		}
			public function actionCallerMonthReport() {
						for($j=0;$j<10;$j++){
							$model[$i][$j] = Yii::app()->db->createCommand('SELECT count(`status_res_id`) FROM `o_caller_result` WHERE `caller_res_id`= '.Yii::app()->user->id.' and date >= DATE_SUB(CURRENT_DATE, INTERVAL 30 DAY) and `status_res_id` = '.$j.'')->queryRow();
						}
					$this->render('CallerMonthReport',array('model'=>$model));
		}
		
			public function actionChooseReport() {
					$this->render('ChooseReport');
		}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CallerResult('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerResult']))
			$model->attributes=$_GET['CallerResult'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CallerResult the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CallerResult::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CallerResult $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='caller-result-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
