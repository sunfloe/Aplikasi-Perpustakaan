<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit_model extends CI_Model {

	public function add()
	{
        $data = array(
            'name_penerbit'  => $this->input->post('name_penerbit'),
        );
        $this->db->insert('penerbit',$data);
	}

    public function edit(){
        $where = array(
            'penerbit_id'   => $this->input->post('penerbit_id')
        );
        $data = array(
            'name_penerbit'      => $this->input->post('name_penerbit'),
        );

        $this->db->update('penerbit',$data,$where);
    }

    public function delete($id){
        $where = array (
            'penerbit_id'   => $id
        );
        $this->db->delete('penerbit',$where);
    }
}
