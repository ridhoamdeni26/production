<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model 
{

	function cek_login($dt)
	{

		$login['username'] = $dt['username'];
		$login['password'] = md5($dt['password']);
		$cek = $this->db->get_where('v_tb_user', $login);
		if($cek->num_rows()>0)
		{
			foreach($cek->result() as $qad)
			{
				$sess_data['logged_in'] = time();
				$sess_data['username'] = $qad->username;
				$sess_data['nama_lengkap'] = $qad->nama_lengkap;
				$sess_data['id_level_user'] = $qad->id_level_user;
				$sess_data['status'] = $qad->status;
				$this->session->set_userdata($sess_data);

				// print_r($sess_data);
			}
			redirect('site');

		}
		else
		{
			
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">
					          				         <h4>Maaf</h4>
										             <p>Kombinasi username dan password tidak valid.</p>
										             </div>');
			header('location:'.base_url().'');
		}
	}

} //penutupcontroller