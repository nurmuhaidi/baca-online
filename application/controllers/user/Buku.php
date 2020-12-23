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
        $data['title'] = "Kategori Buku";
        $data['daftarbuku'] = $this->m_model->get('tb_kategori')->result();

		$this->load->view('user/templates/header', $data);
		$this->load->view('user/templates/sidebar');
		$this->load->view('user/buku');
		$this->load->view('user/templates/footer');
	}

	public function daftarbuku($id)
	{
        $data['title'] = "Daftar Buku";
        $where = array('id' => $id );
		$data['daftarkategori'] = $this->m_model->get_where($where, 'tb_kategori')->result();

		$this->load->view('user/templates/header', $data);
		$this->load->view('user/templates/sidebar');
		$this->load->view('user/daftarbuku', $data);
		$this->load->view('user/templates/footer');
	}

	public function baca($id)
	{
        $data['title'] = "Daftar Buku";
        $where = array('id' => $id );
        $data['daftar_buku'] = $this->m_model->get_where($where, 'tb_buku')->result();

		$this->load->view('user/templates/header', $data);
		$this->load->view('user/templates/sidebar');
		$this->load->view('user/bacabuku', $data);
		$this->load->view('user/templates/footer');
	}
}
