<?php
/* @var $this CommersialOfferController */
/* @var $model CommersialOffer */
/* @var $form CActiveForm */
?>

<div id="wrapper_online" class="form">
<form id="commersial-offer-form" action="/commersialOffer/create" method="post">

	<div class="row buttons">
		<a href="http://dr-intellectus.com/"><p>Главная</p></a>
		<p class="required">   //   Заполнение коммерческого предложения</p>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Отправить данные' : 'Save'); ?>
	</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'commersial-offer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>
<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'fill_date'); ?>
		<?php echo $form->textField($model,'fill_date'); ?>
		<?php echo $form->error($model,'fill_date'); ?>
	</div>
*/ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'project_name'); ?><br>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'project_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_person'); ?><br>
		<?php echo $form->textField($model,'contact_person',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?><br>
		<?php echo $form->textField($model,'phone_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?><br>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_url'); ?><br>
		<?php echo $form->textField($model,'site_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?><br>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_products'); ?><br>
		<?php echo $form->textArea($model,'company_products',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'company_products'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fillial_web'); ?><br>
		<?php echo $form->textArea($model,'fillial_web',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'fillial_web'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sales_form'); ?><br>
		<?php echo $form->checkBoxList($model,'sales_form',array('Большой опт'=>'Большой опт',
		'Маленький опт'=>'Маленький опт',
		'Розница'=>'Розница')); ?>
		<?php echo $form->error($model,'sales_form'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'market_position'); ?><br>
		<?php echo $form->checkBoxList($model,'market_position',array('Лидер'=>'Лидер',
		'Занимает 2-ю позицию'=>'Занимает 2-ю позицию',
		'Средняя фирма среди конкурентов'=>'Средняя фирма среди конкурентов',
		'Новичок (аутсайдер)'=>'Новичок (аутсайдер)',
		'Специалист в узкой направленности'=>'Специалист в узкой направленности')); ?>
		<?php echo $form->error($model,'market_position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marketing_strategy'); ?><br>
		<?php echo $form->checkBoxList($model,'marketing_strategy',array('Открытие новых торговых подразделений'=>'Открытие новых торговых подразделений',
		'Поиск дилеров в других регионах'=>'Поиск дилеров в других регионах',
		'Средняя фирма среди конкурентов'=>'Средняя фирма среди конкурентов',
		'Усовершенствование существующих товаров, услуг'=>'Усовершенствование существующих товаров, услуг',
		'Запуск нового товара'=>'Запуск нового товара',
		'Начало деятельности в новой отрасли'=>'Начало деятельности в новой отрасли',
		'Другое'=>'Другое')); ?>
		<?php echo $form->error($model,'marketing_strategy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_name'); ?><br>
		<?php echo $form->textField($model,'brand_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'brand_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand_advantages'); ?><br>
		<?php echo $form->textField($model,'brand_advantages',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'brand_advantages'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_level'); ?><br>
		<?php echo $form->checkBoxList($model,'price_level',array('Очень высокие'=>'Очень высокие',
		'Высокие'=>'Высокие',
		'Умеренные'=>'Умеренные',
		'Низкие'=>'Низкие'
		)); ?>
		<?php echo $form->error($model,'price_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_tasks_adv'); ?><br>
		<?php echo $form->checkBoxList($model,'site_tasks_adv',array('привлечение новых  партнеров'=>'привлечение новых  партнеров',
		'использование сайта в качестве вспомогательного инструмента при проведении PR-акции'=>'использование сайта в качестве вспомогательного инструмента при проведении PR-акции',
		'использование сайта в качестве рекламной площадки'=>'использование сайта в качестве рекламной площадки',
		'использование сайта в качестве вспомогательного инструмента при проведении рекламных кампаний в Интернет'=>'использование сайта в качестве вспомогательного инструмента при проведении рекламных кампаний в Интернет',
		'использование сайта в качестве вспомогательного инструмента при проведении рекламных кампаний в медийных средах отличных от Интернет'=>'использование сайта в качестве вспомогательного инструмента при проведении рекламных кампаний в медийных средах отличных от Интернет'
		)); ?>
		<?php echo $form->error($model,'site_tasks_adv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_tasks_mark'); ?><br>
		<?php echo $form->checkBoxList($model,'site_tasks_mark',array('изучение интересов посетителей сайта'=>'изучение интересов посетителей сайта',
		'изучение спроса на продукцию'=>'изучение спроса на продукцию',
		'проведение опросов и голосований'=>'проведение опросов и голосований',
		'сбор и анализ статистики посещения сайта'=>'сбор и анализ статистики посещения сайта',
		'организация сбыта продукции (Интернет-магазин)'=>'организация сбыта продукции (Интернет-магазин)',
		'организация логистики бизнес процессов'=>'организация логистики бизнес процессов')); ?>
		<?php echo $form->error($model,'site_tasks_mark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_tasks_info'); ?><br>
		<?php echo $form->checkBoxList($model,'site_tasks_info',array('статичное информирование (о компании, координаты и т.п.)'=>'статичное информирование (о компании, координаты и т.п.)',
		'информировать о продукции или услугах'=>'информировать о продукции или услугах',
		'мотивационное информирование (спец. Предложение)'=>'мотивационное информирование (спец. Предложение)',
		'интерактивное информирование (вопросы-ответы, форум, расчет стоимости и т.п.)'=>'интерактивное информирование (вопросы-ответы, форум, расчет стоимости и т.п.)',
		'оперативное информирование (новости или другие разделы требующие постоянного обновления)'=>'оперативное информирование (новости или другие разделы требующие постоянного обновления)',
		'справочное информирование (документы, справочники, базы данных)'=>'справочное информирование (документы, справочники, базы данных)',
		'развлекательное информирование (полезные советы, рецепты, и т.п.)'=>'развлекательное информирование (полезные советы, рецепты, и т.п.)'
		)); ?>
		<?php echo $form->error($model,'site_tasks_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_type'); ?><br>
		<?php echo $form->checkBoxList($model,'site_type',array('персональный сайт'=>'персональный сайт',
		'сайт компании'=>'сайт компании',
		'портал'=>'портал',
		'интернет-магазин'=>'интернет-магазин',
		'другое'=>'другое'
		)); ?>
		<?php echo $form->error($model,'site_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'functional_modules'); ?><br>
		<?php echo $form->textArea($model,'functional_modules',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'functional_modules'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'additional_languages'); ?><br>
		<?php echo $form->checkBoxList($model,'additional_languages',array('Английская версия'=>'Английская версия',
		'Немецкая версия'=>'Немецкая версия',
		'Другая версия'=>'Другая версия'
		)); ?>
		<?php echo $form->error($model,'additional_languages'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_stilistics'); ?><br>
		<?php echo $form->checkBoxList($model,'site_stilistics',array('Консервативный'=>'Консервативный',
		'Строгий'=>'Строгий',
		'Современный'=>'Современный',
		'Абстрактный'=>'Абстрактный',
		'Статичный'=>'Статичный',
		'Динамичный'=>'Динамичный')); ?>
		<?php echo $form->error($model,'site_stilistics'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firm_style_attributes'); ?><br>
		<?php echo $form->checkBoxList($model,'firm_style_attributes',array('руководство по фирменному стилю'=>'руководство по фирменному стилю',
		'логотип'=>'логотип',
		'фирменные цвета'=>'фирменные цвета',
		'дополнительные объекты, знаки'=>'дополнительные объекты, знаки',
		'шрифты'=>'шрифты',
		'примеры удачной полиграфии'=>'примеры удачной полиграфии',
		'другое'=>'другое'
		)); ?>
		<?php echo $form->error($model,'firm_style_attributes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slogan'); ?><br>
		<?php echo $form->textArea($model,'slogan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'slogan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'see_plus'); ?><br>
		<?php echo $form->textArea($model,'see_plus',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'see_plus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'see_minus'); ?><br>
		<?php echo $form->textArea($model,'see_minus',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'see_minus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sites_you_like'); ?><br>
		<?php echo $form->textArea($model,'sites_you_like',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'sites_you_like'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_colors'); ?><br>
		<?php echo $form->checkBoxList($model,'site_colors',array('красная гамма'=>'красная гамма',
		'оранжевая и коричневая гамма'=>'оранжевая и коричневая гамма',
		'желтая гамма'=>'желтая гамма',
		'зелёная гамма'=>'зелёная гамма',
		'голубая и синяя гамма'=>'голубая и синяя гамма',
		'фиолетовая гамма'=>'фиолетовая гамма',
		'серая гамма'=>'серая гамма')); ?>
		<?php echo $form->error($model,'site_colors'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_brightness'); ?><br>
		<?php echo $form->checkBoxList($model,'site_brightness',array('тусклый'=>'тусклый',
		'активный'=>'активный')); ?>
		<?php echo $form->error($model,'site_brightness'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'composition'); ?><br>
		<?php echo $form->checkBoxList($model,'composition',array('статика (нет движения)'=>'статика (нет движения)',
		'динамика (есть движение)'=>'динамика (есть движение)')); ?>
		<?php echo $form->error($model,'composition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'design_type'); ?><br>
		<?php echo $form->checkBoxList($model,'design_type',array('дизайн заказчика'=>'дизайн заказчика',
		'индивидуальный дизайн'=>'индивидуальный дизайн',
		'эксклюзивный дизайн'=>'эксклюзивный дизайн')); ?>
		<?php echo $form->error($model,'design_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'components_basic'); ?><br>
		<?php echo $form->checkBoxList($model,'components_basic',array('Простая страница'=>'Простая страница',
		'Список подразделов'=>'Список подразделов')); ?>
		<?php echo $form->error($model,'components_basic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'components_web_form'); ?><br>
		<?php echo $form->checkBoxList($model,'components_web_form',array('Заявка на участие в мероприятии'=>'Заявка на участие в мероприятии',
		'Письмо с сайта'=>'Письмо с сайта',
		'Конструктор веб-форм'=>'Конструктор веб-форм',
		'Другое'=>'Другое'
		)); ?>
		<?php echo $form->error($model,'components_web_form'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'components_interactive'); ?><br>
		<?php echo $form->checkBoxList($model,'components_interactive',array('Гостевая книга / FAQ'=>'Гостевая книга / FAQ',
		'Комментарии к материалам'=>'Комментарии к материалам',
		'Другое'=>'Другое')); ?>
		<?php echo $form->error($model,'components_interactive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'components_corporative'); ?><br>
		<?php echo $form->checkBoxList($model,'components_corporative',array('Адреса компании'=>'Адреса компании',
		'Выполненные проекты'=>'Выполненные проекты',
		'Клиенты'=>'Клиенты',
		'Отзывы о работе'=>'Отзывы о работе',
		'Кейсы'=>'Кейсы',
		'Другое'=>'Другое')); ?>
		<?php echo $form->error($model,'components_corporative'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'components_people'); ?><br>
		<?php echo $form->checkBoxList($model,'components_people',array('Вакансии компании'=>'Вакансии компании',
		'Личные контакты'=>'Личные контакты',
		'Другое'=>'Другое')); ?>
		<?php echo $form->error($model,'components_people'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'components_online_consult'); ?><br>
		<?php echo $form->checkBoxList($model,'components_online_consult',array('Персоналии'=>'Персоналии',
		'Резюме'=>'Резюме',
		'Другое'=>'Другое')); ?>
		<?php echo $form->error($model,'components_online_consult'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'components_publication'); ?><br>
		<?php echo $form->checkBoxList($model,'components_publication',array('Новости компании'=>'Новости компании',
		'Новости СМИ'=>'Новости СМИ',
		'Статьи простые'=>'Статьи простые',
		'Другое'=>'Другое')); ?>
		<?php echo $form->error($model,'components_publication'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cms_type'); ?><br>
		<?php echo $form->checkBoxList($model,'cms_type',array('1C bitrix'=>'1C bitrix',
		'NetCat'=>'NetCat',
		'UMI'=>'UMI',
		'Joomla'=>'Joomla',
		'WP'=>'WP',
		'Modx'=>'Modx',
		'Symphony'=>'Symphony',
		'Simpla'=>'Simpla',
		'OpenCart'=>'OpenCart')); ?>
		<?php echo $form->error($model,'cms_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modules_type'); ?><br>
		<?php echo $form->checkBoxList($model,'modules_type',array('Голосование'=>'Голосование',
		'Поиск'=>'Поиск',
		'Медиа-плеер'=>'Медиа-плеер',
		'Медиабиблиотека'=>'Медиабиблиотека',
		'Форум'=>'Форум',
		'Modx'=>'Modx',
		'Подписка, рассылки'=>'Подписка, рассылки',
		'База знаний (Wiki)'=>'База знаний (Wiki)',
		'Валюты'=>'Валюты',
		'Социальные сервисы'=>'Социальные сервисы',
		'Веб-формы'=>'Веб-формы',
		'Опросы'=>'Опросы',
		'Блоги'=>'Блоги',
		'Фотогалерея 2.0'=>'Фотогалерея 2.0',
		'Веб-аналитика'=>'Веб-аналитика',
		'Реклама'=>'Реклама',
		'Техподдержка'=>'Техподдержка',
		'Обучение, тестирование'=>'Обучение, тестирование',
		'Перевод'=>'Перевод',
		'Веб-сервисы'=>'Веб-сервисы',
		'Личный кабинет клиента'=>'Личный кабинет клиента',
		'Торговый каталог'=>'Торговый каталог',
		'Интернет-магазин'=>'Интернет-магазин',
		'Документооборот'=>'Документооборот',
		'Социальная сеть'=>'Социальная сеть',
		'Бизнес-процессы'=>'Бизнес-процессы',
		'Дизайнер бизнес-процессов'=>'Дизайнер бизнес-процессов',
		'Контроллер сайтов'=>'Контроллер сайтов',
		'Другое'=>'Другое')); ?>
		<?php echo $form->error($model,'modules_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_structure'); ?><br>
		<?php echo $form->checkBoxList($model,'menu_structure',array('Главная страница'=>'Главная страница',
		'Наши новости'=>'Наши новости',
		'О компании'=>'О компании',
		'Наша продукция'=>'Наша продукция',
		'Послать запрос'=>'Послать запрос',
		'Схема Вашего меню'=>'Схема Вашего меню')); ?>
		<?php echo $form->error($model,'menu_structure'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mainpage_elements'); ?><br>
		<?php echo $form->checkBoxList($model,'mainpage_elements',array('Меню 1-го уровня'=>'Меню 1-го уровня',
		'Логотип'=>'Логотип',
		'Блок пиктограмм или ссылок (карта сайта, послать письмо, поиск по сайту, добавить в избранное)'=>'Блок пиктограмм или ссылок (карта сайта, послать письмо, поиск по сайту, добавить в избранное)',
		'Контактная информация (адрес, телефон, е-мейл)'=>'Контактная информация (адрес, телефон, е-мейл)',
		'Быстрый поиск по сайту'=>'Быстрый поиск по сайту',
		'Рекламные баннеры (указать количество и размер)'=>'Рекламные баннеры (указать количество и размер)',
		'Другое'=>'Другое'
		)); ?>
		<?php echo $form->error($model,'mainpage_elements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_done_before'); ?><br>
		<?php echo $form->checkBoxList($model,'site_done_before',array('Да'=>'Да',
		'Нет'=>'Нет'
		)); ?>
		<?php echo $form->error($model,'site_done_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_url_before'); ?><br>
		<?php echo $form->textField($model,'site_url_before',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'site_url_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tasks_completness_before'); ?><br>
		<?php echo $form->textArea($model,'tasks_completness_before',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tasks_completness_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seo_before'); ?><br>
		<?php echo $form->textArea($model,'seo_before',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'seo_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advertisement_before'); ?><br>
		<?php echo $form->textArea($model,'advertisement_before',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'advertisement_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_product_reason'); ?><br>
		<?php echo $form->textArea($model,'new_product_reason',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'new_product_reason'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'additional_info'); ?><br>
		<?php echo $form->textArea($model,'additional_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'additional_info'); ?>
	</div>

	<div class="row buttons">
		<a href="http://dr-intellectus.com/"><p>Главная</p></a>
		<p class="required">   //   Заполнение коммерческого предложения</p>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Отправить данные' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->