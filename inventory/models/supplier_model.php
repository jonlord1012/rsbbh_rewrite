<?php if (!defined('BASEPATH')) exit("No direct script access allowed");

class Supplier_model extends CI_Model {
  public function __construct() {
    parent::__construct();
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
  
  public function get($id = null, $limit = 0, $offset = 0) {
    if (!$id) {
      $this->db->select('id, factory_code, factory_name, factory_address, factory_phone, factory_isactive');
      $q = $this->db->get('jbh_ms_factory');
    }
    return $q;
  }
}