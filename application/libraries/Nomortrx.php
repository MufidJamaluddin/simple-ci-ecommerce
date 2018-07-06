<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
		Class NomorTrx digunakan untuk membuat nomor transaksi
		dan melakukan increment terhadap nomor transaksi sebelumnya
		
		@author Mufid Jamaluddin
	**/
	class NomorTrx 
	{
		/**
			Prefix awal kode
			Jika no transaksi PJL00001, maka awal kode nya PJL
		**/
		private $awal_kode;
		/**
			Jumlah digit nomor,
			Jika no transaksi PJL00001, maka jumlah digit dari 00001 adalah 5.
		**/
		private $digit_nomor;
		
		/**
			Konstruktor
		**/
		public function __construct($params)
		{
			$this->awal_kode = $params['awal_kode'];
			$this->digit_nomor = $params['digit_nomor'];
		}
		
		/**
			Membuat nomor transaksi (string) dari nomor yang diberikan (int)
		**/
		public function generate($nomor)
		{
			return $this->awal_kode . str_pad($nomor, $this->digit_nomor, '0', STR_PAD_LEFT); 
		}
		
		/**
			Melakukan increment terhadap nomor transaksi yang diberikan (string)
		**/
		public function increment($kode)
		{
			$no_kode = str_replace($this->awal_kode, '', $kode);
			$no_kode = (int) $no_kode;
			$no_kode++;
			return $this->generate($no_kode);
		}
	}