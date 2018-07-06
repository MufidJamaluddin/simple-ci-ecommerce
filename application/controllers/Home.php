<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Page Home
 *	@author Mufid Jamaluddin
 **/
class Home extends MY_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('db_cart/barang', 'm_barang');
	}

	/**
	 *	Halaman Admin
	 **/
	public function index()
	{
		$this->loadView('home/page_home', ['listbrg' => $this->m_barang->find() ]);
	}

}