<?php

class CallerReportController extends Controller
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
				'actions'=>array('index','view', 'TimeTable','new', 'CallerTimeTable', 'callerTimeTableArchive', 'Meetings', 'CallerMeetings', 'RpMeetings', 'RpMeetingsProcessing', 'CallerCommProposals', 'TestExport'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','create','update', 'MyReport', 'View2', 'ManagerMeetings', 'CallerMeetingsArchive', 'RpMeetingsArchive', 'CallerMeetingsRating'),
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
	{	$this->layout='application.views.layouts.column2';			
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));


	}
	
	public function actionView2($id)
	{
		$this->render('view2',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CallerReport;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CallerReport']))
		{
			$model->attributes=$_POST['CallerReport'];
			$model->time=date('Y-m-d H:i:s');
			$model->caller_id=Yii::app()->user->id;
			$model->additional_products = implode(",", $_POST["CallerReport"]['additional_products']);
			$model->call_status=$_GET['st'];

			$res = NULL;
			for ($i=0; $i<6; $i++) {
			    $d=rand(1,30)%2; 
			    $res .= $d ? chr(rand(65,90)) : chr(rand(48,57)); 
			}
			$model->order_code = $res;

			if($model->save()){
				if($_POST['to_database']){
				$insert_id=$model->getPrimaryKey();
				$client=new Client;
				$client->attributes=$_POST['CallerReport'];
				$client->id=$insert_id;
				$client->save();
			}
				$this->redirect(array('view2','id'=>$model->id));
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

		if(isset($_POST['CallerReport']))
		{	
			$old_call_status = $model->call_status;
			$model->attributes=$_POST['CallerReport'];
			$new_call_status = $model->call_status;
			if ($old_call_status != $new_call_status && Yii::app()->user->role==1) {
				Yii::app()->db->createCommand("INSERT INTO `o_caller_result`(`caller_res_id`, `date`, `status_res_id`) VALUES (".Yii::app()->user->id.",'".date('Y-m-d')."',".$new_call_status.")")->execute();
			}
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
		$this->layout='//layouts/column1';
		

		//$dataProvider=new CActiveDataProvider('CallerReport');
		/*$criteria = new CDbCriteria();
        $criteria->condition = "call_status = 0";
		if ($model->exists($criteria)) {
		$this->render('index',array(
			'dataProvider'=>$model->search(),
			'model'=>$model,
		));
		}*/
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status != 0 and call_status != 5";
        $criteria->order = 'time DESC';
		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria));

				$model=new CallerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerReport']))
			$model->attributes=$_GET['CallerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('time',$model->time,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('phone_number',$model->phone_number,true);
			$dataProvider->criteria->compare('company_address',$model->company_address,true);
			$dataProvider->criteria->compare('email',$model->email,true);
			$dataProvider->criteria->compare('contact_person',$model->contact_person,true);
			$dataProvider->criteria->compare('business_type',$model->business_type,true);
			$dataProvider->criteria->compare('service_type',$model->service_type,true);
			$dataProvider->criteria->compare('contact_type',$model->contact_type,true);
			$dataProvider->criteria->compare('caller_id',$model->caller_id,true);
			$dataProvider->criteria->compare('site_address',$model->site_address,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('manager_id',$model->manager_id,true);
			$dataProvider->criteria->compare('meeting_result',$model->meeting_result,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);
			$dataProvider->criteria->compare('contract',$model->contract,true);
			

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
				
	}
	/*$criteria = new CDbCriteria();
        $criteria->condition = "call_status = 0";
		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria));*/
	public function actionMyreport()
	{	$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "caller_id = ".Yii::app()->user->id;
		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria));

		$model=new CallerReport('search');
            if(isset($_GET['CallerReport']))
                $model->attributes=$_GET['CallerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('time',$model->time,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('phone_number',$model->phone_number,true);
			$dataProvider->criteria->compare('company_address',$model->company_address,true);
			$dataProvider->criteria->compare('email',$model->email,true);
			$dataProvider->criteria->compare('contact_person',$model->contact_person,true);
			$dataProvider->criteria->compare('business_type',$model->business_type,true);
			$dataProvider->criteria->compare('service_type',$model->service_type,true);
			$dataProvider->criteria->compare('contact_type',$model->contact_type,true);

            $this->render('Myreport', array('dataProvider' => $dataProvider, 'model'=>$model));


		/*$this->render('Myreport',array(
			'dataProvider'=>$dataProvider,
		));*/
	}
	

		public function actionRpMeetings()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=2 and meeting_result is null";
       // $criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('RpMeetings',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionRpMeetingsProcessing()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=2 and meeting_result = 0";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('RpMeetingsProcessing',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

		public function actionRpMeetingsArchive()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=2 and meeting_result != 0";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('RpMeetingsArchive',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}
	
	
	public function actionNew()
	{
					$model=new CallerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerReport']))
			$model->attributes=$_GET['CallerReport'];

		$this->render('admin',array(
			'model'=>$model,
		));
	
			


}
	public function actionMeetings()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=2";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, manager_id, meeting_result, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('Meetings',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	


	public function actionCallerMeetings()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "DATE_SUB(CURDATE(),INTERVAL 0 DAY) <= next_call and call_status=2 and caller_id = ".Yii::app()->user->id."";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('CallerMeetings',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionCallerMeetingsRating($id)
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=2 and caller_id = ".$id." and `time` >= 20131101";
        $criteria->select = 'id, next_call, company, call_status, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('CallerMeetingsRating',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}


	public function actionCallerMeetingsArchive()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "DATE_SUB(CURDATE(),INTERVAL 0 DAY) >= next_call and call_status=2 and caller_id = ".Yii::app()->user->id."";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('CallerMeetingsArchive',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionCallerCommProposals()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=1 and caller_id = ".Yii::app()->user->id."";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, comm_proposal, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('CallerCommProposals',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}
	
	public function actionTimeTable()
	{
		/*$timeTable = Yii::app()->db->createCommand('SELECT id, next_call FROM `o_caller_report` WHERE DATE_SUB(CURDATE(),INTERVAL 0 DAY) <= next_call ORDER BY next_call ASC')->queryAll();
		$this->render('timeTable',array('timeTable'=>$timeTable));*/
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "DATE_SUB(CURDATE(),INTERVAL 0 DAY) <= next_call";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),'sort' => array(
    'defaultOrder' => 'next_call ASC',
  ),
		));
		$this->render('timeTable',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

		public function actionCallerTimeTable()
	{$this->layout='//layouts/column1';
		/*$callerTimeTable = Yii::app()->db->createCommand("SELECT id, next_call, company, call_status FROM `o_caller_report` WHERE DATE_SUB(CURDATE(),INTERVAL 0 DAY) <= next_call and caller_id = ".Yii::app()->user->id." ORDER BY next_call ASC")->queryAll();
		*/
		
		$criteria = new CDbCriteria();
        $criteria->condition = "DATE_SUB(CURDATE(),INTERVAL 0 DAY) <= next_call and caller_id = ".Yii::app()->user->id."";
       // $criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, next_meeting_date';
       // $criteria->select = array('id', 'next_call', 'company', 'call_status');
		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),'sort' => array(
    'defaultOrder' => 'next_call ASC',
  ),
		));
		$this->render('callerTimeTable',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}
			public function actionCallerTimeTableArchive()
	{ $this->layout='//layouts/column1';
		/*$callerTimeTable = Yii::app()->db->createCommand("SELECT id, next_call, company, call_status FROM `o_caller_report` WHERE DATE_SUB(CURDATE(),INTERVAL 0 DAY) <= next_call and caller_id = ".Yii::app()->user->id." ORDER BY next_call ASC")->queryAll();
		*/
		
		$criteria = new CDbCriteria();
        $criteria->condition = "DATE_SUB(CURDATE(),INTERVAL 0 DAY) >= next_call and caller_id = ".Yii::app()->user->id."";
        //$criteria->order = 'next_call DESC';
        $criteria->select = 'id, next_call, company, call_status, next_meeting_date';
       // $criteria->select = array('id', 'next_call', 'company', 'call_status');
		$dataProvider=new CActiveDataProvider('CallerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('callerTimeTableArchive',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}
	/**
	 * Manages all models.
	 */
		public function actionTestExport($id=NULL)
	{ 	
		if(isset($id))
	    	$model = CallerReport::model()->findAllByPk($id);
	    else
	    	$model = CallerReport::model()->findAll();
 
	    // Export it
	    $this->toExcel($model);
	}


	public function behaviors() {
    return array(
        'exportableGrid' => array(
            'class' => 'application.components.ExportableGridBehavior',
            'filename' => 'PostsWithUsers.csv',
            'csvDelimiter' => ';', //i.e. Excel friendly csv delimiter
            ),
       	 'eexcelview'=>array(
	                'class'=>'ext.eexcelview.EExcelBehavior',
	            ),

        );
	} 

	public function actionAdmin()
	{
		$model=new CallerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerReport']))
			$model->attributes=$_GET['CallerReport'];
		 if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]
            //set_time_limit(0); //Uncomment to export lage datasets
            //Add to the csv a single line of text
            //$this->exportCSV(array('POSTS WITH FILTER:'), null, false);
            //Add to the csv a single model data with 3 empty rows after the data
            //$this->exportCSV($model, array_keys($model->attributeLabels()), false, 3);
            //Add to the csv a lot of models from a CDataProvider
            $this->exportCSV($model->search(), array('id', 'time', 'company', 'site_address', 'phone_number', 'company_address', 'email', 'contact_person', 'business_type', 'service_type', 'next_call', 'contact_type', 'comment', 'caller_id', 'call_status', 'manager_id', 'meeting_result'));
        }
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CallerReport the loaded model
	 * @throws CHttpException
	 */

	 
	public function loadModel($id)
	{
		$model=CallerReport::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CallerReport $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='caller-report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}