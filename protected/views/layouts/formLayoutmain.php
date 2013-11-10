<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Доктор Интелектус</title>
 	<meta name="description" content="">
    <meta name="keywords" content="">
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
    <meta name="viewport" content="width=1000, initial-scale=1">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/online-offer-styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    
</head>
<body>
<div class="wrapper" >
<a href="http://dr-intellectus.com/" id="logo_online"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_online.png"></a>

	<?php echo $content; ?>

</div>
</body>
</html>