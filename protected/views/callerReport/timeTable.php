<h1>Расписание по контактам</h1>
<?php /*<table class="my_table">
	<?php
	
foreach($timeTable as $worker){
	echo '<tr>';
	echo '<td>'.CHtml::link("Полная информация о контакте № ".$worker['id'], array('view', 'id'=>$worker['id'])).'</td><td>'.$worker['next_call'].'</td>';
	echo '</tr>';
}

	?>
</table> */?>
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