<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Rak_model');
        if ($this->session->userdata('level')!= 'admin') {
        redirect('auth');
        }
    }
	
	public function index()
	{
        $this->db->from('rak_buku');
        $this->db->order_by('nomor_rak','ASC');
        $rak = $this->db->get()->result_array();

        $data = array(
            'judul' => 'lentera || Rak page',
            'rak'  => $rak
        );
        $this->template->load('template','admin/rak',$data);
    }

    public function save(){
        $this->Rak_model->save();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/rak');
    }

    public function delete($id){
        $this->Rak_model->delete($id);
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/rak');
    }

    public function update(){
        $this->Rak_model->update();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/rak');
    }
}
