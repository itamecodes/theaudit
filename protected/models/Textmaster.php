<?php

/**
 * This is the model class for table "Textmaster".
 *
 * The followings are the available columns in table 'Textmaster':
 * @property integer $textid
 * @property string $text
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Addressbook[] $addressbooks
 * @property Addressbook[] $addressbooks1
 * @property Addressbook[] $addressbooks2
 * @property Answermaster[] $answermasters
 * @property Categorymaster[] $categorymasters
 * @property Cppanswermaster[] $cppanswermasters
 * @property Cppcategorymaster[] $cppcategorymasters
 * @property Cppcategorymaster[] $cppcategorymasters1
 * @property Cppquestionmaster[] $cppquestionmasters
 * @property Cppquestionmaster[] $cppquestionmasters1
 * @property Institutionmaster[] $institutionmasters
 * @property Questionmaster[] $questionmasters
 * @property Subcategorymaster[] $subcategorymasters
 * @property Usermaster $lasteditedby0
 * @property Usermaster $createdby0
 */
class Textmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Textmaster the static model class
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
		return 'Textmaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text', 'required'),
			array('createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			array('text','filter','filter'=>'trim'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('textid, text, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
		);
	}

	public  function beforeSave(){		
		$userid=Yii::app()->user->getId();
		$currenttime=new CDbExpression('NOW()');
		
        $this->createdby=$userid;
        $this->lasteditedby=$userid;
        $this->createdon=$currenttime;
        $this->lasteditedon=$currenttime;
        $this->isactive=1;
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
			'addressbooks' => array(self::HAS_MANY, 'Addressbook', 'titletxtid'),
			'addressbooks1' => array(self::HAS_MANY, 'Addressbook', 'contactpersonnametxtid'),
			'addressbooks2' => array(self::HAS_MANY, 'Addressbook', 'addresstxtid'),
			'answermasters' => array(self::HAS_MANY, 'Answermaster', 'answertxtid'),
			'categorymasters' => array(self::HAS_MANY, 'Categorymaster', 'categorynametxtid'),
			'cppanswermasters' => array(self::HAS_MANY, 'Cppanswermaster', 'cppanswertxtid'),
			'cppcategorymasters' => array(self::HAS_MANY, 'Cppcategorymaster', 'ccpcatnametxtid'),
			'cppcategorymasters1' => array(self::HAS_MANY, 'Cppcategorymaster', 'cppcatdesctxtid'),
			'cppquestionmasters' => array(self::HAS_MANY, 'Cppquestionmaster', 'cppquestiontxtid'),
			'cppquestionmasters1' => array(self::HAS_MANY, 'Cppquestionmaster', 'cppdecriptiontxtid'),
			'institutionmasters' => array(self::HAS_MANY, 'Institutionmaster', 'institutionnametxtid'),
			'questionmasters' => array(self::HAS_MANY, 'Questionmaster', 'questiontxtid'),
			'subcategorymasters' => array(self::HAS_MANY, 'Subcategorymaster', 'subcategorynametxtid'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'textid' => 'Textid',
			'text' => 'Text',
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

		$criteria->compare('textid',$this->textid);
		$criteria->compare('text',$this->text,true);
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