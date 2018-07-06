<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 	Model untuk Generic CRUD
 *	dengan nama tabel = nama class
 *
 *	@author Mufid Jamaluddin
 **/
abstract class MY_Model extends CI_Model
{	
	/**
	 *	Membuat Where dengan Attribute Objek ini
	 **/
	protected function _baseFind()
	{
		return $this->db->where(get_object_vars($this));
	}
	
	/**
	 *	Eager Loading
	 **/
	
	/**
	 *	Mencari List dan Cast Result ke Objek ini
	 **/
	public function find()
	{
		return $this->_baseFind()->get(strtolower(get_class($this)))->result();
	}
	
	/**
	 *	Mencari Objek dan Cast Result ke Objek ini
	 **/
	public function findOne()
	{
		return $this->_baseFind()->get(strtolower(get_class($this)))->row();
	}
	
	/**
	 *	Menyiman Objek
	 **/
	public function save()
	{
		return $this->db->insert(strtolower(get_class($this)), $this);
	}
	
	/**
	 *	Mengupdate Objek berdasarkan parameter
	 **/
	public function update($params)
	{
		return $this->db->update(strtolower(get_class($this)), $this, $params);
	}
	
	/**
	 *	Menghapus Objek berdasarkan Attribute Objek ini
	 **/
	public function delete()
	{
		return $this->db->delete(strtolower(get_class($this)), get_object_vars($this));
	}
}