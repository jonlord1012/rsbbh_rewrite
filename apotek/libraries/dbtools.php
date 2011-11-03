<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbtools {	
	function Dbtools(){
		$this->CI =& get_instance();
	}
	public function __construct() {
		parent::__construct();
	}	
	public function get_data($table, $param, $ext){
		$this->db->from($table);
		$this->db->where($param, $ext);
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
	public function get_single_data($table, $param, $ext){
		$this->db->from($table);
		$this->db->where($param,$ext);
		
	}
}
