<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Model {

	// -------------------------------------------
	// ** Nama Aplikasi
	// -------------------------------------------
	public $app_nama = "Tim Kreatif";
	
	// -------------------------------------------
	// ** Link Sidebar
	// -------------------------------------------
	public $administrator = array(
		'Dashboard|' .site_url('dashboard'). '|dashboard',
		'User Profile|' .site_url('user/profile'). '|person',
		'Table List|' .site_url('elements/table'). '|content_paste',
		'Typhography|' .site_url('elements/typhography'). '|library_books',
		'Icons|' .site_url('elements/icons'). '|bubble_chart',
	);
	public $kasir = array(
		'Dashboard|' .site_url('dashboard'). '|dashboard',
		'User Profile|' .site_url('user/profile'). '|person',
		'Table List|' .site_url('elements/table'). '|content_paste',
		'Typhography|' .site_url('elements/typhography'). '|library_books',
		'Icons|' .site_url('elements/icons'). '|bubble_chart',
	);

}

/* End of file Konfigurasi.php */
/* Location: ./application/models/Konfigurasi.php */
?>