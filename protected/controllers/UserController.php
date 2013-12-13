<?php

class UserController extends Controller
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
				'actions'=>array('index','password', 'update', 'delete'),
				'roles'=>array('5'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('online'),
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','create','UserPasswordChange'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
		public function actionOnline()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values

		$criteria = new CDbCriteria();
		$criteria->condition = "full_name != 'Test' group by login";
        $criteria->select = '*';

		$dataProvider=new CActiveDataProvider('User',array('criteria'=>$criteria,
                        'pagination'=>array(
                                'pageSize'=>'50',
                        ),              
        ));

		$this->render('online',array(
			'model'=>$model, 'dataProvider'=>$dataProvider,
		));	
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

	public function actionPassword($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['password']))
		{
			$model->password=$_POST['password'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('password');
	}

	public function actionUserPasswordChange($id)
	{
		$model=$this->loadModel($id);
		if ($_POST['password']!=$_POST['secondpassword']) {
			$model->addError('samepasserror');
		} else {
			if(isset($_POST['password']))
			{
				$model->password=$_POST['password'];
				if($model->save()){
					$this->redirect(array('site/index'));
				}
			}
	 	}
		$this->render('UserPasswordChange',array('model'=>$model)); 
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

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
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
	 * Manages all models.
	 */
	public function actionIndex()
	{
		if(isset($_POST['noban'])){
			$model=User::model()->updateByPk($_POST['user_id'], array('ban'=>0));
		}elseif(isset($_POST['ban'])){
			$model=User::model()->updateByPk($_POST['user_id'], array('ban'=>1));
		}
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->role=7;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}