<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apotek extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		//$this->load->helper('utility');
		$this->load->model('aptmodel');
		$this->load->model('invmodel');
    $this->load->helper('flexigrid');
    $this->load->library('flexigrid');
		//$this->load->library('form_validation');		
	}
	public function index()	{
/*		$data = array(
				'page_title' => 'Apotek Home',
				'content' => 'home'
				);*/
		$data['page_title']= 'Test Index';
		$data['content']='';
		$data['fill']= $this->aptmodel->get_inventory();
		$this->load->view('container', $data);
	}
	public function home(){		
		$data	= array(
						'page_title'=>'Unit List',
						'content' => 'dumper'						
						);
		//$data['js_grid'] = $this->add_detail();
		$this->load->view('container',$data);
	}
	public function master(){
		$data = array(
				'page_title' => 'Kasir:: Master Data',
				'content' => 'master'
				);
		$this->load->view('container',$data);
	}	
	public function report(){
		$data = array(
						'page_title' => 'Kasir:: Reporting',
						'content' => 'report'
						);
		$this->load->view('container', $data);
	}
	public function create_resep(){
		$data = array(
						'page_title'=> 'Apotek:: Resep',
						'content'=> 'resep_make'
						);
		$this->load->view('container', $data);
	}
	
	public function add_new() {

		$data = array(
					'page_title' => 'Apotek:: Resep',
					'content' => 'resep_make'
					 );
		$this->load->library('form_validation');
		$data['extraHeadContent'] = 'search';
		/*$data['extraBodyLoad']= "onload ='placeItInv() ;'";*/				
		$rules = array(
							 array(
						    'field' => 'rcphead_no',		
								'label' => 'No Resep',
								'rules' => 'required|min_length[13]|max_length[40]'),
							array(
								'field' => 'rcphead_date',
								'label' => 'Tanggal Resep',
								'rules' => 'required|min_length[8]|max_length[10]'),
							array(
								'field' => 'rcphead_flag',
								'label' => 'Jenis Transaksi',
								'rules' => 'required'),
							/*array(
								'field' => 'rcphead_status',
								'label' => 'Status',
								'rules'	=> 'required'),*/
							array(
								'field' => 'rcphead_pasienid',
								'label' => 'Nomor RM',
								'rules' => 'required|min_length[5]|max_length[40]'),
							array(
								'field' => 'rcphead_paytype',
								'label' => 'Cara Bayar',
								'rules' => 'required')
						);
		
		$this->form_validation->set_rules($rules);
		$data['form_validate'] = $this->form_validation->run();
		$data['db_status'] = NULL;
		$data['js_grid']= $this->add_detail();
		if ($data['form_validate']) {
			$rcpdata = array(
			'rcphead_no' => $this->input->post('rcphead_no', TRUE),
			'rcphead_date' => $this->input->post('rcphead_date', TRUE),
			'rcphead_flag' => $this->input->post('rcphead_flag', TRUE),
			'rcphead_pasienid' => $this->input->post('rcphead_pasienid', TRUE),
			'rcphead_paytype' => $this->input->post('rcphead_paytype', TRUE)
			);		
			$data['db_status'] = $this->aptmodel->add_resephead($rcpdata);			
		}
		$this->load->view('container', $data);
	 }	
	public function add_detail(){
		$data	= array(
						'page_title'=>'inventory List',
						'content' => 'dumper'						
						);		
		$column['id'] = array('ID', 40, TRUE, 'center', 2);
    $column['inventory_code'] = array('Inventory Code', 40, TRUE, 'left', 2);
    $column['inventory_name'] = array('Inventory Name', 200, TRUE, 'left', 2);
    $column['inventory_unit'] = array('Unit', 60, TRUE, 'left', 2);
    $column['inventory_baseprice'] = array('Price', 80, TRUE, 'center', 2);
    $column['inventory_group'] = array('Group', 150, TRUE, 'left', 2);
    $grid_js = build_grid_js('grid', site_url('/apotek/getdet'), $column, 'id', 'asc');
		$data['js_grid'] = $grid_js;
		return $data['js_grid'];

		
	}
	public function getdet(){
		$valid_fields = array('id', 'inventory_code','inventory_name', 'inventory_unit', 'inventory_baseprice', 'inventory_group');
    $this->flexigrid->validate_post('id', 'asc', $valid_fields);
    $details = $this->aptmodel->getfordet();
    $this->output->set_header($this->config->item('json_header')); 
		   
    $records_items = array();
    foreach ($details['records']->result() as $detail) {
      $records_items[] = array(
      				$detail->id,
      				$detail->id,
      				$detail->inventory_code,
      				$detail->inventory_name,
      				$detail->inventory_unit,
      				$detail->inventory_baseprice,
      				$detail->inventory_group );
		}
    $this->output->set_output($this->flexigrid->json_build($details['record_count'], $records_items));
	} 
	public function lookup(){
		$keyword = $this->input->post('term');
		$data['response']='false';
		$sqlresult = $this->invmodel->find_inv($keyword);
		$this->output->set_header($this->config->item('json_header'));
		
		if (!empty($sqlresult)){
			$data['response']='true';
		}
			$data = array();
			foreach ($sqlresult['records']->result() as $vals){
				$inventory = $vals->inventory_code." - " . $vals->inventory_name;
				$data[]= array(
					$vals->id,
					$inventory);					
			}
		if ('IS_AJAX'){
			echo json_encode($data);
			//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
		}/*else{
			$this->load->view('container', $data);
		}		*/
	}
}