<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_Model extends CI_Model
{
    function getSubMenu()
    {
        $query = "SELECT tb_sub_menu.*, tb_menu.menu
                    FROM tb_sub_menu JOIN tb_menu
                    ON tb_sub_menu.id_menu = tb_menu.id_menu";
        return $this->db->query($query)->result_array();
    }
    function getEditSubMenu($id_submenu)
    {
        $query = "SELECT tb_sub_menu.*, tb_menu.menu
                    FROM tb_sub_menu JOIN tb_menu
                    ON tb_sub_menu.id_menu = tb_menu.id_menu
                    WHERE tb_sub_menu.id_submenu = $id_submenu";
        return $this->db->query($query)->result_array();
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
