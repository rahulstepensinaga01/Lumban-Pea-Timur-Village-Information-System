<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_Model');
        $this->load->model('Admin_Model');
        is_logged_in();
    }
    public function index()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['menu'] = $this->db->get('tb_menu')->result_array();
        $data['title'] = 'Menu Management';

        $this->form_validation->set_rules('menu', 'menu', 'required|trim', [
            'required' => 'Masukkan Nama Menu!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar', $data);
            $this->load->view('Template/header_admin', $data);
            $this->load->view('Menu/Menu', $data);
            $this->load->view('Template/footer_menu');
            $this->load->view('Template/template_footer');
        } else {
            $this->db->insert('tb_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil menambahkan Menu baru!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Menu');
        }
    }

    public function hapusmenu($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->delete('tb_menu');
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus Menu!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('menu');
    }

    public function editmenu($id_menu)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['menu'] = $this->db->get('tb_menu')->result_array();
        $data['title'] = 'Menu Management';
        $data['ubahmenu'] =   $this->db->get_where('tb_menu', ['id_menu' => $id_menu])->row_array();
        $this->form_validation->set_rules('menu', 'menu', 'required|trim', [
            'required' => 'Masukkan Nama Menu!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar', $data);
            $this->load->view('Template/header_admin', $data);
            $this->load->view('Menu/Menu', $data);
            $this->load->view('Template/footer_menu');
            $this->load->view('Template/template_footer');
        } else {
            $data = [
                'menu' => $this->input->post('menu', true)
            ];
            $this->db->where('id_menu', $id_menu);
            $this->db->update('tb_menu', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah Menu baru!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Menu');
        }
    }
    public function subMenu()
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['submenu'] = $this->Menu_Model->getSubMenu();
        $data['title'] = 'Sub Menu Management';
        $data['menu'] = $this->db->get('tb_menu')->result_array();

        $this->form_validation->set_rules('nama_menu', 'nama_menu', 'required|trim', [
            'required' => 'Masukkan Nama subMenu!'
        ]);
        $this->form_validation->set_rules('id_menu', 'id_menu', 'required|trim', [
            'required' => 'Masukkan Nama Menu!'
        ]);
        $this->form_validation->set_rules('url', 'menu', 'required|trim', [
            'required' => 'Masukkan Nama url!'
        ]);
        $this->form_validation->set_rules('icon', 'icon', 'required|trim', [
            'required' => 'Masukkan Nama icon!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Template/template_header', $data);
            $this->load->view('Template/sidebar', $data);
            $this->load->view('Template/header_admin', $data);
            $this->load->view('Menu/SubMenu', $data);
            $this->load->view('Template/footer_menu');
            $this->load->view('Template/template_footer');
        } else {
            $data = [
                'nama_menu' => $this->input->post('nama_menu'),
                'id_menu' => $this->input->post('id_menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('tb_sub_menu', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil menambahkan Submenu baru!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('Menu/submenu');
        };
    }

    public function hapussubmenu($id_submenu)
    {
        $this->db->where('id_submenu', $id_submenu);
        $this->db->delete('tb_sub_menu');
        $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus subMenu!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('Menu/Submenu');
    }

    public function editsubMenu($id_submenu)
    {
        $data['tb_akun'] = $this->db->get_where('tb_akun', ['username' => $this->session->userdata('username')])->row_array();
        $data['tb_role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['akun'] = $this->db->get('tb_akun')->result_array();
        $data['submenu'] = $this->Menu_Model->getSubMenu();
        $data['editsubmenu'] = $this->Menu_Model->getEditSubMenu($id_submenu);
        $data['title'] = 'Edit Menu Management';
        $data['menu'] = $this->db->get('tb_menu')->result_array();
        $data['ubahsubmenu'] =   $this->db->get_where('tb_sub_menu', ['id_submenu' => $id_submenu])->row_array();

        $this->form_validation->set_rules('nama_menu', 'nama_menu', 'required|trim', [
            'required' => 'Masukkan Nama subMenu!'
        ]);
        $this->form_validation->set_rules('id_menu', 'id_menu', 'required|trim', [
            'required' => 'Masukkan Nama Menu!'
        ]);
        $this->form_validation->set_rules('url', 'menu', 'required|trim', [
            'required' => 'Masukkan Nama url!'
        ]);
        $this->form_validation->set_rules('icon', 'icon', 'required|trim', [
            'required' => 'Masukkan Nama icon!'
        ]);

        $this->load->view('Template/template_header', $data);
        $this->load->view('Template/sidebar', $data);
        $this->load->view('Template/header_admin', $data);
        $this->load->view('Menu/EditSubMenu', $data);
        $this->load->view('Template/footer_menu');
        $this->load->view('Template/template_footer');
    }

    public function updatesubmenu()
    {
        $id_submenu = $this->input->post('id_submenu');
        $data = [
            'nama_menu' => $this->input->post('nama_menu'),
            'id_menu' => $this->input->post('id_menu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];
        $where = array(
            'id_submenu' => $id_submenu
        );
        $this->Admin_Model->update_data($where, $data, 'tb_sub_menu');

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Berhasil Mengubah SubMenu!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('Menu/submenu');
    }
}
