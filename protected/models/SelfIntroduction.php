<?php

/**
 * This is the model class for table "self_introduction".
 *
 * The followings are the available columns in table 'self_introduction':
 * @property string $intro_id
 * @property string $user_id
 * @property string $self_introduction
 */
class SelfIntroduction extends CActiveRecord
{
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
			array('intro_id, user_id, self_introduction', 'required'),
			array('intro_id, user_id', 'length', 'max'=>20),
			array('self_introduction', 'length', 'max'=>10000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('intro_id, user_id, self_introduction', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'self_introduction' => 'Self Introduction',
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

		$criteria->compare('intro_id',$this->intro_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('self_introduction',$this->self_introduction,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SelfIntroduction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
