<?php
$this->menu=array(
	array('label'=>'Журнал сообщений', 'url'=>array('index')),
);
?>
<h1>Мои сообщения</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->my(),
    'itemView'=>'_view',
)); ?>