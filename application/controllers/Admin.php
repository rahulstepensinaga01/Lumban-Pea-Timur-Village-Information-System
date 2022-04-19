<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id_pengumuman')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/HalamanUtama', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function profil()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['penduduk'] = $this->db->get_where('tb_penduduk_baru', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['title'] = 'My Profile';

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/profil', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function daftarakun()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['title'] = 'Daftar Akun';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/DaftarAkun', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function hapusdaftarakun($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('tb_akun');
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus Data akun!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Admin/daftarakun');
    }

    public function editdaftarakun($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['menu'] = $this->db->get('tb_menu')->result_array();
        $data['title'] = 'Edit Daftar Akun';
        $data['ubahakun'] =   $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();

        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[tb_akun.nik]', [
            'required' => 'Nik Wajib Diisi!',
            'is_unique' => 'Nik sudah dipakai!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tb_akun.email]', [
            'required' => 'Email Wajib Diisi!',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah digunakan!'
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

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/EditDaftarAkun', $data);
        $this->load->view('Template/footer_menu');
        $this->load->view('Template/template_footer');
    }

    public function updatedaftarakun()
    {

        $nik = htmlspecialchars($this->input->post('nik', true));

        $data = [
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => htmlspecialchars($this->input->post('password', true)),
            'id_role' => htmlspecialchars($this->input->post('id_role', true))
        ];

        $where = array(
            'nik' => $nik
        );

        $this->Admin_Model->update_data($where, $data, 'tb_akun');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Akun!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Admin/DaftarAkun');
    }

    public function detailakun($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['detailakun'] = $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();
        $data['title'] = 'Detail Akun';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/DetailDaftarAkun', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function daftarakunaktivasi()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['title'] = 'Daftar Akun Aktivasi';

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/DaftarAkunAktivasi', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function daftarakunadmin()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['title'] = 'Daftar Akun Admin';

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/DaftarAkunAdmin', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function EditAkunAdmin($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['menu'] = $this->db->get('tb_menu')->result_array();
        $data['title'] = 'Edit Daftar Akun';
        $data['ubahakun'] =   $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();

        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[tb_akun.nik]', [
            'required' => 'Nik Wajib Diisi!',
            'is_unique' => 'Nik sudah dipakai!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tb_akun.email]', [
            'required' => 'Email Wajib Diisi!',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah digunakan!'
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

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/EditAkunAdmin', $data);
        $this->load->view('Template/footer_menu');
        $this->load->view('Template/template_footer');
    }

    public function updateakunadmin()
    {

        $nik = htmlspecialchars($this->input->post('nik', true));

        $data = [
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => htmlspecialchars($this->input->post('password', true)),
            'id_role' => htmlspecialchars($this->input->post('id_role', true))
        ];

        $where = array(
            'nik' => $nik
        );

        $this->Admin_Model->update_data($where, $data, 'tb_akun');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Akun!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Admin/DaftarAkunAdmin');
    }

    public function DetailAkunAdmin($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['detailakun'] = $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();
        $data['title'] = 'Detail Akun Admin';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/DetailAkunAdmin', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function hapusakunadmin($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('tb_akun');
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus Data Akun Admin!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Admin/daftarakunaktivasi');
    }

    public function hapusdaftarakunaktivasi($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('tb_akun');
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus Data akun aktivasi!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Admin/daftarakunaktivasi');
    }

    public function detailakunaktivasi($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['aktivasipenduduk'] =   $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();
        $data['detailakun'] = $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();
        $data['detailpendudukbaru'] = $this->db->get_where('tb_penduduk_baru', ['nik' => $nik])->row_array();
        $data['title'] = 'Detail Akun Baru';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/DetailDaftarAkunAktivasi', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function editdaftarakunaktivasi($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['menu'] = $this->db->get('tb_menu')->result_array();
        $data['title'] = 'Edit Daftar Akun';
        $data['ubahakun'] =   $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();

        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[tb_akun.nik]', [
            'required' => 'Nik Wajib Diisi!',
            'is_unique' => 'Nik sudah dipakai!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tb_akun.email]', [
            'required' => 'Email Wajib Diisi!',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah digunakan!'
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

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/EditDaftarAkunAktivasi', $data);
        $this->load->view('Template/footer_menu');
        $this->load->view('Template/template_footer');
    }

    public function updateakunaktivasi()
    {
        $nik = htmlspecialchars($this->input->post('nik', true));

        $data = [
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => htmlspecialchars($this->input->post('password', true)),
            'id_role' => htmlspecialchars($this->input->post('id_role', true))
        ];

        $where = array(
            'nik' => $nik
        );

        $this->Admin_Model->update_data($where, $data, 'tb_akun');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Akun!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Admin/DaftarAkunAktivasi');
    }

    public function pengumuman()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['title'] = 'Pengumuman';

        $this->form_validation->set_rules('judul_pengumuman', 'judul_pengumuman', 'required|trim', [
            'required' => 'Masukkan Judul Pengumuman!'
        ]);
        $this->form_validation->set_rules('isi_pengumuman', 'isi_pengumuman', 'required|trim', [
            'required' => 'Masukkan isi Pengumuman!'
        ]);

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/Pengumuman', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function editpengumuman($id_pengumuman)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['menu'] = $this->db->get('tb_menu')->result_array();
        $data['title'] = 'Edit Daftar Penduduk';
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['ubahpengumuman'] =   $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $id_pengumuman])->row_array();

        $this->form_validation->set_rules('judul_pengumuman', 'judul_pengumuman', 'required|trim', [
            'required' => 'Judul Pengumuman Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('isi_pengumuman', 'isi_pengumuman', 'required|trim', [
            'required' => 'Isi Pengumuman Wajib Diisi!'
        ]);

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/EditPengumuman', $data);
        $this->load->view('Template/footer_menu');
        $this->load->view('Template/template_footer');
    }

    public function updatepengumuman()
    {
        $id_pengumuman = $this->input->post('id_pengumuman', true);

        $data = [
            'judul_pengumuman' => $this->input->post('judul_pengumuman', true),
            'isi_pengumuman' => $this->input->post('isi_pengumuman', true)
        ];

        $where = array(
            'id_pengumuman' => $id_pengumuman
        );

        $this->Admin_Model->update_data($where, $data, 'tb_pengumuman');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Pengumuman!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Admin/Pengumuman');
    }

    public function DetailPengumuman($id_pengumuman)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['detailpengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $id_pengumuman])->row_array();
        $data['title'] = 'Detail Pengumuman';
        $data['komentar'] = $this->db->get('tb_komentar')->result_array();
        $this->form_validation->set_rules('isi_komentar', 'isi_komentar', 'required|trim', [
            'required' => 'Masukkan Komentar anda!'
        ]);

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/DetailPengumuman', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function hapuspengumuman($id_pengumuman)
    {
        $this->db->where('id_pengumuman', $id_pengumuman);
        $this->db->delete('tb_pengumuman');
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus Data Pengumuman!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Admin/Pengumuman');
    }

    public function tambahpengumuman()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['title'] = 'Tambah Pengumuman';
        $this->form_validation->set_rules('judul_pengumuman', 'judul_pengumuman', 'required|trim', [
            'required' => 'Masukkan Judul Pengumuman!'
        ]);
        $this->form_validation->set_rules('isi_pengumuman', 'isi_pengumuman', 'required|trim', [
            'required' => 'Masukkan Isi Pengumuman!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar', $data);
            $this->load->view('Template/header_admin', $data);
            $this->load->view('Admin/TambahPengumuman');
            $this->load->view('Template/footer_admin');
            $this->load->view('Template/template_footer');
        } else {
            $data = [
                'judul_pengumuman' => htmlspecialchars($this->input->post('judul_pengumuman', true)),
                'isi_pengumuman' => htmlspecialchars($this->input->post('isi_pengumuman', true))
            ];
            $this->db->insert('tb_pengumuman', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil menambahkan Pengumuman baru!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Admin/Pengumuman');
        }
    }

    public function daftarpenduduk()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id_pengumuman')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['penduduk_baru'] = $this->db->get('tb_penduduk_baru')->result_array();
        $data['title'] = 'Daftar Penduduk';



        if ($this->form_validation->run() == false) {
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar', $data);
            $this->load->view('Template/header_admin', $data);
            $this->load->view('Admin/daftarpenduduk', $data);
            $this->load->view('Template/footer_admin');
            $this->load->view('Template/template_footer');
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jumlah_anggota_keluarga' => htmlspecialchars($this->input->post('jumlah_anggota_keluarga', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true))
            ];
            $this->db->insert('tb_penduduk_baru', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil menambahkan Penduduk baru!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Admin/DaftarPenduduk');
        }
    }

    public function tambahpendudukbaru()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id_pengumuman')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['penduduk_baru'] = $this->db->get('tb_penduduk_baru')->result_array();
        $data['title'] = 'Tambah Penduduk Baru';
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[tb_penduduk_baru.nik]', [
            'required' => 'Nik Wajib Diisi!',
            'is_unique' => 'Nik sudah dipakai!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jumlah_anggota_keluarga', 'jumlah_anggota_keluarga', 'required|trim', [
            'required' => 'Jumlah Anggota Keluarga Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim', [
            'required' => 'Tempat Lahiir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Tanggal Lahir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required|trim', [
            'required' => 'Pekerjaan Wajib Diisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar', $data);
            $this->load->view('Template/header_admin', $data);
            $this->load->view('Admin/tambahpendudukbaru', $data);
            $this->load->view('Template/footer_admin');
            $this->load->view('Template/template_footer');
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jumlah_anggota_keluarga' => htmlspecialchars($this->input->post('jumlah_anggota_keluarga', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true))
            ];
            $this->db->insert('tb_penduduk_baru', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil menambahkan Penduduk baru!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Admin/DaftarPenduduk');
        }
    }
    public function editpendudukbaru($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id_pengumuman')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['penduduk_baru'] = $this->db->get('tb_penduduk_baru')->result_array();
        $data['ubahpendudukbaru'] =   $this->db->get_where('tb_penduduk_baru', ['nik' => $nik])->row_array();
        $data['title'] = 'Penduduk Baru';

        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[tb_akun.nik]', [
            'required' => 'Nik Wajib Diisi!',
            'is_unique' => 'Nik sudah dipakai!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jumlah_anggota_keluarga', 'jumlah_anggota_keluarga', 'required|trim', [
            'required' => 'Jumlah Anggota Keluarga Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim', [
            'required' => 'Tempat Lahiir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Tanggal Lahir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required|trim', [
            'required' => 'Pekerjaan Wajib Diisi!'
        ]);

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/EditPendudukBaru', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function updatependudukbaru()
    {

        $nik = htmlspecialchars($this->input->post('nik', true));

        $data = [
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'jumlah_anggota_keluarga' => htmlspecialchars($this->input->post('jumlah_anggota_keluarga', true)),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
            'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true))
        ];

        $where = array(
            'nik' => $nik
        );

        $this->Admin_Model->update_data($where, $data, 'tb_penduduk_baru');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Data Penduduk Baru!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Admin/DaftarPenduduk');
    }

    public function hapuspendudukbaru($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('tb_penduduk_baru');
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus Data penduduk baru!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Admin/DaftarPenduduk');
    }

    public function detailpendudukbaru($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['detailakun'] = $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();
        $data['detailpendudukbaru'] = $this->db->get_where('tb_penduduk_baru', ['nik' => $nik])->row_array();
        $data['title'] = 'Detail Penduduk Baru';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/DetailDaftarPendudukBaru', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function Keuangan()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id_pengumuman')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['keuangan'] = $this->db->get_where('tb_keuangan', ['id_keuangan' => $this->session->userdata('id_keuangan')])->row_array();
        $data['kas'] = $this->db->get('tb_keuangan')->result_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['title'] = 'Keuangan';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/Keuangan', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function TambahLaporanKeuangan()
    {
        $data['title'] = 'Kas Masuk';
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['kas'] = $this->db->get('tb_keuangan')->result_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id_pengumuman')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();

        $this->form_validation->set_rules('jumlah_keuangan', 'jumlah_keuangan', 'required|trim', [
            'required' => 'Nominal Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim', [
            'required' => 'Keterangan Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('lampiran', 'lampiran', 'required|trim', [
            'required' => 'Lampiran Wajib Diisi!'
        ]);

        $config['upload_path']          = './assets/img/lampirankeuangan/';
        $config['allowed_types']        = 'doc|docx|pdf|jpg|jpeg|png|zip';
        $config['max_size'] = 0;
        $config['encrypt_name'] = TRUE;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('lampiran')) {
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar', $data);
            $this->load->view('Template/header_admin', $data);
            $this->load->view('Admin/TambahLaporanKeuangan', $data);
            $this->load->view('Template/footer_admin');
            $this->load->view('Template/template_footer');
        } else {
            $upload_data = $this->upload->data();
            $jumlah_keuangan = htmlspecialchars($this->input->post('jumlah_keuangan'));
            $keterangan = htmlspecialchars($this->input->post('keterangan'));

            $this->db->set('jumlah_keuangan', $jumlah_keuangan);
            $this->db->set('keterangan', $keterangan);
            $this->db->set('lampiran', $upload_data['file_name']);
            $this->db->insert('tb_keuangan');

            $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Berhasil menambah Kas Pemasukan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('Admin/Keuangan');
        }
    }

    public function EditLaporanKeuangan($id_keuangan)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['kas'] = $this->db->get('tb_keuangan')->result_array();
        $data['keuangan'] = $this->db->get_where('tb_keuangan', ['id_keuangan' => $this->session->userdata('id_keuangan')])->row_array();
        $data['menu'] = $this->db->get('tb_menu')->result_array();
        $data['title'] = 'Edit Laporan Keuangan';
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['ubahpemasukan'] =   $this->db->get_where('tb_keuangan', ['id_keuangan' => $id_keuangan])->row_array();

        $this->form_validation->set_rules('jumlah_keuangan', 'jumlah_keuangan', 'required|trim', [
            'required' => 'Nominal Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('lampiran', 'lampiran', 'required|trim', [
            'required' => 'Lampiran Wajib Diisi!'
        ]);

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/EditLaporanKeuangan', $data);
        $this->load->view('Template/footer_menu');
        $this->load->view('Template/template_footer');
    }

    public function UpdateLaporanKeuangan()
    {
        $id_keuangan = htmlspecialchars($this->input->post('id_keuangan', true));
        $jumlah_keuangan = htmlspecialchars($this->input->post('jumlah_keuangan', true));

        $upload_profil = $_FILES['lampiran']['name'];
        if ($upload_profil) {
            $config['upload_path']          = './assets/img/lampirankeuangan/';
            $config['allowed_types']        = 'doc|docx|pdf|jpg|jpeg|png|zip';
            $config['max_size'] = 0;
            $config['encrypt_name'] = TRUE;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('lampiran')) {
                $lampiran = $this->upload->data('file_name');
                $this->db->set('lampiran', $lampiran);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set('jumlah_keuangan', $jumlah_keuangan);
        $this->db->where('id_keuangan', $id_keuangan);
        $this->db->update('tb_keuangan');

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah data Pemasukan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Admin/Keuangan');
    }
    public function DetailLaporanKeuangan($id_keuangan)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['kas'] = $this->db->get('tb_keuangan')->result_array();
        $data['keuangan'] = $this->db->get_where('tb_keuangan', ['id_keuangan' => $this->session->userdata('id_keuangan')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['detailpemasukan'] = $this->db->get_where('tb_keuangan', ['id_keuangan' => $id_keuangan])->row_array();
        $data['title'] = 'Detail Laporan Keuangan';

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/DetailLaporanKeuangan', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }
    public function HapusLaporanKeuangan($id_keuangan)
    {
        $this->db->where('id_keuangan', $id_keuangan);
        $this->db->delete('tb_keuangan');
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus Data Laporan Keuangan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Admin/Keuangan');
    }

    public function download($id_keuangan)
    {
        $data = $this->db->get_where('tb_keuangan', ['id_keuangan' => $id_keuangan])->row();
        // $this->load->function('force_download');
        force_download('./assets/img/lampirankeuangan/' . $data->lampiran, NULL);
    }

    public function tambahkomentar()
    {
        $data = [
            'nama_komentar' => $this->input->post('nama_komentar', true),
            'nik' => $this->input->post('nik', true),
            'isi_komentar' => $this->input->post('isi_komentar', true),
            'id_pengumuman' => $this->input->post('id_pengumuman', true)
        ];

        $this->db->insert('tb_komentar', $data);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success" role="alert">
            Berhasil menambah Komentar!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Admin/Pengumuman');
    }

    public function hapuskomentar($id_komentar)
    {
        $this->db->where('id_komentar', $id_komentar);
        $this->db->delete('tb_komentar');
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus komentar!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Admin/Pengumuman');
    }

    public function editkomentar($id_komentar)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id_pengumuman')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['penduduk_baru'] = $this->db->get('tb_penduduk_baru')->result_array();
        $data['ubahkomentar'] =   $this->db->get_where('tb_komentar', ['id_komentar' => $id_komentar])->row_array();
        $data['title'] = 'Penduduk Baru';
        $data['komentar'] = $this->db->get('tb_komentar')->result_array();


        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Admin/EditKomentar', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function updatekomentar()
    {

        $id_komentar = htmlspecialchars($this->input->post('id_komentar', true));

        $data = [
            'id_komentar' => htmlspecialchars($this->input->post('id_komentar', true)),
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'nama_komentar' => htmlspecialchars($this->input->post('nama_komentar', true)),
            'isi_komentar' => htmlspecialchars($this->input->post('isi_komentar', true)),
            'id_pengumuman' => htmlspecialchars($this->input->post('id_pengumuman', true))
        ];

        $where = array(
            'id_komentar' => $id_komentar
        );

        $this->Admin_Model->update_data($where, $data, 'tb_komentar');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Komentar!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Admin/Pengumuman');
    }

    public function cetak()
    {
        $data['kas'] = $this->db->get('tb_keuangan')->result_array();
        $data['keuangan'] = $this->db->get_where('tb_keuangan', ['id_keuangan' => $this->session->userdata('id_keuangan')])->row_array();
        // $data['laporan'] = $this->Admin_Model->tampildata("tb_keuangan")->result();

        $this->load->view('Admin/laporan_pdf', $data);
        $this->load->view('Template/template_footer');
    }
}
