<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('Pengguna');
        }

        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username Wajib Diisi!',
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]', [
            'required' => 'Password Wajib Diisi!',
            'min_length' => 'Password minimal 8 karakter'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar_pengunjung');
            $this->load->view('Autentikasi/Login');
            $this->load->view('Template/footer_pengunjung');
            $this->load->view('Template/template_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $akun = $this->db->get_where('tb_akun', ['username' => $username])->row_array();
        if ($akun != NULL) {
            if ($password == $akun['password']) {
                $data = [
                    'nik' => $akun['nik'],
                    'username' => $akun['username'],
                    'nama' => $akun['nama'],
                    'email' => $akun['email'],
                    'id_role' => $akun['id_role']
                ];
                $this->session->set_userdata($data);
                if ($akun['id_role'] == 1) {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                        Berhasil Melakukan Login!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('Admin');
                } else if ($akun['id_role'] == 2) {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                        Berhasil Melakukan Login!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('Pengguna');
                } else if ($akun['id_role'] == 3) {
                    $this->session->unset_userdata('username');
                    $this->session->unset_userdata('nama');
                    $this->session->unset_userdata('nik');
                    $this->session->unset_userdata('email');
                    $this->session->unset_userdata('id_role');
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                        Akun anda belum diaktivasi!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('Autentikasi');
                }
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Password salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('Autentikasi');
            }
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
                Username belom terdaftar!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Autentikasi');
        }
    }

    public function register()
    {
        $nik = htmlspecialchars($this->input->post('nik', true));
        $nama = htmlspecialchars($this->input->post('nama', true));
        $data['tb_penduduk_baru'] = $this->db->get_where('tb_penduduk_baru', ['nik' => $nik])->row_array();

        if ($this->session->userdata('username')) {
            redirect('Pengguna');
        }
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[tb_akun.nik]', [
            'required' => 'Nik Wajib Diisi!',
            'is_unique' => 'Nik sudah dipakai!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tb_akun.email]', [
            'required' => 'Email Wajib Diisi!',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah digunakan!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[tb_akun.username]', [
            'required' => 'Username Wajib Diisi!',
            'is_unique' => 'Username sudah dipakai!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]|matches[confirmpassword]', [
            'required' => 'Password Wajib Diisi!',
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password minimal 8 karakter'
        ]);
        $this->form_validation->set_rules('confirmpassword', 'confirmpassword', 'required|trim|matches[password]', [
            'required' => 'Password Konfirmasi Wajib Diisi!',
            'matches' => 'Password Tidak Sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar_pengunjung');
            $this->load->view('Autentikasi/Register');
            $this->load->view('Template/footer_pengunjung');
            $this->load->view('Template/template_footer');
        } else {

            if ($nik == $data['tb_penduduk_baru']['nik'] && $nama == $data['tb_penduduk_baru']['nama']) {
                $data = [
                    'nik' => htmlspecialchars($this->input->post('nik', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                    'id_role' => 3,
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'password' => htmlspecialchars($this->input->post('password', true)),
                    'profil' => 'default.jpg'
                ];

                $this->db->insert('tb_akun', $data);
                $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Selamat anda berhasil melakukan Registrasi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('Autentikasi');
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                NIK atau Nama anda belom terdaftar!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('Autentikasi/Register');
            }
        };
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('username_pengunjung');
        $this->session->unset_userdata('nama_pengunjung');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success" role="alert">
            Berhasil Keluar!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Autentikasi');
    }


    public function Blocked()
    {
        $this->load->view('Autentikasi/Blocked');
    }
}
