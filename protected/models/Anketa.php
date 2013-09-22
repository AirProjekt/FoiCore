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
                        //array('datum','date'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
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
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Anketa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function beforeValidate() {
            if (empty($this->klijent_id) && empty($this->datum)) {
                $this->klijent_id = Yii::app()->session['klijent_id'];
                $this->datum = new CDbExpression('CURDATE()');
            }
            return parent::beforeValidate();
            
        }
}
