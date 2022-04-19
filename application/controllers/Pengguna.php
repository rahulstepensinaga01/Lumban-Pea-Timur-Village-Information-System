<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_Model');
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['title'] = 'Dashboard';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_pengguna', $data);
        $this->load->view('Pengguna/HalamanUtama', $data);
        $this->load->view('Template/footer_pengguna');
        $this->load->view('Template/template_footer');
    }

    public function profil()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['role'] = $this->db->get('tb_pengumuman')->result_array();
        $data['title'] = 'My Profile';

        $nik = $data['tb_akun']['nik'];
        $data['tb_penduduk'] = $this->db->get_where('tb_penduduk_baru', ['nik' => $nik])->row_array();


        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_pengguna', $data);
        $this->load->view('Pengguna/profil', $data);
        $this->load->view('Template/footer_pengguna');
        $this->load->view('Template/template_footer');
    }

    public function editakunprofil()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['role'] = $this->db->get('tb_pengumuman')->result_array();
        $data['title'] = 'Edit Profile';
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
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar', $data);
            $this->load->view('Template/header_pengguna', $data);
            $this->load->view('Pengguna/EditAkunProfil', $data);
            $this->load->view('Template/footer_pengguna');
            $this->load->view('Template/template_footer');
        } else {
            $nik = htmlspecialchars($this->input->post('nik', true));
            $nama = htmlspecialchars($this->input->post('nama', true));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin', true));
            $email = htmlspecialchars($this->input->post('email', true));
            $username = htmlspecialchars($this->input->post('username', true));
            $password = htmlspecialchars($this->input->post('password', true));

            //untuk upload
            $upload_profil = $_FILES['profil']['name'];
            if ($upload_profil) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '3000';
                $config['upload_path'] = './assets/img/profil/';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profil')) {
                    $profil_lama = $data['tb_akun']['profil'];
                    if ($profil_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profil/' . $profil_lama);
                    }

                    $profil_baru = $this->upload->data('file_name');
                    $this->db->set('profil', $profil_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nik', $nik);
            $this->db->set('nama', $nama);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->set('email', $email);
            $this->db->set('username', $username);
            $this->db->set('password', $password);

            $this->db->where('nik', $nik);
            $this->db->update('tb_akun');

            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Data Akun!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Pengguna/Profil');
        }
    }

    public function EditDataPribadi()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['role'] = $this->db->get('tb_pengumuman')->result_array();
        $data['title'] = 'Edit Profile';

        $nik = $data['tb_akun']['nik'];
        $data['tb_penduduk'] = $this->db->get_where('tb_penduduk_baru', ['nik' => $nik])->row_array();

        $this->form_validation->set_rules('jumlah_anggota_keluarga', 'jumlah_anggota_keluarga', 'required|trim', [
            'required' => 'Jumlah Anggota Keluarga Wajib Diisi!'
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
            $this->load->view('Template/header_pengguna', $data);
            $this->load->view('Pengguna/EditDataPribadi', $data);
            $this->load->view('Template/footer_pengguna');
            $this->load->view('Template/template_footer');
        } else {
            $nik = htmlspecialchars($this->input->post('nik', true));
            $nama = htmlspecialchars($this->input->post('nama', true));
            $jumlah_anggota_keluarga = htmlspecialchars($this->input->post('jumlah_anggota_keluarga', true));
            $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir', true));
            $tanggal_lahir = htmlspecialchars($this->input->post('tanggal_lahir', true));
            $alamat = htmlspecialchars($this->input->post('alamat', true));
            $pekerjaan = htmlspecialchars($this->input->post('pekerjaan', true));

            $this->db->set('nik', $nik);
            $this->db->set('nama', $nama);
            $this->db->set('jumlah_anggota_keluarga', $jumlah_anggota_keluarga);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tanggal_lahir', $tanggal_lahir);
            $this->db->set('alamat', $alamat);
            $this->db->set('pekerjaan', $pekerjaan);

            $this->db->where('nik', $nik);
            $this->db->update('tb_penduduk_baru');

            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Data Pribadi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Pengguna/Profil');
        }
    }

    public function daftarpengumuman()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['role'] = $this->db->get('tb_pengumuman')->result_array();
        $data['title'] = 'Daftar Pengumuman';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_pengguna', $data);
        $this->load->view('Pengguna/daftarpengumuman', $data);
        $this->load->view('Template/footer_pengguna');
        $this->load->view('Template/template_footer');
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
        $this->load->view('Pengguna/DetailPengumuman', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
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
        redirect('Pengguna/DaftarPengumuman');
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
        redirect('Pengguna/DaftarPengumuman');
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
        $this->load->view('Pengguna/EditKomentar', $data);
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

        $this->Pengguna_Model->update_data($where, $data, 'tb_komentar');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Komentar!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Pengguna/DaftarPengumuman');
    }

    public function daftarpengurusdesa()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['title'] = 'Daftar Pengurus Desa';
        $data['admin'] = $this->Pengguna_Model->getPengurusDesa();

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Pengguna/DaftarPengurusDesa', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function DetailPengurusDesa($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['detailakun'] = $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();
        $data['detailpendudukbaru'] = $this->db->get_where('tb_penduduk_baru', ['nik' => $nik])->row_array();
        $data['title'] = 'Detail Penduduk Baru';
        $data['admin'] = $this->Pengguna_Model->getPengurusDesa();

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Pengguna/DetailPengurusDesa', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function daftarpendudukdesa()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id_pengumuman')])->row_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['penduduk_baru'] = $this->db->get('tb_penduduk_baru')->result_array();
        $data['title'] = 'Daftar Penduduk Desa';
        $data['duduk'] = $this->Pengguna_Model->getPendudukDesa();

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Pengguna/DaftarPendudukDesa', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }

    public function DetailPendudukDesa($nik)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['detailakun'] = $this->db->get_where('tb_akun', ['nik' => $nik])->row_array();
        $data['detailpendudukbaru'] = $this->db->get_where('tb_penduduk_baru', ['nik' => $nik])->row_array();
        $data['title'] = 'Detail Penduduk Baru';
        $data['duduk'] = $this->Pengguna_Model->getPengurusDesa();

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Pengguna/DetailPendudukDesa', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }
    public function laporankeuangan()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_pengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $this->session->userdata('id')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['laporankeuangan'] = $this->db->get_where('tb_keuangan', ['id_keuangan' => $this->session->userdata('id_keuangan')])->row_array();
        $data['kas'] = $this->db->get('tb_keuangan')->result_array();
        $data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
        $data['role'] = $this->db->get('tb_pengumuman')->result_array();
        $data['title'] = 'Laporan Keuangan';
        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_pengguna', $data);
        $this->load->view('Pengguna/laporankeuangan', $data);
        $this->load->view('Template/footer_pengguna');
        $this->load->view('Template/template_footer');
    }

    public function Cetak()
    {
        $data['kas'] = $this->db->get('tb_keuangan')->result_array();
        $data['keuangan'] = $this->db->get_where('tb_keuangan', ['id_keuangan' => $this->session->userdata('id_keuangan')])->row_array();
        // $data['laporan'] = $this->Admin_Model->tampildata("tb_keuangan")->result();

        $this->load->view('Admin/laporan_pdf', $data);
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
        $this->load->view('Pengguna/DetailLaporanKeuangan', $data);
        $this->load->view('Template/footer_admin');
        $this->load->view('Template/template_footer');
    }
    public function download($id_keuangan)
    {
        $data = $this->db->get_where('tb_keuangan', ['id_keuangan' => $id_keuangan])->row();
        // $this->load->function('force_download');
        force_download('./assets/img/lampirankeuangan/' . $data->lampiran, NULL);
    }
}
