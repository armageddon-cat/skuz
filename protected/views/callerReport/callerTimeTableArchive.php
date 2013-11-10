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
        'next_call',
        'company',
        'call_status'=>array(
			'name'=>'call_status',
			'value'=>'$data->StatusOfCall->status',
		),
    ),
)); ?>