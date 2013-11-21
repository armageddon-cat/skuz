<h1>Только коммерческие предложения и их статусы</h1>
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
        'comm_proposal'=>array(
            'name'=>'comm_proposal',
            'value'=>'$data->CommProposal->res',
        ),
      
    ),
)); ?>