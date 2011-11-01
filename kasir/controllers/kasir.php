<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounting extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('utility');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
		$data = array(
				'page_title' => 'Accounting Home',
				'content' => 'home'
				);
		$this->load->view('container', $data);
	}
	public function master(){
		$data = array(
				'page_title' => 'Accounting:: Master Data',
				'content' => 'master'
				);
		$this->load->view('container',$data);
	}	
	public function report(){
		$data = array(
						'page_title' => 'Accounting:: Reporting',
						'content' => 'report'
						);
		$this->load->view('container', $data);
	}
	public function view_coa(){
		$data = array(
			'page_title' => 'Accounting:: Char of Account',
			'content' => 'coa'
		);
		$this->load->view('container', $data);
	}
	public function view_ledger(){
		$data = array(
			'page_title' => 'Accounting:: General Ledger',
			'content' => 'gledger'
		);
		$this->load->view('container', $data);
	}	
	public function view_balance(){
		$data = array(
			'page_title' => 'Accounting:: Balance Sheet',
			'content' => 'balance'
		);
		$this->load->view('container', $data);
	}
	public function gen_pl(){
		$data = array(
			'page_title' => 'Accounting:: Profit and Loss',
			'content' => 'proloss'
		);
		$this->load->view('container', $data);
	}
	public function gen_post(){
		$data = array(
			'page_title' => 'Accounting:: Posting Current Month',
			'content' => 'post'
		);
		$this->load->view('container', $data);
	}	
	public function gen_closed(){
		$data = array(
			'page_title' => 'Accounting:: Closing Current Month',
			'content' => 'closed'
		);
		$this->load->view('container', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */