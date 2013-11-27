<h1>Ваши встречи</h1>
<p>Тут видно число и время Встречи с клиентом. 
	Сюда попадают все отчеты для которых вы назначили статус <b>Назначена встреча</b></p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'caller-report-grid',
    'dataProvider'=>$dataProvider,
    'columns'=>array(
                array(
            'header' => '№',
            'value' => '$row+1',
            ),
        'id'=>array(
            'name'=>'id',
            'type' => 'raw',
            'value'=>'CHtml::link(\'Подробно о №\'.CHtml::encode($data->id), array(\'view\', \'id\'=>$data->id))',
        ),
        'next_call' => array(
            'name' => 'meeting_date',
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