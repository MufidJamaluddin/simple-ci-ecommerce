<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Model Cart
 *	@author Mufid Jamaluddin
 **/
class Pembayaran extends CI_Model
{
    public function insert()
    {
        $this->tgl_bayar = date('Y-m-d');
        return $this->db->insert('pembayaran', $this);
    }
}