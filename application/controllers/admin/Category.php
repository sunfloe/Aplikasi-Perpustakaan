<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Category_model');
        if ($this->session->userdata('level')!= 'admin') {
        redirect('auth');
        }
    }
	public function index()
	{
        $this->db->from('category');
        $this->db->order_by('name_category','ASC');
        $category = $this->db->get()->result_array();

        $data = array(
            'judul' => 'SunFloe Library || Category',
            'category'  => $category
        );
        $this->template->load('template','admin/category',$data);
	}

    public function save(){
        $this->db->from('category');
        $this->db->where('name_category',$this->input->post('name_category'));
        $ooo = $this->db->get()->result_array();
        if ($ooo != NULL) {
            $this->session->set_flashdata('alert' ,
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Oops the category is alredy exist:(</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/category');
        }
        $this->Category_model->save();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/category');
    }

    public function delete($id){
        $this->Category_model->delete($id);
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/category');
    }

    public function edit(){
        $this->Category_model->edit();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/category');

    }
}
