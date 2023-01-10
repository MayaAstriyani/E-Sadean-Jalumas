<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangMasuk extends CI_Controller {
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
        $dariDB       = $this->m_barang->generatekodemasuk();
        $kodemasuknew = substr($dariDB, 3, 4);
        $kodemasuknew ++;

        $data['kode_masuk']         = $kodemasuknew;
        $data['barangedit']         = $this->m_barang->get_data_barang();
        $data['barang']             = $this->m_barang->get_all('barang');
        $data['barang_masuk']       = $this->m_barang->get_barang_masuk();
		$data['contents']           = 'admin/barang_masuk';
		$this->load->view('template/index',$data);
	}
    
    // insert barang
    public function add()
    {
        $kode_masuk     = $this->input->post('idmasuk');
		$tanggal_input  = $this->input->post('tglinput');
        $kode_jamu      = $this->input->post('namajamu');
		$jumlah         = $this->input->post('jumlah');
		$expired        = $this->input->post('expired');

        $data = array(
			'id_masuk'    => $kode_masuk,
			'tanggal'     => $tanggal_input,
            'kode_jamu'   => $kode_jamu,
			'jumlah'      => $jumlah,
			'expired'     => $expired
		);
        $this->m_barang->input_data($data,'barang_masuk');
		redirect('BarangMasuk');
    }

    // update barang
    public function proses_update()
    {
        $kode_masuk     = $this->input->post('idmasuk');
		$tanggal_input  = $this->input->post('tglinput');
        $kode_jamu      = $this->input->post('namajamu');
		$jumlah         = $this->input->post('jumlah');
		$expired        = $this->input->post('expired');

        $data = array(
            "id_masuk"    => $kode_masuk,
			"tanggal"     => $tanggal_input,
            "kode_jamu"   => $kode_jamu,
			"jumlah"      => $jumlah,
			'expired'     => $expired
        );
        $where = array(
            "id_masuk"    => $kode_masuk
        );

        $this->m_barang->update_data($where, $data, 'barang_masuk');
        redirect(base_url('BarangMasuk'));
    }

    // delete barang berdasarkan id
	public function delete($id_masuk)
	{
		$where = array('id_masuk' => $id_masuk);
		$this->m_barang->hapus_data($where,'barang_masuk');
		$this->session->set_flashdata('hapus', 'Data barang berhasil dihapus');
		redirect('barangmasuk');
	}
}