<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $userID
 * @property string $user_name
 * @property string $nick_name
 * @property string $email
 * @property string $password
 * @property string $pic
 * @property string $sex
 * @property string $school
 * @property string $major
 * @property integer $score
 * @property string $selfintroduction
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, email, password', 'required'),
			array('score', 'numerical', 'integerOnly'=>true),
			array('user_name, nick_name, email, password, pic, sex, school, major', 'length', 'max'=>100),
			array('selfintroduction', 'length', 'max'=>10000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userID, user_name, nick_name, email, password, pic, sex, school, major, score, selfintroduction', 'safe', 'on'=>'search'),
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
			'userID' => '用户ID',
			'user_name' => '用户名',
			'nick_name' => '昵称',
			'email' => '邮箱',
			'password' => '密码',
			'pic' => '头像',
			'sex' => '性别',
			'school' => '学校',
			'major' => '专业',
			'score' => '积分',
			'selfintroduction' => '简介',
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

		$criteria->compare('userID',$this->userID,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('nick_name',$this->nick_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('selfintroduction',$this->selfintroduction,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
}
