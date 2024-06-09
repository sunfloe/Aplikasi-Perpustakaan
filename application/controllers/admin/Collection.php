<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Collection extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Collection_model');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->db->select('*');
        $this->db->from('collection a')->order_by('a.book_title', 'ASC');
        $this->db->join('category b', 'a.category_id=b.category_id', 'left');
        $this->db->join('penulis c', 'a.penulis_id=c.penulis_id', 'left');
        $this->db->join('penerbit y', 'a.penerbit_id=y.penerbit_id', 'left');
        $this->db->join('rak_buku n', 'a.rak_id=n.rak_id', 'left');
        $collection = $this->db->get()->result_array();

        $data = array(
            'judul'         => 'Sunnfloe  Library || Collection Page',
            'collection'    => $collection
        );
        $this->template->load('template', 'admin/collection', $data,);
    }

    public function add()
    {
        $this->db->select('*');
        $this->db->from('collection a')->order_by('a.book_title', 'ASC')->where('isbn', $this->input->post('isbn'));
        $this->db->join('category b', 'a.category_id=b.category_id', 'left');
        $add = $this->db->get()->row();

        $this->db->from('category')->order_by('name_category', 'ASC');
        $category = $this->db->get()->result_array();

        $this->db->from('penulis')->order_by('name', 'ASC');
        $penulis = $this->db->get()->result_array();

        $this->db->from('penerbit')->order_by('name_penerbit', 'ASC');
        $penerbit = $this->db->get()->result_array();

        $this->db->from('rak_buku')->order_by('nomor_rak', 'ASC');
        $rak = $this->db->get()->result_array();

        $data = array(
            'judul'         => 'Sunnfloe  Library || Add Collection Page',
            'category'      => $category,
            'penulis'       => $penulis,
            'penerbit'      => $penerbit,
            'rak'           => $rak
        );
        $this->template->load('template', 'admin/collection_add', $data);
    }

    public function save()
    {
        $this->Collection_model->save();
        $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>'
        );
        redirect('admin/collection');
    }

    public function edit($book_id)
    {

        $this->db->from('collection a');
        $this->db->where('book_id',$book_id);
        $this->db->join('category b', 'a.category_id=b.category_id', 'left');
        $collection = $this->db->get()->result_array();

        $this->db->from('category')->order_by('name_category', 'ASC');
        $category = $this->db->get()->result_array();

        $this->db->from('penulis')->order_by('name', 'ASC');
        $penulis = $this->db->get()->result_array();

        $this->db->from('penerbit')->order_by('name_penerbit', 'ASC');
        $penerbit = $this->db->get()->result_array();

        $this->db->from('rak_buku')->order_by('nomor_rak', 'ASC');
        $rak = $this->db->get()->result_array();

        $data = array(
            'judul'         => 'Sunnfloe  Library || Add Collection Page',
            'category'      => $category,
            'penulis'       => $penulis,
            'penerbit'      => $penerbit,
            'collection'    => $collection,
            'rak'           => $rak
        );
        $this->template->load('template', 'admin/collection_edit', $data);
    }

    public function update(){
        $book_id = $this->input->post('book_id');
        $cover = $_FILES['cover']['name'];
    
        if ($cover) {
            // Configurasi upload file
            $config['upload_path'] = './assets/upload/cover/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = date('YmdHis') . '_' . $cover;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('cover')) {
                // Menghapus cover lama jika ada
                $old_cover = $this->db->select('cover')->get_where('collection', ['book_id' => $book_id])->row()->cover;
                if ($old_cover && file_exists('./assets/upload/cover/' . $old_cover)) {
                    unlink('./assets/upload/cover/' . $old_cover);
                }
    
                $cover = $this->upload->data('file_name');
            } else {
                // Set error message
                $this->session->set_flashdata('alert', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ' . $this->upload->display_errors() . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                );
                redirect('admin/collection');
                return;
            }
        } else {
            $cover = $this->input->post('old_cover'); // Menggunakan cover lama jika tidak ada yang baru diupload
        }
    
        $data = array(
            'book_title'    => $this->input->post('book_title'),
            'kode_buku'     => $this->input->post('kode_buku'),
            'cover'         => $cover,
            'category_id'   => $this->input->post('category_id'),
            'penulis_id'    => $this->input->post('penulis_id'),
            'penerbit_id'   => $this->input->post('penerbit_id'),
            'rak_id'   => $this->input->post('rak_id'),
            'tahun'         => $this->input->post('tahun'),
        );
    
        $where = array('book_id' => $book_id);
        $this->db->update('collection', $data, $where);
    
        $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Successfully updated!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );
        redirect('admin/collection');
    }
    

    public function delete($book_id){
        $where = array (
            'book_id'   => $book_id
        );
            $this->db->delete('collection',$where);
        $this->session->set_flashdata('alert' ,
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/collection');
    }

}
