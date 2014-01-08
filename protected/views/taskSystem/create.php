<?php
/* @var $this TaskSystemController */
/* @var $model TaskSystem */

/*
$this->menu=array(
	array('label'=>'List TaskSystem', 'url'=>array('index')),
	array('label'=>'Manage TaskSystem', 'url'=>array('admin')),
);*/
?>
			
<h1>Создать новое задание</h1>
	<div><?php 

	$userag = $_SERVER['HTTP_USER_AGENT'];
				if (strpos($userag, 'Android') || strpos($userag, 'iPhone') || strpos($userag, 'iPad')) {
					echo "hello mobile";
				}

				?></div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>