<?php

class Main extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_Model','Main_Model');
    }
    public function index()
    {
        $data['title'] = 'Sistem Keluhan dan Saran';
        $data['kelas'] = $this->db->get('kelas')->result();
        $this->load->view('partials/header',$data);
        $this->load->view('index',$data);
        $this->load->view('partials/footer');
    }
    public function aksi()
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
                $image = 'no_image.png';    
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
            $this->db->insert('keluhan',$keluhan);
            $this->session->set_flashdata('success','Keluhan dan saran sudah dikirim !');
            redirect(base_url());
    }
}