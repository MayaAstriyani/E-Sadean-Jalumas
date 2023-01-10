<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
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

        $data["data_laporan"] = $this->m_barang->get_laporan();
        $data["total_barang"] = $this->m_barang->total_barang();
		$data['contents']     = 'admin/laporan';
		$this->load->view('template/index',$data);
	}
}