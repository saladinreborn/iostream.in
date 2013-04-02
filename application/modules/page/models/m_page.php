<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Model Page
|--------------------------------------------------------------------------
| Website of iostream.in
| @author justudin (just.udin@yahoo.com)
| Repo : http://github.com/justudin
| 31 Maret 2013
*/

Class M_page extends CI_Model {

	//func get menu page
	function getmenu()
	{
		$q=$this->db->query('select * from page where status=1');
		return $q;
	}
	
	//func getpage with link
	function getpage($link)
	{
		$q=$this->db->query("select * from page where link='$link'");
		return $q;
	}

}