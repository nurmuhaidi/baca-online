<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $data['title'] = "Dashboard";
        $data['jumlahkategori'] = $this->m_model->get("tb_kategori")->num_rows();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/templates/footer');
	}
}
