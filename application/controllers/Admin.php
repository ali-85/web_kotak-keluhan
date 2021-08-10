<?php

header('Access-Control-Allow-Origin: *');
Class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
        $data['kelas'] = $this->db->get('kelas')->result();
        $data['keluhan'] = $this->db->get('keluhan')->result();
        $this->load->view('partials/header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('partials/footer');
    }
    public function getubah()
    {
        echo json_encode($this->db->get_where('keluhan',['id' => $this->input->post('id')])->row_array());
    }
    public function ubahKeluhan($id = NULL)
    {
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2048000'; // max size in KB
        $config['max_width'] = '20000'; //max resolution width
        $config['max_height'] = '20000';  //max resolution height
        // load CI libarary called upload
        $this->load->library('upload', $config);
        // body of if clause will be executed when image uploading is failed
        if(!$this->upload->do_upload('image')){
            $errors = array('error' => $this->upload->display_errors());
            // This image is uploaded by deafult if the selected image in not uploaded
            $image = $_FILES['image']['name'];    
        }
        // body of else clause will be executed when image uploading is succeeded
        else {
            $data = array('upload_data' => $this->upload->data());
            $image = $_FILES['image']['name'];                
        }
        $keluhan = [
            'keluhan' => $this->input->post('keluhan'),
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nis'),
            'kelas' => $this->input->post('kelas'),
            'dokumen' => $image
        ];
        $this->db->where('id',$id);
        $this->db->update('keluhan',$keluhan);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah data keluhan !</div>');
		redirect(base_url('admin'));
    }
    public function getHapus($id = NULL)
    {
        $row = $this->db->get_where('keluhan',['id' => $id])->row();
        if (is_file('.assets/img/'.$row->dokumen)) {
            delete_files(FCPATH.'.assets/images/'.$row->dokumen);
        }
        $this->db->where('id',$id);
        $this->db->delete('keluhan');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus data keluhan !</div>');
		redirect(base_url('admin'));
    }
}