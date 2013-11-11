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
        'next_call',
        'company',
        'call_status'=>array(
            'name'=>'call_status',
            'value'=>'$data->StatusOfCall->status',
        ),
    ),
)); ?>