<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * supplier controller
 * @author Bayu Irawan <bayu.iravvan@gmail.com>
 */

class Supplier extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('supplier_model');
    $this->load->helper('flexigrid');
    $this->load->library('flexigrid');
  }
  
  public function index() {
    $data = array(
      'page_title' => 'Supplier',
      'content' => 'supplier/list'
    );
    
    $column['id'] = array('ID', 40, TRUE, 'center', 2);
    $column['factory_code'] = array('Supplier Code', 40, TRUE, 'center', 2);
    $column['factory_name'] = array('Supplier Name', 40, TRUE, 'center', 2);
    $column['factory_address'] = array('Address', 60, TRUE, 'center', 2);
    $column['factory_phone'] = array('Phone', 40, TRUE, 'center', 2);
    $column['factory_isactive'] = array('Active', 40, TRUE, 'center', 2);
    $grid_js = build_grid_js('supplier-grid', site_url('/supplier/xget'), $column, 'id', 'asc');
    $data['js_grid'] = $grid_js;
    
    $this->load->view('container', $data);
  }
  
  public function xget() {
    $valid_fields = array('id', 'factory_name');
    $this->flexigrid->validate_post('id', 'asc', $valid_fields);
    $suppliers = $this->supplier_model->get();
    $this->output->set_header($this->config->item('json_header'));
    
    $records_items = array();
    foreach ($suppliers['records']->result() as $supplier) {
      $records_items[] = array(
        $supplier->id,
        $supplier->factory_code,
        $supplier->factory_name,
        $supplier->factory_address,
        $supplier->factory_phone,
        $supplier->factory_isactive
      );
    }
    
    $this->output->set_output($this->flexigrid->json_build($suppliers['record_count'], $records_items));
  }
  
  public function add_new() {
    $data = array(
      'page_title' => 'Add new supplier',
      'content' => 'supplier/add_new'
    );
    $this->load->library('form_validation');
    $rules = array(
      array(
        'field' => 'factory_code',
        'label' => 'Factory Code',
        'rules' => 'required|min_length[5]|max_length[10]'
      ),
      array(
        'field' => 'factory_name',
        'label' => 'Factory Name',
        'rules' => 'required|min_length[4]|max_length[255]'
      ),
      array(
        'field' => 'factory_address',
        'label' => 'Factory Address',
        'rules' => 'required|min_length[10]|max_length[255]'
      ),
      array(
        'field' => 'factory_phone',
        'label' => 'Factory Phone',
        'rules' => 'required|min_length[5]|max_length[20]'
      ),
      array(
        'field' => 'factory_isactive',
        'label' => 'Factory status',
        'rules' => 'required'
      )
    );
    $this->form_validation->set_rules($rules);
    
    $data['form_validate'] = $this->form_validation->run();
    $data['db_status'] = NULL;
    if ($data['form_validate']) {
      $this->load->model('supplier_model');
      $factdata = array(
        'factory_code' => $this->input->post('factory_code', TRUE),
        'factory_name' => $this->input->post('factory_name', TRUE),
        'factory_address' => $this->input->post('factory_address', TRUE),
        'factory_phone' => $this->input->post('factory_phone', TRUE),
        'factory_isactive' => $this->input->post('factory_isactive', TRUE)
      );
      $data['db_status'] = $this->supplier_model->add($factdata);
    }
    
    $this->load->view('container', $data);
  }
}