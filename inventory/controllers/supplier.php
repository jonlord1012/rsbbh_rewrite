<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * supplier controller
 * @author Bayu Irawan <bayu.iravvan@gmail.com>
 */

class Supplier extends CI_Controller
{
  public function __construct(){
    parent::__construct();
  }
  
  public function index() {
    $data = array(
      'page_title' => 'Supplier',
      'content' => 'supplier/list'
    );
    $this->load->model('supplier_model');
    
    $q = $this->supplier_model->get();
    if ($q->num_rows() <= 0) {
      $data['factories'] = false;
      $this->load->view('container', $data);
      return;
    }
    
    foreach ($q->result() as $fact) {
      $data['companies'][$fact->id]['id'] = $fact->id;
      $data['companies'][$fact->id]['factory_code'] = $fact->factory_code;
      $data['companies'][$fact->id]['factory_name'] = $fact->factory_name;
      $data['companies'][$fact->id]['factory_address'] = $fact->factory_address;
      $data['companies'][$fact->id]['factory_phone'] = $fact->factory_phone;
      $data['companies'][$fact->id]['factory_isactive'] = $fact->factory_isactive;
    }
    
    $this->load->view('container', $data);
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