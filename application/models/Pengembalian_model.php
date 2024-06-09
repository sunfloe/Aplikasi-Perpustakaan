<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_model extends CI_Model {

    public function get_peminjaman() {
        $this->db->from('peminjaman a');
        $this->db->join('anggota b', 'a.anggota_id = b.anggota_id', 'left');
        $this->db->join('detail_peminjaman c', 'a.code_peminjaman = c.code_peminjaman', 'left');
        $this->db->join('collection d', 'c.code_peminjaman = d.code_peminjaman', 'left');
        $this->db->where('d.status', 'dipinjam');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function return_book($peminjaman_id) {
        // Update status collection menjadi tersedia

        $this->db->from('detail_peminjaman a');
        $this->db->where('a.code_peminjaman', $peminjaman_id);

        $this->db->join('collection d', 'a.code_peminjaman = d.code_peminjaman', 'left');
        $books = $this->db->get()->result_array();

        foreach ($books as $book) {
            $this->db->where('book_id', $book['book_id']);
            $this->db->update('collection', array('status' => 'tersedia'));
        }

    }
}
