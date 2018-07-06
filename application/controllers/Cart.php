<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *	Model Cart
 *	@author Mufid Jamaluddin
 **/
class Cart extends MY_Controller
{
    /**
     * Mendapatkan semua List Barang yang ada di Cart
     */
    private function all()
    {
		if(isset($this->session->shp_cart))
			return $this->db->where_in('kodebrg', array_keys($this->session->shp_cart))->from('barang');
		else
			return $this->db->where('0')->from('barang');
    }

    /**
     * Menambahkan barang kedalam Cart
     */
    public function add($kode)
    {
        $data =& $this->session->get_userdata();

		if(isset($data['shp_cart'][$kode]['jml']))
            $data['shp_cart'][$kode]['jml']++;
        else
            $data['shp_cart'][$kode]['jml'] = 1;
		
		echo sizeof($data['shp_cart']);
    }
	
    /**
     * Menambahkan barang kedalam Cart
     */
    public function b_add($kode)
    {
        $data =& $this->session->get_userdata();

		if(isset($data['shp_cart'][$kode]['jml']))
            $data['shp_cart'][$kode]['jml']++;
        else
            $data['shp_cart'][$kode]['jml'] = 1;
		
		redirect('/cart/');
    }

    /**
     * Mengurangi barang dari Cart
     */
    public function min($kode)
    {
        $data =& $this->session->get_userdata();

		if(isset($data['shp_cart'][$kode]['jml']))
		{
			$data['shp_cart'][$kode]['jml']--;
			
			// Jika Barang yang dikurang hasilnya kurang dari 1
			// Maka unset barang
			if($data['shp_cart'][$kode]['jml'] < 1)
			{
				unset($data['shp_cart'][$kode]);
			}
		}
		if(isset($data['shp_cart']) and sizeof($data['shp_cart']) < 1)
			unset($data['shp_cart']);
		
		redirect('/cart/');
    }

    /**
     * Menghapus barang dari Cart
     */
    public function remove($kode)
    {
        $data =& $this->session->get_userdata();

        if(isset($data['shp_cart'][$kode]['jml']))
        {
            $jml_brg = $data['shp_cart'][$kode]['jml'];
            
            // Hapus Barang
            unset($data['shp_cart'][$kode]);
                            
            // Jika Jumlah Total < 1, Maka Keranjang Kosong
            if(sizeof($data['shp_cart']) < 1)
                unset($data['shp_cart']);
        }
		
		redirect('/cart/');
    }

    /**
     * Menghapus semua barang dari Cart
     */
    public function removeall()
    {
		$this->session->shp_cart = [];
		
		unset($this->session->shp_cart);
		
		$this->session->sess_destroy();

		redirect('/cart/');
    }
	
	/**
	 *	Halaman Utama Cart
	 **/
	public function index()
	{
		if($this->all()->count_all_results() > 0)
			$this->loadView('cart/cart', ['listbrg' => $this->all()->get()->result() ]);
		else
			$this->loadView('cart/empty_cart');
	}
	
}