<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamodel extends CI_Model {

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

function __construct() {
		parent::__construct();
		$this->load->library('fungsi');
		// $this->oracle_db=$this->load->database('oracle',true);
	}
	
	// public function getData(){
	// 	// $this->oracle_db->where("FLAG IS NULL");
  	// 	return $this->oracle_db->get('SUJ_INV_INTERFACE_COAL_RS')->result();
 	// }

 	public function getDataMol(){
		// $this->oracle_db->where("FLAG IS NULL");
  		return $this->db->get('tbdashboard_moll_in')->result();
 	}
 	public function get_mol(){
 		$this->db->select('Unit');
		$this->db->from("tbdashboard_moll_in");
		$datamol = $this->db->get();
		return $result=$datamol->row();
 	}

	function insert()
	{
		$item_code = $this->input->post('ITEM_CODE');
		$tanggal = $this->input->post('TRANSACTION_DATE');
		$shift = $this->input->post('SHIFT');
		$qmachine = $this->input->post('QUANTITY_MACHINE');
 
		$data = array(
			'ITEM_CODE' => $item_code,
			'TRANSACTION_DATE' => $tanggal,
			'SHIFT' => $shift,
			'QUANTITY_MACHINE' => $qmachine,
			);

		return $this->oracle_db->insert('SUJ_INV_INTERFACE_COAL_RS', $data);

	}

	function insertmol()
	{
		$date1 = $this->input->post('tanggal');
		$shift1 = $this->input->post('shift_1');
		$total_quantity1 = $this->input->post('Total_Quantity1');
		$nama_user = $this->input->post('nama_user');

		$this->oracle_db->set('TRANSACTION_DATE',"to_date('$date1','MM/DD/YYYY')",false);
		$this->oracle_db->set("DATE_APPROVE", "to_date(to_char(sysdate,'MM/DD/YYYY HH24:MI:SS'), 'MM/DD/YYYY HH24:MI:SS')",false);
		$this->oracle_db->set("SHIFT",$shift1);
		$this->oracle_db->set("QUANTITY_MACHINE",$total_quantity1);
		$this->oracle_db->set("QUANTITY_MANUAL",$total_quantity1);
		$this->oracle_db->set("QUANTITY_MANUAL_ORI",$total_quantity1);
		$this->oracle_db->set("QUANTITY_MACHINE_ORI",$total_quantity1);
		$this->oracle_db->set("USER_APPROVE",$nama_user);
		$this->oracle_db->set("MACHINE", "Molases");
		$this->oracle_db->set("ITEM_CODE", "1-FG-MOL-00001");
		$this->oracle_db->set("STATUS", "APPROVE");
		$this->oracle_db->set("UOM_CODE", "KG");
		$this->oracle_db->insert('SUJ_INV_INTERFACE_COAL_RS');
		// $this->output->enable_profiler(TRUE);
		
	}

	function rejectmol()
	{

		$date = $this->input->post('tanggal_rej');
		$shift = $this->input->post('shift_rej');
		$total_quantity = $this->input->post('totalqty');
		$qreject = $this->input->post('qty_reject');
		$keterangan = $this->input->post('message');
		$user = $this->input->post('user_name');

		$this->oracle_db->set('TRANSACTION_DATE',"to_date('$date','MM/DD/YYYY')",false);
		$this->oracle_db->set("DATE_APPROVE", "to_date(to_char(sysdate,'MM/DD/YYYY HH24:MI:SS'), 'MM/DD/YYYY HH24:MI:SS')",false);
		$this->oracle_db->set("SHIFT",$shift);
		$this->oracle_db->set("QUANTITY_MACHINE",$total_quantity);
		$this->oracle_db->set("QUANTITY_MACHINE_ORI",$total_quantity);
		$this->oracle_db->set("QUANTITY_MANUAL",$qreject);
		$this->oracle_db->set("QUANTITY_MANUAL_ORI",$qreject);
		$this->oracle_db->set("KETERANGAN",$keterangan);
		$this->oracle_db->set("MACHINE", "Molases");
		$this->oracle_db->set("USER_APPROVE",$user);
		$this->oracle_db->set("ITEM_CODE", "1-FG-MOL-00001");
		$this->oracle_db->set("STATUS", "REJECT");
		$this->oracle_db->set("UOM_CODE", "KG");
		$this->oracle_db->insert('SUJ_INV_INTERFACE_COAL_RS');

	}

	function cekdataApp()
	{
		$date1 = $this->input->post('tanggal');
		$shift1 = $this->input->post('shift_1');

		$this->oracle_db->select('*');
		$this->oracle_db->from("SUJ_INV_INTERFACE_COAL_RS");
		$this->oracle_db->where('TRANSACTION_DATE',"to_date('$date1','MM/DD/YYYY')",false);
		$this->oracle_db->where("SHIFT",$shift1);
		$cekapp= $this->oracle_db->get();
		return $cekapp->result();
	}

	function cekdataRej()
	{
		$date = $this->input->post('tanggal_rej');
		$shift = $this->input->post('shift_rej');

		$this->oracle_db->select('*');
		$this->oracle_db->from("SUJ_INV_INTERFACE_COAL_RS");
		$this->oracle_db->where('TRANSACTION_DATE',"to_date('$date','MM/DD/YYYY')",false);
		$this->oracle_db->where("SHIFT",$shift);
		$cekrej= $this->oracle_db->get();
		return $cekrej->result();
	}

	function cekData()
	{
		$item_code = $this->input->post('ITEM_CODE');
		$tanggal = $this->input->post('TRANSACTION_DATE');
		$shift = $this->input->post('SHIFT');
 
		$data = array(
			'ITEM_CODE' => $item_code,
			'TRANSACTION_DATE' => $tanggal,
			'SHIFT' => $shift,
			);

		$this->oracle_db->select('*');
		$this->oracle_db->from("SUJ_INV_INTERFACE_COAL_RS");
		$this->oracle_db->where("ITEM_CODE",$item_code);
		$this->oracle_db->where("TRANSACTION_DATE",$tanggal);
		$this->oracle_db->where("SHIFT",$shift);
		$cek= $this->oracle_db->get();
		return $cek->result();

	}

	function cariData()
	{
		$item_code =  $this->input->post('ITEM_CODE');
		$tanggal = $this->input->post('TRANSACTION_DATE');
		$shift = $this->input->post('SHIFT');
 
		$data = array(
			'ITEM_CODE' => $item_code,
			'TRANSACTION_DATE' => $tanggal,
			'SHIFT' => $shift,
			);

		$this->oracle_db->select('*');
		$this->oracle_db->from("SUJ_INV_INTERFACE_COAL_RS");
		$this->oracle_db->where("TRANSACTION_DATE",$tanggal);
		$this->oracle_db->where("ITEM_CODE",$item_code);
		$this->oracle_db->like("SHIFT",$shift);
		$cek = $this->oracle_db->get();
		return $cek->result();
	}

	function caridataMol()
	{
		$tanggal = $this->input->post('TRANSACTION_DATE');
		$shift = $this->input->post('SHIFT');
 
		$data = array(
			'TRANSACTION_DATE' => $tanggal,
			'SHIFT' => $shift,
			);

		$this->db->select('*');
		$this->db->from("tbdashboard_moll_in");
		$this->db->like("CreateDate",$tanggal);
		$this->db->like("SHIFT",$shift);
		$cekmol = $this->db->get();
		return $cekmol->result();
	}

	function datagraph()
	{
		$query = $this->db->query("SELECT DATE (a.CreateDate) tanggal, a.Shift, ROUND(SUM(a.qty)/1000) total, MAX(b.total) subTotal FROM tbDataTrans_Moll_In a JOIN ( SELECT DATE (a.CreateDate) tanggal, SUM(a.qty) total FROM tbDataTrans_Moll_In a WHERE (a.CreateDate) BETWEEN NOW() - interval 7 day AND NOW() AND a.shift=1 GROUP BY DATE (a.CreateDate)) b ON DATE (a.CreateDate) = b.tanggal WHERE (a.CreateDate) BETWEEN NOW() - interval 7 day AND NOW() AND a.shift=1 GROUP BY DATE (a.CreateDate), a.Shift"); 
		if($query->num_rows() > 0){
            foreach($query->result() as $datagraph){
                $hasil[] = $datagraph;
            }
            return $hasil;
        }
	}

	function datagraph2()
	{
		$query = $this->db->query("SELECT DATE (a.CreateDate) tanggal, a.Shift, ROUND(SUM(a.qty)/1000) total, MAX(b.total) subTotal FROM tbDataTrans_Moll_In a JOIN ( SELECT DATE (a.CreateDate) tanggal, SUM(a.qty) total FROM tbDataTrans_Moll_In a WHERE (a.CreateDate) BETWEEN NOW() - interval 7 day AND NOW() AND a.shift=2 GROUP BY DATE (a.CreateDate)) b ON DATE (a.CreateDate) = b.tanggal WHERE (a.CreateDate) BETWEEN NOW() - interval 7 day AND NOW() AND a.shift=2 GROUP BY DATE (a.CreateDate), a.Shift"); 
		if($query->num_rows() > 0){
            foreach($query->result() as $datagraph2){
                $hasil2[] = $datagraph2;
            }
            return $hasil2;
        }
	}

	function datagraph3()
	{
		$query = $this->db->query("SELECT DATE (a.CreateDate) tanggal, a.Shift, ROUND(SUM(a.qty)/1000) total, MAX(b.total) subTotal FROM tbDataTrans_Moll_In a JOIN ( SELECT DATE (a.CreateDate) tanggal, SUM(a.qty) total FROM tbDataTrans_Moll_In a WHERE (a.CreateDate) BETWEEN NOW() - interval 7 day AND NOW() AND a.shift=3 GROUP BY DATE (a.CreateDate)) b ON DATE (a.CreateDate) = b.tanggal WHERE (a.CreateDate) BETWEEN NOW() - interval 7 day AND NOW() AND a.shift=3 GROUP BY DATE (a.CreateDate), a.Shift"); 
		if($query->num_rows() > 0){
            foreach($query->result() as $datagraph3){
                $hasil3[] = $datagraph3;
            }
            return $hasil3;
        }
	}

	function datagraphsearch()
	{

		$date = $this->input->post('TRANSACTION_DATE');
		$shift = $this->input->post('SHIFT');
		
		$query = $this->db->query("SELECT DATE (a.CreateDate) tanggal, a.Shift, ROUND(SUM(a.qty)/1000) total, MAX(b.total) subTotal FROM tbDataTrans_Moll_In a JOIN ( SELECT DATE (a.CreateDate) tanggal, SUM(a.qty) total FROM tbDataTrans_Moll_In a WHERE (a.CreateDate) >= DATE_ADD('$date',INTERVAL - 7 DAY) AND a.shift=1 GROUP BY DATE (a.CreateDate)) b ON DATE (a.CreateDate) = b.tanggal WHERE (a.CreateDate) < DATE_ADD('$date',INTERVAL + 1 DAY) AND a.shift=1 GROUP BY DATE (a.CreateDate), a.Shift");

		if($query->num_rows() > 0){
            foreach($query->result() as $datagraphsearch){
                $hasil4[] = $datagraphsearch;
            }
            return $hasil4;
        }
	}

	function data1()
	{

		$shift = $this->input->post('SHIFT');
        $date = $this->input->post('TRANSACTION_DATE');
        
        if($shift == 1){
            $s = 0;//start
            $e = 7;//end
        }else if($shift == 2){
            $s = 8;
            $e = 14;
        }else{
            $s = 15;
            $e = 23;
        }
        
        $array = array();
        for($i = $s; $i <= $e;$i++){
            $query = "SELECT COALESCE((SELECT SUM(qty) FROM tbdashboard_moll_in WHERE DATE(TransDate)='$date' AND shift='$shift' AND HOUR(TRANSDATE) = '$i'),0) AS QTY";
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

	function data2()
	{
		
		$date = $this->input->post('TRANSACTION_DATE');
		$shift = $this->input->post('SHIFT');

		$this->db->select('SUM(Qty) as Qty');
		$this->db->from("tbdashboard_moll_in");
		$this->db->like("CreateDate",$date);
		$this->db->like("SHIFT",$shift);
		$cekmol = $this->db->get();
		return $result=$cekmol->row();
		//return $cekmol;

	}

		function data3()
	{
		
		$date = $this->session->set_userdata('date');
		$shift = $this->session->set_userdata('shift');


		$this->db->select('SUM(Qty) as Qty');
		$this->db->from("tbdashboard_moll_in");
		$this->db->like("CreateDate",$date);
		$this->db->like("SHIFT",$shift);
		$cekmol = $this->db->get();
		return $result=$cekmol->row();
		//return $cekmol;

	}

	function data4()
	{
		$date = $this->input->post('TRANSACTION_DATE');
		$shift = $this->input->post('SHIFT');

		$query = $this->db->query("SELECT f.Shift,f.Jam,coalesce(e.Qty,0) AS QTY,( SELECT SUM(b.Qty) FROM tbdashboard_moll_in b WHERE b.shift='$shift' AND DATE(b.CreateDate)='$date') AS total_qty from ( SELECT a.shift, HOUR(a.CreateDate) AS jam, SUM(a.Qty) AS Qty FROM tbdashboard_moll_in a WHERE a.shift ='$shift' and DATE(a.CreateDate)='$date' GROUP BY HOUR(a.CreateDate)) e right outer join (select shift,HOUR(a.CreateDate)  as jam from tbdashboard_moll_in a where MONTH(a.CreateDate)='08' and a.shift='$shift' group by  shift,HOUR(a.CreateDate)) f on e.shift = f.shift and e.jam = f.jam");
		return $query->result_array();
	}


	function data($id)
	{

		$this->oracle_db->select('*');
		$this->oracle_db->from("SUJ_INV_INTERFACE_COAL_RS");
		$this->oracle_db->where("ID", $id);
		$hasil= $this->oracle_db->get();
		return $hasil->row_array();
				
	}

	function appData($id)
	{
		$this->oracle_db->select('*');
		$this->oracle_db->from("SUJ_INV_INTERFACE_COAL_RS");
		$this->oracle_db->where("ID", $id);
		$hasil= $this->oracle_db->get();
		return $hasil->row_array();
	}

	function dataApp($id)
	{
		$this->oracle_db->select('*');
		$this->oracle_db->from("SUJ_INV_INTERFACE_COAL_RS");
		$this->oracle_db->where("ID",$id);
		$result1 = $this->oracle_db->get();
		return $result1->row_array();
							
	}

	function get_tanggal_mol()
	{
		$query = $this->db->query("SELECT distinct DAYOFMONTH(TransDate) as TransDate from tbdashboard_moll_in  GROUP by TransDate order by TransDate asc");
		if($query->num_rows() > 0){
            foreach($query->result() as $mol){
                $hasil[] = $mol;
            }
            return $hasil;
        }
    }

    function get_data_mol()
	{
		$query = $this->db->query("SELECT month(current_date) from dual");
		if($query->num_rows() > 0){
            foreach($query->result() as $mol_data){
                $hasil[] = $mol_data;
            }
            return $hasil;
        }
    }

    function get_data_coal()
	{
		$query = $this->oracle_db->query("SELECT TRANSACTION_DATE, SUM(QUANTITY_MACHINE) AS QUANTITY_MACHINE, SUM(QUANTITY_MANUAL) AS QUANTITY_MANUAL from SUJ_INV_INTERFACE_COAL_RS where ITEM_CODE='1-RM-BRM-00008' GROUP by TRANSACTION_DATE order by TRANSACTION_DATE asc");
		if($query->num_rows() > 0){
            foreach($query->result() as $data1){
                $hasil[] = $data1;
            }
            return $hasil;
        }
    }

    function get_data_raw()
	{
		$query = $this->oracle_db->query("SELECT TRANSACTION_DATE, SUM(QUANTITY_MACHINE) AS QUANTITY_MACHINE, SUM(QUANTITY_MANUAL) AS QUANTITY_MANUAL from SUJ_INV_INTERFACE_COAL_RS where ITEM_CODE='1-RS-RAW-00001' GROUP by TRANSACTION_DATE order by TRANSACTION_DATE asc");
		if($query->num_rows() > 0){
            foreach($query->result() as $data2){
                $hasil[] = $data2;
            }
            return $hasil;
        }
    }

  

 } // penutup model