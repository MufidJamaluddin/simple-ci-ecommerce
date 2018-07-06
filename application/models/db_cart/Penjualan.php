<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Model Cart
 *	@author Mufid Jamaluddin
 **/
class Penjualan extends CI_Model
{
    public function getAll()
    {
        $query = 'SELECT jual.nopjl as nopjl, kodebrg, harga, jumlah, tgl, nama, hp, alamat, status, tgl_bayar, jml_bayar FROM jual NATURAL JOIN penjualan LEFT JOIN pembayaran ON jual.nopjl = pembayaran.nopjl';
        return $this->db->query($query);
    }
}