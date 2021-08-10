<?php

class Main_Model extends CI_Model{
    public function getKelas()
    {
        return $this->db->get('kelas')->result();
    }
    public function insert($image)
    {
        $data = [
            'krisar' => $this->input->post('krisar'),
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nis'),
            'kelas' => $this->input->post('kelas'),
            'image' => $image
        ];
        var_dump($data);
        //$this->db->insert('tbl_krisar',$data);
    }
}