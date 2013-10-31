<?php if(Yii::app()->user->hasFlash('create')): ?>


<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('create'); ?>
</div>
<? else : ?>

<h1>Написать сообщение</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php endif; ?>