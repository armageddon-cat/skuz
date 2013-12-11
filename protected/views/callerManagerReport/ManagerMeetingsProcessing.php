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
<div style="display:none;">
<?php/* $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'caller-report-grid',
    'dataProvider'=>$exportdataProvider,
    'filter'=>$model,
    'columns'=>array(
        'id',
        'time',
        'company',
        'site_address',
        'phone_number',
        'company_address',
        'email',
        'contact_person',
        'business_type',
        'service_type',
        //'additional_products',
        'next_call',
        'next_meeting_date',
        //'contact_type',
        'comment',
        // 'caller_id',
        // 'call_status',
        // 'manager_id',
        // 'meeting_result',
        'comm_proposal',
        'contract',
        //'importancy',
        'manager_comment',
        //'order_code',
        //'seo_audit_done',
        //'seo_file',
        //'changed',  
    ),
));*/
?>
</div>
<p>
<?php echo CHtml::link(CHtml::encode('Експорт отчета'), array('ReportExport'));
//$this->renderExportGridButton($gridWidget,'Експорт отчета',array('class'=>'btn btn-info pull-right'));
?>
</p>