<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Logout
 *	@author Mufid Jamaluddin
 **/
class Logout extends MY_Controller 
{
	/**
	 *	Konstruktor
	 **/
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	/**
	 *	Halaman Admin
	 **/
	public function logout()
	{
		if($this->isLogin())
		{ 
			$this->session->unset_userdata(['is_login', 'username']);
			redirect('/login');
		}
		else
			show_404();
	}

}