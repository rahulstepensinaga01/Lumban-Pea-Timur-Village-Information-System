<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        redirect('Autentikasi');
    } else {
        $id_role = $ci->session->userdata('id_role');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('tb_menu', ['menu' => $menu])->row_array();
        $id_menu = $queryMenu['id_menu'];

        $useraccess = $ci->db->get_where(
            'tb_akses_menu',
            [
                'id_role' => $id_role,
                'id_menu' => $id_menu
            ]
        );

        if ($useraccess->num_rows() < 1) {
            redirect('Autentikasi/Blocked');
        }
    }
}
