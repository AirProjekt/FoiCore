<?php

/**
 * This is the model class for table "korisnici".
 *
 * The followings are the available columns in table 'korisnici':
 * @property integer $id
 * @property string $email
 * @property string $lozinka
 *
 * The followings are the available model relations:
 * @property Klijent[] $klijents
 * @property Korisnik[] $korisniks
 */
class Korisnici extends CActiveRecord
{
        public $lozinka_repeat;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Korisnici the static model class
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
		return 'korisnici';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, lozinka, lozinka_repeat', 'required'),
			array('email', 'length', 'max'=>50),
			array('lozinka', 'length', 'max'=>100),
                        array('lozinka', 'compare'),
                        array('lozinka_repeat', 'safe'),
                        array('email','email'),
                        array('email','unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, lozinka', 'safe', 'on'=>'search')
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
			'klijents' => array(self::HAS_MANY, 'Klijent', 'korisnici_id'),
			'korisniks' => array(self::HAS_MANY, 'Korisnik', 'korisnici_id'),                       
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Oznaka',
			'email' => 'Adresa elektroničke pošte',
			'lozinka' => 'Lozinka',
                        'lozinka_repeat'=>'Potvrda lozinke',
                        'email'=>'Adresa elektroničke pošte'
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('lozinka',$this->lozinka,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function afterSave() {
            $id = $this->id;
            $bizRule = 'return isset($params["korisnici"]) && '.$id.'==$params["korisnici"]->id;';
            $auth = Yii::app()->authManager;
            $auth->assign('korisnik', $id,$bizRule);
        }
        
        public function getRole(){
           return $this->auth->itemname;
        }
}