<?php

?>
Укажите пароль дважды для исключения ошибки:<br />
<?php if ($model->hasErrors('samepasserror')) {
	echo "<p class=\"red\">Пароли не совпадают. Попробуйте еще раз.</p>";
} ?>
<?php
echo CHtml::form();
echo CHtml::passwordField('password');
echo "<br>";
echo CHtml::passwordField('secondpassword');
echo CHtml::submitButton('Изменить');
echo CHtml::endForm();