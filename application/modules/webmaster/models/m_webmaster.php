<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Model Webmaster
|--------------------------------------------------------------------------
| Website of iostream.in
| @author justudin (just.udin@yahoo.com)
| Repo : http://github.com/justudin
| 31 Maret 2013
*/

Class M_webmaster extends CI_Model {


	//func get member
	function get_member()
	{
		$q=$this->db->query("select * from member");
		return $q;
	}
	//func member_xls
	function member_xls()
	{
		$q=$this->db->query("select id_member, nama, gender,instansi,email,no_hp,alamat,status_member as kategori from member");
		return $q;
	}
	//func get page
	function get_page()
	{
		$q=$this->db->query("select * from page");
		return $q;
	}
	
	//func get page id
	function get_page_id($id)
	{
		$q=$this->db->query("select * from page where link='$id'");
		return $q;
	}
	
	//fungsi update data
	function Update_data($tabel,$isi,$seleksi)
	{
			$this->db->where($seleksi,$isi[$seleksi]);
			$this->db->update($tabel,$isi);
	}
	
	//func login
	function login($data)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($data);
		$query = $this->db->get();
		if($query->num_rows > 0)
		{
			$row = $query->row();
			$data['id_user'] = $row->id_user;
			$data['status'] = $row->status;
			return $data;
		} else return false;
	}
}