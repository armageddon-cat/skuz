<?php

/**
 * This is the model class for table "{{seo_companies}}".
 *
 * The followings are the available columns in table '{{seo_companies}}':
 * @property integer $id
 * @property string $date
 * @property string $company_name
 * @property string $comment
 */
class SeoCompanies extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{seo_companies}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_name, comment', 'required'),
			array('date, url, title, h1, h2, h3, h4, keywords, density', 'safe'),
			array('company_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, company_name, comment', 'safe', 'on'=>'search'),
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
			'company_name' => 'Имя компании',
			'comment' => 'Комментарий',
			'url' => 'Ссылка',
			'title' => 'Title',
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'keywords' => 'Ключевые слова',
			'density' => 'Плотность',
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
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('h1',$this->h1,true);
		$criteria->compare('h2',$this->h2,true);
		$criteria->compare('h3',$this->h3,true);
		$criteria->compare('h4',$this->h4,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('density',$this->density,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

		public static function all(){
		return CHtml::listData(self::model()->findAll(), 'id', 'company_name');
		
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SeoCompanies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
