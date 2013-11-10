<?php

/**
 * This is the model class for table "{{commersial_offer}}".
 *
 * The followings are the available columns in table '{{commersial_offer}}':
 * @property integer $id
 * @property string $fill_date
 * @property string $project_name
 * @property string $contact_person
 * @property string $phone_number
 * @property string $email
 * @property string $site_url
 * @property string $company_name
 * @property string $company_products
 * @property string $fillial_web
 * @property string $sales_form
 * @property string $market_position
 * @property string $marketing_strategy
 * @property string $brand_name
 * @property string $brand_advantages
 * @property string $price_level
 * @property string $site_tasks_adv
 * @property string $site_tasks_mark
 * @property string $site_tasks_info
 * @property string $site_type
 * @property string $functional_modules
 * @property string $additional_languages
 * @property string $site_stilistics
 * @property string $firm_style_attributes
 * @property string $slogan
 * @property string $see_plus
 * @property string $see_minus
 * @property string $sites_you_like
 * @property string $site_colors
 * @property string $site_brightness
 * @property string $composition
 * @property string $design_type
 * @property string $components_basic
 * @property string $components_web_form
 * @property string $components_interactive
 * @property string $components_corporative
 * @property string $components_people
 * @property string $components_online_consult
 * @property string $components_publication
 * @property string $cms_type
 * @property string $modules_type
 * @property string $menu_structure
 * @property string $mainpage_elements
 * @property string $site_done_before
 * @property string $site_url_before
 * @property string $tasks_completness_before
 * @property string $seo_before
 * @property string $advertisement_before
 * @property string $new_product_reason
 * @property string $additional_info
 */
