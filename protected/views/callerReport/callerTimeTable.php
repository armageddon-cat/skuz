<h1>Расписание по контактам</h1>
<p>Тут видно число и время когда вы должны связатся с клиентом. 
	Сюда попадают все отчеты для которых вы назначили <b>Дату следующего контакта</b></p>
    <p><a href="/CallerReport/CallerTimeTableArchive">Архив расписания</a></p>
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