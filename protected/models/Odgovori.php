<?php

/**
 * This is the model class for table "odgovori".
 *
 * The followings are the available columns in table 'odgovori':
 * @property integer $id
 * @property string $naziv
 * @property integer $pitanja_id
 *
 * The followings are the available model relations:
 * @property Pitanja $pitanja
 * @property Korisnik[] $korisniks
 */
class Odgovori extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Odgovori the static model class
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
		return 'odgovori';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naziv, pitanja_id', 'required'),
			array('pitanja_id', 'numerical', 'integerOnly'=>true),
			array('naziv', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, naziv, pitanja_id', 'safe', 'on'=>'search'),
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
			'pitanja' => array(self::BELONGS_TO, 'Pitanja', 'pitanja_id'),
			'korisniks' => array(self::MANY_MANY, 'Korisnik', 'odgovori_korisnik(odgovor_id, korisnik_id)'),
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
			'pitanja_id' => 'Pitanja',
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
		$criteria->compare('pitanja_id',$this->pitanja_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}