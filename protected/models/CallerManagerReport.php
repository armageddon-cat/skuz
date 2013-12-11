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
 * @property integer $call_status
 */
class CallerManagerReport extends CActiveRecord
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
			array('company', 'required'),
			
			array('company, comm_proposal, contract', 'length', 'max'=>255),
			array('phone_number, service_type, contact_type, caller_id', 'length', 'max'=>255),
			array('site_address, company_address, email, contact_person, next_call, call_status', 'length', 'max'=>255),
			array('email', 'length', 'max'=>255),
			array('time, importancy, manager_comment,  business_type, next_meeting_date, seo_audit_done, seo_file, additional_products, call_status, comment, meeting_result', 'safe'),
			array('contact_person', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, time, company, phone_number, company_address, email, contact_person, business_type, service_type, next_call, contact_type, comment, caller_id, call_status, meeting_result', 'safe', 'on'=>'search'),
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
			'SeoAudit'=>array(self::BELONGS_TO, 'SeoAuditDone', 'seo_audit_done'),
			'OrdersHistory'=>array(self::BELONGS_TO, 'OrdersHistory', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер заказа',
			'time' => 'Дата получения',
			'company' => 'Название компании',
			'phone_number' => 'Телефон',
			'company_address' => 'Адрес',
			'email' => 'E-mail',
			'contact_person' => 'Контактное лицо',
			'business_type' => 'Тип бизнеса',
			'service_type' => 'Вид продукта',
			'next_call' => 'Дата первого контакта(дисп.)',
			'contact_type' => 'Тип контакта',
			'comment' => 'Комментарий',
			'caller_id' => 'Диспетчер',
			'call_status' => 'Статус звонка',
			'manager_id' => 'Менеджер',
			'site_address' => 'Адрес сайта',
			'meeting_result' => 'Результат встречи',
			'comm_proposal' => 'Комм. пред.',
			'contract' => 'Подписан ли договор?',
			'importancy' => 'Приоритет',
			'manager_comment' => 'Детали последнего контакта',
			'next_meeting_date' => 'Дата сл. встречи(назначается менеджером)',
			'order_code'=>'Код заказа',
			'seo_audit_done'=>'Сделан ли сео аудит',
			'additional_products'=>'Дополнительные продукты(необязательно)',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('site_address',$this->site_address,true);
		$criteria->compare('company_address',$this->company_address,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('business_type',$this->business_type,true);
		$criteria->compare('service_type',$this->service_type,true);
		$criteria->compare('next_call',$this->next_call,true);
		$criteria->compare('contact_type',$this->contact_type,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('caller_id',$this->caller_id,true);
		$criteria->compare('call_status',$this->call_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public function FileExists($id)
	{
		$result = Yii::app()->db->createCommand("SELECT seo_file FROM `o_caller_report` WHERE id = ".$id."")->queryAll();
 		$res1 = $result[0]['seo_file'];
 		return $res1;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CallerManagerReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
