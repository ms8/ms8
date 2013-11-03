<?php

/**
 * This is the model class for table "summary".
 *
 * The followings are the available columns in table 'summary':
 * @property string $summary_id
 * @property string $user_name
 * @property string $company_name
 * @property string $position_name
 * @property string $language
 * @property string $dress
 * @property string $format
 * @property string $atmosphere
 * @property string $rounds
 * @property string $impression
 * @property string $result
 * @property string $tips
 * @property string $exam
 * @property string $exam_content
 * @property string $experience
 * @property string $status
 * @property string $time
 * @property string $title
 */
class Summary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Summary the static model class
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
		return 'summary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, company_name, position_name, time, title', 'required'),
			array('user_name, position_name, language, dress, format, atmosphere, result, exam, status, time', 'length', 'max'=>100),
			array('company_name', 'length', 'max'=>200),
			array('rounds', 'length', 'max'=>10),
			array('impression, tips, title', 'length', 'max'=>500),
			array('exam_content, experience', 'length', 'max'=>5000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('summary_id, user_name, company_name, position_name, language, dress, format, atmosphere, rounds, impression, result, tips, exam, exam_content, experience, status, time, title', 'safe', 'on'=>'search'),
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
            'summary_id' => '面试总结',
            'user_name' => '用户名',
            'company_name' => '公司名称',
            'position_name' => '职位名称',
            'language' => '面试语言',
            'dress' => '着装要求',
            'format' => '面试形式',
            'atmosphere' => '面试氛围',
            'rounds' => '几轮面试',
            'impression' => '工作环境印象',
            'result' => '面试结果',
            'tips' => '小建议',
            'exam' => '是否有笔试',
            'exam_content' => '笔试内容',
            'experience' => '面试经验分享',
            'status' => '状态',
            'time' => '时间',
            'title'=>'标题',
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

		$criteria->compare('summary_id',$this->summary_id,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('position_name',$this->position_name,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('dress',$this->dress,true);
		$criteria->compare('format',$this->format,true);
		$criteria->compare('atmosphere',$this->atmosphere,true);
		$criteria->compare('rounds',$this->rounds,true);
		$criteria->compare('impression',$this->impression,true);
		$criteria->compare('result',$this->result,true);
		$criteria->compare('tips',$this->tips,true);
		$criteria->compare('exam',$this->exam,true);
		$criteria->compare('exam_content',$this->exam_content,true);
		$criteria->compare('experience',$this->experience,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}