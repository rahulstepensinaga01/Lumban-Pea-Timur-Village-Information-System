<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_Model extends CI_Model
{
    function getPengurusDesa()
    {
        $query = "SELECT tb_penduduk_baru.*, tb_akun.*
                    FROM tb_penduduk_baru JOIN tb_akun
                    ON tb_penduduk_baru.nik = tb_akun.nik
                    where tb_akun.id_role = 1";
        return $this->db->query($query)->result_array();
    }
    function getPendudukDesa()
    {
        $query = "SELECT tb_penduduk_baru.*, tb_akun.*
                    FROM tb_penduduk_baru JOIN tb_akun
                    ON tb_penduduk_baru.nik = tb_akun.nik
                    where tb_akun.id_role = 2";
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