class CommersialOffer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{commersial_offer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_name, contact_person, phone_number, email, site_url, company_name, company_products, fillial_web, sales_form, market_position, marketing_strategy, brand_name, brand_advantages, price_level, site_tasks_adv, site_tasks_mark, site_tasks_info, site_type, functional_modules, additional_languages, site_stilistics, firm_style_attributes, slogan, see_plus, see_minus, sites_you_like, site_colors, site_brightness, composition, design_type, components_basic, components_web_form, components_interactive, components_corporative, components_people, components_online_consult, components_publication, cms_type, modules_type, menu_structure, mainpage_elements, site_done_before, site_url_before, tasks_completness_before, seo_before, advertisement_before, new_product_reason, additional_info', 'required'),
			/*array('', 'length', 'max'=>255),*/
			array('fill_date, project_name, contact_person, phone_number, email, site_url, company_name, sales_form, market_position, brand_name, brand_advantages, price_level, site_type, additional_languages, site_stilistics, firm_style_attributes, site_brightness, composition, design_type, components_basic, cms_type, site_done_before, site_url_before', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fill_date, project_name, contact_person, phone_number, email, site_url, company_name, company_products, fillial_web, sales_form, market_position, marketing_strategy, brand_name, brand_advantages, price_level, site_tasks_adv, site_tasks_mark, site_tasks_info, site_type, functional_modules, additional_languages, site_stilistics, firm_style_attributes, slogan, see_plus, see_minus, sites_you_like, site_colors, site_brightness, composition, design_type, components_basic, components_web_form, components_interactive, components_corporative, components_people, components_online_consult, components_publication, cms_type, modules_type, menu_structure, mainpage_elements, site_done_before, site_url_before, tasks_completness_before, seo_before, advertisement_before, new_product_reason, additional_info', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер',
			'fill_date' => 'Дата заполнения',
			'project_name' => 'Название проекта',
			'contact_person' => 'Контактное лицо',
			'phone_number' => 'Номер телефона',
			'email' => 'Email',
			'site_url' => 'URL сайта',
			'company_name' => 'Название предприятия',
			'company_products' => 'Реализуемые товары, предоставляемые услуги',
			'fillial_web' => 'Филиальная сеть (география продаж)',
			'sales_form' => 'Форма продаж',
			'market_position' => 'Ваша позиция на рынке (укажите товарную категорию)',
			'marketing_strategy' => 'Какой маркетинговой стратегии вы планируете следовать?',
			'brand_name' => 'Название бренда/товара/услуги',
			'brand_advantages' => 'Преимущества бренда/товара/услуги',
			'price_level' => 'Уровни цен на предприятии',
			'site_tasks_adv' => 'Рекламные',
			'site_tasks_mark' => 'Маркетинговые',
			'site_tasks_info' => 'Информационные',
			'site_type' => 'Тип сайта',
			'functional_modules' => 'Функциональные модули сайта (что сайт должен уметь делать)',
			'additional_languages' => 'Дополнительные языковые версии',
			'site_stilistics' => 'Выберите стилистику сайта',
			'firm_style_attributes' => 'Что является носителями фирменного стиля',
			'slogan' => 'Слоган',
			'see_plus' => 'Что бы вы хотели видеть в дизайне своего сайта',
			'see_minus' => 'Что бы вы НЕ хотели видеть в дизайне своего сайта',
			'sites_you_like' => 'Сайты, которые нравятся по дизайну',
			'site_colors' => 'Предпочтения в цветовой гамме',
			'site_brightness' => 'Яркость',
			'composition' => 'Композиция',
			'design_type' => 'Вид дизайна',
			'components_basic' => 'Базовые',
			'components_web_form' => 'Веб-формы',
			'components_interactive' => 'Интерактив',
			'components_corporative' => 'Корпоративные',
			'components_people' => 'Люди, работа',
			'components_online_consult' => 'Онлайн-консультанты',
			'components_publication' => 'Публикации',
			'cms_type' => 'Варианты СMS',
			'modules_type' => 'Модули',
			'menu_structure' => 'Структура меню сайта',
			'mainpage_elements' => 'Какие элементы будут присутствовать на главной странице:',
			'site_done_before' => 'Делали ли вы ранее сайт в интернете?',
			'site_url_before' => 'Укажите, пожалуйста, адрес',
			'tasks_completness_before' => 'Были ли вы удовлетворены созданным сайтом? Выполнял ли он поставленные задачи?',
			'seo_before' => 'Проводили ли вы операции по оптимизации, продвижению (SEO) сайта?',
			'advertisement_before' => 'Проводились ли рекламные мероприятия для сайта? Если, да, то какие?',
			'new_product_reason' => 'Укажите причины создания нового web-продукта?',
			'additional_info' => 'Дополнительная информация, которую вы хотели бы указать:',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fill_date',$this->fill_date,true);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('site_url',$this->site_url,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('company_products',$this->company_products,true);
		$criteria->compare('fillial_web',$this->fillial_web,true);
		$criteria->compare('sales_form',$this->sales_form,true);
		$criteria->compare('market_position',$this->market_position,true);
		$criteria->compare('marketing_strategy',$this->marketing_strategy,true);
		$criteria->compare('brand_name',$this->brand_name,true);
		$criteria->compare('brand_advantages',$this->brand_advantages,true);
		$criteria->compare('price_level',$this->price_level,true);
		$criteria->compare('site_tasks_adv',$this->site_tasks_adv,true);
		$criteria->compare('site_tasks_mark',$this->site_tasks_mark,true);
		$criteria->compare('site_tasks_info',$this->site_tasks_info,true);
		$criteria->compare('site_type',$this->site_type,true);
		$criteria->compare('functional_modules',$this->functional_modules,true);
		$criteria->compare('additional_languages',$this->additional_languages,true);
		$criteria->compare('site_stilistics',$this->site_stilistics,true);
		$criteria->compare('firm_style_attributes',$this->firm_style_attributes,true);
		$criteria->compare('slogan',$this->slogan,true);
		$criteria->compare('see_plus',$this->see_plus,true);
		$criteria->compare('see_minus',$this->see_minus,true);
		$criteria->compare('sites_you_like',$this->sites_you_like,true);
		$criteria->compare('site_colors',$this->site_colors,true);
		$criteria->compare('site_brightness',$this->site_brightness,true);
		$criteria->compare('composition',$this->composition,true);
		$criteria->compare('design_type',$this->design_type,true);
		$criteria->compare('components_basic',$this->components_basic,true);
		$criteria->compare('components_web_form',$this->components_web_form,true);
		$criteria->compare('components_interactive',$this->components_interactive,true);
		$criteria->compare('components_corporative',$this->components_corporative,true);
		$criteria->compare('components_people',$this->components_people,true);
		$criteria->compare('components_online_consult',$this->components_online_consult,true);
		$criteria->compare('components_publication',$this->components_publication,true);
		$criteria->compare('cms_type',$this->cms_type,true);
		$criteria->compare('modules_type',$this->modules_type,true);
		$criteria->compare('menu_structure',$this->menu_structure,true);
		$criteria->compare('mainpage_elements',$this->mainpage_elements,true);
		$criteria->compare('site_done_before',$this->site_done_before,true);
		$criteria->compare('site_url_before',$this->site_url_before,true);
		$criteria->compare('tasks_completness_before',$this->tasks_completness_before,true);
		$criteria->compare('seo_before',$this->seo_before,true);
		$criteria->compare('advertisement_before',$this->advertisement_before,true);
		$criteria->compare('new_product_reason',$this->new_product_reason,true);
		$criteria->compare('additional_info',$this->additional_info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CommersialOffer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
