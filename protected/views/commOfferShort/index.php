<?php
/* @var $this CommOfferShortController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comm Offer Shorts',
);

$this->menu=array(
	array('label'=>'Create CommOfferShort', 'url'=>array('create')),
	array('label'=>'Manage CommOfferShort', 'url'=>array('admin')),
);
?>

<h1>Comm Offer Shorts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
