<?php

/**
 * This is the model class for table "usermaster".
 *
 * The followings are the available columns in table 'usermaster':
 * @property integer $userid
 * @property string $username
 * @property string $password
 * @property integer $usertype
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Addressbook[] $addressbooks
 * @property Addressbook[] $addressbooks1
 * @property Answermaster[] $answermasters
 * @property Answermaster[] $answermasters1
 * @property Auditmaster[] $auditmasters
 * @property Auditmaster[] $auditmasters1
 * @property Auditmaster[] $auditmasters2
 * @property Auditscoresheet[] $auditscoresheets
 * @property Auditscoresheet[] $auditscoresheets1
 * @property Categorymaster[] $categorymasters
 * @property Categorymaster[] $categorymasters1
 * @property Cppanswermaster[] $cppanswermasters
 * @property Cppanswermaster[] $cppanswermasters1
 * @property Cppcategorymaster[] $cppcategorymasters
 * @property Cppcategorymaster[] $cppcategorymasters1
 * @property Cppquestionmaster[] $cppquestionmasters
 * @property Cppquestionmaster[] $cppquestionmasters1
 * @property Institutionmaster[] $institutionmasters
 * @property Institutionmaster[] $institutionmasters1
 * @property Pricingtable[] $pricingtables
 * @property Pricingtable[] $pricingtables1
 * @property Questionmaster[] $questionmasters
 * @property Questionmaster[] $questionmasters1
 * @property Subcategorymaster[] $subcategorymasters
 * @property Subcategorymaster[] $subcategorymasters1
 * @property Textmaster[] $textmasters
 * @property Textmaster[] $textmasters1
 * @property Usermaster $createdby0
 * @property Usermaster[] $usermasters
 * @property Usermaster $lasteditedby0
 * @property Usermaster[] $usermasters1
 */
class Usermaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usermaster the static model class
	 */
	public $confirmpassword;
	public $firstname, $lastname, $email, $phoneno, $mobileno;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usermaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password,confirmpassword,firstname, lastname, email, phoneno, mobileno, usertype, createdon, lasteditedon, isactive', 'required'),
			array('usertype, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>100),
			array('password', 'length', 'max'=>45),
			array('username','unique'),
			array('password','compare','compareAttribute'=>'confirmpassword'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userid, username, password, usertype, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
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
			'addressbooks' => array(self::HAS_MANY, 'Addressbook', 'createdby'),
			'addressbooks1' => array(self::HAS_MANY, 'Addressbook', 'lasteditedby'),
			'answermasters' => array(self::HAS_MANY, 'Answermaster', 'lasteditedby'),
			'answermasters1' => array(self::HAS_MANY, 'Answermaster', 'createdby'),
			'auditmasters' => array(self::HAS_MANY, 'Auditmaster', 'analystid'),
			'auditmasters1' => array(self::HAS_MANY, 'Auditmaster', 'lasteditedby'),
			'auditmasters2' => array(self::HAS_MANY, 'Auditmaster', 'createdby'),
			'auditscoresheets' => array(self::HAS_MANY, 'Auditscoresheet', 'createdby'),
			'auditscoresheets1' => array(self::HAS_MANY, 'Auditscoresheet', 'lasteditedby'),
			'categorymasters' => array(self::HAS_MANY, 'Categorymaster', 'createdby'),
			'categorymasters1' => array(self::HAS_MANY, 'Categorymaster', 'lasteditedby'),
			'cppanswermasters' => array(self::HAS_MANY, 'Cppanswermaster', 'lasteditedby'),
			'cppanswermasters1' => array(self::HAS_MANY, 'Cppanswermaster', 'createdby'),
			'cppcategorymasters' => array(self::HAS_MANY, 'Cppcategorymaster', 'lasteditedby'),
			'cppcategorymasters1' => array(self::HAS_MANY, 'Cppcategorymaster', 'createdby'),
			'cppquestionmasters' => array(self::HAS_MANY, 'Cppquestionmaster', 'lasteditedby'),
			'cppquestionmasters1' => array(self::HAS_MANY, 'Cppquestionmaster', 'createdby'),
			'institutionmasters' => array(self::HAS_MANY, 'Institutionmaster', 'lasteditedby'),
			'institutionmasters1' => array(self::HAS_MANY, 'Institutionmaster', 'createdby'),
			'legalstatusmasters' => array(self::HAS_MANY, 'Legalstatusmaster', 'createdby'),
			'legalstatusmasters1' => array(self::HAS_MANY, 'Legalstatusmaster', 'lasteditedby'),		
			'pricingtables' => array(self::HAS_MANY, 'Pricingtable', 'createdby'),
			'pricingtables1' => array(self::HAS_MANY, 'Pricingtable', 'lasteditedby'),
			'questionmasters' => array(self::HAS_MANY, 'Questionmaster', 'lasteditedby'),
			'questionmasters1' => array(self::HAS_MANY, 'Questionmaster', 'createdby'),
			'subcategorymasters' => array(self::HAS_MANY, 'Subcategorymaster', 'lasteditedby'),
			'subcategorymasters1' => array(self::HAS_MANY, 'Subcategorymaster', 'createdby'),
			'textmasters' => array(self::HAS_MANY, 'Textmaster', 'createdby'),
			'textmasters1' => array(self::HAS_MANY, 'Textmaster', 'lasteeditedby'),
			'userdetails' => array(self::HAS_MANY, 'Userdetails', 'lasteditedby'),
			'userdetails1' => array(self::HAS_MANY, 'Userdetails', 'userid'),
			'userdetails2' => array(self::HAS_MANY, 'Userdetails', 'createdby'),		
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'usermasters' => array(self::HAS_MANY, 'Usermaster', 'createdby'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'usermasters1' => array(self::HAS_MANY, 'Usermaster', 'lasteditedby'),
		);
	}
	public function beforeSave(){
		$userid=Yii::app()->user->getId();
		$currenttime=new CDbExpression('NOW()');
		if($this->isNewRecord){
			$model->createdon=$currenttime;
			$model->createdby=$userid;
		}
		$this->lasteditedon=$currenttime;		
		$this->lasteditedby=$userid;
		return parent::beforeSave();			
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'Userid',
			'username' => 'Username',
			'password' => 'Password',
			'usertype' => 'User Type',
			'createdby' => 'Created By',
			'createdon' => 'Created On',
			'lasteditedby' => 'Last Edited By',
			'lasteditedon' => 'Last Edited On',
			'isactive' => 'Activation Status',
			'confirmpassword'=>'Confirm Password',
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

		$criteria->compare('userid',$this->userid);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('usertype',$this->usertype);
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