<?php

/**
 * This is the model class for table "klijent".
 *
 * The followings are the available columns in table 'klijent':
 * @property integer $id
 * @property string $naziv
 * @property string $adresa
 * @property string $OIB
 * @property string $kontakt_osoba
 * @property string $telefon
 * @property string $mobitel
 * @property string $ostalo
 * @property integer $korisnici_id
 *
 * The followings are the available model relations:
 * @property Anketa[] $anketas
 * @property Korisnici $korisnici
 */
class Klijent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Klijent the static model class
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
		return 'klijent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naziv, adresa, OIB, kontakt_osoba, telefon, mobitel, ostalo', 'required'),
			array('korisnici_id', 'numerical', 'integerOnly'=>true),
			array('naziv, adresa', 'length', 'max'=>60),
			array('OIB', 'length', 'max'=>11),
			array('kontakt_osoba', 'length', 'max'=>70),
			array('telefon', 'length', 'max'=>30),
			array('mobitel', 'length', 'max'=>40),
                        array('OIB', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, naziv, adresa, OIB, kontakt_osoba, telefon, mobitel, ostalo, korisnici_id', 'safe', 'on'=>'search'),
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
			'anketas' => array(self::HAS_MANY, 'Anketa', 'klijent_id'),
			'korisnici' => array(self::BELONGS_TO, 'Korisnici', 'korisnici_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Oznaka',
			'naziv' => 'Naziv',
			'adresa' => 'Adresa',
			'OIB' => 'OIB',
			'kontakt_osoba' => 'Osoba za kontakt',
			'telefon' => 'Telefon',
			'mobitel' => 'Mobitel',
			'ostalo' => 'Ostalo',
			'korisnici_id' => 'Korisnici',
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
		$criteria->compare('adresa',$this->adresa,true);
		$criteria->compare('OIB',$this->OIB,true);
		$criteria->compare('kontakt_osoba',$this->kontakt_osoba,true);
		$criteria->compare('telefon',$this->telefon,true);
		$criteria->compare('mobitel',$this->mobitel,true);
		$criteria->compare('ostalo',$this->ostalo,true);
		$criteria->compare('korisnici_id',$this->korisnici_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}