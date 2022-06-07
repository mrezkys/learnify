<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskusi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('welcome');
        }
    }

    public function index(){
        $this->load->model('m_diskusi');
        $data['diskusi'] = $this->m_diskusi->tampil_data()->result();
        $this->load->view('diskusi/index', $data);
    }

    public function detail($id){
        $this->load->model('m_diskusi');
        $where = array('id' => $id);
        $data['diskusi'] = $this->m_diskusi->detail_diskusi($where,'diskusi')->result();
        $komentar_id = $data['diskusi'][0]->komentar;
        $data['komid'] = $komentar_id;
        $data['komentar'] = null;
        if ($komentar_id != null) {
            $list_komentar_id = explode('|', $komentar_id);
            $this->load->model('m_komentar');
            $data['komentar'] = $this->m_komentar->get('komentar', 'id', $list_komentar_id);
        }

        $this->load->view('diskusi/detail_diskusi',$data);
    }

    public function tambah_komentar($id_diskusi){
        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'Harap isi kolom Judul.',
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Harap isi kolom deskripsi.',
        ]);

        $datakom = [
            'komentar' => htmlspecialchars($this->input->post('komentar', true)),
            'posted_by' => htmlspecialchars($this->input->post('nama', true)),
        ];

        $this->db->insert('komentar', $datakom);
        $komid = $this->db->insert_id();

        $where = array('id' => $id_diskusi);
        $datadis = $this->db->get_where('diskusi', $where)->result();
        $kom =  $datadis[0]->komentar.$komid."|";

        
        $datas = array(
            'komentar' => $kom,
        );

        $where = array(
            'id' => $id_diskusi,
        );

        $this->db->where($where)->update('diskusi', $datas);



        $this->session->set_flashdata('success-reg', 'Berhasil!');
        redirect(base_url('diskusi/detail/'.$id_diskusi));
    }

    public function manage_diskusi(){
        // select by user post
        $this->load->model('m_diskusi');
        $data['diskusi'] = $this->m_diskusi->tampil_data()->result();
        $this->load->view('diskusi/manage_diskusi', $data);
    }


    public function tambah_diskusi(){
        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'Harap isi kolom Judul.',
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Harap isi kolom deskripsi.',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('diskusi/add_diskusi');
        } else {
            $data = [
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'posted_by' => htmlspecialchars($this->input->post('id', true)),
            ];

            $this->db->insert('diskusi', $data);

            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('diskusi'));
        }
    }

    public function edit_diskusi($id){
        $this->load->model('m_diskusi');
        $where = array('id' => $id);
        $data['diskusi'] = $this->m_diskusi->edit_diskusi($where,'diskusi')->result();
        $this->load->view('diskusi/edit_diskusi',$data);
    }

    public function update_diskusi($id){
        $this->load->model('m_diskusi');
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'judul' => $judul,
            'deskripsi' => $deskripsi,
        );

        $where = array(
            'id' => $id,
        );

        $this->m_diskusi->update_diskusi($where, $data, 'diskusi');
        redirect('diskusi/management_diskusi');
    }

    public function delete_diskusi($id){
        $this->load->model('m_diskusi');
        $where = array('id' => $id);
        $this->m_diskusi->delete_diskusi($where, 'diskusi');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('diskusi/manage_diskusi');
    }


}