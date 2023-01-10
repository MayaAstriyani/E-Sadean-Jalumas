<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangkeluar extends CI_Controller {
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
        $dariDB        = $this->m_barang->generatekodekeluar();
        $kodekeluarnew = substr($dariDB, 3, 4);
        $kodekeluarnew ++;

        $data['kode_keluar']         = $kodekeluarnew;
        $data['barang']              = $this->m_barang->get_all('barang');
        $data['barang_keluar']       = $this->m_barang->get_barang_keluar();
		$data['contents']            = 'admin/barang_keluar';
		$this->load->view('template/index',$data);
	}
    
    // insert barang 
    public function add()
    {
		$stok = $this->m_barang->getStok();
		
        $kode_keluar    = $this->input->post('idkeluar');
		$tanggal_input  = $this->input->post('tglinput');
        $kode_jamu      = $this->input->post('namajamu');
		$jumlah_keluar  = $this->input->post('jumlah');

        $data = array(
			'id_keluar'   => $kode_keluar,
			'tanggal'     => $tanggal_input,
            'kode_jamu'   => $kode_jamu,
			'jumlah_beli' => $jumlah_keluar
		);

		if ($jumlah_keluar <= $stok) {
			$this->m_barang->input_data($data,'barang_keluar');
			redirect('barangkeluar');
		} else {
			$this->session->set_flashdata('pesan', 'Stok tidak mencukupi');
			redirect('barangkeluar');
		}   
    }

    // delete barang berdasarkan id
	public function delete($id_keluar)
	{
		$where = array('id_keluar' => $id_keluar);
		$this->m_barang->hapus_data($where,'barang_keluar');
		$this->session->set_flashdata('hapus', 'Data barang berhasil dihapus');
		redirect('barangkeluar');
	}
}