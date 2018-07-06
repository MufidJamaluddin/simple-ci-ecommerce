<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Login kepada Aplikasi
 *	@author Mufid Jamaluddin
 **/
class Login extends MY_Controller 
{
	/**
	 *	Load Model di konstruktor
	 **/
	function __construct()
	{
		parent::__construct();
		
		if($this->isLogin()) redirect('/admin/dashboard');
		
		$this->load->model('form1/users', 'm_users', TRUE);
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	/**
	 *	Halaman Login Awal
	 **/
	public function index()
	{
		$this->loadView('login/login', ['message' => '']);
	}

	/**
	 * 	Validasi Form
	 **/
	private function form_validate()
	{
		$config = [
					[
						'field' => 'username',
						'label' => 'Username',
						'rules' => 'required',
						'errors' => ['required' => '%s harus diisi']
					],
					[
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required',
						'errors' => ['required' => '%s harus diisi']
					]
				];
	
		$this->form_validation->set_rules($config);
		
		return $this->form_validation->run();
	}

	/**
	 *	Halaman Aksi Login
	 **/
	public function action()
	{
		if ($this->form_validate())
        {
			$this->m_users->username = $this->input->post('username', TRUE);
			$this->m_users->password = $this->input->post('password', TRUE);
	
			if($result = $this->m_users->findOne())
			{
				$this->session->username = $result->username;
				$this->session->is_login = true;
				
				redirect('/admin/dashboard');
			}
			else
			{
				$this->loadView('login/login', ['message' => 'Username atau Password Salah']);
			}
		}
        else
        {
			$this->loadView('login/login', ['message' => validation_errors()]);
		}
	}
}