<?php

/**
 * This is the model class for table "{{seoreport}}".
 *
 * The followings are the available columns in table '{{seoreport}}':
 * @property string $keyword_id
 * @property double $spent_seopult
 * @property double $spent_sape
 * @property double $spent_seopult_client
 * @property double $spent_sape_client
 */
class Seoreport extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{seoreport}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keyword_id', 'required'),
			array('spent_seopult, spent_sape, spent_seopult_client, spent_sape_client', 'numerical'),
			array('keyword_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('keyword_id, spent_seopult, spent_sape, spent_seopult_client, spent_sape_client', 'safe', 'on'=>'search'),
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
			'keyword_id' => 'Keyword',
			'spent_seopult' => 'Spent Seopult',
			'spent_sape' => 'Spent Sape',
			'spent_seopult_client' => 'Spent Seopult Client',
			'spent_sape_client' => 'Spent Sape Client',
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

		$criteria->compare('keyword_id',$this->keyword_id,true);
		$criteria->compare('spent_seopult',$this->spent_seopult);
		$criteria->compare('spent_sape',$this->spent_sape);
		$criteria->compare('spent_seopult_client',$this->spent_seopult_client);
		$criteria->compare('spent_sape_client',$this->spent_sape_client);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Seoreport the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
