<?php

/**
 * This is the model class for table "cppcategorymaster".
 *
 * The followings are the available columns in table 'cppcategorymaster':
 * @property integer $cppcatid
 * @property integer $ccpcatnametxtid
 * @property integer $cppcatdesctxtid
 * @property integer $isactive
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 *
 * The followings are the available model relations:
 * @property Usermaster $lasteditedby0
 * @property Usermaster $createdby0
 * @property Textmaster $ccpcatnametxt
 * @property Textmaster $cppcatdesctxt
 * @property Cppquestionmaster[] $cppquestionmasters
 * @property Questionmaster[] $questionmasters
 */
class Cppcategorymaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cppcategorymaster the static model class
	 */
    public $categoryname;
    public $categorydesc;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cppcategorymaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoryname,categorydesc', 'required'),
			array('ccpcatnametxtid, cppcatdesctxtid, isactive, createdby, lasteditedby', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cppcatid, ccpcatnametxtid, cppcatdesctxtid, isactive, createdby, createdon, lasteditedby, lasteditedon', 'safe', 'on'=>'search'),
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
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'lasteditedby0' => array(self::BELONGS_TO, 'Usermaster', 'lasteditedby'),
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'ccpcatnametxt' => array(self::BELONGS_TO, 'Textmaster', 'ccpcatnametxtid'),
			'cppcatdesctxt' => array(self::BELONGS_TO, 'Textmaster', 'cppcatdesctxtid'),
			'cppquestionmasters' => array(self::HAS_MANY, 'Cppquestionmaster', 'cppcatid'),
			'questionmasters' => array(self::HAS_MANY, 'Questionmaster', 'cppcatid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cppcatid' => 'Id',
			'ccpcatnametxtid' => 'CPP Category Name',
			'cppcatdesctxtid' => 'CPP Description',
			'isactive' => 'Isactive',
			'createdby' => 'Created by',
			'createdon' => 'Created on',
			'lasteditedby' => 'Lastedited by',
			'lasteditedon' => 'Lastedited on',
            'categoryname'=>"Category Name",
            'categorydesc'=>"Category Description"
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

		$criteria->compare('cppcatid',$this->cppcatid);
		$criteria->compare('ccpcatnametxtid',$this->ccpcatnametxtid);
		$criteria->compare('cppcatdesctxtid',$this->cppcatdesctxtid);
		$criteria->compare('isactive',$this->isactive);
		$criteria->compare('createdby',$this->createdby);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('lasteditedby',$this->lasteditedby);
		$criteria->compare('lasteditedon',$this->lasteditedon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}