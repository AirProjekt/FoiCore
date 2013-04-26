<?php

/**
 * This is the model class for table "tema".
 *
 * The followings are the available columns in table 'tema':
 * @property integer $id
 * @property string $naziv
 * @property string $kratki_opis
 * @property string $dugi_opis
 *
 * The followings are the available model relations:
 * @property Anketa[] $anketas
 */
class Tema extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tema the static model class
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
		return 'tema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naziv, kratki_opis, dugi_opis', 'required'),
			array('naziv', 'length', 'max'=>40),
			array('kratki_opis', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, naziv, kratki_opis, dugi_opis', 'safe', 'on'=>'search'),
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
			'anketas' => array(self::HAS_MANY, 'Anketa', 'tema_id'),
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
			'kratki_opis' => 'Kratki Opis',
			'dugi_opis' => 'Dugi Opis',
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
		$criteria->compare('kratki_opis',$this->kratki_opis,true);
		$criteria->compare('dugi_opis',$this->dugi_opis,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}