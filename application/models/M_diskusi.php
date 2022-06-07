<?php

class M_diskusi extends CI_Model{
    public function tampil_data(){
        return $this->db->get('diskusi');
    }

    public function delete_diskusi($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_diskusi($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function edit_diskusi($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_diskusi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}