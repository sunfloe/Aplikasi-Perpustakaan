<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

    public function save (){
        $data = array(
            'nama_anggota'  => $this->input->post('nama_anggota'),
            'no_anggota'  => $this->input->post('no_anggota'),
            'alamat'  => $this->input->post('alamat'),
            'status'  => $this->input->post('status'),
        );
        $this->db->insert('anggota',$data);
    }

    public function delete($id){
        $where = array (
            'anggota_id'   => $id
        );
        $this->db->delete('anggota',$where);
    }

    public function update(){
        $where = array(
            'anggota_id'   => $this->input->post('anggota_id')
        );
        $data = array(
            'nama_anggota'  => $this->input->post('nama_anggota'),
            'no_anggota'  => $this->input->post('no_anggota'),
            'alamat'  => $this->input->post('alamat'),
            'status'  => $this->input->post('status'),
        );

        $this->db->update('anggota',$data,$where);
    }
}
