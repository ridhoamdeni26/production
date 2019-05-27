<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datagrafik extends CI_Controller {

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
		$this->load->library('form_validation');
		// $this->oracle_db=$this->load->database('oracle',true);

	}

	public function index()
	{
		// $data['oracle']= $this->datamodel->GetData();
		$data['data']=$this->datamodel->get_data_mol();
		$data['data1']=$this->datamodel->get_data_coal();
		$data['data2']=$this->datamodel->get_data_raw();
		$data['contents'] = 'Grafik/view';
		$this->load->view('layout/index',$data);
	}


} // penutup controller