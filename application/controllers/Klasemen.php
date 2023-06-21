<?php 
/**
 * 
 */
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Klasemen extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
        $this->load->model('Klasemen_m');
	}

	public function index()
	{
		$config['site_url'] = base_url('index.php/klasemen/');
		$data['klasemen'] = $this->Klasemen_m->getAll()->result();
		$this->load->view('template/header');
		$this->load->view('klasemen', $data);
		$this->load->view('template/footer');
	}

	public function clear()
    {
        $ID = $this->Klasemen_m->getAll()->result();
        // print_r($ID);
        // echo $ID[0]->id_klasemen;
        $reslt = array();
        for($x = 0; $x < sizeof($ID); $x++){
            $reslt[] = array(
            "id_klasemen" => $ID[$x]->id_klasemen,
            "main"  => 0,
            "menang" => 0,
            "kalah"  => 0,
            "seri" => 0,
            "gol_menang"  => 0,
            "gol_kalah" => 0,
            'point' => 0,
            );
        }
        $this->db->update_batch('tb_klasemen', $reslt, 'id_klasemen');
        redirect('klasemen');
    }

}
?>