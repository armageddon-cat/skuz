<?php
/* @var $this CommersialOfferController */
/* @var $model CommersialOffer */

$this->breadcrumbs=array(
	'Commersial Offers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CommersialOffer', 'url'=>array('index')),
	array('label'=>'Create CommersialOffer', 'url'=>array('create')),
	array('label'=>'View CommersialOffer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CommersialOffer', 'url'=>array('admin')),
);
?>

<h1>Update CommersialOffer <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>