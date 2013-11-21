<?php

/**
 * This is the model class for table "{{caller_report}}".
 *
 * The followings are the available columns in table '{{caller_report}}':
 * @property string $id
 * @property string $time
 * @property string $company
 * @property string $phone_number
 * @property string $company_address
 * @property string $email
 * @property string $contact_person
 * @property string $business_type
 * @property string $service_type
 * @property string $next_call
 * @property string $contact_type
 * @property string $comment
 * @property string $caller_id
 */
class CallerReport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{caller_report}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('time, company', 'required'),
			array('company, next_call, comm_proposal, manager_id', 'length', 'max'=>50),
			array('phone_number, service_type, contact_type, caller_id, call_status', 'length', 'max'=>50),
			array('company_address, site_address, business_type', 'length', 'max'=>255),
			array('comment, importancy, order_code', 'safe'),
			array('email', 'length', 'max'=>255),
			array('contact_person', 'length', 'max'=>30),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, time, company, phone_number, company_address, email, contact_person, business_type, service_type, next_call, contact_type, comment, caller_id', 'safe', 'on'=>'search'),
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
			'caller'=>array(self::BELONGS_TO, 'User', 'caller_id'),
			'product'=>array(self::BELONGS_TO, 'Product', 'service_type'),
			'contact'=>array(self::BELONGS_TO, 'ContactType', 'contact_type'),
			'manager'=>array(self::BELONGS_TO, 'User', 'manager_id'),
			'meeting'=>array(self::BELONGS_TO, 'Meeting', 'meeting_result'),
			'StatusOfCall'=>array(self::BELONGS_TO, 'CallStatus', 'call_status'),
			'CommProposal'=>array(self::BELONGS_TO, 'CommProposal', 'comm_proposal'),
			'Contract'=>array(self::BELONGS_TO, 'Contract', 'contract'),
			'Importancy'=>array(self::BELONGS_TO, 'Importancy', 'importancy'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер заказа',
			'time' => 'Заказ получен',
			'company' => 'Название компании',
			'phone_number' => 'Телефон',
			'company_address' => 'Адрес',
			'email' => 'E-mail',
			'contact_person' => 'Контактное лицо',
			'business_type' => 'Тип бизнеса',
			'service_type' => 'Вид продукта',
			'next_call' => 'Дата следующего контакта',
			'contact_type' => 'Тип контакта',
			'comment' => 'Комментарий',
			'caller_id' => 'Диспетчер',
			'call_status' => 'Статус звонка',
			'manager_id' => 'Менеджер',
			'meeting_result' => 'Результат встречи',
			'site_address' => 'Адрес сайта',
			'comm_proposal' => 'Коммерческое предложение',
			'contract' => 'Подписан ли договор?',
			'importancy' => 'Приоритет',
			'meeting_date' => 'Дата встречи',
			'order_code'=>'Код заказа',
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
		$criteria->compare('time',$this->time,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('site_address',$this->site_address,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('company_address',$this->company_address,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('business_type',$this->business_type,true);
		$criteria->compare('service_type',$this->service_type,true);
		$criteria->compare('next_call',$this->next_call,true);
		$criteria->compare('contact_type',$this->contact_type,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('caller_id',$this->caller_id, true);
		$criteria->compare('call_status',$this->call_status);
		$criteria->compare('manager_id',$this->manager_id);
		$criteria->compare('meeting_result',$this->meeting_result);
		$criteria->compare('comm_proposal',$this->comm_proposal);
		$criteria->compare('contract',$this->contract);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/*public static function ringQuantaty(){
		return self::model()->findAllBySql('select distinct {{user}}.id, login, realname, surname from {{user}} join sessions on {{user}}.id=sessions.user_id where sessions.user_id!=0');
	}*/

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CallerReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}