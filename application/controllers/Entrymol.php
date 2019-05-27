<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrymol extends CI_Controller {

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
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="1" || $this->session->userdata('id_level_user')=="2")
		{	
			// $data['oracle']= $this->datamodel->GetData();
			$data['mol_data']=$this->datamodel->getDataMol();
			$data['unit']=$this->datamodel->get_mol();
			$data['data']=$this->datamodel->data4();
			$data['graph']=$this->datamodel->datagraph();
			$data['graph2']=$this->datamodel->datagraph2();
			$data['graph3']=$this->datamodel->datagraph3();
			$data['mol']=$this->datamodel->get_tanggal_mol();
			$data['data1']=$this->datamodel->get_data_coal();
			$data['total'] = '0';
			
			// $data['graphsearch'] = "";
			// $data['total']=$this->datamodel->data2();
				// echo "<pre>";
				// print_r($check);
				// echo "</pre>";
			// $data['total'] = '0';
			$data['shift'] = '0';
			$data['date'] = '';
			$data['contents'] = 'Entrymol/view';
			$this->load->view('layout/index',$data);
			//$data['total'] =$this->datamodel->data2() ;
			// $cekmol['cekmol']=$this->datamodel->data2();
			// $data = $this->datamodel->data1();
			// $data['data']=$this->datamodel->data2();
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

	function searchmol()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="1" || $this->session->userdata('id_level_user')=="2")
		{
			if( $date = $this->input->post('TRANSACTION_DATE')){
				$shift = $this->input->post('SHIFT');
				$total_quantity = $this->input->post('Total_Quantity');

				$data['unit']=$this->datamodel->get_mol();
				$data['mol_data']=$this->datamodel->getDataMol();
				$data['data']=$this->datamodel->data4(); 
				$data['total']=$this->datamodel->data2();
				$data['graph']=$this->datamodel->datagraph();
				$data['graph2']=$this->datamodel->datagraph2();
				$data['graph3']=$this->datamodel->datagraph3();
				$data['mol']=$this->datamodel->get_tanggal_mol();
				// $data['graphsearch']=$this->datamodel->datagraphsearch();
				$data['shift'] = $shift;
				$data['date'] = $date;
				// echo "<pre>";
				// print_r($check);
				// echo "</pre>";
				$data['contents'] = 'Entrymol/view';
				$this->load->view('layout/index',$data);
				}
			else{
				$date = date("Y-m-d");
					}
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-danger">
				          							  <h4>Oppss</h4>
									                  <p>Maaf Anda Tidak di Persilahkan Untuk Melihat Halaman Ini</p>
									                  </div>');
			redirect('Entrymol/index');
		}
	}

	function approve()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="1" || $this->session->userdata('id_level_user')=="2")
		{	
			$date1 = $this->input->post('tanggal');
			$shift1 = $this->input->post('shift_1');
			$total_quantity1 = $this->input->post('Total_Quantity1');
			$nama_user = $this->input->post('nama_user');

			$data['shift'] = $shift1;
			$data['date'] = $date1;
			$cekapp = $this->datamodel->cekdataApp();

				if (!$cekapp > 0 ){
					$approve = $this->datamodel->insertmol();

						if(!$approve){
						$this->session->set_flashdata('msg','<div class="alert alert-success">
															 <h4>Berhasil </h4>
															 <p>Data Berhasil Di Approve !</p>
															 </div>');
						redirect('Entrymol/index');
						}else{
						$this->session->set_flashdata('msg','<div class="alert alert-danger">
							          				         <h4>Oppss</h4>
												             <p>Data Gagal Di input! Silahkan Ulangi Kembali</p>
												             </div>');
							     redirect('Entrymol/index');
						}
				}else{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">
						          							  <h4>Oppss</h4>
											                  <p>Data Sudah Tersedia</p>
											                  </div>');
						          redirect('Entrymol/index');
				     }
		}else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-danger">
				          							  <h4>Oppss</h4>
									                  <p>Maaf Anda Tidak di Persilahkan Untuk Melihat Halaman Ini</p>
									                  </div>');
			redirect('Entrymol/index');
		}
	}

	function reject()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="1" || $this->session->userdata('id_level_user')=="2")
		{	
			$date = $this->input->post('tanggal_rej');
			$shift = $this->input->post('shift_rej');
			$total_quantity = $this->input->post('totalqty');
			$qty_reject = $this->input->post('qty_reject');
			$keterangan = $this->input->post('message');
			$user = $this->input->post('user_name');

			$data['shift'] = $shift;
			$data['date'] = $date;
			$data['total'] = $total_quantity;
			$data['reject'] = $qty_reject;
			$data['keterangan'] = $keterangan;

			$cekrej = $this->datamodel->cekdataRej();

			if(!$cekrej > 0){

				$reject = $this->datamodel->rejectmol();

				if(!$reject)
				{
					$this->session->set_flashdata('msg','<div class="alert alert-success">
														 <h4>Berhasil </h4>
														 <p>Data Berhasil Di reject !</p>
														 </div>');
						     redirect('Entrymol/index');
				}else{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">
						          				         <h4>Oppss</h4>
											             <p>Data Gagal Di input! Silahkan Ulangi Kembali</p>
											             </div>');
						     redirect('Entrymol/index');
				}
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">
						          					<h4>Oppss</h4>
											        <p>Data Sudah Tersedia</p>
											        </div>');
						     redirect('Entrymol/index');
				     }

		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-danger">
				          							  <h4>Oppss</h4>
									                  <p>Maaf Anda Tidak di Persilahkan Untuk Melihat Halaman Ini</p>
									                  </div>');
			redirect('Entrymol/index');
		}
	}



} // penutup controller
