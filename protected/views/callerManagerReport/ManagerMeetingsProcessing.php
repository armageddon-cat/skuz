<h1>Встречи</h1>
<p>Тут видно число и время Встречи с клиентом. </p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'caller-report-grid',
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'id'=>array(
            'name'=>'id',
            'type' => 'raw',
            'value'=>'CHtml::link(\'№ \'.CHtml::encode($data->id), array(\'view\', \'id\'=>$data->id))',
        ),
        'next_call',
        'company',
        // 'call_status'=>array(
        //     'name'=>'call_status',
        //     'value'=>'$data->StatusOfCall->status',
        // ),
        'caller_id'=>array(
            'name'=>'caller_id',
            'value'=>function($data){
                          return $data->caller->realname ." ". $data->caller->surname;
                        },
        ),
        // 'meeting_result'=>array(
        //     'name'=>'meeting_result',
        //     'value'=>'$data->meeting->result',
        // ),
      
    ),
)); ?>