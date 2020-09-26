<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/* -------------------------------------------------------------------------------------
	SYSTEM TEMPLATING Material Dashboard by Creative tim, Arranged by : Badar Wildanie
		* tambahkan variabel-variabel berikut untuk melengkapi fitur pada template material dashboard
	------------------------------------------------------------------------------------
	Section (1) : $ui_css        	-> untuk penulisan CSS tambahan 
	            * format penulisan  -> Berupa array 1 dimensi tanpa key
	            * contoh penulisan  -> ['custom/css/default.css', 'custom/css/wizard.css'] 

	Section (2) : $ui_title  		-> untuk Judul pada pojok kiri atas
		        * format penulisan  -> string biasa 
		        * contoh penulisan  -> "Awokawkwk App" 

	Section (3) : $ui_sidebar_item 	-> untuk menambahkan daftar link sidebar kiri
	            * format penulisan 	-> Array berisi string dengan delimiter --- 'Nama Link|Ikon|Link'
	                                       Lebih baik Gunakan site_url() untuk penulisan link dalam CodeIgniter ini
	            * contoh penulisan 	-> ['Menu 1|fas fa-home|' . site_url('data/user'), 'Menu 1|fas fa-home|' . site_url('data/user')]

	Section (4) : $ui_sidebar_active-> Menentukan link sidebar mana yang aktif 
	            * format penulisan	-> Berupa String biasa berisi nama link yang sesuai dengan $ui_sidebar_item
	            * contoh penulisan	-> 'Menu 1' 

	Section (5) : $ui_brand     		-> untuk menambahkan judul pada navbar brand
	            * format penulisan 	-> String 
	            * contoh penulisan 	-> 'Laporan' 

	Section (6) : $ui_nav_item    	-> untuk menambahkan daftar link navbar atas
	            * format penulisan  -> Array berisi string dengan delimiter --- 'Nama Link|Ikon|Link'
	                                   * Gunakan site_url() untuk penulisan link dalam CodeIgniter ini
	                                   formatnya SAMA SEPERTI ui_sidebar_item
	            * contoh penulisan  -> ['Nav Menu 1|fas fa-home|' . site_url('data/user'), 'Nav Menu 2|fas fa-home|' . site_url('data/user')]

	Section (7) : $ui_nav_active	-> Menentukan link navbar atas mana yang aktif 
	            * format penulisan  -> Berupa String biasa berisi nama link yang sesuai dengan $ui_sidebar_item
	            * contoh penulisan  -> 'Nav Menu 1'

	Section (8) : $ui_js        	-> untuk sambungan file JS tambahan 
	            * format penulisan  -> Berupa array 1 dimensi tanpa key
	            * contoh penulisan  -> ['custom/js/default.js', 'custom/js/wizard.js'] 
 ------------------------------------------------------------------------------------- */


class BukuInduk extends CI_Controller {

	public function index()
	{
		$data = array(
			'ui_css' => array(),
			'ui_title' => 'PerpusApp',
			'ui_sidebar_item' => array(
				'Beranda|fas fa-home|' . site_url('beranda'),
				'Buku Induk|fas fa-database|' . site_url('buku'),
				'Data Siswa|fas fa-users|' . site_url('siswa'),
				'Peminjaman|fas fa-handshake|' . site_url('peminjaman'),
				'Laporan|fas fa-clipboard-list|' . site_url('laporan')
			),
			'ui_sidebar_active' => 'Buku Induk',
			'ui_brand' => 'Data Buku Induk',
			'ui_nav_item' => array(
				'Tambah data|fas fa-plus-circle|' . site_url('bukuinduk/tambah'),
			),
			'ui_nav_active' => '',
			'ui_js' => array(),
		);

		$data['logged_user'] = new stdClass();
        $data['logged_user']->nama = 'Badar Wildanie';
        $data['logged_user']->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';
		$this->load->view('buku-induk/list', $data);	
	}



	public function ajax_daftar_buku()
	{
		$this->load->model('BukuIndukModel');

		$data['limit'] = $this->input->get('limit');
		$data['page'] = $this->input->get('page');
		$data['offset'] = $data['limit'] * ($data['page'] - 1);

		$this->db->start_cache();

		// Pencarian judul buku
		$judul_buku = $this->input->get('judul_buku');
		if ($judul_buku != '') {
			$this->db->like('judul_buku', $judul_buku, 'BOTH');
		}

		$this->db->stop_cache();

		$data['data_filtered'] = $this->BukuIndukModel->show($data['limit'], $data['offset'], 'object');
		$data['data_filtered_count'] = $this->BukuIndukModel->show($data['limit'], $data['offset'], 'count');
		$this->db->flush_cache();

		$this->load->view('buku-induk/ajax-list', $data);


	}



