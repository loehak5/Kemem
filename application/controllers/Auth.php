<?php

use function PHPSTORM_META\type;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('nimda');
        $this->load->library('upload');
        $this->load->library(array('upload', 'image_lib'));
    }

    function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['titel'] = 'Form | Login';
            $this->load->view('page/auth/nigol', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // var_dump($user);
        // die;     
        // iki ge ngetes data lur

        // lek user e enek maka
        if ($user) {
            // lek user e aktif maka
            if ($user['is_active'] == 1) {
                // cek password nek kene
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('user');
                    } else {
                        redirect('user');
                    }
                } else {
                    // var_dump($user);
                    // die;
                    $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" style="text-align: center;" role="alert">Password anda salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" style="text-align: center;" role="alert">Akun anda belum aktif</br><small>mohon cek email terlebih dahulu</small></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" style="text-align: center;" role="alert">Maaf!!!, Email belum terdaftar</div>');
            redirect('auth');
        }
    }

    function up_user()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', [
            'is_unique' => 'email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('pswd', 'Pswd', 'required');

        if ($this->form_validation->run() == false) {
            redirect('#exampleModalLong');
        } else {
            $emailnya = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'password' => password_hash($this->input->post('pswd'), PASSWORD_DEFAULT),
                'email' => htmlspecialchars($emailnya),
                'julukan' => ($this->input->post('julukan')),
                'kampus' => ($this->input->post('kampus')),
                'nim' => ($this->input->post('nim')),
                'alamat' => ($this->input->post('alamat')),
                'hp' => ($this->input->post('hp')),
                'alasan' => ($this->input->post('alasan')),
                'instrumen' => ($this->input->post('instrumen')),
                'role_id' => ($this->input->post('role_id')),
                'is_active' => 0,
                'image' => 'default.png'

            ];
            // var_dump($data);
            // die; 
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $emailnya,
                'token' => $token,
                'date_created' => time()
            ];

            // var_dump($token);
            // die;

            $this->nimda->insert($data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" style="text-align: center;" role="alert">Selamat anda telah berhasil mendaftar, kunjungi kotak masuk / folder spam email terdaftar untuk mengaktifkan akun.</div>'
            );
            redirect('home');
        }
    }

    private function _sendEmail($token, $type)
    {
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_user'] = 'musikukm2018@gmail.com';
        $config['smtp_pass'] = 'MusikUKM18';
        $config['smtp_port'] = 465;
        $config['smtp_timeout'] = 4;
        $config['smtp_crypto'] = 'security';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");

        $this->email->from('musikukm2018@gmail.com', 'UKM Musik Blitar Raya');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('<html>

            <head>
                <title>Verification Code</title>
            </head>

            <body>
                <h1>Thank you for Registering.</h1>
                <h2>Hello <b style="color: orange;">' . $this->input->post('nama') . '</b></h2>
                <p>Kami berikan waktu untuk aktivasi / verifikasi akun anda kurang dari 24Jam, untuk melakukan aktivasi / verifikasi klik link ini untuk verifikasi akun anda </p>
                <h4><a style="color: white; background-color: #6c8281!important; border: none; display: inline-block; padding: 8px 16px; vertical-align: middle; overflow: hidden; text-decoration: none; text-align: center; cursor: pointer; white-space: nowrap;" href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate My Account</a></h4>
                <br />
                <p>Aktivasi melalui link ini, jika tombol tidak berfungsi (copy link ini lalu paste ke tab / address)</p><br />
                ' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '<br />
                <p>Tunggu 2x24jam kerja untuk anggota terdaftar namun masih belum masuk grub Whatsapp <b>UKM Musik Blitar Raya</b></p>
                <p>Salam hormat "Developer UKM Musik BLitar Raya"</p>
                <br />
                <br />
                <br />
                <p><small>No Reply!</small></p>
	            <br />
                <div dir="ltr">
                    <div dir="ltr">
                        <div>
                            <div dir="ltr">
                                <div dir="ltr">
                                    <div dir="ltr">
                                        <div>
                                            <font face="tahoma, sans-serif"><a href="http://ukmmusikblitarraya.my.id/" target="_blank">UKM Musik Blitar Raya</a><span style="color:rgb(0,0,0)">&nbsp;</span>
                                                <font size="1" style="color:rgb(0,0,0)">Team</font><br>
                                            </font>
                                        </div>
                                        <div>
                                            <font color="#666666" size="1" face="tahoma, sans-serif"><a href="https://www.instagram.com/ukmmusik_blitar/" target="_blank">Instagram&nbsp;|&nbsp;<a href="https://g.page/ukm-musik-blitar-raya?share" target="_blank">Base Camp</a>&nbsp;<wbr>|&nbsp;<a href="https://www.youtube.com/channel/UCc84yFkgsOalwBxRrV7PWGw" target="_blank">Youtube</a></font>
                                        </div>
                                        <div dir="ltr">
                                            <div>
                                                <font face="tahoma, sans-serif">
                                                    <font color="#666666">
                                                        <font size="1">Sekardangan, Papungan, Kec. Kanigoro, <br>Kab.Blitar,&nbsp;</font>
                                                    </font><span style="font-size:x-small;color:rgb(102,102,102)">Jawa Timur, Indonesia</span>
                                                </font>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>

            </html>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('<html>

            <head>
                <title>Reset Password</title>
            </head>
            
            <body>
                <h1>Confirm a New Password!</h1>
                <h2>Hello <b style="color: orange;">' . $this->input->post('nama') . '</b></h2>
                <p>Kami berikan waktu untuk <b>Reset Password</b> akun anda kurang dari 24Jam, untuk melakukan <b>Reset Password</b> klik link ini.</p>
                <h4><a style="color: white; background-color: #6c8281!important; border: none; display: inline-block; padding: 8px 16px; vertical-align: middle; overflow: hidden; text-decoration: none; text-align: center; cursor: pointer; white-space: nowrap;" href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset My Password</a></h4>
                <br />
                <p><b>Reset Password</b> melalui link ini, jika tombol tidak berfungsi (copy link ini lalu paste ke tab / address)</p><br />
                ' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '<br />
                <p>Salam hormat "Developer UKM Musik BLitar Raya"</p>
                <br />
                <br />
                <br />
                <p><small>No Reply!</small></p>
                <br />
                <div dir="ltr">
                    <div dir="ltr">
                        <div>
                            <div dir="ltr">
                                <div dir="ltr">
                                    <div dir="ltr">
                                        <div>
                                            <font face="tahoma, sans-serif"><a href="http://ukmmusikblitarraya.my.id/" target="_blank">UKM Musik Blitar Raya</a><span style="color:rgb(0,0,0)">&nbsp;</span>
                                                <font size="1" style="color:rgb(0,0,0)">Team</font><br>
                                            </font>
                                        </div>
                                        <div>
                                            <font color="#666666" size="1" face="tahoma, sans-serif"><a href="https://www.instagram.com/ukmmusik_blitar/" target="_blank">Instagram&nbsp;|&nbsp;<a href="https://g.page/ukm-musik-blitar-raya?share" target="_blank">Base Camp</a>&nbsp;<wbr>|&nbsp;<a href="https://www.youtube.com/channel/UCc84yFkgsOalwBxRrV7PWGw" target="_blank">Youtube</a></font>
                                        </div>
                                        <div dir="ltr">
                                            <div>
                                                <font face="tahoma, sans-serif">
                                                    <font color="#666666">
                                                        <font size="1">Sekardangan, Papungan, Kec. Kanigoro, <br>Kab.Blitar,&nbsp;</font>
                                                    </font><span style="font-size:x-small;color:rgb(102,102,102)">Jawa Timur, Indonesia</span>
                                                </font>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            
            </html>');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan2', '<div class="alert alert-success" style="text-align: center;" role="alert">' . $email . ' Sudah aktif!, Login sekarang.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);


                    $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" style="text-align: center;" role="alert">Aktivasi gagal!, Waktu anda habis.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" style="text-align: center;" role="alert">Aktivasi gagal!, Token salah.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" style="text-align: center;" role="alert">Aktivasi gagal!, Email salah.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan2', '<div class="alert alert-success" style="text-align: center;" role="alert">You have been logged out</div>');
        redirect('auth');
    }

    public function forgotPassword()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['titel'] = 'Forgot Password';
            $this->load->view('page/auth/forgot', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('pesan2', '<div class="alert alert-success" style="text-align: center;" role="alert">Cek email untuk reset password</div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" style="text-align: center;" role="alert">Email belum terdaftar atau belum aktif!</div>');
                redirect('auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" style="text-align: center;" role="alert">Reset password gagal! Token salah.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan2', '<div class="alert alert-danger" style="text-align: center;" role="alert">Reset password gagal!</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['titel'] = 'Form | ChangePassword';
            $this->load->view('page/auth/ganti-pass', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('pesan2', '<div class="alert alert-success" style="text-align: center;" role="alert">Password sudah terreset! Mohon untuk Login.</div>');
            redirect('auth');
        }
    }
}
