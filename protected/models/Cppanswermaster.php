<?php

/**
 * This is the model class for table "cppanswermaster".
 *
 * The followings are the available columns in table 'cppanswermaster':
 * @property integer $cppanswerid
 * @property integer $cppanswertxtid
 * @property integer $cppquestionid
 * @property integer $createdby
 * @property string $createdon
 * @property integer $lasteditedby
 * @property string $lasteditedon
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Cppquestionmaster $cppquestion
 * @property Usermaster $lasteditedby0
 * @property Usermaster $createdby0
 * @property Textmaster $cppanswertxt
 * @property Cppanswerscoresheet[] $cppanswerscoresheets
 */
class Cppanswermaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cppanswermaster the static model class
	 */
     public $cppanswer;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cppanswermaster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cppanswer, score', 'required'),
			array('score','unique'),
			array('cppanswertxtid, score, createdby, lasteditedby, isactive', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cppanswerid, cppanswertxtid, score, createdby, createdon, lasteditedby, lasteditedon, isactive', 'safe', 'on'=>'search'),
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
			'createdby0' => array(self::BELONGS_TO, 'Usermaster', 'createdby'),
			'cppanswertxt' => array(self::BELONGS_TO, 'Textmaster', 'cppanswertxtid'),
			'cppanswerscoresheets' => array(self::HAS_MANY, 'Cppanswerscoresheet', 'cppanswerid'),
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
			'cppanswerid' => 'Cppanswerid',
			'cppanswertxtid' => 'Cppanswertxtid',
			'score' => 'Score',
			'createdby' => 'Createdby',
			'createdon' => 'Createdon',
			'lasteditedby' => 'Lasteditedby',
			'lasteditedon' => 'Lasteditedon',
			'isactive' => 'Isactive',
            'cppanswer'=>'Cpp Answer'
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

		/*$criteria->compare('cppanswerid',$this->cppanswerid);
		$criteria->compare('cppanswertxtid',$this->cppanswertxtid);
		$criteria->compare('score',$this->score);
		$criteria->compare('createdby',$this->createdby);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('lasteditedby',$this->lasteditedby);
		$criteria->compare('lasteditedon',$this->lasteditedon,true);*/
		$criteria->compare('isactive',$this->isactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}