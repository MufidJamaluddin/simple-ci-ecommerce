<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 	Controller
 *
 *	@author Mufid Jamaluddin
 **/
abstract class MY_Controller extends CI_Controller
{
	/**
	 *	Mendapatkan Settingan View
	 **/
	protected function _getSettings()
	{
		return ['header_view' => 'template/v_template_menu',
				'footer_view' => 'template/v_template_footer'];
	}
	
	/**
	 *	Load view ke template
	 **/
	protected function loadView($content_view, $data = [])
	{
		$data['content_view'] = &$content_view;
		$this->load->view('template/v_template_frontend', array_merge($this->_getSettings(), $this->_getMenu(), $data));
	}
	
	/**
	 *	Mendapatkan Menu
	 **/
	protected function _getMenu()
	{
		if($this->isLogin())
		{
			$left_menu = [
				'admin/dashboard' => 'Dashboard',
				'admin/validasi' => 'Validasi Pembayaran'
			];
			$right_menu = ['logout/logout' => 'Logout'];
		}
		else
		{
			$left_menu = [];
			$right_menu = ['login' => 'Login'];
		}
				
		return ['left_menu' => &$left_menu, 'right_menu' => &$right_menu];
	}
	
	/**
	 *	Apakah telah login?
	 **/
	protected function isLogin()
	{
		return $this->session->userdata('is_login');
	}
}