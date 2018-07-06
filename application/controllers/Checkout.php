<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Model Checkout Barang
 *	@author Mufid Jamaluddin
 **/
class Checkout extends MY_Controller 
{
	/**
	 *	Pesan Error
	 **/
    protected $message;
	
	/**
	 *	Konstruktor
	 **/
	function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->library('nomortrx', ['awal_kode' => 'PJL', 'digit_nomor' => 5]);
		$this->message = [];
	}

    /**
     * Mendapatkan semua List Barang yang ada di Cart
     */
    private function all()
    {
        if($this->session->has_userdata('shp_cart'))
            return $this->db->where_in('kodebrg', $this->session->shp_cart)->from('barang');
        else
            return null;
    }

    /**
     * Mengecek Ketersediaan Stok
     */
    protected function checkStok()
    {
        $data = &$this->session->get_userdata();
        
        if($cart = $this->all())
        {
            $in_stock = true;
            
            while ($barang = $cart->unbuffered_row())
            {
                if($barang->stok < $data['shp_cart'][$barang->kodebrg]['jml'])
                {
                    $instock = false;
                    $this->message[] = 'Stok Barang '.$barang->nama.' Tidak Mencukupi!';
                }
            }

            return $instock;
        }
    }

    /**
     * Mendapatkan No PJL dan melakukan increment terhadap last no pjl tersebut
     */
    protected function getNoPjl()
    {
        $result = $this->db->query('SELECT `nopjl` FROM `penjualan` ORDER BY `nopjl` DESC LIMIT 1')->row();

        if(isset($result->nopjl))
        {
            return $this->nomortrx->increment($result->nopjl);
        }
        else
        {
            return $this->nomortrx->generate(1);
        }
    }

    /**
     * Menyimpan Barang dari Cart ke DB
     */
    public function save()
    {
        $session =& $this->session->get_userdata();

		$data = $this->input->post(['nama', 'hp', 'alamat'], TRUE);
        $data['nopjl'] = $this->getNoPjl();
		$data['tgl'] = date('Y-m-d');

        if($this->db->insert('penjualan', $data))
        {
			$this->db->trans_begin();
			
			foreach($session['shp_cart'] as $kodebrg => $val)
			{
				// Kurangi Stok
				$this->db->query('UPDATE `barang` SET stok = stok - '.$val['jml'].' WHERE `kodebrg` = "'.$kodebrg.'"');
				// Insert ke table Jual
				$this->db->query('INSERT INTO `jual`(`nopjl`, `kodebrg`, `harga`, `jumlah`) VALUES ("'.$data['nopjl'].'","'.$kodebrg.'","'.$val['harga'].'","'.$val['jml'].'")');
			}

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $this->loadView('checkout/checkout_gagal');
            }
            else
            {
                $this->db->trans_commit();
				
				$send = $this->email->sendMessage([
					'from' => 'admin@gaetcita.com',
					'to' => $this->input->post('email', TRUE),
					'subject' => 'Konfirmasi Pembayaran',
					'message' => $this->load->view('email/template', [
						'message' => 'Yth '.$data['nama'].', Mohon Segera Konfirmasi Pembayaran sebesar Rp' . number_format($_SESSION['grand_total'],2,",","."),
						'link' => base_url('konfirmasi/pembayaran/' . $data['nopjl'])
					], TRUE)
				]);
				
				if(!$send) $this->message[] = 'Email Gagal Terkirim!';
				
                $this->loadView('checkout/checkout_sukses');
            }
        }
        else
            $this->loadView('checkout/checkout_gagal');
    }

}