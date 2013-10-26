<?php

/**
 * This is the model class for table "self_introduction_comment".
 *
 * The followings are the available columns in table 'self_introduction_comment':
 * @property string $posterName
 * @property string $content
 * @property string $time
 * @property string $commentID
 * @property string $intro_id
 * @property string $toComment
 */
class SelfIntroductionComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SelfIntroductionComment the static model class
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
			array('content', 'required'),
			array('posterName, intro_id, toComment', 'length', 'max'=>20),
			array('content', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('posterName, content, time, commentID, intro_id, toComment', 'safe', 'on'=>'search'),
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
			'posterName' => '发布人',
			'content' => '内容',
			'time' => '时间',
			'commentID' => 'Comment',
			'intro_id' => 'Intro',
			'toComment' => 'To Comment',
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

		$criteria->compare('posterName',$this->posterName,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('commentID',$this->commentID,true);
		$criteria->compare('intro_id',$this->intro_id,true);
		$criteria->compare('toComment',$this->toComment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}