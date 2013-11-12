<?php
/* @var $this CommOfferContextController */
/* @var $model CommOfferContext */

$this->breadcrumbs=array(
	'Comm Offer Contexts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CommOfferContext', 'url'=>array('index')),
	array('label'=>'Create CommOfferContext', 'url'=>array('create')),
	array('label'=>'View CommOfferContext', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CommOfferContext', 'url'=>array('admin')),
);
?>

<h1>Update CommOfferContext <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>