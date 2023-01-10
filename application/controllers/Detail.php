<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
        $this->load->library('form_validation');
	} 

    public function detail($id){
        $data['detail'] = $this->model->detail_model->ambil_id_jamu($id);
        $data['contents']    = 'admin/detail';
		$this->load->view('template/index',$data);
    }
}