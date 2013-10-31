<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property string $id
 * @property string $created
 * @property string $message
 * @property string $from_user
 * @property string $to_user
 */
class Post extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message, to_user', 'required'),
			array('to_user', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created, message, from_user, to_user', 'safe', 'on'=>'search'),
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
			'from'=>array(self::BELONGS_TO, 'User', 'from_user'),
			'to'=>array(self::BELONGS_TO, 'User', 'to_user')
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'created' => 'Дата',
			'message' => 'Сообщение',
			'from_user' => 'Отправитель',
			'to_user' => 'Получатель',
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
		$criteria->compare('created',$this->created,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('from_user',$this->from_user,true);
		$criteria->compare('to_user',$this->to_user,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
public function my(){
	$criteria = new CDbCriteria;
		$user=Yii::app()->user->id;
		$criteria->condition='to_user=:user';
		$criteria->order='created DESC';
		$criteria->params=array(':user'=>$user);
		$dataProvider=new CActiveDataProvider('Post', array( 	  'criteria'=>$criteria
		));							
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function findFile($id){
		$row = Yii::app()->db->createCommand(array(
    'select' => array('file'),
    'from' => 'o_files',
    'where' => 'message_id=:id',
    'params' => array(':id'=>$id),
))->queryRow();
		return $row['file'];
	}
	
	
}