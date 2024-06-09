<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Penerbit_model');
        if ($this->session->userdata('level')!= 'admin') {
        redirect('auth');
        }
    }

    public function index()
	{
        $this->db->from('penerbit');
        $this->db->order_by('name_penerbit','ASC');
        $penerbit = $this->db->get()->result_array();
        $data = array(
            'judul' => 'SunFloe Library || Penerbit',
            'penerbit'  => $penerbit
        );
		$this->template->load('template','admin/penerbit',$data);
	}

    public function add(){
        $this->db->from('penerbit');
        $this->db->where('name_penerbit',$this->input->post('name'));
        $ooo = $this->db->get()->result_array();
        if ($ooo != NULL) {
            $this->session->set_flashdata('alert' ,
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Oops the category is alredy exist:(</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/penerbit');
        }
        $this->Penerbit_model->add();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/penerbit');
    }

    public function delete($id){
        $this->Penerbit_model->delete($id);
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/penerbit');
    }

    public function edit(){
        $this->Penerbit_model->edit();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/penerbit');

    }


}
