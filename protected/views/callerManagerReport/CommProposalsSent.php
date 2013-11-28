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
            'value'=>function($data){
                    $DIR = YiiBase::getPathOfAlias('webroot').'/upload/temp/'; 
                    if(CallerManagerReport::FileExists($data->id)==0) { 
                        return CHtml::link('№ '.CHtml::encode($data->id), array('view', 'id'=>$data->id));
                    } else {
                        return CHtml::link('№ '.CHtml::encode($data->id), array('view', 'id'=>$data->id))." ".CHtml::link("SEO", array('download', 'id'=>$data->id));
                    }
            }, 
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
      
    ),
)); ?>