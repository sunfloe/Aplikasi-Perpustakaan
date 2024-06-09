<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }

    public function index(){
    $this->db->from('anggota')->order_by('nama_anggota','ASC');
    $anggota = $this->db->get()->result_array();

        $data = array(
            'judul'         => 'Sunnfloe  Library || Anggota',
            'anggota'    => $anggota
        );
        $this->template->load('template', 'admin/anggota', $data);
    }

    public function save(){
        $this->Anggota_model->save();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/anggota');
    }

    public function update(){
        $this->Anggota_model->update();
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/anggota');
    }

    public function delete($id){
        $this->Anggota_model->delete($id);
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/anggota');
    }
}

?>