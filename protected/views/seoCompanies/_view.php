<?php
/* @var $this SeoCompaniesController */
/* @var $data SeoCompanies */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('h1')); ?>:</b>
	<?php echo CHtml::encode($data->h1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('h2')); ?>:</b>
	<?php echo CHtml::encode($data->h2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('h3')); ?>:</b>
	<?php echo CHtml::encode($data->h3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('h4')); ?>:</b>
	<?php echo CHtml::encode($data->h4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords')); ?>:</b>
	<?php echo CHtml::encode($data->keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('density')); ?>:</b>
	<?php echo CHtml::encode($data->density); ?>
	<br />

</div>