<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {
	public function __construct(){
        parent::__construct();
        
    }
	
	public function index()
	{
        $this->load->view('login');
    }

    public function login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user');
        $this->db->where('username',$username);
        $cek = $this->db->get()->row();

        if ($cek == null){
            $this->session->set_flashdata('alert' ,
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong> soowwyy username doesnt exist :(</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth');
        }else if($password == $cek->password){

            $data = array(
                'user_id' => $cek->user_id,
                'name' => $cek->name,
                'username' => $cek->username,
                'password' => $cek->password,
                'level' => $cek->level,
            );
            $this->session->set_userdata($data);
            redirect('admin/beranda');
        }else{
            $this->session->set_flashdata('alert' ,
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>sowwwy your password is incorect :(</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth');
        }


    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }
}