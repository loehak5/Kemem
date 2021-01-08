<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Nimda  extends CI_Model
{
    function __construct()
    {
        $this->userTbl = 'user';
    }

    function jumlah_data()
    {
        return $this->db->get('keuangan')->num_rows();
    }

    function data($limit, $page)
    {
        $this->db->select('*');
        $this->db->from('keuangan');
        $this->db->order_by('tgl', 'DESC');
        $this->db->limit($limit, $page);

        return $this->db->get();
    }

    // function menu()
    // {
    //     $role_id = $this->session->userdata('role_id');
    //     $menu = $this->db->query("SELECT (user_menu . id), (menu) FROM user_menu JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id WHERE user_access_menu. role_id = $role_id ORDER BY user_access_menu.menu_id ASC")->result_array();
    //     return $menu;
    // }

    // function sub_menu()
    // {
    //     $menuId = $this->session->userdata('id');
    //     $Smenu = $this->db->query("SELECT * FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id WHERE user_sub_menu. menu_id = $menuId AND user_sub_menu.is_active = 1")->result_array();
    //     return $Smenu;
    // }


    function nominalmk()
    {
        $sql = $this->db->query("SELECT SUM(IF( status = 'pemasukan.svg', nominal, 0)) AS jml_pemasukan, SUM(IF( status = 'pengeluaran.svg', nominal, 0)) AS jml_pengeluaran FROM keuangan");
        return $sql;
    }

    function insert($data = array())
    {
        //add created and modified data if not included
        if (!array_key_exists("masuk", $data)) {
            $data['masuk'] = date("Y-m-d H:i:s");
        }
        if (!array_key_exists("edit", $data)) {
            $data['edit'] = date("Y-m-d H:i:s");
        }

        $insert = $this->db->insert($this->userTbl, $data);

        //return the status
        if ($insert) {
            return $this->db->insert_id();;
        } else {
            return false;
        }
    }

    function jumlah_data_pendapatan()
    {
        return $this->db->get('pendapatan')->num_rows();
    }

    function data_pendapatan($limit, $page)
    {
        $this->db->select('*');
        $this->db->from('pendapatan');
        $this->db->order_by('tgl', 'DESC');
        $this->db->limit($limit, $page);

        return $this->db->get();
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function datakeuangan($table, $filter)
    {
        $sql = $this->db->query("SELECT * FROM $table WHERE $filter = 'id' ORDER BY 'masuk' ASC ");
        return $sql;
    }

    function jumlahaAgt()
    {
        $sql = $this->db->query("SELECT 'SUM' nama, COUNT(nama) AS total FROM user");
        return $sql;
    }
    function data_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('masuk', 'DESC');

        return $this->db->get();
    }

    function update($where, $data, $table)
    {
        if (!array_key_exists("edit", $data)) {
            $data['edit'] = date("Y-m-d H:i:s");
        }

        $this->db->where('email', $where);
        $this->db->update($table, $data);
    }

    function up_data($data, $table)
    {
        if (!array_key_exists("masuk", $data)) {
            $data['masuk'] = date("Y-m-d H:i:s");
        }
        if (!array_key_exists("edit", $data)) {
            $data['edit'] = date("Y-m-d H:i:s");
        }

        $this->db->insert($table, $data);
        return TRUE;
    }
    function up_data2($data, $table)
    {
        if (!array_key_exists("tgl", $data)) {
            $data['tgl'] = date("Y-m-d H:i:s");
        }

        $this->db->insert($table, $data);
        return TRUE;
    }

    function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
