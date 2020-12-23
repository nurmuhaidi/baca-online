<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('welcome');
        } else {
			if($this->session->userdata('level') == 'Admin') {
				redirect('admin/dashboard');
			}
		}
    }

	public function index()
	{
        $data['title'] = "Daftar Buku";
        $data['daftarbuku'] = $this->m_model->get('tb_kategori')->result();

		$this->load->view('user/templates/header', $data);
		$this->load->view('user/templates/sidebar');
		$this->load->view('user/buku');
		$this->load->view('user/templates/footer');
	}
}
