<?php

class Artikel extends CI_Controller{
    public function index(){
        $this->load->model('m_artikel');
        $data['artikel'] = $this->m_artikel->tampil_data()->result();
        $this->load->view('template/nav');
        $this->load->view('artikel/index', $data);
        $this->load->view('template/footer');
    }
}
