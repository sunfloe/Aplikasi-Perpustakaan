<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function save (){
        $data = array(
            'name'  => $this->input->post('name'),
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password')),
            'level'  => $this->input->post('level'),
        );
        $this->db->insert('user',$data);
    }

    public function delete($id){
        $where = array (
            'user_id'   => $id
        );
        $this->db->delete('user',$where);
    }

    public function update(){
        $where = array(
            'user_id'   => $this->input->post('user_id')
        );
        $data = array(
            'name'      => $this->input->post('name'),
            'level'     => $this->input->post('level')
        );

        $this->db->update('user',$data,$where);
    }

    public function reset($id){
    $where = array (
        'user_id' =>$id
    );
    $data = array(
        'password' => md5('123')
    );
    $this->db->update('user',$data,$where);

    }
}
