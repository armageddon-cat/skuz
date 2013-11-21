<h1>Отчеты - Высокая важность</h1>
<p>Сюда попадают отчеты для которых диспетчер выставляет - <b>Высокую важность</b></p>
           <?php   // $DIR = YiiBase::getPathOfAlias('webroot').'/upload/temp/'; 
            // echo CHtml::link(CHtml::encode($this->id), array($DIR.'newfile.xlsx')); 
            // echo CHtml::link("Загрузить", Yii::app()->createAbsoluteUrl('/upload/temp/'.'newfile.xlsx'));
            //echo CHtml::link("Загрузить", Yii::app()->request->baseUrl.'/uploads/temp/'.'newfile.xlsx');
            /* Yii::app()->request->sendFile(
                                            'fileName.txt',
                                            file_get_contents(Yii::getPathOfAlias('webroot.uploads.temp').DIRECTORY_SEPARATOR.'newfile.xlsx'),
                                            'mime/type', // необязательно, определяется автоматически
                                            true // остановить аппликейшен во время отправки default: true
            );*/
            //echo CHtml::link("Загрузить",Yii::getPathOfAlias('webroot.uploads.temp').DIRECTORY_SEPARATOR.'newfile.xlsx');
           // echo CHtml::link("Загрузить" ,array('download', 'id'=>$data->id));
           ?>
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
        'service_type'=>array(
            'name'=>'service_type',
            'value'=>'$data->product->product',
        ),
        'seo_audit_done'=>array(
            'name'=>'seo_audit_done',
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