	public function tambah($submit = FALSE)
	{
		$this->load->model('BukuIndukModel');

		// Jika parameter submit terisi, maka itu lagi ngesubmit data dari form tambah data
		// Jika enggak ya berarti lagi menampilkan halaman tambah data
		if ($submit != FALSE) {
			$data_tambah = array(
				'judul_buku' => $this->input->post('judul_buku'),
				'nomor_induk' => $this->input->post('nomor_induk'),
				'tanggal_penerimaan' => $this->input->post('tanggal_penerimaan'),
				'no_panggil' => $this->input->post('no_panggil'),
				'no_register' => $this->input->post('no_register'),
				'kode_ddc' => $this->input->post('kode_ddc'),
				'pengarang' => $this->input->post('pengarang'),
				'tahun_terbit' => $this->input->post('tahun_terbit'),
				'penerbit' => $this->input->post('penerbit'),
				'kota_terbit' => $this->input->post('kota_terbit'),
				'subjek' => $this->input->post('subjek'),
				'kategori' => $this->input->post('kategori'),
				'isbn' => $this->input->post('isbn'),
				'donatur' => $this->input->post('donatur'),
				'jumlah_eksemplar' => $this->input->post('jumlah_eksemplar'),
				'halaman' => $this->input->post('halaman'),
				'ukuran' => $this->input->post('ukuran'),
				'harga' => $this->input->post('harga'),
			);
			$query = $this->BukuIndukModel->insert($data_tambah);
			if ($query) {
				header('location:' . site_url('bukuinduk') . '?notif=oyi&message=Data Berhasil ditambahkan&type=success&icon=fas fa-check-circle');
			}
			else {
				header('location:' . site_url('bukuinduk') . '?notif=oyi&message=Data gagal ditambahkan&type=danger&icon=fas fa-exclamation-triangle');
			}
		}
		else {
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'PerpusApp',
				'ui_sidebar_item' => array(
					'Beranda|fas fa-home|' . site_url('beranda'),
					'Buku Induk|fas fa-database|' . site_url('buku'),
					'Data Siswa|fas fa-users|' . site_url('siswa'),
					'Peminjaman|fas fa-handshake|' . site_url('peminjaman'),
					'Laporan|fas fa-clipboard-list|' . site_url('laporan')
				),
				'ui_sidebar_active' => 'Buku Induk',
				'ui_brand' => 'Data Buku Induk',
				'ui_nav_item' => array(
					'Tambah data|fas fa-plus-circle|' . site_url('bukuinduk/tambah'),
				),
				'ui_nav_active' => 'Tambah data',
				'ui_js' => array(),
			);

			// Userdata login
			$data['logged_user'] = new stdClass();
	        $data['logged_user']->nama = 'Badar Wildanie';
	        $data['logged_user']->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';


			$this->load->view('buku-induk/tambah', $data);	
		}
	}

	public function edit($id, $submit = FALSE)
	{
        $this->load->model('BukuIndukModel');

		// Jika parameter submit terisi, maka itu lagi ngesubmit data dari form edit
		// Jika enggak ya berarti lagi menampilkan halaman edit
		if ($submit != FALSE) {
			$data_edit = array(
				'judul_buku' => $this->input->post('judul_buku'),
				'nomor_induk' => $this->input->post('nomor_induk'),
				'tanggal_penerimaan' => $this->input->post('tanggal_penerimaan'),
				'no_panggil' => $this->input->post('no_panggil'),
				'no_register' => $this->input->post('no_register'),
				'kode_ddc' => $this->input->post('kode_ddc'),
				'pengarang' => $this->input->post('pengarang'),
				'tahun_terbit' => $this->input->post('tahun_terbit'),
				'penerbit' => $this->input->post('penerbit'),
				'kota_terbit' => $this->input->post('kota_terbit'),
				'subjek' => $this->input->post('subjek'),
				'kategori' => $this->input->post('kategori'),
				'isbn' => $this->input->post('isbn'),
				'donatur' => $this->input->post('donatur'),
				'jumlah_eksemplar' => $this->input->post('jumlah_eksemplar'),
				'halaman' => $this->input->post('halaman'),
				'ukuran' => $this->input->post('ukuran'),
				'harga' => $this->input->post('harga'),
			);

			$query = $this->BukuIndukModel->update($data_edit, $id);
			if ($query) {
				header('location:' . site_url('bukuinduk') . '?notif=oyi&message=Data Berhasil diedit&type=success&icon=fas fa-check-circle');
			}
			else {
				header('location:' . site_url('bukuinduk') . '?notif=oyi&message=Data gagal diedit&type=danger&icon=fas fa-exclamation-triangle');
			}
		}
		else {
			$data = array(
				'ui_css' => array(),
				'ui_title' => 'PerpusApp',
				'ui_sidebar_item' => array(
					'Beranda|fas fa-home|' . site_url('beranda'),
					'Buku Induk|fas fa-database|' . site_url('buku'),
					'Data Siswa|fas fa-users|' . site_url('siswa'),
					'Peminjaman|fas fa-handshake|' . site_url('peminjaman'),
					'Laporan|fas fa-clipboard-list|' . site_url('laporan')
				),
				'ui_sidebar_active' => 'Buku Induk',
				'ui_brand' => 'Data Buku Induk',
				'ui_nav_item' => array(
					'Tambah data|fas fa-plus-circle|' . site_url('bukuinduk/tambah'),
				),
				'ui_nav_active' => '',
				'ui_js' => array(),
			);

			// Userdata login
			$data['logged_user'] = new stdClass();
	        $data['logged_user']->nama = 'Badar Wildanie';
	        $data['logged_user']->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';

	        // Data buku yang di edit
	        $data['data_edit'] = $this->BukuIndukModel->single('id', $id, 'object');

			$this->load->view('buku-induk/edit', $data);	
		}
	}

	public function delete($id)
	{
		$this->load->model('BukuIndukModel');
		$query = $this->BukuIndukModel->delete($id);
		if ($query) {
			header('location:' . site_url('bukuinduk') . '?notif=oyi&message=Data Berhasil dihapus&type=success&icon=fas fa-check-circle');
		}
		else {
			header('location:' . site_url('bukuinduk') . '?notif=oyi&message=Data gagal dihapus&type=danger&icon=fas fa-exclamation-triangle');
		}

	}

}
	
/* End of file Data.php */
/* Location: ./application/controllers/Data.php */
?>