<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penulis_model extends CI_Model {

	public function add()
	{
        $data = array(
            'name'  => $this->input->post('name'),
        );
        $this->db->insert('penulis',$data);
	}

    public function edit(){
        $where = array(
            'penulis_id'   => $this->input->post('penulis_id')
        );
        $data = array(
            'name'      => $this->input->post('name'),
        );

        $this->db->update('penulis',$data,$where);
    }

    public function delete($id){
        $where = array (
            'penulis_id'   => $id
        );
        $this->db->delete('penulis',$where);
    }
}
