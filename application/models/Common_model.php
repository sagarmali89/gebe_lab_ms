<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class common_model extends CI_Model {

    function select($table, $where = "", $what = "*", $order = "") {
        $this->db->select($what);
        $this->db->from($table);
        if ($where != "") {
            $this->db->where($where);
        }
        if ($order != "") {
            $this->db->order_by($order[0], $order[1]);
        }
        return $this->db->get();
    }

    function selectWhereIn($table, $where = "", $whereIn = "", $what = "*", $order = "") {
        $this->db->select($what);
        $this->db->from($table);
        if ($where != "") {
            $this->db->where($where);
        }
        if ($whereIn != "") {
            $this->db->where_in($whereIn[0], $whereIn[1]);
        }
        if ($order != "") {
            $this->db->order_by($order[0], $order[1]);
        }
        return $this->db->get();
    }

    function selectGroup($table, $where = "", $what = "*", $group = "") {
        $this->db->select($what);
        $this->db->from($table);
        if ($where != "") {
            $this->db->where($where);
        }
        if ($group != "") {
            $this->db->group_by($group);
        }
        return $this->db->get();
    }

    function insert($table, $data) {
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function addData($table, $insertInfo) {
        $this->db->trans_start();
        $this->db->insert($table, $insertInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function lastQId() {
        return $this->db->insert_id();
    }

    function update($table, $where, $data) {
        $this->db->where($where);
        if ($this->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($table, $where) {
        $this->db->where($where);
        if ($this->db->delete($table)) {
            return true;
        } else {
            return false;
        }
    }

    function selectWASubTypes($where = "") {
        $this->db->from('wa_subtypes a');
        $this->db->join('wa_types b', 'b.wa_id=a.wa_type_id_fk', 'left');
        $this->db->join('tbl_area c', 'c.area_id=a.wa_subtype_location_id_fk', 'left');
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->order_by('a.wa_subtype_name', 'asc');
        return $this->db->get();
    }

    function selectArea($where = "") {
        $this->db->select('*');
        $this->db->from('tbl_area');
        $this->db->join('tbl_district', 'tbl_district.dis_id = tbl_area.fk_dis_id');
        if ($where != "") {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    function getAddress($where = "") {
        $this->db->select('*');
        $this->db->from('tbl_street');
        $this->db->join('tbl_area', 'tbl_area.area_id = tbl_street.fk_area_id');
        $this->db->join('tbl_district', 'tbl_district.dis_id = tbl_area.fk_dis_id');
        if ($where != "") {
            $this->db->where($where);
        }
        return $this->db->get();
    }

}
