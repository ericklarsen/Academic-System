<?php 
/**
* 
*/
class Siswa_model extends CI_Model	{

public $nama_table = 'user_murid';

	function cek_login($where,$table)
	{
		return $this->db->get_where($table, $where);
	}

	function edit_data($data,$username){
		$this->db->where($username);
		return $this->db->update($this->nama_table,$data);
	}

	function ambil_data_id($username){ //'mobil' = namatabel
		$query = $this->db->get_where('user_staff', array('nip' => $username));//'username'=nama kolom di tabel
		return $query->row();
		
	}
	function ambil_id_bg(){ //'mobil' = namatabel
		$query = $this->db->get_where('background', array('id_background' => '1'));//'username'=nama kolom di tabel
		return $query->result_array();
		
	}

	function save_edit($data,$id){
		$this->db->where($id);
		$this->db->update('login',$data);
	}

	function save_edit_bg($data,$id){
		$this->db->where($id);
		$this->db->update('background',$data);
	}
}
 ?>