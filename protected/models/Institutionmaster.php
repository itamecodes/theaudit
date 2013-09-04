<?php

/**
 * This is the model class for table "institutionmaster".
 *
 * The followings are the available columns in table 'institutionmaster':
 * @property integer $institutionid
 * @property integer $institutionnametxtid
 * @property integer $legalstatusid
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Addressbook[] $addressbooks
 * @property Auditmaster[] $auditmasters
 * @property Legalstatusmaster $legalstatus
 * @property Usermaster $lasteditedby0
 * @property Usermaster $createdby0
 * @property Textmaster $institutionnametxt
 */
class Institutionmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Institutionmaster the static model class
	 */
	public $text_institutename;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'institutionmaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text_institutename, legalstatusid, isactive', 'required'),
			array('institutionnametxtid, legalstatusid, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('institutionid, institutionnametxtid, legalstatusid, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
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
			'addressbooks' => array(self::HAS_MANY, 'Addressbook', 'institutionid'),
			'auditmasters' => array(self::HAS_MANY, 'Auditmaster', 'institutionid'),
			'legalstatus' => array(self::BELONGS_TO, 'Legalstatusmaster', 'legalstatusid'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'institutionnametxt' => array(self::BELONGS_TO, 'Textmaster', 'institutionnametxtid'),
			'pricingtables' => array(self::HAS_MANY, 'Pricingtable', 'institutionid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'institutionid' => 'Institution',
			'institutionnametxtid' => 'Institution Name',
			'legalstatusid' => 'Legal Status',
			'createdby' => 'Created By',
			'createdon' => 'Created On',
			'lasteditedby' => 'Last Edited By',
			'lasteditedon' => 'Last Edited On',
			'isactive' => 'Activation Status',
			'text_institutename'=>'Institute Name',
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

		$criteria->compare('institutionid',$this->institutionid);
		$criteria->compare('institutionnametxtid',$this->institutionnametxtid);
		$criteria->compare('legalstatusid',$this->legalstatusid);
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