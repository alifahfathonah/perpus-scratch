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


class Laporan extends CI_Controller {

	public function index()
	{
		$data = array(
			'ui_css' => array(),
			'ui_title' => 'PerpusApp',
			'ui_sidebar_item' => array(
				'Beranda|fas fa-home|' . site_url('beranda'),
				'Buku Induk|fas fa-database|' . site_url('bukuinduk'),
				'Data Siswa|fas fa-users|' . site_url('siswa'),
				'Peminjaman|fas fa-handshake|' . site_url('peminjaman'),
				'Laporan|fas fa-clipboard-list|' . site_url('laporan')
			),
			'ui_sidebar_active' => 'Laporan',
			'ui_brand' => 'Laporan',
			'ui_nav_item' => array(
				'Peminjam|fas fa-handshake|' . site_url('laporan/index'),
				'Data Buku|fas fa-book|' . site_url('laporan/buku'),
			),
			'ui_nav_active' => 'Peminjam',
			'ui_js' => array(),
		);

		$data['logged_user'] = new stdClass();
        $data['logged_user']->nama = 'Badar Wildanie';
        $data['logged_user']->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';


        $this->load->model('PeminjamanModel');
        $this->db->order_by('nama_siswa', 'asc');
        $data['data_peminjam'] = $this->PeminjamanModel->show(-1, -1, 'OBJECT');

		$this->load->view('laporan/peminjam/list', $data);	
	}

	public function buku()
	{
		$data = array(
			'ui_css' => array(),
			'ui_title' => 'PerpusApp',
			'ui_sidebar_item' => array(
				'Beranda|fas fa-home|' . site_url('beranda'),
				'Buku Induk|fas fa-database|' . site_url('bukuinduk'),
				'Data Siswa|fas fa-users|' . site_url('siswa'),
				'Peminjaman|fas fa-handshake|' . site_url('peminjaman'),
				'Laporan|fas fa-clipboard-list|' . site_url('laporan')
			),
			'ui_sidebar_active' => 'Laporan',
			'ui_brand' => 'Laporan',
			'ui_nav_item' => array(
				'Peminjam|fas fa-handshake|' . site_url('laporan/index'),
				'Data Buku|fas fa-book|' . site_url('laporan/buku'),
			),
			'ui_nav_active' => 'Data Buku',
			'ui_js' => array(),
		);

		$data['logged_user'] = new stdClass();
        $data['logged_user']->nama = 'Badar Wildanie';
        $data['logged_user']->avatar = 'assets/custom/images/user/Annotation 2020-04-02 2208172.png';


        $this->load->model('BukuIndukModel');
        $this->db->order_by('judul_buku', 'asc');
        $data['data_buku'] = $this->BukuIndukModel->show(-1, -1, 'OBJECT');

		$this->load->view('laporan/buku/list', $data);	
	}

}
	
/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
?>