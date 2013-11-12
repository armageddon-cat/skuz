<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
?>
<h1>Юзеры онлайн</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'htmlOptions'=>array('style'=>'width: 900px'),
	'dataProvider'=>$dataProvider,
	/*'filter'=>$model,*/
	'columns'=>array(
		'id'=>array(
			'name'=>'id',
			'headerHtmlOptions'=>array('width'=>30)
		),
		'login',
		'realname',
		'surname',
		'role'=>array(
			'name'=>'role',
			'value'=>'$data->rolename->role_name',
			'filter'=>array(1=>'Диспетчер', 2=>'Менеджер', 3=>'Seo-менеджер', 4=>'Босс', 5=>'Администратор' , 6=>'Топ-Диспетчер' ),
	
		),
		'last_move'=> array(
                    'name'=>'last_move',
                    'type' => 'raw',
					'value'=>function($data){
						$onetime = date("Y-m-d H");
						$onetimeM = date("i");


						$secondtime = substr($data->last_move, 0, 13);
						$secondtimeM = substr($data->last_move, 14, 2);

						$res = $onetimeM - $secondtimeM;

						if ($onetime==$secondtime && $res < 10) {
							return '<span class="green">Онлайн</span>';
						} else { return '<span class="red">Оффлайн</span>'; }
				 	 
				},

                 
        ),
	),
)); ?>
