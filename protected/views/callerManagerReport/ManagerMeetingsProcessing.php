<h1>Встречи</h1>
<p>Тут видно число и время Встречи с клиентом. </p>
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
            'value'=>'CHtml::link(\'№ \'.CHtml::encode($data->id), array(\'view\', \'id\'=>$data->id))',
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