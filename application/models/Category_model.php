<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	public function save()
	{
        $data = array(
            'name_category'  => $this->input->post('name_category'),
        );
        $this->db->insert('category',$data);
	}

    public function delete($id){
        $where = array (
            'category_id'   => $id
        );
        $this->db->delete('category',$where);
    }

    public function edit(){
        $where = array(
            'category_id'   => $this->input->post('category_id')
        );
        $data = array(
            'name_category'      => $this->input->post('name_category'),
        );

        $this->db->update('category',$data,$where);
    }
}
