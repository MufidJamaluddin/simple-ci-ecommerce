<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Admin Konfirmasi
 *	@author Mufid Jamaluddin
 **/
class Validasi extends MY_Controller 
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
	 *	Mendapatkan List Validasi
	 **/
	private function getListValidasi()
	{
		$this->load->model('db_cart/penjualan', 'm_penjualan', TRUE);
		return $this->m_penjualan->getAll();
	}
	
	/**
	 *	Melakukan Validasi Pembayaran
	 **/
	public function valid()
	{
		$this->db->set('status', true)->where('nopjl', $this->input->post('nopjl', TRUE))->update('pembayaran');
		redirect('/admin/validasi');
	}
	
	/**
	 *	Halaman Admin
	 **/
	public function index()
	{
		$this->loadView('admin/list_validasi', ['listbrg' => $this->getListValidasi()->result() ]);
	}

}