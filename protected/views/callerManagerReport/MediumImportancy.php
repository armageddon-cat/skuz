<h1>Отчеты - СверхВысокая важность</h1>
<p>Сюда попадают отчеты для которых диспетчер выставляет - <b>СверхВысокую важность</b></p>
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
        'call_status'=>array(
            'name'=>'call_status',
            'value'=>'$data->StatusOfCall->status',
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