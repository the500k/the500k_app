<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class WeatherReport extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('session');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');		

        $this->load->model('Admin_model');

        $this->load->model('Aedr_model');
        $this->load->helper('download_helper');
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
    }

    function index()
    {       

            $page_data['page_name']="backennd/admin/dashboard";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/dasboard_css";
            $page_data['script_file']="bk_cms/dashboard_script";
            $page_data['side_menu']="backennd/admin/side_menu";
            $page_data['footer']='bk_cms/footer';

              ///////////////// page details ////////////////////////


                $this->load->view($page_data['css_file'],$page_data);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu']);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']);

    }

 

}

?>