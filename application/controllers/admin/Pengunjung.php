<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Pengunjung_model');
        if ($this->session->userdata('level')!= 'admin') {
        redirect('auth');
        }
    }
	
	public function index()
	{
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $this->db->from('pengunjung a')->order_by('tanggal', 'DESC')->where('tanggal',$tanggal);
        $pengunjung = $this->db->get()->result_array();

        $this->db->from('anggota')->order_by('nama_anggota');
        $anggota = $this->db->get()->result_array();


        $data = array(
            'judul' => 'lentera ||  Pengunjung page',
            'pengunjung'  => $pengunjung,
            'anggota'      => $anggota
        );
        $this->template->load('template','admin/pengunjung',$data);
    }


    public function save (){
        $data = array(
            'keperluan'  => $this->input->post('keperluan'),
            'anggota_id'  => $this->input->post('anggota_id'),
        );
        $this->db->insert('pengunjung',$data);
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/pengunjung');
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
