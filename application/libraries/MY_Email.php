<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 *	Model untuk Kirim Email
	 *	@author Mufid Jamaluddin
	 **/
	class MY_Email extends CI_Email
	{
		/**
		 * Apakah telah diinisiasi?
		 **/
		private $__isInit;
		
		/**
		 *	Konfigurasi
		 **/
		protected function getConfig()
		{
			return [
				'protocol' => 'SMTP',
				'smtp_host' => '********',
				'smtp_port' => '465',
				'smtp_user' => '********',
				'smtp_pass' => '********',
				'charset' => 'iso-8859-1',
				'mailtype' => 'html',
				'newline' => '\r\n'
			];
		}
		
		/**
		 *	Init Config
		 **/
		protected function init()
		{
			parent::initialize($this->getConfig());
			$this->__isInit = true;
		}
		
		/**
		 *	Kirim Email
		 *	Array 
		 *	('from', 'to', 'subject', 'message')
		 **/
		public function sendMessage($o_message)
		{
			if(!$this->__isInit) $this->init();
			
			parent::from($o_message['from'], $o_message['subject']); 
			parent::to($o_message['to']);
			parent::subject($o_message['subject']); 
			parent::message($o_message['message']); 
			
			return parent::send();
		}
	}