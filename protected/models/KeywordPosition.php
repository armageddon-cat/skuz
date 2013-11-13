<?php

/**
 * This is the model class for table "{{keyword_position}}".
 *
 * The followings are the available columns in table '{{keyword_position}}':
 * @property integer $id
 * @property string $date
 * @property integer $keyword_id
 * @property string $keyword_position
 * @property string $engine
 */
class KeywordPosition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{keyword_position}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, keyword_id, engine', 'required'),
			array('keyword_id', 'numerical', 'integerOnly'=>true),
			array('keyword_position', 'length', 'max'=>11),
			array('engine', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, keyword_id, keyword_position, engine', 'safe', 'on'=>'search'),
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
			'keypos'=>array(self::BELONGS_TO, 'Keyword', 'keyword'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
			'keyword_id' => 'Keyword',
			'keyword_position' => 'Keyword Position',
			'engine' => 'Engine',
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
		$criteria->compare('keyword_id',$this->keyword_id);
		$criteria->compare('keyword_position',$this->keyword_position,true);
		$criteria->compare('engine',$this->engine,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KeywordPosition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
