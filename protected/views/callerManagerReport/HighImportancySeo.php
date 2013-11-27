<h1>Отчеты - Высокая важность</h1>
<p>Сюда попадают отчеты для которых диспетчер выставляет - <b>Высокую важность</b></p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'caller-report-grid',
        'filter'=>$model,
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
            'filter' => $this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
                            'model'=>$model,
                            'attribute'=>'next_call',
                            'language' => 'ru',
                            'options'=>array(
                                'hourGrid' => 4,
                                'hourMin' => 0,
                                'hourMax' => 24,
                                'dateFormat' => 'yy-mm-dd',
                                'timeFormat' => 'hh:mm',
                                'changeMonth' => true,
                                'changeYear' => false,
                                ),
                            ),true), 
            'value' => function($data){
                    if ($data->next_call==0) {
                        return $data->next_call;
                    } else {
                    return Yii::app()->dateFormatter->format("dd-MM-yyyy, HH:mm:ss", $data->next_call);}
            },     
        ),
        'next_meeting_date' => array(
            'name' => 'next_meeting_date',
            'filter' => $this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
                            'model'=>$model,
                            'attribute'=>'next_meeting_date',
                            'language' => 'ru',
                            'options'=>array(
                                'hourGrid' => 4,
                                'hourMin' => 0,
                                'hourMax' => 24,
                                'dateFormat' => 'yy-mm-dd',
                                'timeFormat' => 'hh:mm',
                                'changeMonth' => true,
                                'changeYear' => false,
                                ),
                            ),true), 
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
            'filter'=>CHtml::listData(CallStatus::model()->findAll(),'id','status'),
            'value'=>'$data->StatusOfCall->status',
        ),
        'comm_proposal'=> array(
            'name'=>'comm_proposal',
            'filter'=>CHtml::listData(CommProposal::model()->findAll(),'id','res'),
            'type' => 'raw',
            'value'=>function($data){
                if ($data->CommProposal->res=='Отправлено') {
                    return '<span class="green">'.$data->CommProposal->res.'</span>';
                } else { return '<span class="red">'.$data->CommProposal->res.'</span>'; }
            }, 
        ), 
        'service_type'=>array(
            'name'=>'service_type',
            'filter'=>CHtml::listData(Product::model()->findAll(),'id','product'),
            'value'=>'$data->product->product',
        ),
        'seo_audit_done'=>array(
            'name'=>'seo_audit_done',
            'filter'=>CHtml::listData(SeoAuditDone::model()->findAll(),'id','result'),
            'type' => 'raw',
            'value'=>function($data){
                if ($data->SeoAudit->result=='Да') {
                    $DIR = YiiBase::getPathOfAlias('webroot').'/upload/temp/'; 
                    if(!file_exists($DIR.'SeoAudit'.$data->id.'.xlsx')) { $file = 0; } else {$file = 1;}
                    if($file==0) {
                        return '<span class="green">'.$data->SeoAudit->result.'</span>';}
                    else {
                        return '<span class="green">'.$data->SeoAudit->result.'</span><span>'.CHtml::link("Скачать", array('download', 'id'=>$data->id)).'</span>';}
                } else { return '<span class="red">'.$data->SeoAudit->result.'</span>'; }
            }, 
        ),
      
    ),
)); ?>