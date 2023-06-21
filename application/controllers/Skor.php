<?php 
/**
 * 
 */
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Skor extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
        $this->load->model('Skor_m');
        $this->load->model('Data_klub_m');
        $this->load->model('Klasemen_m');

        $this->load->helper('string');
	}

	public function index()
	{
		$config['site_url'] = base_url('index.php/data_klub/');
		$data['validation_valid'] = $this->session->flashdata('sukses');
        $data['validation_error'] = $this->session->flashdata('error');
		$data['skor'] = $this->Skor_m->getAll()->result();
		$data['klub'] = $this->Data_klub_m->getAll();
		$this->load->view('template/header');
		$this->load->view('skor', $data);
		$this->load->view('template/footer');
	}

	public function input()
	{
		$this->form_validation->set_rules('klub_pertama','Klub Pertama','required');
		$this->form_validation->set_rules('klub_kedua','Klub Kedua','required');
		$this->form_validation->set_rules('skor_pertama','Skor Klub Pertama','required');
		$this->form_validation->set_rules('skor_kedua','Skor Klub Kedua','required');
		$klub_pertama = $this->input->post('klub_pertama');
		$klub_kedua = $this->input->post('klub_kedua');
		$skor_pertama = $this->input->post('skor_pertama');
		$skor_kedua = $this->input->post('skor_kedua');

		$sukses = 'Berhasil menambah data';
		$error = 'Gagal menambah data. Data tidak valid';

		if ($this->form_validation->run() == FALSE){
          	$this->session->set_flashdata('error', $error);
			redirect('skor');
        }else{
        	$cek = $this->Skor_m->cek($klub_pertama, $klub_kedua, 'tb_skor')->result();

        	if($cek != FALSE) {
		        foreach ($cek as $row) {
		          $klub_pertama = $row->klub_pertama;
		          $klub_kedua = $row->klub_kedua;
		        }
		        $this->session->set_flashdata('error', $error);
				redirect('skor');
		    } else {
		        $data = array(
				'klub_pertama' => $klub_pertama,
				'klub_kedua' => $klub_kedua,
				'skor_klub_pertama' => $skor_pertama,
				'skor_klub_kedua' => $skor_kedua,
				);
				$this->Skor_m->input_data($data, 'tb_skor');

				if($skor_pertama == $skor_kedua){
					$skor = $this->Klasemen_m->getskor($klub_pertama, 'tb_klasemen')->row_array();
					$main1 = $skor['main']+1;
					$seri = $skor['seri']+1;
					$point = $skor['point']+1;
					$data = [
			            'main' => $main1,
						'seri' => $seri,
			            'point' => $point,
			        ];
			        $this->Klasemen_m->update_klub_pertama($klub_pertama, $data);

					$skor2 = $this->Klasemen_m->getskor($klub_kedua, 'tb_klasemen')->row_array();
					$main2 = $skor2['main']+1;
					$seri2 = $skor2['seri']+1;
					$point = $skor2['point']+1;
					$data = [
			            'main' => $main2,
						'seri' => $seri2,
			            'point' => $point,
			        ];
			        $this->Klasemen_m->update_klub_kedua($klub_kedua, $data);

				}elseif ($skor_pertama >= $skor_kedua) {
					$skor = $this->Klasemen_m->getskor($klub_pertama, 'tb_klasemen')->row_array();
					$main1 = $skor['main']+1;
					$menang = $skor['menang']+1;
					$gol_menang = $skor['gol_menang']+$skor_pertama;
					$point1 = $skor['point']+3;

					$data = [
						'main' => $main1,
						'menang' => $menang,
			            'gol_menang' => $gol_menang,
			            'point' => $point1,
			        ];
			        $this->Klasemen_m->update_klub_pertama($klub_pertama, $data);

			        $skor2 = $this->Klasemen_m->getskor($klub_kedua, 'tb_klasemen')->row_array();
			        $main2 = $skor2['main']+1;
			        $kalah = $skor2['kalah']+1;
				    $gol_kalah = $skor2['gol_kalah']+$skor_pertama;
					$data = [
						'main' => $main2,
						'kalah' => $kalah,
						'gol_kalah' => $gol_kalah
				    ];
				    $this->Klasemen_m->update_klub_pertama($klub_kedua, $data);

				}elseif ($skor_pertama <= $skor_kedua) {
					$skor2 = $this->Klasemen_m->getskor($klub_kedua, 'tb_klasemen')->row_array();
					$main2 = $skor2['main']+1;
					$menang2 = $skor2['menang']+1;
					$gol_menang2 = $skor2['gol_menang']+$skor_kedua;
					$point2 = $skor2['point']+3;

					$data = [
						'main' => $main2,
						'menang' => $menang2,
			            'gol_menang' => $gol_menang2,
			            'point' => $point2,
			        ];
			        $this->Klasemen_m->update_klub_pertama($klub_kedua, $data);

			        $skor = $this->Klasemen_m->getskor($klub_pertama, 'tb_klasemen')->row_array();
			        $main = $skor['main']+1;
			        $kalah = $skor['kalah']+1;
				    $gol_kalah = $skor['gol_kalah']+$skor_kedua;
					$data = [
						'main' => $main,
						'kalah' => $kalah,
						'gol_kalah' => $gol_kalah
				    ];
				    $this->Klasemen_m->update_klub_pertama($klub_pertama, $data);

				}

				$this->session->set_flashdata('sukses', $sukses);
				redirect('skor');
		    }
        }

	}

	public function add_multiple() { 
        $data['klub'] = $this->Data_klub_m->getAll();

        $this->load->view('template/header');
        $this->load->view('add_multiple', $data);
        $this->load->view('template/footer');
    }

    public function insert_multiple(){
	    // Ambil data yang dikirim dari form
	    $klub_pertama = $_POST['klub_pertama']; 
	    $klub_kedua = $_POST['klub_kedua']; 
	    $skor_pertama = $_POST['skor_pertama']; 
	    $skor_kedua = $_POST['skor_kedua'];
	    $kode = $_POST['kode'];
	    $data = array();
	    
	    $index = 0; // Set index array awal dengan 0
	    foreach($kode as $kodemain){ 
	      array_push($data, array(
	      	'kode' => strtoupper(random_string('alnum', 5)),
	        'klub_pertama'=>$klub_pertama[$index],
	        'klub_kedua'=>$klub_kedua[$index],  
	        'skor_klub_pertama'=>$skor_pertama[$index], 
	        'skor_klub_kedua'=>$skor_kedua[$index],
	      ));
	      
	      $index++;
	    }
	    $this->Skor_m->save_batch($data);

	    $count = count($_POST['kode']);
		for ($i=0; $i < $count; $i++) { 
			$q = $this->Skor_m->getAll()->result();

			if ($q[$i]->skor_klub_pertama >= $q[$i]->skor_klub_kedua) {
				$klub_pertama = $q[$i]->klub_pertama;
				$skor = $this->Klasemen_m->getskor($klub_pertama, 'tb_klasemen')->row_array();
				$main1 = $skor['main']+1;
				$menang = $skor['menang']+1;
				$gol_menang = $skor['gol_menang']+$q[$i]->skor_klub_pertama;
				$point1 = $skor['point']+3;

				$data = [
					'main' => $main1,
					'menang' => $menang,
			        'gol_menang' => $gol_menang,
			        'point' => $point1,
			    ];
			    $this->Klasemen_m->update_klub_pertama($klub_pertama, $data);

			    $klub_kedua = $q[$i]->klub_kedua;
			    $skor2 = $this->Klasemen_m->getskor($klub_kedua, 'tb_klasemen')->row_array();
			    $main2 = $skor2['main']+1;
			    $kalah = $skor2['kalah']+1;
				$gol_kalah = $skor2['gol_kalah']+$q[$i]->skor_klub_pertama;
				$data = [
					'main' => $main2,
					'kalah' => $kalah,
					'gol_kalah' => $gol_kalah
				];
				$this->Klasemen_m->update_klub_pertama($klub_kedua, $data);

			}elseif ($q[$i]->skor_klub_pertama <= $q[$i]->skor_klub_kedua) {
				$klub_kedua = $q[$i]->klub_kedua;
				$skor2 = $this->Klasemen_m->getskor($klub_kedua, 'tb_klasemen')->row_array();
				$main2 = $skor2['main']+1;
				$menang2 = $skor2['menang']+1;
				$gol_menang2 = $skor2['gol_menang']+$q[$i]->skor_klub_kedua;
				$point2 = $skor2['point']+3;

				$data = [
					'main' => $main2,
					'menang' => $menang2,
			        'gol_menang' => $gol_menang2,
			        'point' => $point2,
			    ];
			    $this->Klasemen_m->update_klub_pertama($klub_kedua, $data);

			    $klub_pertama = $q[$i]->klub_pertama;
			    $skor = $this->Klasemen_m->getskor($klub_pertama, 'tb_klasemen')->row_array();
			    $main = $skor['main']+1;
			    $kalah = $skor['kalah']+1;
				$gol_kalah = $skor['gol_kalah']+$q[$i]->skor_klub_kedua;
				$data = [
					'main' => $main,
					'kalah' => $kalah,
					'gol_kalah' => $gol_kalah
				];
				$this->Klasemen_m->update_klub_pertama($klub_pertama, $data);

			}elseif ($q[$i]->skor_klub_pertama <= $q[$i]->skor_klub_kedua) {
				$klub_pertama = $q[$i]->klub_pertama;
				$skor = $this->Klasemen_m->getskor($klub_pertama, 'tb_klasemen')->row_array();
				$main1 = $skor['main']+1;
				$seri = $skor['seri']+1;
				$point = $skor['point']+1;
				$data = [
			        'main' => $main1,
					'seri' => $seri,
			        'point' => $point,
			    ];
			    $this->Klasemen_m->update_klub_pertama($klub_pertama, $data);

			    $klub_pertama = $q[$i]->klub_kedua;
				$skor2 = $this->Klasemen_m->getskor($klub_kedua, 'tb_klasemen')->row_array();
				$main2 = $skor2['main']+1;
				$seri2 = $skor2['seri']+1;
				$point = $skor2['point']+1;
				$data = [
					'main' => $main2,
					'seri' => $seri2,
			        'point' => $point,
			    ];
			    $this->Klasemen_m->update_klub_kedua($klub_kedua, $data);
			}
		}
	    redirect('klasemen'); 
	}

	public function delete()
	{
		$id_skor = $this->input->post('id_skor');
		$where = array(
			'id_skor' => $id_skor
		);
        $this->Skor_m->delete($where, 'tb_skor');
        redirect('skor');
	}
}
?>