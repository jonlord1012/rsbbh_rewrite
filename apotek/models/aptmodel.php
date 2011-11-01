<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Aptmodel extends CI_Model{

	public function __construct() {
		parent::__construct();
	}
	
	function get_unit(){
		//$this->db->order_by('unit_name');
		return $this->db->get('jbh_ms_unit');	
	}
	function get_stock($id){
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
}
?>