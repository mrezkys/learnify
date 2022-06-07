<?php

class M_komentar extends CI_Model{
    public function get($table,$target, $where_in = NULL, ){
        if(! empty($where_in))
        {
          $this->db->where_in($target,$where_in);
        }
        $query = $this->db->get($table);
        if($query->num_rows()>0)
        {
           return $query->result_array();
        }
    }

}