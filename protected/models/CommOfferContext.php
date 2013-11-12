<?php

/**
 * This is the model class for table "{{comm_offer_context}}".
 *
 * The followings are the available columns in table '{{comm_offer_context}}':
 * @property integer $id
 * @property string $date
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $bussiness_theme
 * @property string $url
 * @property string $adv_budget
 * @property string $seo_systems
 * @property string $geo_time_targeting
 * @property string $theme_priority
 * @property string $price_wanted
 * @property string $comments
 */
class CommOfferContext extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comm_offer_context}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, phone, email, bussiness_theme, url, adv_budget, seo_systems, geo_time_targeting, theme_priority, price_wanted, comments', 'required'),
			array('name, phone, email, url, adv_budget', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, name, phone, email, bussiness_theme, url, adv_budget, seo_systems, geo_time_targeting, theme_priority, price_wanted, comments', 'safe', 'on'=>'search'),
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
			'date' => 'Дата',
			'name' => 'ФИО',
			'phone' => 'Телефон',
			'email' => 'Email',
			'bussiness_theme' => 'Тематика бизнеса',
			'url' => 'Адрес сайта(URL)',
			'adv_budget' => 'Рекламный бюджет',
			'seo_systems' => 'Системы контекстной рекламы, которые нужно задействовать. Если есть четкий бюджет на систему, указать его',
			'geo_time_targeting' => 'Геотаргетинг, временной таргетинг',
			'theme_priority' => 'Приоритеты по тематикам (на что сделать акцент в плане)',
			'price_wanted' => 'Желаемая цена привлечения заказа/звонка/клиента по контекстной рекламе',
			'comments' => 'Дополнительные пожелания по рекламе (предпочитаемые позиции показа, нет ли запретов на РСЯ и т.п.)',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('bussiness_theme',$this->bussiness_theme,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('adv_budget',$this->adv_budget,true);
		$criteria->compare('seo_systems',$this->seo_systems,true);
		$criteria->compare('geo_time_targeting',$this->geo_time_targeting,true);
		$criteria->compare('theme_priority',$this->theme_priority,true);
		$criteria->compare('price_wanted',$this->price_wanted,true);
		$criteria->compare('comments',$this->comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CommOfferContext the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
