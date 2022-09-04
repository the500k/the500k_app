<?php
session_start();
class Home extends CI_Controller {
 
function __construct()
{
   parent::__construct();
  


	$this->load->library('session');
	$this->load->helper('url');
$this->load->helper('form');
 
  $this->load->library('email');

  $this->load->model('Crud_model');
  $this->load->model('Admin_model');




  
}
 
function index()
{
  


  $data['courses']=$this->Admin_model->get_top_courses();
  

//  print_r(count($courses));


	$this->header();
    
    $this->load->view('frontend/home',$data);
       
      $this->footer();  
 
}

function courses()
{
  $data['courses']=$this->Admin_model->get_top_courses();
  
  $data['courses1']=$this->Admin_model->get_all_courses();
  

  $this->header();
    
    $this->load->view('frontend/courses',$data);
       
      $this->footer();  
 
}

function coursedetails()
{

  //$dummy_id=1;
  
$course_id=$this->uri->segment(3);

//echo $course_id;
$data['course']=$this->Admin_model->get_courses($course_id);
$data['mapping']=$this->Admin_model->get_courses_mapping_details($course_id);
$data['courses']=$this->Admin_model->get_top_courses();

//print_r($data['mapping']);
//$teacher[$dummy_id]=$this->Crud_model->get_teachers(1);

  $this->header();
    
  $this->load->view('frontend/course_details',$data);
       
  $this->footer();  
 
}

function teachers()
{

  if($this->uri->segment(3)!="")
  {
    //print_r($_POST);
   $subject_id=$_POST['subject_id']; 
   $data['teachers']=$this->Admin_model->get_teachers_by_subject($subject_id);
  }
  else
  {
      $data['teachers']=$this->Admin_model->get_teachers_by_coursemapping();
  }

    
   $data['courses']=$this->Admin_model->get_top_courses();
  
  //$data['courses1']=$this->Admin_model->get_all_courses();

   //print_r($data);exit;

  $this->header();
  $this->load->view('frontend/teacherslist',$data);
  $this->footer();   
}

function teacherdetails()
{
  $teacher_id=$this->uri->segment(3);
  $data['teacher']=$this->Crud_model->get_teacher_info($teacher_id);
  $data['mapping_details']=$this->Admin_model->get_teacher_coursemapping_details($teacher_id);  

//print_r($data);exit;
  $this->header();
  $this->load->view('frontend/teacherdetails',$data);
  $this->footer();   
}

function blogs()
{
  $this->header();
  $this->load->view('frontend/blogs');
  $this->footer();   
}

function blogdetails()
{
  $this->header();
  $this->load->view('frontend/blogdetails');
  $this->footer();   
}

function contact()
{
  $this->header();
  $this->load->view('frontend/contact');
  $this->footer();   
}


public function header()
{

  $this->load->view('frontend/header');
}
public function footer()
{

  $this->load->view('frontend/footer');
}

public function logout()
    {
      $this->session->unset_userdata('session_id');
      /* $this->session->unset_userdata('user_id');
       $this->session->unset_userdata('');
       $this->session->unset_userdata('business_owner');*/
       session_destroy();
       redirect('home', 'refresh');
    }
}
?>
