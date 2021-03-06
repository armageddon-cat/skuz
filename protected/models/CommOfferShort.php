<?php

/**
 * This is the model class for table "{{comm_offer_short}}".
 *
 * The followings are the available columns in table '{{comm_offer_short}}':
 * @property integer $id
 * @property string $date
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $product_type
 */
class CommOfferShort extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{comm_offer_short}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, phone, email, product_type', 'required'),
			array('name, phone, email, product_type', 'length', 'max'=>255),
			array('comment, site_url, file', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, name, phone, email, product_type', 'safe', 'on'=>'search'),
// 			array('file', 'file', 
// 'types'=>'doc,docx,pdf,txt,xls,xlsl,csv',
// 'maxSize'=>1024 * 1024 * 10, // 10MB
// 'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
// 'allowEmpty'=>1,
// )
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
			'product_type' => 'Вид продукта',
			'comment' => 'Комментарий',
			'site_url' => 'Адрес Вашего сайта',
			'file'=>'Файл'
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
		$criteria->compare('product_type',$this->product_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function FileExists($id)
	{
		$result = Yii::app()->db->createCommand("SELECT file FROM `o_comm_offer_short` WHERE id = ".$id."")->queryAll();
 		$res1 = $result[0]['file'];
 		return $res1;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CommOfferShort the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
