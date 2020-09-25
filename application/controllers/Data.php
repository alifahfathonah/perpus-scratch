<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function buku()
	{
		$data['ui_app_name'] = 'Perpus-Sys';
		$data['ui_title'] = 'Perpus-Sys - Data Buku';

		$data['ui_css'] = array('custom/css/default.css');
		$data['ui_js'] = array();

		// format penulisan: array('Kata|alamat_link|ikon', 'Kata|alamat_link|ikon', ...)
		$data['ui_sidebar_nav'] = array(
			'Data|book' => array(
				'Data Buku|book|' .site_url('data/buku'),
				'Data Siswa|face|' .site_url('data/siswa'),
			),
			'Transaksi|book' => array(
				'Data Buku|book|' .site_url('data/buku'),
				'Data Siswa|face|' .site_url('data/siswa'),
			),
			'Laporan|book' => array(
				'Data Buku|book|' .site_url('data/buku'),
				'Data Siswa|face|' .site_url('data/siswa'),
			)
		);
		$data['ui_sidebar_active'] = 'Data|Data Buku';

		$data['ui_top_nav'] = array(
			'Buku|book|' .site_url('data/buku'),
			'Pegawai|face|' .site_url('data/Pegawai')
		);
		$data['ui_top_nav_brand'] = 'Data Buku';
		$data['ui_top_nav_active'] = 'Buku';
		$this->load->view('data/buku/daftar', $data);
	}

}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */
?>