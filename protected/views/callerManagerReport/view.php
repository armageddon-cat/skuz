<?php
/* @var $this CallerManagerReportController */
/* @var $model CallerManagerReport */
/*
 $this->breadcrumbs=array(
	'Caller Manager Reports'=>array('index'),
	$model->id,
);*/

$this->menu=array(
	/* array('label'=>'List CallerManagerReport', 'url'=>array('index')),
	array('label'=>'Create CallerManagerReport', 'url'=>array('create')), */
	array('label'=>'Изменение отчета', 'url'=>array('update', 'id'=>$model->id)),
	/* array('label'=>'Delete CallerManagerReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CallerManagerReport', 'url'=>array('admin')), */
); 
?>

<h1>Просмотр отчета №<?php echo $model->id; ?></h1>
<?php 
 	$DIR = YiiBase::getPathOfAlias('webroot').'/upload/temp/';

    if(CallerManagerReport::FileExists($model->id)!=0) { 
    	echo CHtml::link("Скачать Seo Аудит", array('download', 'id'=>$model->id));
    }
 ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	'id',
	'order_code',
		'time',
		'company',
		'phone_number',
		'company_address',
		'site_address',
		'email',
		'contact_person',
		'business_type',
		'service_type'=>array(
			'name'=>'service_type',
			'value'=>$model->product->product,
		),
		'additional_products'=>array(
			'name'=>'additional_products',
			'value'=>function($model){
						$services = explode(",", $model->additional_products);
						foreach ($services as $product) {
							$res .= Product::model()->findByPk($product)->product.", ";
						}
						return $res;
					}
		),
        'next_call' => array(
            'name' => 'next_call',
            'value' => function($data){
                    if ($data->next_call==0) {
                        return $data->next_call;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->next_call);}
            },     
        ),
        'next_meeting_date' => array(
            'name' => 'next_meeting_date',
            'value' => function($data){
                    if ($data->next_meeting_date==0) {
                        return $data->next_meeting_date;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->next_meeting_date);}
            },     
        ),
		'contact_type'=>array('name'=>'contact_type','value'=>$model->contact->contact_type),
		'comment',
		'caller_id'=>array(
			'name'=>'caller_id',
			'value'=>$model->caller->realname ." ". $model->caller->surname,
		),
		'call_status'=>array(
			'name'=>'call_status',
			'value'=>$model->StatusOfCall->status,
		),
		'manager_id'=>array(
			'name'=>'manager_id',
			'value'=>$model->manager->realname ." ". $model->manager->surname,),
		'comm_proposal'=>array(
			'name'=>'comm_proposal',
			'value'=>$model->CommProposal->res,),
		'meeting_result'=>array(
			'name'=>'meeting_result',
			'value'=>$model->meeting->result,),
		'contract'=>array(
			'name'=>'contract',
			'value'=>$model->Contract->contract_status,),
		'manager_comment',
	),
)); ?>
<script>
	window.onload = function() {
		$( "button" ).click(function() {
			$( "#show_hide_comment" ).toggle("slow");
		});
	};
</script>
<br><br><button>Показать/скрыть комментарии</button>
<div id="show_hide_comment">
<?php
Yii::import('application.controllers.OrdersHistoryController');

$controller = new OrdersHistoryController;

$controller->actionIndex($model->id);
$controller->actionCreate($model->id);
?>
</div>