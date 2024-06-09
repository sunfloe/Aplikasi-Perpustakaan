<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penulis extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Penulis_model');
        if ($this->session->userdata('level')!= 'admin') {
        redirect('auth');
        }
    }

	public function index()
	{
        $this->db->from('penulis');
        $this->db->order_by('name','ASC');
        $penulis = $this->db->get()->result_array();
        $data = array(
            'judul' => 'sunfloe Library || Penulis',
            'penulis' =>$penulis
        );
		$this->template->load('template','admin/penulis',$data);
	}

    public function add(){
        $this->db->from('penulis');
        $this->db->where('name',$this->input->post('name'));
        $ooo = $this->db->get()->result_array();
        if ($ooo != NULL) {
            $this->session->set_flashdata('alert' ,
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Oops the category is alredy exist:(</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/penulis');
        }
        $this->Penulis_model->add();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/penulis');
    }

    public function delete($id){
        $this->Penulis_model->delete($id);
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/penulis');
    }

    public function edit(){
        $this->Penulis_model->edit();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/penulis');

    }
}
