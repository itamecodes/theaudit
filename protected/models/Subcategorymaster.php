<?php

/**
 * This is the model class for table "subcategorymaster".
 *
 * The followings are the available columns in table 'subcategorymaster':
 * @property integer $subcatid
 * @property integer $subcategorynametxtid
 * @property double $subcategoryweight
 * @property integer $subcategoryscore
 * @property integer $catid
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Auditscoresheet[] $auditscoresheets
 * @property Questionmaster[] $questionmasters
 * @property Usermaster $lasteditedby0
 * @property Usermaster $createdby0
 * @property Textmaster $subcategorynametxt
 * @property Categorymaster $cat
 */
class Subcategorymaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subcategorymaster the static model class
	 */
	public $text_subcategory;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subcategorymaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text_subcategory, subcategoryweight, subcategoryscore, catid, isactive', 'required'),
			array('subcategorynametxtid,  catid, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('subcategoryweight,subcategoryscore', 'numerical'),
			array('subcategorynametxtid','unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('subcatid, subcategorynametxtid, subcategoryweight, subcategoryscore, catid, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
		);
	}
	public function beforeSave(){
		$userid=Yii::app()->user->getId();
		$currenttime=new CDbExpression('NOW()');
		if($this->isNewRecord){
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
			'auditscoresheets' => array(self::HAS_MANY, 'Auditscoresheet', 'subcatid'),
			'questionmasters' => array(self::HAS_MANY, 'Questionmaster', 'subcatid'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'subcategorynametxt' => array(self::BELONGS_TO, 'Textmaster', 'subcategorynametxtid'),
			'cat' => array(self::BELONGS_TO, 'Categorymaster', 'catid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subcatid' => 'Sub Category',
			'subcategorynametxtid' => 'Sub-Category Name',
			'subcategoryweight' => 'Sub-Category Weight',
			'subcategoryscore' => 'Sub-Category Score',
			'catid' => 'Dimension Name',
			'createdby' => 'Created By',
			'createdon' => 'Created On',
			'lasteditedby' => 'Last Edited By',
			'lasteditedon' => 'Last Edited On',
			'isactive' => 'Activation Status',
			'text_subcategory'=>'Subcategory Name'
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

		$criteria->compare('subcatid',$this->subcatid);
		$criteria->compare('subcategorynametxtid',$this->subcategorynametxtid);
		$criteria->compare('subcategoryweight',$this->subcategoryweight);
		$criteria->compare('subcategoryscore',$this->subcategoryscore);
		if($this->catid!='')
		$criteria->addCondition("catid='$this->catid'");
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