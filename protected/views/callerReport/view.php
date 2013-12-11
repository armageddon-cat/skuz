<?php
/* @var $this CallerReportController */
/* @var $model CallerReport */

/* $this->breadcrumbs=array(
	'Caller Reports'=>array('index'),
	$model->id,
);
*/
if(Yii::app()->user->role==1) {
$this->menu=array(
	/*array('label'=>'List CallerReport', 'url'=>array('index')),
	array('label'=>'Create CallerReport', 'url'=>array('create')),*/
	array('label'=>'Исправление ошибок', 'url'=>array('update', 'id'=>$model->id)),
	/*array('label'=>'Delete CallerReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CallerReport', 'url'=>array('admin')),*/
); } elseif (Yii::app()->user->role==4) {
	$this->menu=array(
	array('label'=>'Исправление ошибок', 'url'=>array('update', 'id'=>$model->id)),
);
}
?>

<h1>Просмотр отчета<?php //echo $model->id; ?></h1>
<p><a href="/callerReport/TestExport/<?php echo $model->id ?>">Загрузка этой онлайн заявки в Excel</a></p>
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
	),
)); ?>
<script>
	window.onload = function() {
		$( "button" ).click(function() {
			$( "#show_hide_comment" ).toggle("slow");
		});
	};
</script>
<br><br><button>Показать/скрыть комменты</button>
<div id="show_hide_comment">
<?php
Yii::import('application.controllers.OrdersHistoryController');

$controller = new OrdersHistoryController;

$controller->actionIndex($model->id);
$controller->actionCreate($model->id);
?>
</div>

