<?php if (!defined('BASEPATH')) exit("No direct script access allowed");

class Supplier_model extends CI_Model {
  protected $CI;
  public function __construct() {
    parent::__construct();
    $this->CI =& get_instance();
  }
  
  public function add($spec) {
    $spec['factory_isactive'] = strtolower($spec['factory_isactive']) == 'yes' ? 1 : 0;
    $data = array(
      'factory_code' => $spec['factory_code'],
      'factory_name' => $spec['factory_name'],
      'factory_address' => $spec['factory_address'],
      'factory_phone' => $spec['factory_phone'],
      'factory_isactive' => $spec['factory_isactive']
    );
    $this->db->insert('jbh_ms_factory', $data);
    return $this->db->insert_id();
  }
  
  public function get() {
    $this->db->select('id, factory_code, factory_name, factory_address, factory_phone, factory_isactive');
    $this->db->from('jbh_ms_factory');
    $this->CI->flexigrid->build_query();
    $val['records'] = $this->db->get();
    
    $this->db->select('count(id) as record_count');
    $this->db->from('jbh_ms_factory');
    $this->CI->flexigrid->build_query(FALSE);
    $record_count = $this->db->get();
    $row = $record_count->row();
    
    $val['record_count'] = $row->record_count;
    return $val;
  }
}