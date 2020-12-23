<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
		$data['title'] = "Kategori";
		$data['kategori'] = $this->m_model->get('tb_kategori')->result();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/kategori');
		$this->load->view('admin/templates/footer');
	}

	public function delete($id)
	{
		$where = array('id' => $id);

		$this->m_model->delete($where, 'tb_kategori');
		$this->session->set_flashdata('pesan', 'Data berhasil di hapus!');
		redirect('admin/kategori');
	}

	public function insert()
	{
		date_default_timezone_set("Asia/Jakarta");

		$nama		= $_POST['nama'];
		$keterangan	= $_POST['keterangan'];
		$gambar		= $_FILES['gambar'];

		if($gambar != ''){
            $config['upload_path'] = './data/gambar';
            $config['allowed_types'] = '*';
            $config['file_name'] = date('d-M-Y H:i:s ').time();

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('gambar')){
                $gambar = '';
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

		if ($gambar == '') {
			$data = array(
				'namaKategori' 	=> $nama,
				'keterangan' 	=> $keterangan,
				'createDate'	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(
				'namaKategori' 	=> $nama,
				'keterangan' 	=> $keterangan,
				'gambar' 		=> $gambar,
				'createDate'	=> date('Y-m-d H:i:s')
			);
		}

		$this->m_model->insert($data, 'tb_kategori');
		$this->session->set_flashdata('pesan', 'Data berhasil di tambahkan!');
		redirect('admin/kategori');
	}

	public function update()
	{
		date_default_timezone_set("Asia/Jakarta");

		$id			= $_POST['id'];
		$nama		= $_POST['nama'];
		$keterangan	= $_POST['keterangan'];
		$gambar		= $_FILES['gambar'];

		$where = array('id' => $id);

		if($gambar != ''){
            $config['upload_path'] = './data/gambar';
            $config['allowed_types'] = '*';
            $config['file_name'] = date('d-M-Y H:i:s ').time();

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('gambar')){
                $gambar = '';
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

		if ($gambar == '') {
			$data = array(
				'namaKategori' 	=> $nama,
				'keterangan' 	=> $keterangan,
				'createDate'	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(
				'namaKategori' 	=> $nama,
				'keterangan' 	=> $keterangan,
				'gambar' 		=> $gambar,
				'createDate'	=> date('Y-m-d H:i:s')
			);
		}

		$this->m_model->update($where, $data, 'tb_kategori');
		$this->session->set_flashdata('pesan', 'Data berhasil di ubah!');
		redirect('admin/kategori');
	}
}
