<?php

/**
 * This is the model class for table "{{task_system}}".
 *
 * The followings are the available columns in table '{{task_system}}':
 * @property integer $id
 * @property integer $created_by
 * @property integer $modified_by
 * @property string $create_time
 * @property string $modify_time
 * @property string $first_deadline
 * @property string $deadline
 * @property string $deadline_change_time
 * @property integer $deadline_change_by
 * @property string $task
 * @property string $task_change_time
 * @property integer $task_change_by
 * @property integer $first_executor
 * @property integer $executor
 * @property string $executor_change_time
 * @property integer $executor_change_by
 * @property string $executor_comment
 * @property string $executor_comment_change_time
 * @property integer $executor_comment_change_by
 * @property integer $status
 * @property string $status_change_time
 * @property integer $status_change_by
 * @property string $task_file
 * @property string $executor_file
 * @property string $priority
 */
class TaskSystem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{task_system}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('task', 'required'),
			array('created_by, modified_by, deadline_change_by, task_change_by, first_executor, executor, executor_change_by, executor_comment_change_by, status, status_change_by', 'numerical', 'integerOnly'=>true),
			array('task_file, executor_file', 'length', 'max'=>255),
			array('priority, task_change_time, task_change_by, first_deadline, deadline, first_executor, executor, executor_change_time, executor_change_by, executor_comment, executor_comment_change_time, executor_comment_change_by, status, status_change_time, status_change_by, task_file, executor_file', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created_by, modified_by, create_time, modify_time, first_deadline, deadline, deadline_change_time, deadline_change_by, task, task_change_time, task_change_by, first_executor, executor, executor_change_time, executor_change_by, executor_comment, executor_comment_change_time, executor_comment_change_by, status, status_change_time, status_change_by, task_file, executor_file, priority', 'safe', 'on'=>'search'),
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
			'StatusOfStatus'=>array(self::BELONGS_TO, 'SeoAuditDone', 'status'), //sorry
			'Creator'=>array(self::BELONGS_TO, 'User', 'created_by'),
			'Modifier'=>array(self::BELONGS_TO, 'User', 'modified_by'),
			'DeadlineModifier'=>array(self::BELONGS_TO, 'User', 'deadline_change_by'),
			'TaskModifier'=>array(self::BELONGS_TO, 'User', 'task_change_by'),
			'ExecutorModifier'=>array(self::BELONGS_TO, 'User', 'executor_change_by'),
			'ExCommentModifier'=>array(self::BELONGS_TO, 'User', 'executor_comment_change_by'),
			'StatusModifier'=>array(self::BELONGS_TO, 'User', 'status_change_by'),
			'Executor'=>array(self::BELONGS_TO, 'User', 'executor'),
			'FirstExecutor'=>array(self::BELONGS_TO, 'User', 'first_executor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер',
			'created_by' => 'Задание создал',
			'modified_by' => 'Задание изменил',
			'create_time' => 'Задание создано',
			'modify_time' => 'Задание изменено',
			'first_deadline' => 'Первый дедлайн',
			'deadline' => 'Дедлайн',
			'deadline_change_time' => 'Дедлайн изменен',
			'deadline_change_by' => 'Дедлайн изменил',
			'task' => 'Задание',
			'task_change_time' => 'Задание изменено',
			'task_change_by' => 'Задание изменил',
			'first_executor' => 'Первый исполнитель',
			'executor' => 'Исполнитель',
			'executor_change_time' => 'Исполнитель изменен',
			'executor_change_by' => 'Исполнителя изменил',
			'executor_comment' => 'Комментарий исполнителя',
			'executor_comment_change_time' => 'Комментарий исполнителя изменен',
			'executor_comment_change_by' => 'Комментарий исполнителя изменил',
			'status' => 'Статус',
			'status_change_time' => 'Статус изменен',
			'status_change_by' => 'Статус изменил',
			'task_file' => 'Файл задания',
			'executor_file' => 'Файл исполнителя',
			'priority'=>'Приоритет'
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
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('modify_time',$this->modify_time,true);
		$criteria->compare('first_deadline',$this->first_deadline,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('deadline_change_time',$this->deadline_change_time,true);
		$criteria->compare('deadline_change_by',$this->deadline_change_by);
		$criteria->compare('task',$this->task,true);
		$criteria->compare('task_change_time',$this->task_change_time,true);
		$criteria->compare('task_change_by',$this->task_change_by);
		$criteria->compare('first_executor',$this->first_executor);
		$criteria->compare('executor',$this->executor);
		$criteria->compare('executor_change_time',$this->executor_change_time,true);
		$criteria->compare('executor_change_by',$this->executor_change_by);
		$criteria->compare('executor_comment',$this->executor_comment,true);
		$criteria->compare('executor_comment_change_time',$this->executor_comment_change_time,true);
		$criteria->compare('executor_comment_change_by',$this->executor_comment_change_by);
		$criteria->compare('status',$this->status);
		$criteria->compare('status_change_time',$this->status_change_time,true);
		$criteria->compare('status_change_by',$this->status_change_by);
		$criteria->compare('task_file',$this->task_file,true);
		$criteria->compare('executor_file',$this->executor_file,true);
		$criteria->compare('priority',$this->priority,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TaskSystem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
