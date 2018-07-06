<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Admin Dashboard
 *	@author Mufid Jamaluddin
 **/
class Barang extends MY_Controller 
{
	/**
	 *	Konstruktor
	 *	Jika Belum Login, Maka Redirect ke Page Login
	 **/
	function __construct()
	{
		parent::__construct();
		
		if(!$this->isLogin()) redirect('/login');
	}
	
	/**
	 *	Halaman Admin
	 **/
	public function index()
	{
		$this->loadView('admin/admin_home', ['username' => $this->session->userdata('username') ]);
	}

}