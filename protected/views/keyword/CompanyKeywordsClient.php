<?php
/* @var $this KeywordController */
/* @var $model Keyword */
?>


<h1>Просмотр ключевых слов и их позиций</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'keyword-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'company_id'=>array('name'=>'company_id','value'=>'$data->company->company_name',),
		'keyword',
		'id'=>array('name'=>'pos','value'=>'$data->keypos->keyword_position',),
		'fuckingShit'=>array('name'=>'engine','value'=>'$data->keypos->engine',),
		'OneMoreFuckingShit'=>array('name'=>'date','value'=>'$data->keypos->date',), /*sorry bro. I dont know how it works*/
	),
)); ?>
