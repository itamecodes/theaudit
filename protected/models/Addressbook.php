<?php

/**
 * This is the model class for table "addressbook".
 *
 * The followings are the available columns in table 'addressbook':
 * @property integer $addressid
 * @property integer $titletxtid
 * @property integer $contactpersonnametxtid
 * @property integer $addresstxtid
 * @property integer $countryid
 * @property string $contactnumber
 * @property integer $institutionid
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Institutionmaster $institution
 * @property Usermaster $createdby0
 * @property Usermaster $lasteditedby0
 * @property Countrymaster $country
 * @property Textmaster $titletxt
 * @property Textmaster $contactpersonnametxt
 * @property Textmaster $addresstxt
 */
class Addressbook extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Addressbook the static model class
	 */
	public $text_title;
	public $text_contactpersonname;
	public $text_address;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'addressbook';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text_title, text_contactpersonname, text_address, countryid, contactnumber, institutionid, isactive', 'required'),
			array('titletxtid, contactpersonnametxtid, addresstxtid, countryid, institutionid, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('contactnumber', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('addressid, titletxtid, contactpersonnametxtid, addresstxtid, countryid, contactnumber, institutionid, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
		);
	}
	
	public function beforeSave(){
		$userid=Yii::app()->user->getId();
		$currenttime=new CDbExpression('NOW()');
		if ($this->isNewRecord){
			$this->createdon=$currenttime;
			$this->createdby=$userid;
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
			'institution' => array(self::BELONGS_TO, 'Institutionmaster', 'institutionid'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'country' => array(self::BELONGS_TO, 'Countrymaster', 'countryid'),
			'titletxt' => array(self::BELONGS_TO, 'Textmaster', 'titletxtid'),
			'contactpersonnametxt' => array(self::BELONGS_TO, 'Textmaster', 'contactpersonnametxtid'),
			'addresstxt' => array(self::BELONGS_TO, 'Textmaster', 'addresstxtid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'addressid' => 'Address',
			'titletxtid' => 'Address Title',
			'contactpersonnametxtid' => 'Contact Name',
			'addresstxtid' => 'Address',
			'countryid' => 'Country Name',
			'contactnumber' => 'Contact Number',
			'institutionid' => 'Institution Name',
			'createdby' => 'Created By',
			'createdon' => 'Created On',
			'lasteditedby' => 'Last Edited By',
			'lasteditedon' => 'Last Edited On',
			'isactive' => 'Activation Status',
			'text_title'=>'Address Title',
			'text_contactpersonname'=>'Contact Name',
			'text_address'=>'Address',
			
			
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

		$criteria->compare('addressid',$this->addressid);
		$criteria->compare('titletxtid',$this->titletxtid);
		$criteria->compare('contactpersonnametxtid',$this->contactpersonnametxtid);
		$criteria->compare('addresstxtid',$this->addresstxtid);
		$criteria->compare('countryid',$this->countryid);
		$criteria->compare('contactnumber',$this->contactnumber,true);
		$criteria->addCondition("institutionid='$this->institutionid'");
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