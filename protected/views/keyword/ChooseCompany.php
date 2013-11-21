<?php
/* @var $this KeywordController */
/* @var $model Keyword */
/*
$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Keyword', 'url'=>array('index')),
	array('label'=>'Manage Keyword', 'url'=>array('admin')),
);*/
?>

<h1>Просмотр ключевых слов</h1>

<?php $this->renderPartial('_CompanyWordsChoose', array('model'=>$model)); ?>