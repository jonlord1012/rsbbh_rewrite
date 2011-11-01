<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apotek extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('utility');
		$this->load->model(array('aptmodel'));
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
				'page_title' => 'Apotek Home',
				'content' => 'home'
				);
		$this->load->view('container', $data);
	}
	public function home(){		
		$data	= array(
						'page_title'=>'Unit List',
						'content' => 'dumper'
						);
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */