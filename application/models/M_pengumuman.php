<?php

class M_pengumuman extends CI_Model{
    public function tampil_data(){
        return $this->db->get('pengumuman');
    }

    public function delete_pengumuman($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_pengumuman($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_pengumuman($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}