<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('nimda');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('home', $data);
	}

	public function errorku()
	{
		$this->load->view('errors/error404.php');
	}


	// page Keuangan ----------------------------------

	public function keuangan()
	{
		$data['titel'] = 'DjenART | Layanan Jasa dan Penjualan Properti';
		// $data['pricelist'] = $this->nimda->tampil_artikel('pro','masuk');
		// $data['setting'] = $this->nimda->lihat('profil');

		// $keuanganlimit=12;
		// if(!$page):
		// $offset = 0;
		// else:
		// $offset = $page;
		// endif;
		// $data['keuangan']=$this->nimda->datakeuangan('keuangan',$offset,$keuanganlimit);

		$this->load->database();
		$jumlah_data = $this->nimda->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'home/keuangan';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;

		//pagination template
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['full_tag_open'] = '<ul class="d-flex flex-row align-items-start justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#produk">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_open'] = '<li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_open'] = '<li>';

		$page = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['keuangan'] = $this->nimda->data($config['per_page'], $page)->result();



		$data['pemasukan'] = $this->nimda->nominalmk();
		$data['pengeluaran'] = $this->nimda->nominalmk();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('komponen/header', $data);
		$this->load->view('page/dana');
		$this->load->view('komponen/footer');
	}

	function upah()
	{

		$this->load->database();
		$jumlah_data = $this->nimda->jumlah_data_pendapatan();
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'home/upah';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 30;

		//pagination template
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['full_tag_open'] = '<ul class="d-flex flex-row align-items-start justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#produk">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_open'] = '<li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_open'] = '<li>';

		$page = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['pendapatan'] = $this->nimda->data_pendapatan($config['per_page'], $page)->result();

		$data['pemasukan'] = $this->nimda->nominalmk();
		$data['pengeluaran'] = $this->nimda->nominalmk();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('komponen/header', $data);
		$this->load->view('page/upah.php');
		$this->load->view('komponen/footer');
	}
}
