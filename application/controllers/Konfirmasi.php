<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Page Home
 *	@author Mufid Jamaluddin
 **/
class Konfirmasi extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 *	Pembayaran
	 **/
	public function konfirmasi()
	{
		$data = $this->input->post(['jml_bayar', 'nopjl'], TRUE);
		$data['status'] = false;
		$data['tgl_bayar'] = date('Y-m-d');
		
		$pby = $this->db->where('nopjl', $data['nopjl'])->get('pembayaran')->row();
		
		if(isset($pby))
		{
			if(isset($pby->status) and $pby->status)
				$this->loadView('konfirmasi/konfirmasi_gagal', ['message' => 'Pembelian Telah Divalidasi!' ]);
			else if( $this->db->replace('pembayaran', $data) )
				$this->loadView('konfirmasi/konfirmasi_sukses');
			else
				$this->loadView('konfirmasi/konfirmasi_gagal', ['message' => $this->db->error() ]);
			
			return;
		}

		if( $this->db->insert('pembayaran', $data) )
			$this->loadView('konfirmasi/konfirmasi_sukses');
		else
			$this->loadView('konfirmasi/konfirmasi_gagal', ['message' => $this->db->error() ]);
	}

	/**
	 *	Halaman Konfirmasi Pembayaran
	 **/
	public function pembayaran($nopjl)
	{
		$pby = $this->db->where('nopjl', $nopjl)->get('pembayaran')->row();
		
		if(isset($pby))
		{
			if(isset($pby->status) and $pby->status)
				$this->loadView('konfirmasi/konfirmasi_gagal', ['message' => 'Pembelian Telah Divalidasi!' ]);
			else
				$this->loadView('konfirmasi/konfirmasi_gagal', ['message' => 'Anda Telah Melakukan Validasi!' ]);
		}
		else
			$this->loadView('konfirmasi/konfirmasi', ['nopjl' => $nopjl]);
	}

}