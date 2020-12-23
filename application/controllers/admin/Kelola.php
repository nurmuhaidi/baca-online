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

	public function insert()
	{
		$judul 		= $this->input->post("judul");
		$keterangan = $this->input->post("keterangan");
		$kategori 	= $this->input->post("kategori");
		$link 		= $this->input->post("link");
		$file		= $_FILES['file'];

		if($file != ''){
            $config['upload_path'] = './data/dokumen';
            $config['allowed_types'] = '*';
            $config['file_name'] = date('d-M-Y H:i:s ').time();

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('file')){
                $file = '';
            } else {
                $file = $this->upload->data('file_name');
            }
        }

		if ($file == '') {
			$data = array(
				'keterangan' 	=> $keterangan, 
				'namaKategori' 	=> $kategori, 
				'judul' 		=> $judul, 
				'link' 			=> $link 
			);
		} else {
			$data = array(
				'keterangan' 	=> $keterangan, 
				'namaKategori' 	=> $kategori, 
				'judul' 		=> $judul, 
				'link' 			=> $link, 
				'file' 			=> $file 
			);
		}
		

		$this->m_model->insert($data, 'tb_buku');
        $this->session->set_flashdata('pesan', 'User baru berhasil ditambahkan!');
        redirect('admin/kelola');
	}

    public function delete($id)
    {
        $where = array('id' => $id);

        $this->m_model->delete($where, 'tb_buku');
        $this->session->set_flashdata('pesan', 'User berhasil dihapus!');
        redirect('admin/kelola');
    }
}
