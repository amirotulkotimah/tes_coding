<?php 
/**
 * 
 */
class Klasemen_m extends CI_Model
{
	
	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('tb_klasemen');
		$query = $this->db->get();
		return $query;
	}

	public function getskor($where,$table)
	{
		$this->db->select('*');
		$this->db->from('tb_klasemen');
		$this->db->where('klub=', $where);
		$query = $this->db->get();
        return $query;
	}

	public function update_klub_pertama($klub_pertama, $data) {
	    $this->db->where('klub =', $klub_pertama);
	    return $this->db->update('tb_klasemen', $data);
  	}

  	public function update_klub_kedua($klub_kedua, $data) {
	    $this->db->where('klub =', $klub_kedua);
	    return $this->db->update('tb_klasemen', $data);
  	}

}
?>