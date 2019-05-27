<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {

	public function getDataUser()
	{
		// $this->oracle_db->where("FLAG IS NULL");
  		return $this->db->get('tb_user')->result();
 	}

 	public function getData()
 	{
 		return $this->db->get('v_tb_user')->result();
 	}

 	function addData()
 	{
 		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$id_level = $this->input->post('id_level');
		$status = $this->input->post('status');
 
		$data = array(
			'nama_lengkap' => $nama_lengkap,
			'username' => $username,
			'password' => md5($password),
			'id_level_user' => $id_level,
			'status' => $status
			);

		return $this->db->insert('tb_user', $data);
 	}

 	function cekData()
	{
		$username = $this->input->post('username');

		$this->db->select('*');
		$this->db->from("tb_user");
		$this->db->where("username",$username);
		$cek= $this->db->get();
		return $cek->result();
	}

	function editData($id)
	{
		$this->db->select('*');
		$this->db->from("tb_user");
		$this->db->where("id_user", $id);
		$hasil= $this->db->get();
		return $hasil->row_array();
	}


}