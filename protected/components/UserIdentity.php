<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
            
            $email = $this->username;
            $lozinka = $this->password;
            
            
            $autentifikacijaKorisnik = Yii::app()->db->createCommand()
                    ->select('korisnik.id, korisnik.korisnici_id, ime, email, lozinka')
                    ->from('korisnici, korisnik')
                    ->where('email=:email', array(':email'=>$email))
                    ->andWhere('lozinka=:lozinka AND 
                        korisnik.korisnici_id=korisnici.id', 
                        array(':lozinka'=>$lozinka))
                    ->queryRow();
            
            $autentifikacijaKlijent = Yii::app()->db->createCommand()
                    ->select('klijent.id, klijent.korisnici_id, naziv, email, lozinka')
                    ->from('korisnici, klijent')
                    ->where('email=:email', array(':email'=>$email))
                    ->andWhere('lozinka=:lozinka AND 
                        klijent.korisnici_id=korisnici.id', 
                        array(':lozinka'=>$lozinka))
                    ->queryRow();
       
            if($autentifikacijaKorisnik)
            {
                Yii::app()->session['imeKorisnika'] = $autentifikacijaKorisnik['ime'];
                //Yii::app()->session['idKorisnika'] = $autentifikacijaKorisnik['id'];
                Yii::app()->session['id'] = $autentifikacijaKorisnik['korisnici_id'];
                $this->_id = $autentifikacijaKorisnik['korisnici_id'];
            }
            else if($autentifikacijaKlijent)
            {
                Yii::app()->session['imeKorisnika'] = $autentifikacijaKlijent['naziv'];
                //Yii::app()->session['idKorisnika'] = $autentifikacijaKlijent['id'];
                Yii::app()->session['id'] = $autentifikacijaKlijent['korisnici_id'];
                Yii::app()->session['klijent_id'] = $autentifikacijaKlijent['id'];
                $this->_id = $autentifikacijaKlijent['korisnici_id'];
            }
            
            if(($autentifikacijaKlijent OR $autentifikacijaKorisnik)===false)
            {
                return false;
            }
            
            $this->errorCode = self::ERROR_NONE;
            
            return !$this->errorCode;
	}
        
        public function getId() {
            return $this->_id;
        }
}