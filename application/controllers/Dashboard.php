<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
	}

	// validasi login
	public function validasi()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$this->validasi();
		
		$data['total_jenis'] 	= $this->m_barang->totalJenis();
		$data['total_stok'] 	= $this->m_barang->totalStok();	
		$data['total_masuk'] 	= $this->m_barang->totalStokMasuk();
		$data['total_keluar'] 	= $this->m_barang->totalStokKeluar();
		$data['pendapatan'] 	= $this->m_barang->total_barang();

		$data['contents'] = 'admin/dashboard';
		$this->load->view('template/index',$data);
	}	
}