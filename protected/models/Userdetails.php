<?php

/**
 * This is the model class for table "userdetails".
 *
 * The followings are the available columns in table 'userdetails':
 * @property integer $userdetailsid
 * @property integer $userid
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phoneno
 * @property string $mobileno
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Usermaster $lasteditedby0
 * @property Usermaster $user
 * @property Usermaster $createdby0
 */
class Userdetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Userdetails the static model class
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
		return 'userdetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, firstname, lastname, email, phoneno, mobileno, createdon, lasteditedon, isactive', 'required'),
			array('userid, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('firstname, lastname, email', 'length', 'max'=>100),
			array('phoneno, mobileno', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userdetailsid, userid, firstname, lastname, email, phoneno, mobileno, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
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
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'user' => array(self::BELONGS_TO, 'Usermaster', 'userid'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userdetailsid' => 'Userdetailsid',
			'userid' => 'User Name',
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'email' => 'Email',
			'phoneno' => 'Phone No',
			'mobileno' => 'Mobile No',
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

		$criteria->compare('userdetailsid',$this->userdetailsid);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phoneno',$this->phoneno,true);
		$criteria->compare('mobileno',$this->mobileno,true);
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