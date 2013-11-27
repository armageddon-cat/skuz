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
    <!-- <link href="<?php //echo Yii::app()->request->baseUrl; ?>/css/online-offer-screen.css" rel="stylesheet"> -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/lightbox.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/js/scripts.js"></script>-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/js/lightbox-2.6.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/js/scripts_other.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/js/jquery.fancyform.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/js/checkbox.js"></script>
    <!--[if lt IE 9]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    
</head>
<body>
    <div id="stripe_right"></div>
    <div id="header"> 
        <div id="top">
        <div class="wrapper">
            <div id="select">
                <p>Сменить дизайн</p>
                    <a href="#" id="selector1" class="current">
                        <div id="vertical"></div>
                    </a>
                <a href="#" id="selector2">
                    <div id="paralax"></div>
                </a>
            </div>
                <div id="phone">
                    <p>+7 (495) 988 73 84</p>
                </div>
               <a href="#" id="back_call">
                    <p>Обратный звонок</p>
                </a>
                <a href="http://dr-intellectus.com/online.php" id="request_top">
                    <p>Online заявка</p>
                </a>
                <a href="#" id="cabinet"><p>Личный кабинет</p></a> 
        </div>
        </div>
        <div id="headerbox" class="wrapper">
        <div id="number_enter">
            <p>Введите Ваш номер и наши операторы свяжутся с Вами.</p>
            <form id="enter" method="post">
                <input type="text" name="phone_number" class="number" />
                <input type="submit" class="button" value="" />
            </form>
        </div>
        <div id="enter_cabinet">
            <p><b>Вход в личный кабинет</b></p>
            <p></p>
            <form id="enter_to_cab" method="post" action="http://test.dr-intellectus.ru/site/ClientLogin">
                <p>Логин</p>
                <input type="text" name="LoginForm[username]" class="number"/>
                <p>Пароль</p>
                <input type="password" name="LoginForm[password]" class="number"/>
                <input type="submit" class="button" name="yt0" value="Войти" />
            </form>
        </div>
            <a id="logo" href="http://dr-intellectus.com/"></a>    
            <ul id="nav">
                <li id="navbl1" class="curr"><a href="http://dr-intellectus.com/">Главная</a></li>
                <li id="navbl2"><a href="http://dr-intellectus.com/#block2" >О компании</a></li>
                <li><a>Услуги</a>
                    <ul id="uslugi">
                        <li id="navbl3"><a href="http://dr-intellectus.com/#block3" >Создание сайта</a></li>
                        <li id="navbl4"><a href="http://dr-intellectus.com/#block4" >Продвижение сайта</a></li>
                        <li id="navbl5"><a href="http://dr-intellectus.com/#block5" >Аудит сайта</a></li>
                        <li id="navbl6"><a href="http://dr-intellectus.com/#block6" >Дизайн сайта</a></li>
                        <li id="navbl7"><a href="http://dr-intellectus.com/#block7" >Копирайтинг</a></li>
                        <li id="navbl8"><a href="http://dr-intellectus.com/#block8" >Контекстная реклама</a></li>
                        <li id="navbl9"><a href="http://dr-intellectus.com/#block9" >Создание логотипов</a></li>
                        <li id="navbl10"><a href="http://dr-intellectus.com/#block10" >Поддержка сайтов</a></li>
                    </ul>
                </li>
                <li id="navbl11"><a href="http://dr-intellectus.com/#block11" >Портфолио</a></li>
                <li id="navbl12"><a href="http://dr-intellectus.com/#block12" >Новости</a></li>
                <li id="navbl13"><a href="http://dr-intellectus.com/#block13" >Контакты</a></li>
                <li><a href="http://dr-intellectus.com/vacancy.php">Вакансии</a></li>
            </ul>
            <form>
                <div class="search">
                    <input type="submit" value="">
                    <input type="search" name="q" placeholder="Поиск...">
                </div>
            </form>
        </div>
        <a href="#" onclick="return false" id="navbl1" class="up"></a>
    </div>
<div class="wrapper" >
<!-- <a href="http://dr-intellectus.com/" id="logo_online"><img src="<?php //echo Yii::app()->request->baseUrl; ?>/images/logo_online.png"></a>
 -->
	<?php echo $content; ?>

</div>
</body>
</html>