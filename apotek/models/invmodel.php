<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Invmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}	
	public function get_inventory($id){
		$this->db->from('jbh_ms_inventory');
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
	public function get_list_inventory(){
		return $this->db->get('jbh_ms_inventory');
	}
	public function getfordet(){
		$this->db->select('id , inventory_code , inventory_name ,inventory_unit , inventory_baseprice , inventory_group');
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
	public function find_inv($keyword){
		$this->db->from('jbh_v_inv');
		$this->db->like('inventory_name', $keyword);
		$sqlresult['records'] = $this->db->get();
		
/*		$this->db->select('count(id) as record_count');
		$this->db->from('jbh_v_inv');
		$row = $record_count->row();
		$sqlresult['records_count'] = $row->record_count;
*/		return $sqlresult;
	}
}