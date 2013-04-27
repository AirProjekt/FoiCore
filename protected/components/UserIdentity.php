<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
            
            $autentifikacija = Yii::app()->db->createCommand()
                    ->select('korisnik.id, ime, email, lozinka')
                    ->from('korisnici, korisnik')
                    ->where('email=:email', array(':email'=>$email))
                    ->andWhere('lozinka=:lozinka AND 
                        korisnik.korisnici_id=korisnici.id', 
                        array(':lozinka'=>$lozinka))
                    ->queryRow();
       
            
            Yii::app()->session['imeKorisnika'] = $autentifikacija['ime'];
            Yii::app()->session['idKorisnika'] = $autentifikacija['id'];
            
            if($autentifikacija===false)
            {
                return false;
            }
            
            $this->errorCode = self::ERROR_NONE;
            
            return !$this->errorCode;
	}
}