<?php

/**
 * This is the model class for table "self_introduction".
 *
 * The followings are the available columns in table 'self_introduction':
 * @property string $intro_id
 * @property string $user_name
 * @property string $self_introduction
 */
class SelfIntroduction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SelfIntroduction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'self_introduction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('self_introduction', 'required'),
			array('intro_id', 'length', 'max'=>20),
			array('user_name', 'length', 'max'=>100),
			array('self_introduction', 'length', 'max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('intro_id, user_name, self_introduction', 'safe', 'on'=>'search'),
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
			'intro_id' => 'Intro',
			'user_name' => 'User Name',
			'self_introduction' => '自我介绍',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('intro_id',$this->intro_id,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('self_introduction',$this->self_introduction,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}