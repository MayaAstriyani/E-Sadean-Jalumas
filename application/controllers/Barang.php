<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
        $this->load->library('form_validation');
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

        // generate kode barang
        $dariDB        = $this->m_barang->generatekodejamu();
        $kodejamunew   = substr($dariDB, 3, 3);
        $kodejamunew ++;
        $data = array('kode_jamu' => $kodejamunew);

		$data['barang']    	 = $this->m_barang->get_all('barang');
        $data['detail']      = $this->m_barang->detailStok();
        $data['contents']    = 'admin/barang';
		$this->load->view('template/index',$data);
	}

    // insert barang
    public function add()
    {
        $kode_jamu = $this->input->post('kodejamu');
		$nama_jamu = $this->input->post('namajamu');
        $kemasan   = $this->input->post('kemasan');
        $harga     = $this->input->post('harga');
		$stok      = $this->input->post('stok');

        $data = array(
			'kode_jamu' => $kode_jamu,
			'nama_jamu' => $nama_jamu,
            'kemasan'   => $kemasan,
            'harga'     => $harga,
			'stok'      => $stok
		);
        $this->m_barang->input_data($data,'barang');
		redirect('Barang');
    }

    // update barang
    public function proses_update()
    {
        $kode_jamu      = $this->input->post('kodejamu');
        $nama_jamu      = $this->input->post('namajamu');
        $kemasan        = $this->input->post('kemasan');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');

        $data = array(
            "kode_jamu"     => $kode_jamu,
            "nama_jamu"     => $nama_jamu,
            "kemasan"       => $kemasan,
            "harga"         => $harga,
            "stok"          => $stok
        );

        $where = array(
            "kode_jamu" => $kode_jamu
        );

        $this->m_barang->update_data($where, $data, 'barang');
        redirect(base_url('barang'));
    }

    // delete barang berdasarkan id
    public function delete($kode_jamu)
	{
		$where = array('kode_jamu' => $kode_jamu);
		$this->m_barang->hapus_data($where,'barang');
		$this->session->set_flashdata('hapus', 'Data barang berhasil dihapus');
		redirect('barang');
	}
    
}