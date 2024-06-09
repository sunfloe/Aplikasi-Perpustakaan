<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
        
    }
	
	public function index()
	{

        $this->db->from('collection a')->where('status','tersedia')->order_by('book_title','ASC');
        $this->db->join('category c', 'a.category_id=c.category_id', 'left');
        $this->db->join('penulis d', 'a.penulis_id=d.penulis_id', 'left');
        $this->db->join('rak_buku e', 'a.rak_id=e.rak_id', 'left');

		$collection = $this->db->get()->result_array();

        $data = array(

            'collection'    => $collection
        );

        if ($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword',$data['keyword']);
		}else{
			$data['keyword'] = $this->session->userdata('keyword');
		}
        $this->load->view('home',$data);

    }
}