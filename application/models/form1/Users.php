<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Model Users
 *	@author Mufid Jamaluddin
 **/
class Users extends MY_Model 
{
	/**
	 *	Melakukan Hash Password SHA 1 sebelum pencarian
	 **/
	function findOne()
	{
		if(isset($this->password)) $this->password = sha1($this->password);
		return parent::findOne();
	}

}