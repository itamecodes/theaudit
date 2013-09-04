<?php

/**
 * This is the model class for table "pricingtable".
 *
 * The followings are the available columns in table 'pricingtable':
 * @property string $pricingid
 * @property integer $institutionid
 * @property double $avglob
 * @property double $loanportfolio
 * @property double $grossportfolio
 * @property double $par30
 * @property double $writeoff
 * @property string $date
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
 */
class Pricingtable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pricingtable the static model class
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
		return 'pricingtable';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('institutionid, avglob, loanportfolio, grossportfolio, date, createdby, createdon, lasteditedby, lasteditedon, isactive', 'required'),
			array('institutionid, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('avglob, loanportfolio, grossportfolio, par30, writeoff', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pricingid, institutionid, avglob, loanportfolio, grossportfolio, par30, writeoff, date, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
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
			'institution' => array(self::BELONGS_TO, 'Institutionmaster', 'institutionid'),
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
			'pricingid' => 'Pricingid',
			'institutionid' => 'Institutionid',
			'avglob' => 'Avglob',
			'loanportfolio' => 'Loanportfolio',
			'grossportfolio' => 'Grossportfolio',
			'par30' => 'Par30',
			'writeoff' => 'Writeoff',
			'date' => 'Date',
			'createdby' => 'Createdby',
			'createdon' => 'Createdon',
			'lasteditedby' => 'Lasteditedby',
			'lasteditedon' => 'Lasteditedon',
			'isactive' => 'Isactive',
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

		$criteria->compare('pricingid',$this->pricingid,true);
		$criteria->compare('institutionid',$this->institutionid);
		$criteria->compare('avglob',$this->avglob);
		$criteria->compare('loanportfolio',$this->loanportfolio);
		$criteria->compare('grossportfolio',$this->grossportfolio);
		$criteria->compare('par30',$this->par30);
		$criteria->compare('writeoff',$this->writeoff);
		$criteria->compare('date',$this->date,true);
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