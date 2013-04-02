<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /*
|--------------------------------------------------------------------------
| Controller Page
|--------------------------------------------------------------------------
| Website of iostream.in
| @author justudin (just.udin@yahoo.com)
| Repo : http://github.com/justudin
| 31 Maret 2013
*/
class Page extends MX_Controller {

	function __construct()
	{	
        parent::__construct();
		$this->load->model('m_page');
	}
	//remap url
	function _remap()
	{		
		$segment_1 = $this->uri->segment(1);

		switch ($segment_1) {
			case null:
			case false:
			case '':
				$this->index();
			break;
			case 'page':
				$this->dpage($this->uri->segment(2));
			break;			
			default:
			break;
		}
	}
	
	//func index
	function index()
	{
		$this->home();
	}
	//function home
	function home()
	{
		$data=array('header'=>$this->load->view('v_header',TRUE),
					'top_menu'=>$this->load->view('v_menu',TRUE),
					'content'=>$this->load->view('v_home',TRUE)
				);
		$this->load->view('v_main',$data);
	}
	//func detail page
	function dpage($url='')
	{
		
	}
		
}