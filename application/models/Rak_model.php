<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak_model extends CI_Model {

    public function save (){
        $data = array(
            'nomor_rak'  => $this->input->post('nomor_rak'),
        );
        $this->db->insert('rak_buku',$data);
    }

    public function delete($id){
        $where = array (
            'rak_id'   => $id
        );
        $this->db->delete('rak_buku',$where);
    }

    public function update(){
        $where = array(
            'rak_id'   => $this->input->post('rak_id')
        );
        $data = array(
            'nomor_rak'      => $this->input->post('nomor_rak'),
        );

        $this->db->update('rak_buku',$data,$where);
    }
}
