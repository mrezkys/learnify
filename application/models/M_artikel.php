<?php

class M_artikel extends CI_Model{
    public function tampil_data(){
        return $this->db->get('artikel');
    }

    public function delete_artikel($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_artikel($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_artikel($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    
}