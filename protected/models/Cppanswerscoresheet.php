<?php

/**
 * This is the model class for table "cppanswerscoresheet".
 *
 * The followings are the available columns in table 'cppanswerscoresheet':
 * @property integer $cppanswerscid
 * @property integer $cppquestid
 * @property integer $cppanswerid
 * @property integer $answerscoresheetid
 *
 * The followings are the available model relations:
 * @property Cppquestionmaster $cppquest
 * @property Cppanswermaster $cppanswer
 * @property Answercoresheet $answerscoresheet
 */
class Cppanswerscoresheet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cppanswerscoresheet the static model class
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
		return 'cppanswerscoresheet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cppquestid, cppanswerid, answerscoresheetid', 'required'),
			array('cppquestid, cppanswerid, answerscoresheetid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cppanswerscid, cppquestid, cppanswerid, answerscoresheetid', 'safe', 'on'=>'search'),
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
			'cppquest' => array(self::BELONGS_TO, 'Cppquestionmaster', 'cppquestid'),
			'cppanswer' => array(self::BELONGS_TO, 'Cppanswermaster', 'cppanswerid'),
			'answerscoresheet' => array(self::BELONGS_TO, 'Answercoresheet', 'answerscoresheetid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cppanswerscid' => 'Cppanswerscid',
			'cppquestid' => 'Cppquestid',
			'cppanswerid' => 'Cppanswerid',
			'answerscoresheetid' => 'Answerscoresheetid',
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

		$criteria->compare('cppanswerscid',$this->cppanswerscid);
		$criteria->compare('cppquestid',$this->cppquestid);
		$criteria->compare('cppanswerid',$this->cppanswerid);
		$criteria->compare('answerscoresheetid',$this->answerscoresheetid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}