<?php

class CallerManagerReportController extends Controller
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
				'actions'=>array('index','view', 'ManagerMeetings', 'LowImportancy', 'MediumImportancy', 'HighImportancy', 'CommProposals', 'ManagerMeetingsProcessing', 'RpCommProposals'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'all_reports', 'CommProposalsNotSent', 'CommProposalsSent', 'ManagerMeetingsArchive', 'HighImportancySeo', 'LowImportancyRp', 'MediumImportancyRp','HighImportancyRp', 'RpCommProposalsSent','RpCommProposalsNotSent','Download','RpMeetings','RpMeetingsProcessing','RpMeetingsArchive'),
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


	public function actionDownload($id)
    {	$DIR = YiiBase::getPathOfAlias('webroot').'/upload/temp/'; 
          
    	//if(file_exists($path))
  		//{
	    	return Yii::app()->getRequest()->sendFile(
	        'SeoAudit'.$id.'.xlsx', // название файла, который получит юзер
	        file_get_contents($DIR.'SeoAudit'.$id.'.xlsx'),
	       'mime/type', // необязательно, определяется автоматически
	        true // остановить аппликейшен во время отправки default: true
			);
			// если включено логирование, при отправке файла лучше его отключить
    	//} else {
    		//Yii::app()->user->setFlash('Спасибо...');
    		//$this->refresh();
    		//$this->redirect(array('HighImportancySeo'));
    		//$this->render('HighImportancySeo',array('dataProvider'=>$dataProvider, 'model'=>$model,'id'=>$model->id));
    		//Yii::app()->user->setFlash('error', "Логин не существует!");
			//echo Yii::app()->user->getFlash('error');
			// $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
   //                  'id' => 'mydialog',
   //                  'options' => array(
   //                      'title' => 'Ошибка',
   //                      'autoOpen' => false,
   //                      'modal' => true,
   //                      'resizable'=> false
   //                  ),
   //              ));
			// $this->endWidget('zii.widgets.jui.CJuiDialog');
    	//}
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
		$model=new CallerManagerReport;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
			
			
		if(isset($_POST['CallerManagerReport']))
		{	
			$model->attributes=$_POST['CallerManagerReport'];

			if($model->save())

				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionManagerMeetings()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=2 and manager_id = ".Yii::app()->user->id." and meeting_result is null";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('ManagerMeetings',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionManagerMeetingsProcessing()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=2 and manager_id = ".Yii::app()->user->id." and meeting_result = 0";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('ManagerMeetingsProcessing',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionManagerMeetingsArchive()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=2 and manager_id = ".Yii::app()->user->id." and meeting_result != 0";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('ManagerMeetings',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionCommProposals()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=1 and manager_id = ".Yii::app()->user->id."";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, comm_proposal, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('CommProposals',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}


		public function actionCommProposalsSent()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=1 and manager_id = ".Yii::app()->user->id." and comm_proposal=1";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, comm_proposal, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('CommProposalsSent',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

		public function actionCommProposalsNotSent()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=1 and manager_id = ".Yii::app()->user->id." and comm_proposal=0";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, comm_proposal, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('CommProposalsNotSent',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}


	public function actionRpCommProposals()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=1";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, comm_proposal, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
				$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
				if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);

		$this->render('RpCommProposals',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionRpCommProposalsSent()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=1 and comm_proposal=1";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, comm_proposal, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
				$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
						if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);
		$this->render('RpCommProposalsSent',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionRpCommProposalsNotSent()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=1 and comm_proposal=0";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, comm_proposal, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
				$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
						if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);
		$this->render('RpCommProposalsNotSent',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionLowImportancy()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "importancy=1 and manager_id = ".Yii::app()->user->id." and call_status != 0 and call_status != 5 and call_status != 6";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, importancy, comm_proposal, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);
		$this->render('LowImportancy',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionMediumImportancy()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "importancy=2 and manager_id = ".Yii::app()->user->id." and call_status != 0 and call_status != 5 and call_status != 6";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, importancy, comm_proposal, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);
		$this->render('MediumImportancy',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionHighImportancy()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "importancy=3 and manager_id = ".Yii::app()->user->id." and call_status != 0 and call_status != 5 and call_status != 6";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, next_meeting_date, company, call_status, caller_id, meeting_result, importancy, comm_proposal, seo_audit_done';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);
		$this->render('HighImportancy',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionLowImportancyRp()
	{
		$this->layout='//layouts/column1';
		

		$criteria = new CDbCriteria();
        $criteria->condition = "importancy=1 and call_status != 0 and call_status != 5 and call_status != 6";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, next_meeting_date, company, call_status, caller_id, meeting_result, importancy, comm_proposal';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);

		$this->render('LowImportancyRp',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionMediumImportancyRp()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "importancy=2 and call_status != 0 and call_status != 5 and call_status != 6";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, next_meeting_date, company, call_status, caller_id, meeting_result, importancy, comm_proposal';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);
		$this->render('MediumImportancyRp',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}

	public function actionHighImportancyRp()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "importancy=3 and call_status != 0 and call_status != 5 and call_status != 6";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, next_meeting_date, company, call_status, caller_id, meeting_result, importancy, comm_proposal';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);
		$this->render('HighImportancyRp',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}




		public function actionHighImportancySeo()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status != 0 and call_status != 5 and call_status != 6  and service_type != 1 and service_type != 5  and service_type != 6 and service_type != 4";
        //$criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, next_meeting_date, company, call_status, comm_proposal, service_type, seo_audit_done';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
			$dataProvider->criteria->compare('id',$model->id,true);
			$dataProvider->criteria->compare('next_call',$model->next_call,true);
			$dataProvider->criteria->compare('next_meeting_date',$model->next_meeting_date,true);
			$dataProvider->criteria->compare('company',$model->company,true);
			$dataProvider->criteria->compare('call_status',$model->call_status,true);
			$dataProvider->criteria->compare('comm_proposal',$model->comm_proposal,true);
			$dataProvider->criteria->compare('service_type',$model->service_type,true);
			$dataProvider->criteria->compare('seo_audit_done',$model->seo_audit_done,true);

		$this->render('HighImportancySeo',array('dataProvider'=>$dataProvider, 'model'=>$model,'id'=>$model->id));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{	$this->layout='//layouts/column1';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CallerManagerReport']))
		{
			$model->attributes=$_POST['CallerManagerReport'];
			$model->seo_file=CUploadedFile::getInstance($model,'seo_file');
			if($model->save())
				$DIR = YiiBase::getPathOfAlias('webroot').'/upload/temp/';
				if (Yii::app()->user->role==3) {
					$model->seo_file->saveAs($DIR.'SeoAudit'.$model->id.'.xlsx');
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
	{	$this->layout='//layouts/column1';
		
		//$allReports = Yii::app()->db->createCommand('SELECT * FROM `o_caller_report` WHERE manager_id=10')->queryAll();
		$criteria = new CDbCriteria();
        $criteria->condition = "manager_id = ".Yii::app()->user->id." and call_status != 0 and call_status != 5";
		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria));
			$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];
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

			public function actionRpMeetings()
	{
		$this->layout='//layouts/column1';
		
		$criteria = new CDbCriteria();
        $criteria->condition = "call_status=2 and meeting_result is null";
       // $criteria->order = 'next_call ASC';
        $criteria->select = 'id, next_call, company, call_status, caller_id, meeting_result, next_meeting_date';

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
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

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
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

		$dataProvider=new CActiveDataProvider('CallerManagerReport', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),
		));
		$this->render('RpMeetingsArchive',array('dataProvider'=>$dataProvider, 'model'=>$model));
	}
	
/* 	public function actionAll_reports($id)
	{	$this->layout='//layouts/column1';
		
		
		$allReports = Yii::app()->db->createCommand('SELECT * FROM `o_caller_report` WHERE manager_id=10')->queryAll();
		$this->render('all_reports',array('allReports'=>$allReports));
		

	} */

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CallerManagerReport('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CallerManagerReport']))
			$model->attributes=$_GET['CallerManagerReport'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CallerManagerReport the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CallerManagerReport::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CallerManagerReport $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='caller-manager-report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
