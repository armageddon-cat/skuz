<h1>Только коммерческие предложения и их статусы</h1>
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
        'comm_proposal'=>array(
            'name'=>'comm_proposal',
            'value'=>'$data->CommProposal->res',
        ),
        'comm_proposal'=> array(
            'name'=>'comm_proposal',
            'type' => 'raw',
            'value'=>function($data){
                if ($data->CommProposal->res=='Отправлено') {
                    return '<span class="green">'.$data->CommProposal->res.'</span>';
                } else { return '<span class="red">'.$data->CommProposal->res.'</span>'; }
            }, 
        ),  
    ),
)); ?>