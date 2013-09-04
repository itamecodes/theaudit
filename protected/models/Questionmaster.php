<?php

/**
 * This is the model class for table "questionmaster".
 *
 * The followings are the available columns in table 'questionmaster':
 * @property integer $questid
 * @property integer $questiontxtid
 * @property double $questionscore
 * @property double $questweight
 * @property integer $iscpp
 * @property integer $cppcatid
 * @property integer $subcatid
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Answercoresheet[] $answercoresheets
 * @property Answermaster[] $answermasters
 * @property Usermaster $lasteditedby0
 * @property Usermaster $createdby0
 * @property Textmaster $questiontxt
 * @property Subcategorymaster $subcat
 * @property Cppcategorymaster $cppcat
 */
class Questionmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Questionmaster the static model class
	 */
	public $text_question;
	public $categoryid;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questionmaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text_question, questionscore, categoryid, subcatid, isactive', 'required'),
			array('questiontxtid, iscpp, cppcatid, subcatid, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('questionscore, questweight', 'numerical'),
			array('iscpp,cppcatid','cppquestionrules'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('questid, questiontxtid, questionscore, questweight, iscpp, cppcatid, subcatid, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
		);
	}	
	public function cppquestionrules($attributename,$params){
		if($this->iscpp==1 && $this->cppcatid==''){
				$this->addError($this->cppcatid,'Select Cpp Category');
		}
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
			'answercoresheets' => array(self::HAS_MANY, 'Answercoresheet', 'questid'),
			'answermasters' => array(self::HAS_MANY, 'Answermaster', 'questid'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'questiontxt' => array(self::BELONGS_TO, 'Textmaster', 'questiontxtid'),
			'subcat' => array(self::BELONGS_TO, 'Subcategorymaster', 'subcatid'),
			'cppcat' => array(self::BELONGS_TO, 'Cppcategorymaster', 'cppcatid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'questid' => 'Questid',
			'questiontxtid' => 'Question',
			'questionscore' => 'Question Weight',
			'questweight' => 'Question Weight',
			'iscpp' => 'CPP Question',
			'cppcatid' => 'Cpp Category',
			'subcatid' => 'Sub-Category',
			'createdby' => 'Created By',
			'createdon' => 'Created On',
			'lasteditedby' => 'Last Edited By',
			'lasteditedon' => 'Last Edited On',
			'isactive' => 'Activation Status',
			'text_question'=>'Question',
			'categoryid'=>'Dimension Name',
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

		$criteria->compare('questid',$this->questid);
		$criteria->compare('questiontxtid',$this->questiontxtid);
		$criteria->compare('questionscore',$this->questionscore);
		$criteria->compare('questweight',$this->questweight);
		$criteria->compare('iscpp',$this->iscpp);
		$criteria->compare('cppcatid',$this->cppcatid);
		$criteria->compare('subcatid',$this->subcatid);
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