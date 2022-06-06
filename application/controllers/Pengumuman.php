<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('welcome/');
        }
    }
    
    // public function index(){
    //     $this->load->model('m_pengumuman');
    //     $data['pengumuman'] = $this->m_pengumuman->tampil_data()->result();
    //     $this->load->view('admin/pengumuman', $data);
    // }

    
}

?>