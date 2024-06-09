<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection_model extends CI_Model {

    public function save (){
        $cover = date('YmdHis').'.jpg';//penamaan ini digunakan agar foto tidak sama
        $config['upload_path']          = 'assets/upload/cover/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']         = '*';
        $config['file_name']            = $cover; //file yang diupload, akan diubah namanya menjadi nama seperti di $namafoto
        $this->load->library('upload', $config);// untuk setting perintah yang diatas(setup)
        if($_FILES['cover']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran fotomu terlalu besar nih, upload ulang foto dengan ukuran yang kurang dari 500 KB yaa.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/collection');  
        }  elseif( ! $this->upload->do_upload('cover')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }   

        
        $data = array(
            'book_title'  => $this->input->post('book_title'),
            'cover' => $cover,
            'isbn'  => $this->input->post('isbn'),
            'kode_buku'    => $this->input->post('kode_buku'),
			'category_id'	=> $this->input->post('category_id'),
			'penulis_id'		=> $this->input->post('penulis_id'),
			'penerbit_id'		=> $this->input->post('penerbit_id'),
            'rak_id'		=> $this->input->post('rak_id'),
			'tahun'			=> $this->input->post('tahun'),
            'status'        => 'tersedia'
        );
        $this->db->insert('collection',$data);
    }


}
