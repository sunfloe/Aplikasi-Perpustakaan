<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        if ($this->session->userdata('level')!= 'admin') {
        redirect('auth');
        }
    }
	
	public function index()
	{
        $this->db->from('user');
        $this->db->order_by('username','ASC');
        $user = $this->db->get()->result_array();

        $data = array(
            'judul' => 'lentera || User page',
            'user'  => $user
        );
        $this->template->load('template','admin/user',$data);
    }

    public function save(){
        $this->db->from('user');
        $this->db->where('username',$this->input->post('username'));
        $ooo = $this->db->get()->result_array();
        if ($ooo != NULL) {
            $this->session->set_flashdata('alert' ,
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Oops username alredy exist:(</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/user');
        }
        $this->User_model->save();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/user');
    }

    public function delete($id){
        $this->User_model->delete($id);
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/user');
    }

    public function update(){
        $this->User_model->update();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/user');
    }

    public function reset($id){
        $this->User_model->reset($id);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!! your password is changed to 123</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

    redirect('admin/user');
    }
}
