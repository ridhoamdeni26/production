<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inputdata extends CI_Controller {

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

	}

	public function index()
	{
		$data['db']= $this->datamodel->GetDataMol();
		$data['shift']= $this->datamodel->getOption();
		$data['contents'] = 'Input/input';
		$this->load->view('layout/index',$data);
	}

	function save()
	{
				$this->form_validation->set_rules('tanggal', 'Field of Type Tanggal', 'required');
				$this->form_validation->set_rules('shift', 'Field of Shift', 'required');
				$this->form_validation->set_rules('quantity_machine', 'Field of Quantity Machine', 'required');

				if ($this->form_validation->run()==TRUE)
					{
						$data['contents'] = 'Input/input';
						$this->load->view('layout/index',$data);
       				 }
       
		        else {  
		        		$cek = $this->datamodel->cekData();
		        		if (!$cek > 0 ){
		        			$insert = $this->datamodel->insert();
				          if(!$insert)
				         {
				          $this->session->set_flashdata('msg','<div class="alert alert-danger">
				          							  <h4>Oppss</h4>
									                  <p>Data Gagal Di input! Silahkan Ulangi Kembali</p>
									                  </div>');
				          redirect('Inputdata/index');
				     	 } else {
				     	 	$this->session->set_flashdata('msg','<div class="alert alert-success">
												                 <h4>Berhasil </h4>
												                 <p>Data Berhasil Di Input !</p>
												                 </div>');
				     	 	redirect('Inputdata/index');
				     	 } 
		        			
		        		}else{

				          $this->session->set_flashdata('msg','<div class="alert alert-danger">
				          							  <h4>Oppss</h4>
									                  <p>Data Sudah Tersedia Silhakan ulangi kembali</p>
									                  </div>');
				          redirect('Inputdata/index');
		        			  }

    				  }
	}

	function search()
	{
			$cari = $this->input->post('cari');
			$data['oracle']=$this->datamodel->cariData();
			$data['contents'] = 'Datacapture/view';
			$this->load->view('layout/index',$data);
			// redirect('Datacapture/index');
	}


} // penutup controller
