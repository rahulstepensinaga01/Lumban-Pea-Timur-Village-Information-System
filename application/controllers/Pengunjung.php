<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengguna_Model');
	}
	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('Pengguna');
		}
		$data['admin'] = $this->Pengguna_Model->getPengurusDesa();
		$data['pengumuman'] = $this->db->get('tb_pengumuman')->result_array();
		$data['title'] = 'Beranda';
		$this->load->view('Template/template_header', $data);
		$this->load->view('Template/sidebar_pengunjung');
		$this->load->view('Pengunjung/Beranda');
		$this->load->view('Template/footer_pengunjung');
		$this->load->view('Template/template_footer');
	}

	public function galeri()
	{
		if ($this->session->userdata('username')) {
			redirect('Pengguna');
		}
		$data['title'] = 'Galeri';
		$this->load->view('Template/template_header', $data);
		$this->load->view('Template/sidebar_pengunjung');
		$this->load->view('Pengunjung/Galeri');
		$this->load->view('Template/footer_pengunjung');
		$this->load->view('Template/template_footer');
	}

	public function DetailPengumuman($id_pengumuman)
	{
		if ($this->session->userdata('username')) {
			redirect('Pengguna');
		}
		$data['detailpengumuman'] = $this->db->get_where('tb_pengumuman', ['id_pengumuman' => $id_pengumuman])->row_array();
		$data['title'] = 'Detail Pengumuman';
		$this->load->view('Template/template_header', $data);
		$this->load->view('Template/sidebar_pengunjung');
		$this->load->view('Pengunjung/DetailPengumuman');
		$this->load->view('Template/footer_pengunjung');
		$this->load->view('Template/template_footer');
	}
	public function DetailPengurusDesa($nik)
	{
		if ($this->session->userdata('username')) {
			redirect('Pengguna');
		}
		$data['detailpendudukbaru'] = $this->db->get_where('tb_penduduk_baru', ['nik' => $nik])->row_array();
		$data['title'] = 'Detail Pengumuman';
		$this->load->view('Template/template_header', $data);
		$this->load->view('Template/sidebar_pengunjung');
		$this->load->view('Pengunjung/DetailPengurusDesa');
		$this->load->view('Template/footer_pengunjung');
		$this->load->view('Template/template_footer');
	}
}
