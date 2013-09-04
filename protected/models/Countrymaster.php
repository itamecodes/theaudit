<?php

/**
 * This is the model class for table "countrymaster".
 *
 * The followings are the available columns in table 'countrymaster':
 * @property integer $countryid
 * @property string $countryname
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Addressbook[] $addressbooks
 * @property Auditmaster[] $auditmasters
 */
class Countrymaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Countrymaster the static model class
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
		return 'countrymaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('countryname, createdby, createdon, lasteditedby, lasteditedon', 'required'),
			array('createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('countryname', 'length', 'max'=>75),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('countryid, countryname, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
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
			'addressbooks' => array(self::HAS_MANY, 'Addressbook', 'countryid'),
			'auditmasters' => array(self::HAS_MANY, 'Auditmaster', 'countryid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'countryid' => 'Country',
			'countryname' => 'Country Name',
			'createdby' => 'Created By',
			'createdon' => 'Created On',
			'lasteditedby' => 'Last Edited By',
			'lasteditedon' => 'Last Edited On',
			'isactive' => 'Activation Status',
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

		$criteria->compare('countryid',$this->countryid);
		$criteria->compare('countryname',$this->countryname,true);
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