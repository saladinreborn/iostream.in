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
			case 'home':
				$this->index();
			break;
			case 'contact':
				$this->contact();
			break;
			case 'page':
				$this->dpage($this->uri->segment(2));
			break;			
			default:
				$link=$segment_1;
				$cek=$this->m_page->getpage($link)->row();
				if(count($cek->id_page)==1){
					$this->dpage($segment_1);
				}else
				{
					redirect('home');
				}
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
		$m=array('menulist'=>$this->m_page->getmenu());
		$data=array('header'=>$this->load->view('v_header',TRUE),
					'top_menu'=>$this->load->view('v_menu',$m),
					'content'=>$this->load->view('v_home',TRUE)
				);
		$this->load->view('v_main',$data);
	}
	//func detail page
	function dpage($url='')
	{
		if($url=="contact"){
			$this->contact();
		}elseif($url=="home"){
			$this->home();
		} else if($url==""){
			$this->home();
		}else{
			$link=$url;
			$cek=$this->m_page->getpage($link)->row();
			if(count($cek->id_page)>0){
				$isi= array(
					'id' => $cek->id_page,
					'judul' => $cek->judul,	
					'link' => $cek->link,
					'isi' => $cek->isi
					);
				$m=array('menulist'=>$this->m_page->getmenu());
				$data=array('header'=>$this->load->view('v_header',TRUE),
					'top_menu'=>$this->load->view('v_menu',$m),
					'content'=>$this->load->view('v_page',$isi)
					);
				$this->load->view('v_main',$data);
			} else {
				redirect('home');
			}
		}
	}
	
	//function contact
	function contact()
	{
		$m=array('menulist'=>$this->m_page->getmenu());
		$data=array('header'=>$this->load->view('v_header',TRUE),
					'top_menu'=>$this->load->view('v_menu',$m),
					'content'=>$this->load->view('v_contact',TRUE)
				);
		$this->load->view('v_main',$data);
	}
		
}