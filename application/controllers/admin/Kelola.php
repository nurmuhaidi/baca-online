<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('welcome');
        } else {
			if($this->session->userdata('level') == 'User') {
				redirect('user/dashboard');
			}
		}
    }

	public function index()
	{
        $data['title'] = "Kelola Buku";
        $data['kategori'] = $this->m_model->get("tb_kategori")->result();
        $data['buku'] = $this->m_model->get("tb_buku")->result();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/kelolaBuku');
		$this->load->view('admin/templates/footer');
	}
}
