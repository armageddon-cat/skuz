<?php

class CommOfferShortController extends Controller
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
				'actions'=>array('create','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','update','admin','ViewSkyz','Download'),
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
	public function actionViewSkyz($id)
	{ $this->layout='//layouts/column1';
		$this->render('viewSkyz',array(
			'model'=>$this->loadModel($id),
		));
	}


	public function actionDownload($id)
    {	
    	$DIR = YiiBase::getPathOfAlias('webroot').'/upload/onlinerequest/'; 
        $filename = CommOfferShort::FileExists($id);
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
		$model=new CommOfferShort;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		// $type = isset($_GET['type']) ? $_GET['type'] : 'post';

		if(isset($_POST['CommOfferShort']))
		{
			$model->attributes=$_POST['CommOfferShort'];
			$model->file=CUploadedFile::getInstance($model,'file');
			$model->product_type = implode(",", $_POST["CommOfferShort"]['product_type']);


// $photos = CUploadedFile::getInstancesByName('file');
 
//             // proceed if the images have been set
//             if (isset($photos) && count($photos) > 0) {
 
//                 // go through each uploaded image
//                 foreach ($photos as $image => $pic) {
//                     echo $pic->name.'<br />';
//                     if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/upload/temp/'.$pic->name)) {
//                         // add it to the main model now
//                         $img_add = new Photo();
//                         $img_add->filename = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
//                         $img_add->topic_id = $model->id; // this links your picture model to the main model (like your user, or profile model)
 
//                         $img_add->save(); // DONE
//                     }
//                     else{
//                         echo 'Cannot upload!';
//                     }
//                 }
//             }






			if($model->save())
				 	mail('info@dr-intellectus.com', 'Заполненая онлайн-заявка Dr.Intellectus', 
         			"Пришла новая заявка\n Просмотр заявок по ссылке\n http://crm.abcweb.com.ua/commersialOffer/index", "Content-type: text/plain; charset=utf-8");
				$DIR = YiiBase::getPathOfAlias('webroot').'/upload/onlinerequest/';
				if (is_object($model->file))
					$model->file->saveAs($DIR.$model->file);
				//$this->redirect(array('view','id'=>$model->id));
		}		$this->redirect('http://dr-intellectus.com/');

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

		if(isset($_POST['CommOfferShort']))
		{
			$model->attributes=$_POST['CommOfferShort'];
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
		$criteria = new CDbCriteria();
        $criteria->order = 'date DESC';

		$dataProvider=new CActiveDataProvider('CommOfferShort', array('criteria'=>$criteria));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{$this->layout='//layouts/column1';
		$model=new CommOfferShort('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CommOfferShort']))
			$model->attributes=$_GET['CommOfferShort'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CommOfferShort the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CommOfferShort::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CommOfferShort $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comm-offer-short-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
