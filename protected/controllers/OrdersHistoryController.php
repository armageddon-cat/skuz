<?php

class OrdersHistoryController extends Controller
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
				'actions'=>array('index','view'),
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
	public function actionCreate($rep_id)
	{	
		$model=new OrdersHistory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$this->renderPartial('application.views.ordersHistory.create',array(
			'model'=>$model,
		));

		if(isset($_POST['OrdersHistory']))
		{
			$model->attributes=$_POST['OrdersHistory'];
			$model->modify_time=date('Y-m-d H:i:s');
			$model->created_by=Yii::app()->user->id;
			$model->modified_by=Yii::app()->user->id;
			$model->report_id=$rep_id;
			Yii::app()->db->createCommand("UPDATE `ahc03_adminpanel`.`o_caller_report` SET `next_call` = '".$model->next_contact_date."' WHERE `o_caller_report`.`id` = ".$rep_id."")->execute();

			if($model->save())
			 	//$this->redirect(array('view','id'=>$model->id));
				$url = Yii::app()->request->getUrl();
			 	$this->redirect($url);

			//$model->save();
		}

		
		// $this->render('application.views.CallerReport.view',array(
		// 	'model'=>$model,
		// )); 
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

		if(isset($_POST['OrdersHistory']))
		{
			$model->attributes=$_POST['OrdersHistory'];
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
	public function actionIndex($order_num)
	{	
		$criteria = new CDbCriteria;
		$criteria->condition = "report_id=".$order_num."";
		$dataProvider=new CActiveDataProvider('OrdersHistory', array('pagination'=>array('pageSize'=>50), 'criteria'=>$criteria));
		$this->renderPartial('application.views.ordersHistory.index',array(
			'dataProvider'=>$dataProvider,

		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OrdersHistory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrdersHistory']))
			$model->attributes=$_GET['OrdersHistory'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return OrdersHistory the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=OrdersHistory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param OrdersHistory $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='orders-history-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
