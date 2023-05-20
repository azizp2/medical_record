<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingModel extends CI_Model
{
    private $tableUsers = "ch_gen_tbl_user";
    private $tableGroup = "ch_gen_tbl_utl_user_group";

    function getAllUsers()
    {
        $this->db->select("userid, position_name, groupid, user_group_name, firstname, lastname, mobilenumber, c.factory_name");
        $this->db->join("ch_gen_tbl_utl_user_group b", "a.groupid = b.user_group_id");
        $this->db->join("gen_tbl_mst_factory c", "a.groupid = b.user_group_id", "left");
        $this->db->join("gen_tbl_mst_position d", "a.position_id = a.position_id");
        $this->db->group_by("userid");

        return $this->db->get("ch_gen_tbl_user a")->result();
    }

    // Region Group Users
    function getAllGroup()
    {
        return $this->db->get($this->tableGroup)->result();
    }
    // End Region Group Users
}
