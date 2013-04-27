<?php

/**
 * This is the model class for table "korisnik".
 *
 * The followings are the available columns in table 'korisnik':
 * @property integer $id
 * @property string $ime
 * @property string $prezime
 * @property string $telefon
 * @property string $kljucne_rijeci
 * @property integer $tel_ank
 * @property integer $obav_mail
 * @property integer $korisnici_id
 *
 * The followings are the available model relations:
 * @property Anketa[] $anketas
 * @property Korisnici $korisnici
 * @property Odgovori[] $odgovoris
 */
class Korisnik extends CActiveRecord
{
        
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Korisnik the static model class
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
		return 'korisnik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ime, prezime, telefon, kljucne_rijeci, tel_ank, obav_mail, korisnici_id', 'required'),
			array('tel_ank, obav_mail, korisnici_id', 'numerical', 'integerOnly'=>true),
			array('ime', 'length', 'max'=>30),
			array('prezime', 'length', 'max'=>40),
			array('telefon', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ime, prezime, telefon, kljucne_rijeci, tel_ank, obav_mail, korisnici_id', 'safe', 'on'=>'search'),
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
			'anketas' => array(self::MANY_MANY, 'Anketa', 'anketa_korisnik(korisnik_id, anketa_id)'),
			'korisnici' => array(self::BELONGS_TO, 'Korisnici', 'korisnici_id'),
			'odgovoris' => array(self::MANY_MANY, 'Odgovori', 'odgovori_korisnik(korisnik_id, odgovor_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ime' => 'Ime',
			'prezime' => 'Prezime',
			'telefon' => 'Telefon',
			'kljucne_rijeci' => 'Ključne riječi',
			'tel_ank' => 'Telefonsko anketiranje',
			'obav_mail' => 'Obavještavanje elektroničkom poštom',
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
		$criteria->compare('ime',$this->ime,true);
		$criteria->compare('prezime',$this->prezime,true);
		$criteria->compare('telefon',$this->telefon,true);
		$criteria->compare('kljucne_rijeci',$this->kljucne_rijeci,true);
		$criteria->compare('tel_ank',$this->tel_ank);
		$criteria->compare('obav_mail',$this->obav_mail);
		$criteria->compare('korisnici_id',$this->korisnici_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}