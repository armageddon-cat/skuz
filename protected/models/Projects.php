<?php

/**
 * This is the model class for table "{{projects}}".
 *
 * The followings are the available columns in table '{{projects}}':
 * @property integer $id
 * @property integer $created_by
 * @property string $create_time
 * @property string $project_name
 * @property string $comment
 */
class Projects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{projects}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_name', 'required'),
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('project_name', 'length', 'max'=>255),
			array('created_by, create_time, comment, responding', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created_by, create_time, project_name, comment', 'safe', 'on'=>'search'),
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
			'Responding'=>array(self::BELONGS_TO, 'User', 'responding'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер',
			'created_by' => 'Создано',
			'create_time' => 'Время создания',
			'project_name' => 'Имя проекта',
			'comment' => 'Комментарий',
			'responding'=>'Ответственный'
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
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	public static function all(){
		return CHtml::listData(self::model()->findAll(), 'id', 'company');	
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
