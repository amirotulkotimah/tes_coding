<?php 
/**
 * 
 */
class Data_klub_m extends CI_Model
{
	
	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('tb_klub');
		$query = $this->db->get();
		return $query;
	}

	public function input_klub($data, $table)
	{
		$this->db->insert($table,$data);
	}

	public function input_klasemen($data, $table)
	{
		$this->db->insert($table,$data);
	}

	public function cek($nama_klub, $kota_klub, $table){
		$this->db->select('*');
		$this->db->from('tb_klub');
		$this->db->where('nama_klub', $nama_klub);
		$this->db->where('kota_klub', $kota_klub);
		$query = $this->db->get();
		return $query;
	}

	public function delete($where, $table) { //membuat function hapus_data
	    $this->db->where($where);
	    $this->db->delete($table); //untuk menghapus data pada database
	}
}
?>