<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /*
|--------------------------------------------------------------------------
| Controller Member
|--------------------------------------------------------------------------
| Website of iostream.in
| @author justudin (just.udin@yahoo.com)
| Repo : http://github.com/justudin
| 31 Maret 2013
*/
class Member extends MX_Controller {

	function __construct()
	{	
        parent::__construct();
		$this->load->model('m_member');
		$this->load->model('page/m_page','m_page');
	}
	
	//func index
	function index()
	{
		$this->home();
	}
	//function home
	function home()
	{
		redirect('home');
		// $m=array('menulist'=>$this->m_page->getmenu());
		// $data=array('header'=>$this->load->view('page/v_header',TRUE),
					// 'top_menu'=>$this->load->view('page/v_menu',$m),
					// 'content'=>$this->load->view('v_member',TRUE)
				// );
		// $this->load->view('page/v_main',$data);
	}
		
	//func reg member
	function daftar()
	{
		$op=$this->uri->segment(3);
		if($op=="proses"){
			$this->form_validation->set_rules('nama', 'Full Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[member.email');
			$this->form_validation->set_rules('kategori', 'Kategori Peserta', 'required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('instansi', 'Nama Instansi/Universitas', 'trim|required');
			$this->form_validation->set_rules('nope', 'No Handphone / Telp', 'trim|required');
			$this->form_validation->set_message('required', '%s harus diisi');	
			if($this->form_validation->run()=== FALSE)
			{
				$m=array('menulist'=>$this->m_page->getmenu());
				$data=array('header'=>$this->load->view('page/v_header',TRUE),
						'top_menu'=>$this->load->view('page/v_menu',$m),
						'content'=>$this->load->view('v_daftar',TRUE)
					);
				$this->load->view('page/v_main',$data);
			} else {
				$nama=$this->input->post('nama');
				$email=$this->input->post('email');
				$jk=$this->input->post('jk');
				$nohp=$this->input->post('nope');
				$status=$this->input->post('kategori');
				$instansi=$this->input->post('instansi');
				$alamat=$this->input->post('alamat');
				$tgl=time();
				$member=array(
						'nama' => $nama,
						'email' => $email,
						'no_hp' => $nohp ,
						'status_member' => $status,
						'gender' => $jk,
						'instansi' => $instansi,
						'alamat' => $alamat,
						'tanggal_daftar'=>$tgl
						);
					$this->m_member->saveData("member",$member);
					$this->send_email($member);
				$m=array('menulist'=>$this->m_page->getmenu());
				$data=array('header'=>$this->load->view('page/v_header',TRUE),
							'top_menu'=>$this->load->view('page/v_menu',$m),
							'content'=>$this->load->view('v_daftar_status',TRUE)
						);
				$this->load->view('page/v_main',$data);
			}
		}else{
			$m=array('menulist'=>$this->m_page->getmenu());
			$data=array('header'=>$this->load->view('page/v_header',TRUE),
						'top_menu'=>$this->load->view('page/v_menu',$m),
						'content'=>$this->load->view('v_daftar',TRUE)
					);
			$this->load->view('page/v_main',$data);
		}
	}
	
	function send_email($member) {
        $to = $member['email'];
		$nm = $member['nama'];
		$subject=" [info] Informasi Android GEEK Workshop - iostream.in";
		$pengirim="Info iOSTREAM<info@iostream.in>";
        $txt = "Dear $nm <br/>Terimakasih sudah mendaftar sebagai Peserta Android Geek Workshop.<br/>Berikut Prosedur Pembayaran Selanjutnya :<br/>
		<p><strong>Syarat Dan Ketentuan Pendaftaran Online</strong></p>
			<ul>
				<li>Biaya pendaftaran sebesar</li>
			</ul>
			<div>
			<div>
			<div>
			<ol style='margin-left: 40px;'>
				<li>Umum IDR 100.000,00</li>
				<li>Pelajar IDR 75.000,00</li>
			</ol>
			<ul>
				<li>Uang pendaftaran dapat ditransfer melalui
				<ul>
					<li>Rekening BSM No.Rekening 703-292-4454 a/n MUHAMMAD SYAFRUDIN</li>
					<li>Atau lansung melalui Front Office (COD) IOSTREAM di Kampus UIN Sunan Kalijaga Yogyakarta</li>
				</ul>
				</li>
				<li>Setelah pembayaran ke rekening kami, kemudian konfirmasi ke email kami cs@iostream.in atau sms ke no. 0856-4358-5494 dengan FORMAT SMS=&gt; NAMA_KOTA_L/P_INSTANSI_TANGGAL-TRANSFER</li>
			</ul>
			</div>
			<ul>
				<li>Jika mentransfer uang melalui rekening silahkan cetakan bukti transfer dibawa pada saat hari H untuk ditukarkan sebagai tanda bukti Id peserta</li>
			</ul>
			<p>NB: Untuk kategori <strong>PELAJAR </strong>saat daftar ulang menyertakan <strong>KTM</strong> sebagai sebagai tanda aktif pelajar, apabila tidak menyertakan ktm pada hari H maka pada saat itu juga anda akan kami kategorikan sebagai peserta kategori <strong>UMUM</strong> sehingga harus membayar biaya tambahan IDR 25.000,00</p>
			</div>
			</div>

			<div>
			<h3>Pendaftaran dan Pembayaran Paling Lambat Tanggal 25 April 2013</h3>
			</div>
					";
        //$headers = "From: ADMIN BEBAS LAB <lab@uin-suka.ac.id>" . "\r\n" .
           //     "BCC: bebaslab@gmail.com"; 
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= 'From: IOSTREAM.IN <cs@iostream.in>'. "\r\n";
	
		mail($to, $subject, $txt, $headers);
    }
}