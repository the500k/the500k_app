<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {
	function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2017 05:00:00 GMT"); 
         $this->load->model('Aedr_model');
    }
	
	public function index()
	{	
	}
	
	function popup($folder_name='',$page_name = '' , $param2 = '' , $param3 = '')
	{
		//echo "123";exit;
		$account_type=$this->session->userdata('login_type');
		$page_data['param2']=$param2;
		$page_data['param3']=$param3;
		
		$this->load->view( 'backennd/'.$account_type.'/'.$folder_name.'/'.$page_name,$page_data);
	
	}

	function popup_question($folder_name='',$page_name='',$param1 = '')
	{
		

		$page_data['question_id']=$param1;
		//print_r($page_data);exit;
		
		$this->load->view('backend/admin/'.$folder_name.'/'.$page_name,$page_data);
	//	echo '<script src="http://localhost:8080/velstools/assets/js/neon-custom-ajax.js"></script>';
	}
}