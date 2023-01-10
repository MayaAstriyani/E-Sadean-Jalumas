<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{ 
		// $this->validasi();
		$this->load->view('admin/login');
	}	

	public function proses()
    {
        $user = $this->input->post('username', TRUE);
        $pass = $this->input->post('password', TRUE);

        // select * from login where user = ?
        $cek  = $this->db->get_where('user',['username' => $user]);
        
        // cek username 
        if($cek->num_rows() > 0)
        {
            // kita ambil isi dari record
            $hasil = $cek->row();
            if(password_verify($pass, $hasil->password))
            {
                // membuat session
                $this->session->set_userdata('id_user', $hasil->id_user);
                $this->session->set_userdata('status', TRUE);

                // redirect ke admin
                redirect(base_url('dashboard'));
            }else{

                // jika password salah
                $this->session->set_flashdata('failed','Password salah !');
                redirect(base_url('login'));
            }

        }else{

            // jika username salah
            $this->session->set_flashdata('failed','Username tidak Tersedia !');
            redirect(base_url('login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}