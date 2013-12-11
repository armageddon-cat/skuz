<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property string $login
 * @property string $password
 * @property integer $role
 * @property string $email
 */
class User extends CActiveRecord
{
	const ROLE_ADMIN = 'admin';
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('login, password, realname, surname, email, company', 'required'),
			array('email', 'email'),
			array('company,login, password, realname, surname, email', 'safe'),
			array('role', 'numerical', 'integerOnly'=>true),
			array('login, realname, surname', 'length', 'max'=>20),
			array('password', 'length', 'max'=>255),
			array('email', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, password, realname, surname, role, email, ban', 'safe', 'on'=>'search'),
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
			'rolename'=>array(self::BELONGS_TO, 'Roles', 'role'),
			'companyName'=>array(self::BELONGS_TO, 'SeoCompanies', 'company'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Логин',
			'password' => 'Пароль',
			'role' => 'Уровень доступа',
			'realname'=>'Имя',
			'surname'=>'Фамилия',
			'email' => 'E-mail',
			'ban'=>'Доступ',
			'last_move'=>'Последняя активность',
			'company'=>'Компания'
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('ban',$this->ban);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave(){
		$this->password=md5($this->password);
		return parent::beforeSave();
	}
	public static function all(){
		return CHtml::listData(self::model()->findAll(), 'id', 'login');
		
	}
	public static function allNames(){
		return CHtml::listData(self::model()->findAllBySql('select id, full_name from {{user}} where full_name != \'Test\''), 'id', 'full_name');
		
	}

	public static function allCalles(){	

		return CHtml::listData(self::model()->findAllBySql('select id, surname from {{user}} where role = 1'), 'id', 'surname');	
	}
	
	public static function allManagers(){
		return CHtml::listData(self::model()->findAllByPk(), 'id', 'login');	
	}

	public static function online(){
		return self::model()->findAllBySql('select distinct {{user}}.id, login, realname, surname from {{user}} join sessions on {{user}}.id=sessions.user_id where sessions.user_id!=0');
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function GetLogin($id){
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model->login;
	}
}