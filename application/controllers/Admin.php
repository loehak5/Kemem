<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    var $limit = 10;
    var $offset = 10;

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('nimda');
        $this->load->library('upload');
        $this->load->library(array('upload', 'image_lib'));
        is_logged_in();
    }

    function index()
    {
        //$data['akun'] = $this->nimda->getRows(array('nimda_id'=>$this->session->userdata('userId'))); 
        $data['titel'] = 'UKM Musik Blitar Raya | Admin';
        $data['subtitel'] = 'Dashboard';
        // $data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array;

        // $page=$this->uri->segment(3);
        // $keuanganlimit=30;
        // if(!$page):
        // $offset = 0;
        // else:
        // $offset = $page;
        // endif;
        // $data['keuangan']=$this->nimda->datakeuangan('keuangan',$offset,$keuanganlimit);

        $this->load->database();
        $jumlah_data = $this->nimda->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/index';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;

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


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pemasukan'] = $this->nimda->nominalmk();
        $data['pengeluaran'] = $this->nimda->nominalmk();
        $this->load->view('komponen/header', $data);
        $this->load->view('page/tambahdata', $data);
        $this->load->view('komponen/footer');
    }

    function penggajian()
    {


        $this->load->database();
        $jumlah_data = $this->nimda->jumlah_data_pendapatan();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/penggajian';
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
        $this->load->view('page/penggajian');
        $this->load->view('komponen/footer');
    }

    function edit_data($data_id)
    {
        $where = array('id' => $data_id);
        $data['editdata'] = $this->nimda->edit_data($where, 'keuangan')->result_array();
        $data['status'] = $this->nimda->edit_data($where, 'keuangan')->result_array();


        $page = $this->uri->segment(3);
        $keuanganlimit = 30;
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $data['keuangan'] = $this->nimda->datakeuangan('keuangan', $offset, $keuanganlimit);
        $data['pemasukan'] = $this->nimda->nominalmk();
        $data['pengeluaran'] = $this->nimda->nominalmk();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('komponen/header', $data);
        $this->load->view('page/editdata', $data);
        $this->load->view('komponen/footer');
    }

    function datauser()
    {
        $data['datauser'] = $this->nimda->data_user();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('komponen/header', $data);
        $this->load->view('page/admin/datauser', $data);
        $this->load->view('komponen/footer');
    }

    //tambah data keuangan

    function proses_tambah()
    {
        $ket = $this->input->post('ket');
        $tgl = $this->input->post('tgl');
        $status = $this->input->post('status');
        $nominal = $this->input->post('nominal');

        $data = array(
            'ket' => $ket,
            'tgl' => $tgl,
            'status' => $status,
            'nominal' => $nominal
        );
        $this->nimda->up_data($data, 'keuangan');
        redirect('admin');
    }

    function hapus_data($data_id)
    {
        $where = array('id' => $data_id);
        $this->nimda->hapus($where, 'keuangan');
        redirect('admin');
    }

    //penggajian

    function proses_gajih()
    {
        $nama = $this->input->post('nama');
        $catatan = $this->input->post('catatan');
        $persiapan = $this->input->post('persiapan');
        $selesai = $this->input->post('selesai');
        $total = $this->input->post('total');
        $perolehan = $this->input->post('perolehan');
        $jumlah = $this->input->post('jumlah');
        $status = $this->input->post('status');

        $data = array(
            'nama' => $nama,
            'catatan' => $catatan,
            'persiapan' => $persiapan,
            'selesai' => $selesai,
            'total' => $total,
            'perolehan' => $perolehan,
            'jumlah' => $jumlah,
            'status' => $status
        );
        $this->nimda->up_data2($data, 'pendapatan');
        redirect('admin/penggajian');
    }

    function hapus_data2($data_id)
    {
        $where = array('id' => $data_id);
        $this->nimda->hapus($where, 'pendapatan');
        redirect('admin/penggajian');
    }
}
