<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Build extends CI_Controller {

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
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="1" || $this->session->userdata('id_level_user')=="2")
		{
			$data['data']=$this->datamodel->data4();
			$data['datamol']=$this->datamodel->getDataMol();
			$data['graph']=$this->datamodel->datagraph();
			$data['mol']=$this->datamodel->get_tanggal_mol();
			$data['total']=$this->datamodel->data2();
			// echo "<pre>";
			// 	print_r($check);
			// 	echo "</pre>";
			$data['contents'] = 'Build/view';
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

	public function getData()
	{
        
        $date = $this->input->post('tanggal');
        $shift = $this->input->post('shift');
        
        if($shift == 1){
            $s = 0;//start
            $e = 7;//end
        }else if($shift == 2){
            $s = 8;
            $e = 15;
        }else{
            $s = 16;
            $e = 23;
        }
        
        $array = array();
        for($i = $s; $i <= $e;$i++){
            $query = "SELECT COALESCE((SELECT SUM(qty) FROM tbDashBoard_Moll_In WHERE DATE(TransDate)='$date' AND shift='$shift' AND HOUR(TRANSDATE) = '$i'),0) AS QTY";
            $exe = $this->db->query($query);
            $row = $exe->row_array();
            
            $push = array(
              'jam' => $i,
              'qty' => $row['QTY']
            );
            
            array_push($array, $push);
        }
        
        echo json_encode($array);
    }

    function getDataChart()
    {
    	
    	$mol['data']=$this->datamodel->datagraph();
    	print_r(json_encode($mol));
    }

	function searchmol()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level_user')=="1" || $this->session->userdata('id_level_user')=="2")
		{
			if( $date = $this->input->post('TRANSACTION_DATE')){
				$shift = $this->input->post('SHIFT');
				$total_quantity = $this->input->post('Total_Quantity');


				$data['data']=$this->datamodel->data4(); 
				$data['total']=$this->datamodel->data2();
				$data['graph']=$this->datamodel->datagraph();
				$data['mol']=$this->datamodel->get_tanggal_mol();
				$check['mol_data']=$this->datamodel->get_data_mol();
				$data['shift'] = $shift;
				$data['date'] = $date;
				// echo "<pre>";
				// print_r($check);
				// echo "</pre>";
				$data['contents'] = 'Entrymol/view';
				$this->load->view('layout/index',$data);
				}else{
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