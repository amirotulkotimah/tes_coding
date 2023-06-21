<?php 
/**
 * 
 */
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Data_klub extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
        $this->load->model('Data_klub_m');
	}

	public function index()
	{	
		$config['site_url'] = base_url('index.php/data_klub/');
		$data['validation_valid'] = $this->session->flashdata('sukses');
        $data['validation_error'] = $this->session->flashdata('error');
		$data['klub'] = $this->Data_klub_m->getAll()->result();
		$this->load->view('template/header');
		$this->load->view('data_klub', $data);
		$this->load->view('template/footer');
	}

	public function input()
	{
		$this->form_validation->set_rules('nama_klub','Nama Klub','required');
		$this->form_validation->set_rules('kota_klub','Kota Klub','required');
		$nama_klub = $this->input->post('nama_klub');
		$kota_klub = $this->input->post('kota_klub');

		$sukses = 'Berhasil menambah data';
		$error = 'Gagal menambah data. Data tidak valid';

		if ($this->form_validation->run() == FALSE){
          	$this->session->set_flashdata('error', $error);
			redirect('data_klub');
        }else{
        	$cek = $this->Data_klub_m->cek($nama_klub, $kota_klub, 'tb_klub')->result();

        	if($cek != FALSE) {
		        foreach ($cek as $row) {
		          $nama_klub = $row->nama_klub;
		          $kota_klub = $row->kota_klub;
		        }
		        $this->session->set_flashdata('error', $error);
				redirect('data_klub');
		    } else {
		        $data = array(
				'nama_klub' => $nama_klub,
				'kota_klub' => $kota_klub
				);
				$this->Data_klub_m->input_klub($data, 'tb_klub');

				$data = array(
				'klub' => $nama_klub,
				);
				$this->Data_klub_m->input_klasemen($data, 'tb_klasemen');

				$this->session->set_flashdata('sukses', $sukses);
				redirect('data_klub');
		    }
        }

	}

	public function delete()
	{
		$id_klub = $this->input->post('id_klub');
		$where = array(
			'id_klub' => $id_klub
		);
        $this->Data_klub_m->delete($where, 'tb_klub');
        redirect('data_klub');
	}
}
?>