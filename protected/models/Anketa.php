<?php

/**
 * This is the model class for table "anketa".
 *
 * The followings are the available columns in table 'anketa':
 * @property integer $id
 * @property string $naziv
 * @property string $datum
 * @property integer $tema_id
 * @property integer $klijent_id
 *
 * The followings are the available model relations:
 * @property Tema $tema
 * @property Klijent $klijent
 * @property Korisnik[] $korisniks
 * @property Pitanja[] $pitanjas
 */
class Anketa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Anketa the static model class
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
		return 'anketa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naziv, datum, tema_id, klijent_id', 'required'),
			array('tema_id, klijent_id', 'numerical', 'integerOnly'=>true),
			array('naziv', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, naziv, datum, tema_id, klijent_id', 'safe', 'on'=>'search'),
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
			'tema' => array(self::BELONGS_TO, 'Tema', 'tema_id'),
			'klijent' => array(self::BELONGS_TO, 'Klijent', 'klijent_id'),
			'korisniks' => array(self::MANY_MANY, 'Korisnik', 'anketa_korisnik(anketa_id, korisnik_id)'),
			'pitanjas' => array(self::HAS_MANY, 'Pitanja', 'anketa_id'),
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
			'datum' => 'Datum',
			'tema_id' => 'Tema',
			'klijent_id' => 'Klijent',
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
		$criteria->compare('datum',$this->datum,true);
		$criteria->compare('tema_id',$this->tema_id);
		$criteria->compare('klijent_id',$this->klijent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getThemeNames() {
            $themesArray = CHtml::listData(Tema::model()->findAll(), 'id', 'naziv');
            return $themesArray;
        }
        
//        public function beforeSave() {
//            if($this->isNewRecord)
//                $this->datum = date( 'Y-m-d H:i:s', time() );//new CDbExpression('NOW()');
//        }
}