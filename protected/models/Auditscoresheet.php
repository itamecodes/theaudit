<?php

/**
 * This is the model class for table "auditscoresheet".
 *
 * The followings are the available columns in table 'auditscoresheet':
 * @property integer $scoresheetid
 * @property integer $auditid
 * @property integer $categoryid
 * @property integer $subcatid
 * @property integer $catmaxscore
 * @property string $subcatweightedscore
 * @property string $subcatmaxweight
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $createdby
 * @property string $createdon
 *
 * The followings are the available model relations:
 * @property Answercoresheet[] $answercoresheets
 * @property Auditmaster $audit
 * @property Categorymaster $category
 * @property Subcategorymaster $subcat
 * @property Usermaster $createdby0
 * @property Usermaster $lasteditedby0
 */
class Auditscoresheet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Auditscoresheet the static model class
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
		return 'auditscoresheet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('auditid, categoryid, subcatid, catmaxscore, subcatweightedscore', 'required'),
			array('auditid, categoryid, subcatid, catmaxscore', 'numerical', 'integerOnly'=>true),
			array('subcatweightedscore', 'length', 'max'=>14),
			array('subcatmaxweight', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('scoresheetid, auditid, categoryid, subcatid, catmaxscore, subcatweightedscore, subcatmaxweight, lasteditedby, lasteditedon, createdby, createdon', 'safe', 'on'=>'search'),
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
			'answercoresheets' => array(self::HAS_MANY, 'Answercoresheet', 'scoresheetid'),
			'audit' => array(self::BELONGS_TO, 'Auditmaster', 'auditid'),
			'category' => array(self::BELONGS_TO, 'Categorymaster', 'categoryid'),
			'subcat' => array(self::BELONGS_TO, 'Subcategorymaster', 'subcatid'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'scoresheetid' => 'Scoresheetid',
			'auditid' => 'Auditid',
			'categoryid' => 'Categoryid',
			'subcatid' => 'Subcatid',
			'catmaxscore' => 'Catmaxscore',
			'subcatweightedscore' => 'Subcatweightedscore',
			'subcatmaxweight' => 'Subcatmaxweight',
			'lasteditedby' => 'Lasteditedby',
			'lasteditedon' => 'Lasteditedon',
			'createdby' => 'Createdby',
			'createdon' => 'Createdon',
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

		$criteria->compare('scoresheetid',$this->scoresheetid);
		$criteria->compare('auditid',$this->auditid);
		$criteria->compare('categoryid',$this->categoryid);
		$criteria->compare('subcatid',$this->subcatid);
		$criteria->compare('catmaxscore',$this->catmaxscore);
		$criteria->compare('subcatweightedscore',$this->subcatweightedscore,true);
		$criteria->compare('subcatmaxweight',$this->subcatmaxweight,true);
		$criteria->compare('lasteditedby',$this->lasteditedby);
		$criteria->compare('lasteditedon',$this->lasteditedon,true);
		$criteria->compare('createdby',$this->createdby);
		$criteria->compare('createdon',$this->createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}