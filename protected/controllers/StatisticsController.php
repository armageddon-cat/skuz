<?php

class StatisticsController extends Controller
{
public $layout='//layouts/column2';
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionCallersMonth()
	{
		$model=$this->loadStatistics('callers', 'month');
		$this->render('callersMonth', array('model'=>$model));
	}
	
	public function actionManagersMonth()
	{
		$model=$this->loadStatistics('sales', 'month');
		$this->render('managersMonth',  array('model'=>$model));
					
	}
	
	public function actionCallersDay()
	{
		$model=$this->loadStatistics('callers', 'day');
		$this->render('callersDay', array('model'=>$model));
	}
	
	public function actionManagersDay()
	{
		$model=$this->loadStatistics('sales', 'day');
		$this->render('managersDay', array('model'=>$model));
	}
	
	public function actionDetailStat()
	{
		$model=$this->loadDetailStat('callers', 'day');
		$this->render('DetailStat', array('model'=>$model));
	}
	
	public function loadDetailStat($position, $period)
	{
 		$worker_id=($position=='sales')? 'sales_id' : 'caller_id';
		$table=($position=='sales')? 'o_sales_report' : 'o_caller_report';
		//if($period=='day') 
				$model = Yii::app()->db->createCommand('SELECT caller_id, call_status, count(call_status) FROM o_caller_report WHERE SUBSTR(TIME, 1, 10) = "'.date('Y-m-d').'" group by call_status
')->queryAll();
		
		return $model;
	}
	/*SELECT o_user.realname, o_user.surname, call_status
FROM o_caller_report
FULL JOIN o_user ON `caller_id` = o_user.id
ORDER BY caller_id
	------------------
	SELECT o_user.realname, o_user.surname, o_caller_report.call_status, count( o_caller_report.call_status )
FROM o_caller_report
INNER JOIN o_user ON o_caller_report.caller_id = o_user.id
WHERE SUBSTR(TIME, 1, 10) = "'.date('Y-m-d').'"
GROUP BY call_status
	--------------
	SELECT count(call_status) FROM o_caller_report WHERE caller_id=6
	SELECT realname, surname, count(call_status) FROM '.$table.' join o_user ON o_user.id = '.$table.'.'.$worker_id.' where  SBSTR(TIME, 1, 10) = "'.date('Y-m-d').'" group by '.$worker_id.'
	*/
	public function loadStatistics($position, $period)
	{
		$worker_id=($position=='sales')? 'sales_id' : 'caller_id';
		$table=($position=='sales')? 'o_sales_report' : 'o_caller_report';
		if($period=='month')
		$model = Yii::app()->db->createCommand('SELECT realname, surname, count(*) FROM '.$table.' join o_user ON o_user.id = '.$table.'.'.$worker_id.' where  SUBSTR(TIME, 6, 2) = "'.date('m').'" group by '.$worker_id.'')->queryAll();
		elseif($period=='day')
			$model = Yii::app()->db->createCommand('SELECT realname, surname, count(*) FROM '.$table.' join o_user ON o_user.id = '.$table.'.'.$worker_id.' where SUBSTR(TIME, 1, 10)="'.date('Y-m-d').'" group by '.$worker_id)->queryAll();
		
		return $model;
	}

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
}