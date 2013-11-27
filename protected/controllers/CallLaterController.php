<?php

class CallLaterController extends Controller
{
	/*public function actionCallLaterForm()
	{
		$this->render('callLaterForm');
	}*/

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function actionCallLaterForm()
{
    $model=new CallLater;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='call-later-callLaterForm-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['CallLater']))
    {
        $model->attributes=$_POST['CallLater'];
		$model->caller_id=Yii::app()->user->id;
		$model->call_status=$_GET['st'];
		
        if($model->validate())
        {
            // form inputs are valid, do something here
					//$model->call_status=CallerResult::model()->status_res_id;
			$model->save();
			$this->redirect(array('callerResult/create','id'=>$model->id));
            return;
        }
    }
    $this->render('callLaterForm',array('model'=>$model));
}

public function actionAdmin()
    {
        $model=new CallLater('search');
        $model->unsetAttributes();  // clear any default values
		
		        if(isset($_GET['CallLater']))
            $model->attributes=$_GET['CallLater'];
		
		$criteria = new CDbCriteria();
        $criteria->condition = "caller_id = ".Yii::app()->user->id." and call_status in (0,5)";
		$dataProvider=new CActiveDataProvider('CallLater', array('criteria'=>$criteria, 'pagination' => array(
                            'pageSize' => 50,
                        ),'sort' => array(
    'defaultOrder' => 'time DESC',
  ),
));
		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
		


        /*$this->render('admin',array(
            'model'=>$model,
        ));*/
    }
	
}