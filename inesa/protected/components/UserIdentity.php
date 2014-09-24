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
	/*public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}*/

	public function authenticate()
	{
		$acceso=Acceso::model()->find("usuario=?", array(strtolower($this->username)));
		$userAdm=Empresaadmin::model()->find("user=?", array(strtolower($this->username)));

 		if(isset($acceso))
 		{
 			if($acceso===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			elseif($this->password!==$acceso->password)
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else
			{
				$this->setState('id', $acceso->personas->id);
				$this->setState('usr', $acceso->usuario);
				$this->setState('id_persona', $acceso->personas_id);
				$this->setState('nivel_acceso', $acceso->nivelacceso->acceso);
				$this->errorCode=self::ERROR_NONE;
			}
 		}
 		else
 		{
 			if($userAdm===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			elseif($this->password!==$userAdm->pass)
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else
			{
				$this->setState('admin', $userAdm->id); //
				$this->setState('persona', $userAdm->user);
				$this->errorCode=self::ERROR_NONE;
			}
 		}
		return !$this->errorCode;
	}
}