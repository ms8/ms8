<?php

/**
 * This is the model class for table "prepare_self".
 *
 * The followings are the available columns in table 'prepare_self':
 * @property string $id
 * @property string $prepare_id
 * @property string $interview
 * @property string $exam
 */
class PrepareSelf extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PrepareSelf the static model class
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
		return 'prepare_self';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('id', 'length', 'max'=>20),
			array('prepare_id', 'length', 'max'=>100),
            array('interview', 'length', 'max'=>5000),
            array('exam', 'length', 'max'=>5000),

            // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, prepare_id, interview, exam', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'prepare_id' => 'Prepare',
			'interview' => '面试题整理',
			'exam' => '笔试题整理',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('prepare_id',$this->prepare_id,true);
		$criteria->compare('interview',$this->interview,true);
		$criteria->compare('exam',$this->exam,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}