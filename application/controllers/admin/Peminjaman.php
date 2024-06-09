<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }

    public function index(){
        // date_default_timezone_set('Asia/Jakarta');
        // $tanggal = date('Y-m-d');
        $this->db->from('peminjaman a')->order_by('tanggal_peminjaman', 'DESC');
        // ->where('tanggal_peminjaman',$tanggal);
        $this->db->join('anggota c', 'a.anggota_id=c.anggota_id', 'left');

        $pinjam = $this->db->get()->result_array();

        $this->db->from('anggota')->order_by('no_anggota','ASC');
        $anggotaa = $this->db->get()->result_array();

        $this->db;

    
        $data = array(
            'judul'     => 'sunfloe Library || Peminjaman Buku',
            'pinjam'    => $pinjam,
            'anggotaa'   => $anggotaa
        );

        $this->template->load('template', 'admin/peminjaman', $data);
    }

    public function temp(){
        $this->db->from('tempory');
        $this->db->where('book_id',$this->input->post('book_id'));
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $this->db->where('anggota_id',$this->input->post('anggota_id'));
        $cek = $this->db->get()->result_array();
		if($cek<>NULL){
			$this->session->set_flashdata('alert',
			'<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Buku sudah dipilih</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
            $data = array(
                'anggota_id'    => $this->input->post('anggota_id'),
                'book_id'       => $this->input->post('book_id'),
                'user_id'       =>$this->session->userdata('user_id')

            );
            $this->db->insert('tempory',$data);
            $this->session->set_flashdata('alert',
			'<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<strong>Buku berhasil ditambah </strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
            redirect($_SERVER['HTTP_REFERER']);

        }
//form atas
    }


    public function add($anggota_id) {

        // date_default_timezone_set('Asia/Jakarta');
        // $tanggal = date('Y-m');
        $this->db->from('peminjaman');
        // ->where('tanggal_peminjaman',$tanggal);
        $jumlah = $this->db->count_all_results();
        $code_peminjaman = date('Ymd his').$jumlah+1;


        //index
        // $tanggal = date('Y-m-d');
        $this->db->from('peminjaman a')->order_by('tanggal_peminjaman', 'DESC');
        // ->where('tanggal_peminjaman',$tanggal);
        $pinjam = $this->db->get()->result_array();
    
        $this->db->from('anggota')->order_by('no_anggota','ASC')->where('anggota_id',$anggota_id);
        $nama_anggota = $this->db->get()->row()->nama_anggota;//form atas
    
        $this->db->from('detail_peminjaman a');
        $this->db->join('collection b', 'a.book_id=b.book_id', 'left');
        $this->db->where('a.code_peminjaman', $code_peminjaman);
        $buku = $this->db->get()->result_array();//form bawah
    
        $this->db->from('collection')->order_by('book_title','ASC')->where('status','tersedia');
        $bukuku    = $this->db->get()->result_array();
        
        $this->db->from('tempory a');
        $this->db->join('collection b', 'a.book_id=b.book_id', 'left');
        $this->db->where('a.user_id', $this->session->userdata('user_id'));
        $this->db->where('a.anggota_id', $anggota_id);
        $tempory = $this->db->get()->result_array();//form atas
    
    
    
        
            $data = array(
                'judul'     => 'sunfloe Library || Peminjaman Buku',
                'pinjam'    => $pinjam,
                'nama_anggota'   => $nama_anggota,
                'buku'      =>$buku,
                'bukuku'    => $bukuku,
                'anggota_id'    => $anggota_id,
                'tempory'   => $tempory,
                'code_peminjaman'   => $code_peminjaman
                
            );
    
            $this->template->load('template', 'admin/peminjaman_baru', $data);
    }
    
    public function pinjam() {
        // Mengatur zona waktu ke Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');
        
        // Mendapatkan tanggal hari ini dalam format Y-m-d
        $tanggal_peminjaman = date('Y-m-d');
    
        // Menghitung tenggat waktu (7 hari setelah tanggal peminjaman)
        $tenggat = date('Y-m-d', strtotime($tanggal_peminjaman . ' + 7 days'));
    
        // Mendapatkan jumlah peminjaman untuk membuat code_peminjaman unik
        $this->db->from('peminjaman');
        $jumlah = $this->db->count_all_results();
        $code_peminjaman = date('YmdHis') . ($jumlah + 1);
    
        // Mendapatkan data dari tabel tempory
        $this->db->from('tempory a');
        $this->db->join('collection b', 'a.book_id=b.book_id', 'left');
        $this->db->where('a.user_id', $this->session->userdata('user_id'));
        $this->db->where('a.anggota_id', $this->input->post('anggota_id'));
        $tempory = $this->db->get()->result_array();
        // Memasukkan data ke tabel detail_peminjaman dan menghapus dari tempory
        foreach($tempory as $yy) {
            // Menambah ke detail_peminjaman
            $data = array(
                'code_peminjaman' => $code_peminjaman,
                'book_id' => $yy['book_id'],

            );
            $this->db->insert('detail_peminjaman', $data);
    
            // Menghapus dari tabel tempory
    
            // Mengupdate status buku menjadi 'dipinjam'
            $update_data = array(
                'status' => 'dipinjam'
            );
            $this->db->where('book_id', $yy['book_id']);
            $this->db->update('collection', $update_data);

            $where = array(
                'anggota_id' => $this->input->post('anggota_id'),
                'user_id' => $this->session->userdata('user_id'),
            );
            $this->db->delete('tempory', $where);

        }
    
        // Memasukkan data ke tabel peminjaman
        $data = array(
            'code_peminjaman' => $code_peminjaman,
            'anggota_id' => $this->input->post('anggota_id'),
            'tanggal_peminjaman' => $tanggal_peminjaman,
            'tenggat' => $tenggat,
            'status_pengembalian' => 'belum'
        );
        $this->db->insert('peminjaman', $data);
    
        // Menampilkan pesan berhasil
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Peminjaman berhasil </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    
        // Mengarahkan ke halaman detail peminjaman
        redirect('admin/peminjaman/detail/' . $code_peminjaman);
    }
    
    

    public function delete($tempory_id){
        $where = array('tempory_id' => $tempory_id);
        $this->db->delete('tempory',$where);
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Buku berhasil dihapus </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function detail($code_peminjaman){
      
		$this->db->select('*');
		$this->db->from('peminjaman a')->order_by('a.tanggal_peminjaman','DESC')->where('a.code_peminjaman',$code_peminjaman);
		$this->db->join('anggota b','a.anggota_id=b.anggota_id','left');
		$peminjaman= $this->db->get()->row();

		$this->db->from('detail_peminjaman a');
		$this->db->join('collection b','a.book_id=b.book_id','left');
		$this->db->where('a.code_peminjaman',$code_peminjaman);
		$detail = $this->db->get()->result_array();

		$data = array(
			'judul' 			=> ' Sunfloe Library ||  Detail Peminjaman',
			'code_peminjaman'				=> $code_peminjaman,
			'peminjaman'				=> $peminjaman,
			'detail'			=> $detail
		);
		$this->template->load('template','admin/detail',$data);	
	}


    public function kembalikan($peminjaman_id) {
        // Update status buku menjadi tersedia
      
        $this->db->from('peminjaman a')->order_by('tanggal_peminjaman', 'DESC');
        $this->db->where('a.peminjaman_id',$peminjaman_id);
        $this->db->join('anggota c', 'a.anggota_id=c.anggota_id', 'left');
        $this->db->join('detail_peminjaman d', 'a.code_peminjaman = d.code_peminjaman','left');
        $this->db->join('collection y','d.book_id=y.book_id','left');
        $pinjam = $this->db->get()->result_array();

        $this->db->from('collection');
        foreach($pinjam as $yy){
            //nambah ke pengembalian
            // $data = array(
            //     'anggota_id'  => $yy['anggota_id'],
            //     'code_peminjaman'   =>$yy['code_peminjaman'],
            //     'tanggal_peminjaman'    =>  $yy['tanggal_peminjaman'],
            //     'tanggal_dikembalikan'  => date('Y-m-d')
            // );
            // $this->db->insert('pengembalian',$data);
        
        }
           


             //mengupdate buku 
            $update_data = array(
                'status_pengembalian' => 'sudah'
            );
            $this->db->where('peminjaman_id', $yy['peminjaman_id']);
            $this->db->update('peminjaman', $update_data);


             //mengupdate buku 
             $update_data = array(
                'status' => 'tersedia'
            );
            $this->db->where('book_id', $yy['book_id']);
            $this->db->update('collection', $update_data);


            // //ngapus dari tabel peminjaman
            $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Pengembalian berhasil </strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('admin/peminjaman');

            //ngapdet buku jadi tersedia

        }
}
    


    




