<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    public function index() {

       //echo "Hi";
        
        if ($this->session->userdata('admin_login') == 1)
        {
                
                $id=$this->session->userdata('admin_id'); 
              //echo $id;exit;
                if($id==2)
                {
                     
                    redirect(base_url() . 'Admin2/', 'refresh');
                    
                }
                else if($id==3)
                {
                     
                    redirect(base_url() . 'Admin3/donar_analysis', 'refresh');
                    
                }
                else
                {
                   
                   redirect(base_url() . 'Admin/', 'refresh');
                }
         
                   
           
        }


        if ($this->session->userdata('MP_login') == 1)
        {
          
            redirect(base_url() . 'MP_Panel', 'refresh');
        }

        if ($this->session->userdata('student_login') == 1)
            redirect(base_url() . 'Student', 'refresh');
        
        

        $this->load->view('backennd/login');
    }

    function ajax_login() {
        $response = array();
        $email = $_POST["user"];
        $password = $_POST["password"];
        $response['submitted_data'] = $_POST;


        $login_status = $this->validate_login($email, $password);

            //print_r($this->session->userdata());

          // print_r($login_status);exit;

        $response['login_status'] = $login_status;

        if ($login_status == 'success') {
             // print_r($this->session->userdata);exit;
             redirect(base_url() . 'Login');//$response['redirect_url'] = '';
        }
        else
        {
            echo "Please login with valid credential and press back button";
        }
       
       // echo json_encode($response);
    }

    function validate_login($email = '', $password = '') {
    //    echo "143";
        $credential = array('username' => $email, 'password' =>sha1($password));




        $query = $this->db->get_where('admin', $credential);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', $row->status);
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'admin');
            return 'success';
        }
       
        $credential = array('username' => $email, 'password' =>md5($password));

    // print_r($credential);exit;
        $query = $this->db->get_where('missionary_partners', $credential);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            //print_r($row);exit;
            $this->session->set_userdata('MP_login', $row->status);
            $this->session->set_userdata('mp_id', $row->mp_id);
            $this->session->set_userdata('login_user_id', $row->mp_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'mp');
            return 'success';
        }
       


        return 'invalid';
    }

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }
	
    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
}