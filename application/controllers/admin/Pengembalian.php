<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengembalian_model');
    }

    public function index() {
        // Ambil data peminjaman yang statusnya dipinjam
        $this->db->from('peminjaman a')->order_by('tanggal_peminjaman', 'DESC');
        $this->db->join('anggota c', 'a.anggota_id=c.anggota_id', 'left');
        $peminjaman = $this->db->get()->result_array();

        $data= array(
            'peminjaman' => $peminjaman,
            'judul'         => 'sunfloe Library || Halaman Pengembalian'
        );


        // Load view dengan data peminjaman
        $this->template->load('template','admin/pengembalian', $data);
    }

    public function kembalikan($peminjaman_id) {
        // Update status buku menjadi tersedia
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select('a.*, c.no_anggota');
        $this->db->from('peminjaman a');
        $this->db->join('anggota c', 'a.anggota_id = c.anggota_id', 'left');
        $this->db->where('a.peminjaman_id', $peminjaman_id);
        $pinjam = $this->db->get()->row_array();
    
        if ($pinjam) {
            // Menambah ke tabel pengembalian
            $data = array(
                'anggota_id' => $pinjam['anggota_id'],
                'code_peminjaman' => $pinjam['code_peminjaman'],
                'tanggal_peminjaman' => $pinjam['tanggal_peminjaman'],
                'tanggal_dikembalikan' => date('Y-m-d')
            );
            $this->db->insert('pengembalian', $data);
    
            // Mengupdate status buku menjadi tersedia
            $update_data = array(
                'status' => 'tersedia'
            );
            $this->db->where('book_id', $pinjam['book_id']);
            $this->db->update('collection', $update_data);
    
            // Menghapus dari tabel peminjaman
            // $this->db->delete('peminjaman', array('peminjaman_id' => $peminjaman_id));
    
            $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Pengembalian berhasil </strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
    
            redirect('admin/pengembalian');
        } else {
            show_404();
        }
    }
    
}
