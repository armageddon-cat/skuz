<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_user')); ?>:</b>
	<?php echo CHtml::encode($data->from->login); ?>
	<br />
	
	<?php $file= Post::findFile($data->id);  ?>
	<?php  
if($file){
	echo CHtml::link($file, '/post/download?user='.$data->from_user.'&file='.$file);  
}
	?>
</div>