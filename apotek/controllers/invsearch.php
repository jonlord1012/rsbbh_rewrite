<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Invsearch extends CI_Controller {
	function __construct(){
		parent::__construct();			
		$this->load->model('invmodel');
	}

	function index(){
		$this->load->view('search/');
	}
	function lookup(){
		$keyword = $this->input->post('dork');
		$data['response']='false';
		$sqlresult = $this->invmodel->find_inv($keyword);
		if (!empty($sqlresult)){
			$data['response']='true';
			$data['message'] = array();
			foreach ($sqlresult as $row){
				$data['message'][]= array(
					'id'		=>$row['invid'],
					'code'	=>$row['inventory_code'],
					'name'	=>$row['inventory_name'],
					'group'	=>$row['inventory_group'],
					'bprice'=>$row['inventory_baseprice'],
					'unit'	=>$row['inventory_unit']
					);
			}
		}
		echo json_encode($data);
	}
}