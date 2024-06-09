<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {


	public function index()
	{

		$this->load->view('portal');
	}

    public function save(){
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $this->db->from('pengunjung')->where('tanggal',$tanggal);
        $data = array(
            'nama'  => $this->input->post('nama'),
            'keperluan'  => $this->input->post('keperluan'),
            'tanggal'     => date('Y-m-d')
        );
        $this->db->insert('pengunjung',$data);
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong> berhasil </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('home');
    }
}
