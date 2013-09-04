<?php

/**
 * This is the model class for table "answermaster".
 *
 * The followings are the available columns in table 'answermaster':
 * @property integer $answerid
 * @property integer $answertxtid
 * @property double $answerscore
 * @property integer $questid
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Answercoresheet[] $answercoresheets
 * @property Questionmaster $quest
 * @property Usermaster $lasteditedby0
 * @property Usermaster $createdby0
 * @property Textmaster $answertxt
 */
class Answermaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Answermaster the static model class
	 */
	public $text_answer;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'answermaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text_answer, answerscore, questid, isactive', 'required'),
			array('answertxtid, questid, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('answerscore', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('answerid, answertxtid, answerscore, questid, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
		);
	}
	public function beforeSave(){
		$userid=Yii::app()->user->getId();
		$currenttime=new CDbExpression('NOW()');
		if ($this->isNewRecord){
			$this->createdby=$userid;
			$this->createdon=$currenttime;			
		}
		$this->lasteditedby=$userid;
		$this->lasteditedon=$currenttime;
		return parent::beforeSave();
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'answercoresheets' => array(self::HAS_MANY, 'Answercoresheet', 'answerid'),
			'quest' => array(self::BELONGS_TO, 'Questionmaster', 'questid'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'answertxt' => array(self::BELONGS_TO, 'Textmaster', 'answertxtid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'answerid' => 'Answerid',
			'answertxtid' => 'Answertxtid',
			'answerscore' => 'Answerscore',
			'questid' => 'Questid',
			'createdby' => 'Createdby',
			'createdon' => 'Createdon',
			'lasteditedby' => 'Lasteditedby',
			'lasteditedon' => 'Lasteditedon',
			'isactive' => 'Isactive',
			'text_answer'=>'Answer',
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

		$criteria->compare('answerid',$this->answerid);
		$criteria->compare('answertxtid',$this->answertxtid);
		$criteria->compare('answerscore',$this->answerscore);
		$criteria->addCondition("questid='$this->questid'");
		$criteria->compare('createdby',$this->createdby);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('lasteditedby',$this->lasteditedby);
		$criteria->compare('lasteditedon',$this->lasteditedon,true);
		$criteria->compare('isactive',$this->isactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}