<?php

/**
 * This is the model class for table "cppquestionmaster".
 *
 * The followings are the available columns in table 'cppquestionmaster':
 * @property integer $cppqid
 * @property integer $cppquestiontxtid
 * @property integer $cppdecriptiontxtid
 * @property integer $cppcatid
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Cppanswermaster[] $cppanswermasters
 * @property Cppanswerscoresheet[] $cppanswerscoresheets
 * @property Cppcategorymaster $cppcat
 * @property Usermaster $lasteditedby0
 * @property Usermaster $createdby0
 * @property Textmaster $cppquestiontxt
 * @property Textmaster $cppdecriptiontxt
 */
class Cppquestionmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cppquestionmaster the static model class
	 */
     public $questiontext;
     public $questiondesc;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cppquestionmaster';
	}
     

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('questiontext,questiondesc,cppcatid', 'required'),
			array('cppquestiontxtid, cppdecriptiontxtid, cppcatid, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cppqid, cppquestiontxtid, cppdecriptiontxtid, cppcatid, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
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
			'cppanswermasters' => array(self::HAS_MANY, 'Cppanswermaster', 'cppquestionid'),
			'cppanswerscoresheets' => array(self::HAS_MANY, 'Cppanswerscoresheet', 'cppquestid'),
			'cppcat' => array(self::BELONGS_TO, 'Cppcategorymaster', 'cppcatid'),
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'cppquestiontxt' => array(self::BELONGS_TO, 'Textmaster', 'cppquestiontxtid'),
			'cppdecriptiontxt' => array(self::BELONGS_TO, 'Textmaster', 'cppdecriptiontxtid'),
		);
	}


public function beforeSave(){
        
        $this->createdby=1;
        $this->lasteditedby=1;
        $this->createdon=new CDbExpression('NOW()');
        $this->lasteditedon=new CDbExpression('NOW()');
        $this->isactive=1;
        return parent::beforeSave();
    }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cppqid' => 'Cppqid',
			'cppquestiontxtid' => 'Cpp Question',
			'cppdecriptiontxtid' => 'Cpp Question Decription',
			'cppcatid' => 'Cpp Category',
			'createdby' => 'Createdby',
			'createdon' => 'Createdon',
			'lasteditedby' => 'Lasteditedby',
			'lasteditedon' => 'Lasteditedon',
			'isactive' => 'Isactive',
            'questiontext'=>'Question Text',
            'questiondesc'=>'Question Description'
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

		$criteria->compare('cppqid',$this->cppqid);
		$criteria->compare('cppquestiontxtid',$this->cppquestiontxtid);
		$criteria->compare('cppdecriptiontxtid',$this->cppdecriptiontxtid);
		$criteria->compare('cppcatid',$this->cppcatid);
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