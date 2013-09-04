<?php

/**
 * This is the model class for table "answercoresheet".
 *
 * The followings are the available columns in table 'answercoresheet':
 * @property integer $ansscoresheetid
 * @property integer $questid
 * @property integer $answerid
 * @property integer $answerscore
 * @property integer $questmaxscore
 * @property integer $scoresheetid
 *
 * The followings are the available model relations:
 * @property Auditscoresheet $scoresheet
 * @property Questionmaster $quest
 * @property Answermaster $answer
 * @property Cppanswerscoresheet[] $cppanswerscoresheets
 */
class Answercoresheet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Answercoresheet the static model class
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
		return 'answercoresheet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('questid, answerid, answerscore, questmaxscore, scoresheetid', 'required'),
			array('questid, answerid, questmaxscore, scoresheetid', 'numerical', 'integerOnly'=>true),
			array('answerscore', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ansscoresheetid, questid, answerid, answerscore, questmaxscore, scoresheetid', 'safe', 'on'=>'search'),
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
			'scoresheet' => array(self::BELONGS_TO, 'Auditscoresheet', 'scoresheetid'),
			'quest' => array(self::BELONGS_TO, 'Questionmaster', 'questid'),
			'answer' => array(self::BELONGS_TO, 'Answermaster', 'answerid'),
			'cppanswerscoresheets' => array(self::HAS_MANY, 'Cppanswerscoresheet', 'answerscoresheetid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ansscoresheetid' => 'Answer Score Sheet',
			'questid' => 'Question',
			'answerid' => 'Answer',
			'answerscore' => 'Answer Score',
			'questmaxscore' => 'Question Max Score',
			'scoresheetid' => 'Score Sheet',
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

		$criteria->compare('ansscoresheetid',$this->ansscoresheetid);
		$criteria->compare('questid',$this->questid);
		$criteria->compare('answerid',$this->answerid);
		$criteria->compare('answerscore',$this->answerscore);
		$criteria->compare('questmaxscore',$this->questmaxscore);
		$criteria->compare('scoresheetid',$this->scoresheetid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}