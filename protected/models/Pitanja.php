<?php

/**
 * This is the model class for table "pitanja".
 *
 * The followings are the available columns in table 'pitanja':
 * @property integer $id
 * @property string $naziv
 * @property integer $tip
 * @property integer $anketa_id
 *
 * The followings are the available model relations:
 * @property Odgovori[] $odgovoris
 * @property Anketa $anketa
 */
class Pitanja extends CActiveRecord
{
        const TYPE_SIMPLE = 0;
        const TYPE_COMPLEX = 1;
        const TYPE_RADIO = 2;
        const TYPE_CHECK = 3;
        const TYPE_LIST = 4;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pitanja the static model class
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
		return 'pitanja';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naziv, tip, anketa_id', 'required'),
			array('tip, anketa_id', 'numerical', 'integerOnly'=>true),
			array('naziv', 'length', 'max'=>200),                       
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, naziv, tip, anketa_id', 'safe', 'on'=>'search'),
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
			'odgovoris' => array(self::HAS_MANY, 'Odgovori', 'pitanja_id'),
			'anketa' => array(self::BELONGS_TO, 'Anketa', 'anketa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'naziv' => 'Naziv',
			'tip' => 'Tip',
			'anketa_id' => 'Anketa',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('naziv',$this->naziv,true);
		$criteria->compare('tip',$this->tip);
		$criteria->compare('anketa_id',$this->anketa_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getTypes() {
            return array(
                self::TYPE_SIMPLE=>'Jednostavni unos',
                self::TYPE_COMPLEX=>'Složeni unos',
                self::TYPE_RADIO=>'Jednostruki odabir',
                self::TYPE_CHECK=>'Višestruki odabir',
                self::TYPE_LIST=>'Odabir iz liste',
            );
        }
}