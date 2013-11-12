<?php
/* @var $this CommOfferShortController */
/* @var $model CommOfferShort */

$this->breadcrumbs=array(
	'Comm Offer Shorts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CommOfferShort', 'url'=>array('index')),
	array('label'=>'Create CommOfferShort', 'url'=>array('create')),
	array('label'=>'View CommOfferShort', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CommOfferShort', 'url'=>array('admin')),
);
?>

<h1>Update CommOfferShort <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>