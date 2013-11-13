<?php

/**
 * This is the model class for table "{{keyword}}".
 *
 * The followings are the available columns in table '{{keyword}}':
 * @property string $company_id
 * @property string $keyword
 * @property string $id
 */
class Keyword extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{keyword}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, keyword', 'required'),
			array('company_id', 'length', 'max'=>50),
			array('keyword', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('company_id, keyword, id', 'safe', 'on'=>'search'),
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
			'company'=>array(self::BELONGS_TO, 'SeoCompanies', 'company_id'),
			'keypos'=>array(self::BELONGS_TO, 'KeywordPosition', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'company_id' => 'Компания',
			'keyword' => 'Ключевое слово',
			'id' => 'Номер',
			'pos' => 'Позиция',
			'engine'=>'Движок',
			'date'=>'Дата',
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

		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('id',$this->id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function all(){
		return CHtml::listData(self::model()->findAll(), 'id', 'company_id');
		
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Keyword the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
