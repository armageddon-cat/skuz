<?php

/**
 * This is the model class for table "{{call_later}}".
 *
 * The followings are the available columns in table '{{call_later}}':
 * @property integer $id
 * @property string $time
 * @property string $company
 * @property string $site_address
 * @property string $phone_number
 */
class CallLater extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{call_later}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company, phone_number', 'required'),
			array('company, site_address, site_address, phone_number', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, time, company, site_address, phone_number', 'safe', 'on'=>'search'),
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
			'StatusOfCall'=>array(self::BELONGS_TO, 'CallStatus', 'call_status')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер',
			'time' => 'Время',
			'company' => 'Компания',
			'site_address' => 'Адрес сайта',
			'phone_number' => 'Номер телефона',
			'call_status' => 'Статус звонка',
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CallLater the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
