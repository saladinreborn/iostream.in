<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Model Member
|--------------------------------------------------------------------------
| Website of iostream.in
| @author justudin (just.udin@yahoo.com)
| Repo : http://github.com/justudin
| 31 Maret 2013
*/

Class M_member extends CI_Model {
	//func savedata
	function saveData($tabel,$data)
	{
		$s=$this->db->insert($tabel,$data);
		return $s;
	}

}