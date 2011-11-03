<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aptmodel extends CI_Model{
  protected $CI;
	public function __construct() {
		parent::__construct();
    $this->CI =& get_instance();
	}
	
	public function get_unit(){
		//$this->db->order_by('unit_name');
		return $this->db->get('jbh_ms_unit');	
	}
	public function get_stock($id){
		$this->db->from('jbh_dstockmove');
		$this->db->where('id', $id);
		$num = $this->db->count_all_results();
		if($num <1)
		{
			return 0;
		}
		else
		{
			$myreturn = $this->db->get(); 
		}
		return $myreturn;
	}
	public function get_inventory(){
		//$this->db->from('jbh_ms_inventory');
		//$this->db->where('id', $id);
		$this->db->get('jbh_v_inv');
		$num = $this->db->count_all_results();
		if($num <1)
		{
			return 0;
		}
		else
		{
			$myreturn = $this->db->get('jbh_v_inv')->result(); 
		}
		return $myreturn;
	}
	public function get_list_inventory(){
		return $this->db->get('jbh_ms_inventory');
	}
	public function getfordet(){
		//$this->db->select('id , inventory_code , inventory_name ,inventory_unit , inventory_baseprice , inventory_group');		
		$this->db->from('jbh_v_inv');
		$this->CI->flexigrid->build_query();
    $val['records'] = $this->db->get();
    
    $this->db->select('count(id) as record_count');
    $this->db->from('jbh_v_inv');
    $this->CI->flexigrid->build_query(FALSE);
    $record_count = $this->db->get();
    $row = $record_count->row();
    
    $val['record_count'] = $row->record_count;
    return $val;
	}
  public function add_resephead($vals) {
    if ($vals['rcphead_flag'] = 'Rawat Jalan'){
    	$rcphead_flag = '1';
    }else if ($vals['rcphead_flag']='Rawat Inap'){
    	$rcphead_flag='2';
		}else if ($vals['rcphead_flag']='Luar'){
    	$rcphead_flag='3';
		}else if ($vals['rcphead_flag']='NonResep'){
    	$rcphead_flag='4';		
		}else {$rcphead_flag='5';}
		
    $data = array(
      'rcphead_no' => $vals['rcphead_no'],
      'rcphead_date' => $vals['rcphead_date'],
      'rcphead_flag' => $rcphead_flag,
      'xrcphead_pasienid' => $vals['rcphead_pasienid'],
      'xrcphead_paytype' => $vals['rcphead_paytype'],
      'rcphead_status' =>'Open'
    );
    $this->db->insert('jbh_trcphead', $data);
    return $this->db->insert_id();
  }	
}
?>