<?php 
/**
 * 
 */
class Skor_m extends CI_Model
{
	
	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('tb_skor');
		$query = $this->db->get();
		return $query;
	}

	public function input_data($data, $table)
	{
		$this->db->insert($table,$data);
	}

	public function cek($klub_pertama, $klub_kedua, $table){
		$this->db->select('*');
		$this->db->from('tb_skor');
		$this->db->where('klub_pertama', $klub_pertama);
		$this->db->where('klub_kedua', $klub_kedua);
		$query = $this->db->get();
		return $query;
	}

	public function delete($where, $table) { //membuat function hapus_data
	    $this->db->where($where);
	    $this->db->delete($table); //untuk menghapus data pada database
	}

	public function save_batch($data){
    return $this->db->insert_batch('tb_skor', $data);
  }
}
?>