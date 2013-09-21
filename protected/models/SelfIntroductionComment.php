<?php

/**
 * This is the model class for table "self_introduction_comment".
 *
 * The followings are the available columns in table 'self_introduction_comment':
 * @property string $posterID
 * @property string $content
 * @property integer $time
 * @property string $commentID
 * @property string $intro_id
 * @property string $toComment
 */
class SelfIntroductionComment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'self_introduction_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('posterID, content, time, intro_id', 'required'),
			array('time', 'numerical', 'integerOnly'=>true),
			array('posterID, intro_id, toComment', 'length', 'max'=>20),
			array('content', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('posterID, content, time, commentID, intro_id, toComment', 'safe', 'on'=>'search'),
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
			'posterID' => 'Poster',
			'content' => 'Content',
			'time' => 'Time',
			'commentID' => 'Comment',
			'intro_id' => 'Intro',
			'toComment' => 'To Comment',
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

		$criteria->compare('posterID',$this->posterID,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('time',$this->time);
		$criteria->compare('commentID',$this->commentID,true);
		$criteria->compare('intro_id',$this->intro_id,true);
		$criteria->compare('toComment',$this->toComment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SelfIntroductionComment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
