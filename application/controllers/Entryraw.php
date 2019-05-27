<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entryraw extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

		function __construct(){
		parent::__construct();
		$this->load->model('datamodel');
		$this->load->helper('url');
		$this->load->library('form_validation','session');
		// $this->oracle_db=$this->load->database('oracle',true);

		}

	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="1" || $this->session->userdata('id_level_user')=="3")
		{
			// $data['db']= $this->datamodel->GetDataMol();
			$data['data']=$this->datamodel->data4();
			$data['mol']=$this->datamodel->get_tanggal_mol();
			$data['mol_data']=$this->datamodel->get_data_mol();
			$data['total']=$this->datamodel->data2();
			$data['contents'] = 'Entryraw/view';
			$this->load->view('layout/index',$data);
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-danger">
				          							  <h4>Oppss</h4>
									                  <p>Maaf Anda Tidak di Persilahkan Untuk Melihat Halaman Ini</p>
									                  </div>');
			redirect('App/index');
		}
	}

}//penutup controller