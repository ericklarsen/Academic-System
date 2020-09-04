<?php 
/**
* 
*/
class Staff_model extends CI_Model	{

	public $nama_table = 'login';

	function cek_login($where,$table)
	{
		return $this->db->get_where($table, $where);
	}

	function edit_data($data,$username){
		$this->db->where($username);
		return $this->db->update($this->nama_table,$data);
	}

	function ambil_data_semua($table)
	{
		$query = $this->db->get($table);
		return $query->result_array();
	}

	function ambil_data_semua_2($table)
	{
		$this->db->select('tanggal, pertemuan, id_pelajaran, nis');
		$this->db->distinct();
		$query = $this->db->get($table);
		return $query->result_array();
	}

	function ambil_data_semua_3($username,$where1,$where2,$table)
	{
		$this->db->select($where1);
		$this->db->distinct();
		$query = $this->db->get_where($table, array($where2 => $username));
		return $query->result_array();
	}

	function ambil_data_semua_4($username,$where,$where2,$username2,$where3,$table)
	{
		$this->db->select($where);
		$this->db->distinct();
		$query = $this->db->get_where($table, array($where2 => $username,$where3 => $username2));
		return $query->result_array();
	}

	function ambil_data_id($username,$where,$table){ 
		$query = $this->db->get_where($table, array($where => $username));
		return $query->row();
		
	}

	function ambil_data_id_2($username,$where,$username2,$where2,$table){ 
		$query = $this->db->get_where($table, array($where => $username,$where2 => $username2));
		return $query->row();
		
	}

	function ambil_data_id_3($username,$where,$username2,$where2,$username3,$where3,$table){ //'mobil' = namatabel
		$query = $this->db->get_where($table, array($where => $username ,$where2 => $username2, $where3 => $username3));
		return $query->row();
	}

	function ambil_data_id_array($username,$where,$table){ //'mobil' = namatabel
		$query = $this->db->get_where($table, array($where => $username));//'username'=nama kolom di tabel
		return $query->result_array();
	}

	function ambil_data_id_array_2($username,$where,$username2,$where2,$table){ //'mobil' = namatabel
		$query = $this->db->get_where($table, array($where => $username,$where2 => $username2));
		return $query->result_array();
	}

	function ambil_data_id_array_3($username,$where,$username2,$where2,$username3,$where3,$table){ //'mobil' = namatabel
		$query = $this->db->get_where($table, array($where => $username ,$where2 => $username2, $where3 => $username3));
		return $query->result_array();
	}

	function ambil_data_id_array_4($username,$where,$username2,$where2,$username3,$where3,$username4,$where4,$table){ //'mobil' = namatabel
		$query = $this->db->get_where($table, array($where => $username ,$where2 => $username2, $where3 => $username3, $where4 => $username4));
		return $query->result_array();
	}

	function save_tambah($data, $tabel)
	{
		$this->db->insert($tabel, $data);
	}

	function save_edit($data, $id, $table)
	{
		$this->db->where($id);
		$this->db->update($table, $data);
	}

	function save_edit_bg($data,$id){
		$this->db->where($id);
		$this->db->update('background',$data);
	}

	function save_batch($data,$table){
		$this->db->insert_batch($table, $data);
	}

	function save_edit_batch($data,$table,$id){
		$this->db->update_batch($table,$data,$id);
	}	

	function delete_batch($id, $data, $table)
	{
		$this->db->where_in($id, $data);
		$this->db->delete($table);
	}

	function hapus($id, $table)
	{
		$this->db->delete($table, $id);
	}


}
?>