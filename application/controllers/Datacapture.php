<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datacapture extends CI_Controller {

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
		$data['oracle']= $this->datamodel->GetData();

		$data['contents'] = 'Datacapture/view';
		$this->load->view('layout/index',$data);
	}

	function search()
	{
			$cari = $this->input->post('cari');
			$data['oracle']=$this->datamodel->cariData();
			$data['contents'] = 'Datacapture/view';
			$this->load->view('layout/index',$data);
			// redirect('Datacapture/index');
	}

	function edit()
	{
		$id = $this->input->get('id');
		$hasil = $this->datamodel->data($id); //kirim parameter $id
		echo json_encode($hasil);    
	}

    function dataApp()
    {

    	//$id = $this->input->get('idapp');
    	$id = $this->input->get('id');
    	$result1 = $this->datamodel->dataApp($id);
    	//echo json_encode($result1);
    	$quantity_machine = $result1['QUANTITY_MACHINE'];
    	$quantity_manual = $result1['QUANTITY_MANUAL'];
    	if($quantity_machine == $quantity_manual) {
    		// $this->oracle_db->insert("SUJ_INV_INTERFACE_COAL_RS_2", $result1);
    		//$id = $this->input->post('id');
        //$wh  = array('ID', $id);
         $this->oracle_db->set('FLAG','1');
         $this->oracle_db->where('ID', $id);
		 $this->oracle_db->update('SUJ_INV_INTERFACE_COAL_RS');
		 $this->oracle_db->insert("SUJ_INV_INTERFACE_COAL_RS_2", $result1);




    		$this->session->set_flashdata('msg','<div class="alert alert-success">
										  <h4>Berhasil </h4>
										  <p>Data Berhasil Di Approve !</p>
										  </div>');
    		redirect('Datacapture/index');
    	} else {
    		$this->session->set_flashdata('msg','<div class="alert alert-danger">
						          		  <h4>Oppss</h4>
										  <p>Quantity Tidak Sama !</p>
										  </div>');
    		redirect('Datacapture/index');
    	}
    	
    }

	function ubah()
	{

        $id = $this->input->post('ID');
        $qm =  $this->input->post('QM');

        $up  = array('QUANTITY_MANUAL'=> $qm,'ID'=> $id);
        //$wh  = array('ID', $id);
         $this->oracle_db->where('ID', $id);
		 $this->oracle_db->update('SUJ_INV_INTERFACE_COAL_RS', $up);
		if($this->oracle_db->affected_rows()) {
											$this->session->set_flashdata('msg','<div class="alert alert-success">
												                 <h4>Berhasil </h4>
												                 <p>Data Berhasil Di Update !</p>
												                 </div>');
														} else {
															  $this->session->set_flashdata('msg','<div class="alert alert-danger">
						          							  <h4>Oppss</h4>
											                  <p>Data Gagal Di Update !</p>
											                  </div>');
														}

       // $exe = $this->oracle_db->update('SUJ_INV_INTERFACE_COAL_RS',$up,$wh);
        // if($exe){
        // 	alert("Berhasil"); }
        // }else{
        // 	alert("GAGAL");
        // }
	}



} // penutup controller