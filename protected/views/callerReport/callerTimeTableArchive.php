<h1>Архив по контактам с клиентами</h1>
<p>Сюда попадает ваше расписание за прошлые дни</p>
    <p><a href="/CallerReport/CallerTimeTable">Вернутся обратно</a></p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'caller-report-grid',
	'dataProvider'=>$dataProvider,
    'columns'=>array(
        'id'=>array(
			'name'=>'id',
			'type' => 'raw',
			'value'=>'CHtml::link(\'Подробно о №\'.CHtml::encode($data->id), array(\'view\', \'id\'=>$data->id))',
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
        'company',
        'call_status'=>array(
			'name'=>'call_status',
			'value'=>'$data->StatusOfCall->status',
		),
    ),
)); ?>