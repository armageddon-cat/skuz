<?php

class TaskSystemController extends Controller
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
				'actions'=>array('admin','create','update','Download','ViewAll'),
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

	public function actionDownload($id, $filetype)
    {	
    	$DIR = YiiBase::getPathOfAlias('webroot').'/upload/taskfiles/';
    	if ($filetype==1) {
    	 	$filename = TaskSystem::TaskFileExists($id);
    	 } else {
    	 	$filename = TaskSystem::ExecutorFileExists($id);
    	 }
        
    	return Yii::app()->getRequest()->sendFile(
		    $filename, // название файла, который получит юзер
		    file_get_contents($DIR.$filename),
		   'mime/type', // необязательно, определяется автоматически
		    true // остановить аппликейшен во время отправки default: true
		);
		// если включено логирование, при отправке файла лучше его отключить
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TaskSystem;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TaskSystem']))
		{
			$model->attributes=$_POST['TaskSystem'];

			$model->task_file=CUploadedFile::getInstance($model,'task_file');

			//$model->executor = implode(",", $_POST["TaskSystem"]['executor']);
			if ($_POST['TaskSystem']['neverStopTask']==1) {
				$model->deadline = '2099-01-01 00:00:00';
			}
			$model->create_time=date('Y-m-d H:i:s');
			$model->modify_time=date('Y-m-d H:i:s');
			$model->created_by=Yii::app()->user->id;
			$model->first_deadline=$model->deadline;
			$model->first_executor=$_POST['TaskSystem']['executor'];

			if($model->save())
				$DIR = YiiBase::getPathOfAlias('webroot').'/upload/taskfiles/';
				if (is_object($model->task_file))
					$model->task_file->saveAs($DIR.$model->task_file);
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
		$OldTask = $model->task;
		$OldExecutor = $model->executor;
		$OldDeadline = $model->deadline;
		$OldExecutorComment = $model->executor_comment;
		$OldStatus = $model->status;

		if(isset($_POST['TaskSystem']))
		{
			$model->attributes=$_POST['TaskSystem'];
			$model->modify_time=date('Y-m-d H:i:s');
			$model->modified_by=Yii::app()->user->id;

			if($OldTask!=$model->task) {
				$model->task_change_time=date('Y-m-d H:i:s');
				$model->task_change_by=Yii::app()->user->id; }

			if($OldExecutor!=$model->executor) {
				$model->executor_change_time=date('Y-m-d H:i:s');
				$model->executor_change_by=Yii::app()->user->id; }

			if($OldDeadline!=$model->deadline) {
				$model->deadline_change_time=date('Y-m-d H:i:s');
				$model->deadline_change_by=Yii::app()->user->id; }

			if($OldExecutorComment!=$model->executor_comment) {
				$model->executor_comment_change_time=date('Y-m-d H:i:s');
				$model->executor_comment_change_by=Yii::app()->user->id; }

			if($OldStatus!=$model->status) {
				$model->status_change_time=date('Y-m-d H:i:s');
				$model->status_change_by=Yii::app()->user->id; }
			

			if (is_object(CUploadedFile::getInstance($model,'task_file'))) {
					$model->task_file=CUploadedFile::getInstance($model,'task_file');
				} elseif (is_object(CUploadedFile::getInstance($model,'executor_file'))) {
					$model->executor_file=CUploadedFile::getInstance($model,'executor_file');
				}

			if($model->save())
				$DIR = YiiBase::getPathOfAlias('webroot').'/upload/taskfiles/';
				if (is_object($model->task_file)){
					$model->task_file->saveAs($DIR.$model->task_file);
				} elseif (is_object($model->executor_file)) {
					$model->executor_file->saveAs($DIR.$model->executor_file);
				}

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
		
		//$defineExecutor=$this->loadModel($id);
		$curUserRole = Yii::app()->user->role;

		$criteria = new CDbCriteria();
		/*if(is_numeric($defineExecutor->executor)) {
			$criteria->condition = "created_by = ".Yii::app()->user->id." or executor = ".Yii::app()->user->id."";
		} else {*/
			switch ($curUserRole) {
				case '3':
					$role = 'seo';
					break;
				case '8':
					$role = 'html';
					break;
				case '9':
					$role = 'diz';
					break;
				case '10':
					$role = 'dev';
					break;
			}

		$criteria->condition = "created_by = ".Yii::app()->user->id." or executor = ".Yii::app()->user->id." or executor = '".$role."'";
        $criteria->select = '*';

        $dataProvider=new CActiveDataProvider('TaskSystem',array('criteria'=>$criteria,));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TaskSystem('search');
		$model->unsetAttributes();  // clear any default values
		$criteria = new CDbCriteria();
		$criteria->condition = "created_by = ".Yii::app()->user->id." or executor = ".Yii::app()->user->id."";
        $criteria->select = '*';

        $dataProvider=new CActiveDataProvider('TaskSystem',array('criteria'=>$criteria,));
		if(isset($_GET['TaskSystem']))
			$model->attributes=$_GET['TaskSystem'];

		$this->render('admin',array(
			'model'=>$model,'dataProvider'=>$dataProvider,
		));
	}

		public function actionViewAll()
	{
		$model=new TaskSystem('search');
		$model->unsetAttributes();  // clear any default values

		$criteria = new CDbCriteria();
        $criteria->select = '*';

        $dataProvider=new CActiveDataProvider('TaskSystem',array('criteria'=>$criteria,));
		if(isset($_GET['TaskSystem']))
			$model->attributes=$_GET['TaskSystem'];

		$this->render('admin',array(
			'model'=>$model,'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TaskSystem the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TaskSystem::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TaskSystem $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='task-system-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
