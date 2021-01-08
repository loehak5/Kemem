<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('nimda');
        is_logged_in();
    }

    function index()
    {

        $data['titel'] = 'UKM Msuik Blitar Raya';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['agtAll']        = $this->nimda->jumlahaAgt();
        $data['pemasukan'] = $this->nimda->nominalmk();

        $this->load->view('komponen/header', $data);
        $this->load->view('page/user/user', $data);
        $this->load->view('komponen/footer');
    }

    function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('komponen/header', $data);
        $this->load->view('page/user/edit');
        $this->load->view('komponen/footer');
    }

    public function updates()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            redirect('user/edit');
        } else {
            $nama       = $this->input->post('nama');
            $email      = $this->input->post('email');
            $julukan    = $this->input->post('julukan');
            $kampus     = $this->input->post('kampus');
            $nim        = $this->input->post('nim');
            $alamat     = $this->input->post('alamat');
            $phone      = $this->input->post('hp');

            //Cek jika ada gambar yang di upload
            $upload_image = $_FILES['userfile']['name'];

            if ($upload_image) {
                $config['upload_path']      = './assets/images/profile/';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                $config['max_size']         = 5000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('userfile')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . './assets/images/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data();
                    $featured_image = $new_image['file_name'];
                    $this->db->set('image', $featured_image); // iki wis fix nek Online
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user/edit');
                }
            }

            $data = array(
                'nama'      => $nama,
                'julukan'   => $julukan,
                'kampus'    => $kampus,
                'nim'       => $nim,
                'alamat'    => $alamat,
                'hp'        => $phone,
                'edit'      => date("Y-m-d H:i:s")
            );

            $this->db->set($data);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" style="text-align: center;" role="alert">Selamat anda telah berhasil update data profile!, jika foto profile hilang maka upload lagi.</div>'
            );
            redirect('user');
        }
    }
}
