<?php

/**
 * This is the model class for table "concern".
 *
 * The followings are the available columns in table 'concern':
 * @property string $concernID
 * @property string $user_name
 * @property string $prepare_user
 * @property string $companyName
 * @property string $position
 * @property string $time
 * @property string $prepareID
 */
class Concern extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'concern';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, prepare_user, companyName, position, time, prepareID', 'required'),
			array('user_name, prepare_user, companyName, prepareID', 'length', 'max'=>100),
			array('position', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('concernID, user_name, prepare_user, companyName, position, time, prepareID', 'safe', 'on'=>'search'),
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
			'concernID' => 'Concern',
			'user_name' => 'User Name',
			'prepare_user' => 'Prepare User',
			'companyName' => 'Company Name',
			'position' => 'Position',
			'time' => 'Time',
			'prepareID' => 'Prepare',
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

		$criteria->compare('concernID',$this->concernID,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('prepare_user',$this->prepare_user,true);
		$criteria->compare('companyName',$this->companyName,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('prepareID',$this->prepareID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Concern the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
