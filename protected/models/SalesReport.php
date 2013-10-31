<?php

/**
 * This is the model class for table "{{sales_report}}".
 *
 * The followings are the available columns in table '{{sales_report}}':
 * @property string $id
 * @property string $time
 * @property string $company_id
 * @property string $phone_number
 * @property string $contact_type
 * @property string $service_type
 * @property string $sales_id
 */
class SalesReport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{sales_report}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('time, company_id, phone_number, contact_type, service_type, sales_id', 'required'),
			array('company_id, phone_number, contact_type, service_type, sales_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, time, company_id, phone_number, contact_type, service_type, sales_id', 'safe', 'on'=>'search'),
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
			'manager'=>array(self::BELONGS_TO, 'User', 'sales_id'),
			'product'=>array(self::BELONGS_TO, 'Product', 'service_type'),
			'contact'=>array(self::BELONGS_TO, 'ContactType', 'contact_type'),
			'client'=>array(self::BELONGS_TO, 'Client', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'time' => 'Время',
			'company_id' =>'Компания',
			'phone_number' =>'Телефон',
			'contact_type' =>'Тип контакта',
			'service_type' =>'Что продано?',
			'sales_id' =>'Менеджер',
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
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('contact_type',$this->contact_type,true);
		$criteria->compare('service_type',$this->service_type,true);
		$criteria->compare('sales_id',$this->sales_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SalesReport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}