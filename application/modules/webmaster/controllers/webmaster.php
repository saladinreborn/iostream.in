<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /*
|--------------------------------------------------------------------------
| Controller Webmaster
|--------------------------------------------------------------------------
| Website of iostream.in
| @author justudin (just.udin@yahoo.com)
| Repo : http://github.com/justudin
| 31 Maret 2013
*/
class Webmaster extends MX_Controller {

	function __construct()
	{	
        parent::__construct();
		$this->load->model('m_webmaster');
		$this->load->model('page/m_page','m_page');
	}
	
	//func index
	function index()
	{
		if($this->cek_login()){
			$this->home();
		}else{
			redirect('manage');
		}
	}
	//function home
	function home()
	{	if($this->cek_login()){
			$data=array('header'=>$this->load->view('v_header',TRUE),
						'top_menu'=>$this->load->view('v_menu',TRUE),
						'content'=>$this->load->view('v_home',TRUE)
					);
			$this->load->view('v_main',$data);
		}else{
			redirect('manage');
		}
	}
	
	//func convert xls
	function to_xls()
	{
		$this->load->helper('xls');
		$q=$this->m_webmaster->member_xls();
		query_to_xls($q, TRUE, 'Data Peserta Workshop Android GEEK.xls');
	}
	
	//function member
	function member()
	{
		if($this->cek_login()){
			$q=$this->m_webmaster->get_member();
			$dt=array('dt'=>$q);
			$data=array('header'=>$this->load->view('v_header',TRUE),
						'top_menu'=>$this->load->view('v_menu',TRUE),
						'content'=>$this->load->view('v_member',$dt)
					);
			$this->load->view('v_main',$data);
		}else{
			redirect('manage');
		}
	}
	
	//function page
	function page()
	{
		if($this->cek_login()){
			$q=$this->m_webmaster->get_page();
			$dt=array('dt'=>$q);
			$data=array('header'=>$this->load->view('v_header',TRUE),
						'top_menu'=>$this->load->view('v_menu',TRUE),
						'content'=>$this->load->view('v_page',$dt)
					);
			$this->load->view('v_main',$data);
		}else{
			redirect('manage');
		}
	}
	
	//function editpage
	function editpage()
	{
		if($this->cek_login()){
			$id=$this->uri->segment(3);
			if($id=="proses"){
				$id=$this->input->post('id');
				$judul=$this->input->post('judul');
				$isi=$this->input->post('isi');
				$tgl=time();
				$dtpage=array(
					'id_page'=>$id,
					'judul'=>$judul,
					'isi'=>$isi,
					'tanggal'=>$tgl
				);
				$this->m_webmaster->Update_data("page",$dtpage,"id_page");
				redirect('webmaster/page');	
			} else {
				$q=$this->m_webmaster->get_page_id($id)->row();
				if(count($q->id_page)>0){
					$dt=array('dt'=>$q);
					$data=array('header'=>$this->load->view('v_header',TRUE),
								'top_menu'=>$this->load->view('v_menu',TRUE),
								'content'=>$this->load->view('v_edit_page',$dt)
							);
					$this->load->view('v_main',$data);
				} else { redirect('webmaster/page'); }
			}
		}else{
			redirect('manage');
		}
	}
	
	//func login
	function login()
	{
		if($this->cek_login()){
			redirect('webmaster');
		}else{
		$op=$this->uri->segment(3);
		if($op=="proses"){
			$user=$this->input->post('username');
			$pass=md5($this->input->post('password')."iostream.in");
			$data=array(
				'username'=>$user,
				'password'=>$pass
				);
			if(!empty($user) && !empty($pass) && $dtlogin=$this->m_webmaster->login($data))
			{
				$session_var=array( 
					'username'=> $user,
					'status'=> $dtlogin['status'],
					'id_user'=> $dtlogin['id_user']
				);
				$this->session->set_userdata($session_var);
				redirect('webmaster');
			} else {redirect('manage');}
		}else{
			$m=array('menulist'=>$this->m_page->getmenu());
			$data=array('header'=>$this->load->view('v_header',TRUE),
						'top_menu'=>$this->load->view('page/v_menu',$m),
						'content'=>$this->load->view('v_login',TRUE)
					);
			$this->load->view('v_main',$data);
		}
	  }
	}
	
	//func logout
	function logout()
	{
		$see=array( 
					'username'=> '',
					'status'=> '',
					'id_user'=> ''
				);
		$this->session->unset_userdata($see);
		$this->session->sess_destroy();
		redirect("home");
	}
	
	
	//func for ceking login session
    function cek_login()
   {
		$cusername=$this->session->userdata('username');
		$cid_user=$this->session->userdata('id_user');
		$cstatus=$this->session->userdata('status');
		if(!empty($cusername) && !empty($cid_user) && !empty($cstatus))
		{
			return true;
		} else {
			return false;
		}
   }
		
}