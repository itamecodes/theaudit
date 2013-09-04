<?php

/**
 * This is the model class for table "auditmaster".
 *
 * The followings are the available columns in table 'auditmaster':
 * @property integer $auditid
 * @property integer $analystid
 * @property integer $institutionid
 * @property integer $countryid
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property string $status
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Usermaster $analyst
 * @property Usermaster $lasteditedby0
 * @property Usermaster $createdby0
 * @property Institutionmaster $institution
 * @property Countrymaster $country
 * @property Auditscoresheet[] $auditscoresheets
 * @property Resppriceaudit[] $resppriceaudits
 */
class Auditmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Auditmaster the static model class
	 */
	public $legalstatus;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'auditmaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' legalstatus, institutionid, countryid', 'required'),
			array('analystid, institutionid, countryid, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('auditid, analystid, institutionid, countryid, createdby, createdon, lasteditedby, lasteditedon, status, isactive', 'safe', 'on'=>'search'),
		);
	}
	
	public function beforeSave(){		
		$userid=Yii::app()->user->getId();
		$currenttime=new CDbExpression('NOW()');
		if($this->isNewRecord){
			$this->createdby=$userid;
			$this->createdon=$currenttime;	
			$this->analystid=$userid;
			$this->status='O';
			$this->isactive=1;						
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
			'analyst' => array(self::BELONGS_TO, 'Usermaster', 'analystid'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'institution' => array(self::BELONGS_TO, 'Institutionmaster', 'institutionid'),
			'country' => array(self::BELONGS_TO, 'Countrymaster', 'countryid'),
			'auditscoresheets' => array(self::HAS_MANY, 'Auditscoresheet', 'auditid'),
			'resppriceaudits' => array(self::HAS_MANY, 'Resppriceaudit', 'auditid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'auditid' => 'Auditid',
			'analystid' => 'Analyst Name',
			'institutionid' => 'Institution Name',
			'countryid' => 'Country',
			'createdby' => 'Created By',
			'createdon' => 'Created On',
			'lasteditedby' => 'Last Edited By',
			'lasteditedon' => 'Last Edited On',
			'status' => 'Status',
			'isactive' => 'Activation Status',
			'legalstatus'=>'Legal Status',
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

		$criteria->compare('auditid',$this->auditid);
		$criteria->compare('analystid',$this->analystid);
		$criteria->compare('institutionid',$this->institutionid);
		$criteria->compare('countryid',$this->countryid);
		$criteria->compare('createdby',$this->createdby);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('lasteditedby',$this->lasteditedby);
		$criteria->compare('lasteditedon',$this->lasteditedon,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('isactive',$this->isactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function recentauditsearch()
	{
		$criteria=new CDbCriteria;
		$criteria->order='createdon desc';
		return new CActiveDataProvider($this, array('criteria'=>$criteria,));
	}
}