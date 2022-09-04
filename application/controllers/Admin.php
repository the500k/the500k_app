<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
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

 function bank_transactions($param1 = '', $param2 = '' , $param3 = '')
    {

      if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        //////////////// page setup /////////////        
          
              $page_data['page_title']="Bank Transction";
              $page_data['form_heading']="Bank Transaction";
              $page_data['table_heading']="Transaction History";
               $page_data['page_heading']="Tansaction";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/bank_transactions";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/students","name"=>"Bank","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

            $sql="select * from bank_transaction order by tdate DESC ";

      $page_data['transaction_lists']=$this->Aedr_model->get_result_sql($sql);

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
        //////////////////// page details end ///////////////////
            

    }

   //////////////////// Manage bank transactions  //////////// 

  ///////////////////  incomeflux reports     /////////////////

function advanceform()
    {
        $this->load->view('bk_cms/advance_form');
    }
function bank_reports($param1 = '', $param2 = '' , $param3 = '')
    {
       if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        //////////////// page setup /////////////        
          
              $page_data['page_title']="Income Reports";
              $page_data['form_heading']="Bank Transaction";
              $page_data['table_heading']="Transaction History";
               $page_data['page_heading']="Tansaction";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/bank_reports";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/bank_reports","name"=>"report","class"=>"current");
            $page_data['bread_crums']=$bread_crum;

     //////////////////////  Date validation /////////////////
            $page_data['disp_err']="display: none";
        if($param1=='error_invalid_date')
               {
                $page_data['disp_err']="display: block";
                $page_data['err_msg']="Please select the valid date,Start date must be lesser than the end date";
               }
         if($param1=='error_greater_date')
               {
                $page_data['disp_err']="display: block";
                $page_data['err_msg']="Please select the valid date,End date must be lesser than and equal to the current date";

               }
           if($param1=='error_invalid_month')
               {
                $page_data['disp_err']="display: block";
                $page_data['err_msg']="Please select the valid month between 1 to 5 month for better summary";

               }

        ///////////////// page details ////////////////////////
            $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view('backennd/modal');
                $this->load->view($page_data['script_file']); 
            

    }



  //////////////////////////////////////////////////////// 

    function sendMail($param1='')
{
     

     
    $mail_id="jeevaa19@gmail.com";



    $where ="email='".$mail_id."'";
    //print_r($where);exit;
    $donar= $this->Aedr_model->get_row('donar',$where);

   

     $missionary_by_id=$this->Aedr_model->get_row_by_id('missionary','missionary_id'); 
    

       
      $this->load->library('email');

      $mail_config['smtp_host'] = 'smtp.gmail.com';
$mail_config['smtp_port'] = '587';
$mail_config['smtp_user'] = 'user@example.com';
$mail_config['_smtp_auth'] = TRUE;
$mail_config['smtp_pass'] = 'password';
$mail_config['smtp_crypto'] = 'tls';
$mail_config['protocol'] = 'smtp';
$mail_config['mailtype'] = 'html';
$mail_config['send_multipart'] = FALSE;
$mail_config['charset'] = 'utf-8';
$mail_config['wordwrap'] = TRUE;
$this->email->initialize($mail_config);

$this->email->set_newline("\r\n");
/*
       $mail_config['smtp_host'] = 'smtp.gmail.com';
      $mail_config['smtp_port'] = 465;
      $mail_config['smtp_user'] = 'cstopper2020@gmail.com';
      $mail_config['_smtp_auth'] = TRUE;
      $mail_config['smtp_pass'] = '19121985@jesus';
      $mail_config['smtp_crypto'] = 'tls';
      $mail_config['protocol'] = 'smtp';
      $mail_config['mailtype'] = 'html';
      $mail_config['send_multipart'] = FALSE;
      $mail_config['charset'] = 'utf-8';
      $mail_config['wordwrap'] = TRUE;
      $this->email->initialize($mail_config);

      $this->email->set_newline("\r\n");*/

    

       $this->email->initialize($config);

       $this->email->set_newline("\r\n");

      $this->email->from('cstopper2020@gmail.com'); // change it to yours
      $this->email->to($mail_id);// change it to yours
      $this->email->subject('hi');
      $this->email->message("sample mail");

/*      $where ="donar_id=".$donar['donar_id'];
    $donar_missionary_assignments= $this->Aedr_model->get_results_array('missionary_donar_assignment',$where);

  //  print_r($donar_missionary_assignments);exit;
/*
      foreach ($donar_missionary_assignments as $dma) {
          
          $path=getcwd()."\uploads\\report_pdf\\".$missionary_by_id[$dma['missionary_id']]['id']."_".date('M')."_".date('Y').".pdf";
            //echo date('M');
        

         if(file_exists($path))
           {
              $this->email->attach($path);

           }
           else
           {
                echo $missionary_by_id[$dma['missionary_id']]['id'];         
              echo "fail";
           }

           
 


      }*/

    //print_r($donar_missionary_assign);exit;

      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }

}
///////////////////////////////////////////////////////////

///////////////  Donar List  ///////////////////

function sendMail123()
{
  $email=$this->input->post('email');
            $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'erp@buc.edu.in', // change it to yours
                        'smtp_pass' => 'EntResPlan', // change it to yours
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE
                    );
                    $message =  "
                        <html>
                        <head>
                            <title>OTP</title>
                        </head>
                        <body>
                            <h2>BHARATHIAR UNIVERSITY</h2>
                            <p><b>Your Ph.D. Admission Application Number::</b> ".$app_no."</p>
                            <p><b>Please use this to Download Report/ Further Communication.</p>
                        </body>
                        </html>
                        ";          
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($config['smtp_user']);
                    $this->email->to("indirani19@gmail.com");
                    $this->email->subject('OTP Verification');
                    $this->email->message($message); 
        
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }



}


function donars($param1 = '', $param2 = '' , $param3 = '')
    {

      if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        //////////////// page setup /////////////        
          
              $page_data['page_title']="Donars";
              $page_data['form_heading']="Upload Donar list";
              $page_data['table_heading']="Donars List";
               $page_data['page_heading']="Donars";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/donars";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/students","name"=>"Bank","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

            $sql="select * from donar order by name";

      $page_data['donars_lists']=$this->Aedr_model->get_result_sql($sql);

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
        //////////////////// page details end ///////////////////
            

    }
////////////////////////////// Donar list End ////////////////

///////////////  Missionary List  ///////////////////


function missionaries($param1 = '', $param2 = '' , $param3 = '')
    {

      if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        //////////////// page setup /////////////        
          
              $page_data['page_title']="Missionaries";
              $page_data['form_heading']="Upload Missionary list";
              $page_data['table_heading']="Missionaries List";
               $page_data['page_heading']="Missionarys";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/missionary";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/students","name"=>"Bank","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

            $sql="select * from missionary order by name";

      $page_data['missionaries_lists']=$this->Aedr_model->get_result_sql($sql);
      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

        if($param1=="profile")
        {
          $page_data['page_title']="Missionaries Profile";
          $page_data['css_file']="bk_cms/list_css";
          $page_data['page_name']="backennd/admin/missionary_profile";
        }

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
  //////////////////// page details end ///////////////////
            

    }
///////////////////////// Missionary list End ////////////////

///////////////  Missionary Report List  ///////////////////
function missionary_report($param1 = '', $param2 = '' , $param3 = '')
    {

      if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        //////////////// page setup /////////////        
          
              $page_data['page_title']="Generate Missionary Report";
              $page_data['form_heading']="Missionary Report";
              $page_data['table_heading']="Report List";
               $page_data['page_heading']="Missionary Report";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/missionary_report";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/students","name"=>"Bank","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

            $sql="select * from missionary order by name";

      $page_data['missionaries_lists']=$this->Aedr_model->get_result_sql($sql);

       $sql="select * from missionary_report order by report_date desc";

      $page_data['report_list']=$this->Aedr_model->get_result_sql($sql);
      $page_data['missionary_by_id']=$this->Aedr_model->get_row_by_id('missionary','missionary_id');

      // print_r($page_data['missionaries_lists']);exit;

      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

        if($param1=="generate_report")
        {
           

          $insert['report_date']=date('Y-m-d');  
          $insert['missionary_id']=$this->input->post('missionary_id');
          $insert['report']=$this->input->post('report');;
          $insert['prayer_points']=$this->input->post('prayer_points');
          $insert['is_send']=0;

          $report_id=$this->Aedr_model->insert_id("missionary_report",$insert);
     

          redirect(base_url().'Admin/generate_fw_report/'.$report_id,'refresh');
        }

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
  //////////////////// page details end ///////////////////
            

    }
///////////////////////// Missionary list End ////////////////

///////////////////////// pdf generation ////////////////

  public function generate_fw_report($param1='')
    {
        $report_id=1;
        if($param1<=0)
        {
           redirect(base_url().'Admin/missionary_report/','refresh');
        }
        else
        {
          $report_id=$param1;
        }
        /////////// data start /////////////////
         $where ="report_id=".$report_id;
            $report= $this->Aedr_model->get_row('missionary_report',$where);

            $missionary_by_id=$this->Aedr_model->get_row_by_id('missionary','missionary_id');
            $state_by_id=$this->Aedr_model->get_row_by_id('state','state_id');

            //print_r($missionary_by_id[$report['missionary_id']]['name']);exit;

        /////////////////// data end //////////////
           // print_r($missionary['name']);exit;
            $mid=$missionary_by_id[$report['missionary_id']]['id'];

            ///$filename=$mid.".pdf";

        $data['missionary_name']=$missionary_by_id[$report['missionary_id']]['name'];
        $data['dob']="DOB not available";
        $data['state']=$state_by_id[$missionary_by_id[$report['missionary_id']]['state_id']]['name'];
        $data['report']=$report['report'];
        $data['prayer_points']=$report['prayer_points'];
        $data['title']="Missionary Reports &ndash; &nbsp;" .date('M',strtotime($report['report_date'])).",".date('Y',strtotime($report['report_date']));
      

        $filename=$mid."_".date('M',strtotime($report['report_date']))."_".date('Y',strtotime($report['report_date']));
       

        $this->load->library('Pdf');
        $html = $this->load->view('fw_report', $data, true);
       $this->pdf->createPDF($html, $filename, false);
      
      
    }



  ///////////////  Donary Email Sending  ///////////////////
function donar_emails($param1 = '', $param2 = '' , $param3 = '')
    {

      if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        //////////////// page setup /////////////        
          
              $page_data['page_title']="Donar Email";
              $page_data['form_heading']="Compose";
              $page_data['table_heading']="Email List";
               $page_data['page_heading']="Donar Email";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/donar_email_sending";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/donars","name"=>"Donars","class"=>"");
             $bread_crum[2]=array("link"=>base_url()."Admin/donar_emails","name"=>"Donars Emails","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

      $page_data['donar_by_id']=$this->Aedr_model->get_row_by_id('donar','donar_id');

      $sql="select * from donar order by name";

      $page_data['donar_lists']=$this->Aedr_model->get_result_sql($sql);

      $sql="select * from donar_mails order by mail_date desc";

      $page_data['mail_lists']=$this->Aedr_model->get_result_sql($sql);


      

  ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
  //////////////////// page details end ///////////////////
            

    }
/////////////// Donary Email Sending start ///////////////////
function send_donar_mail()
    {
          
         // print_r($_POST);exit;

          $insert_data=array();
          $donary_id=$_POST['donar_id'];

          $insert_data['donar_id']=$_POST['donar_id'];
          $insert_data['mail_date']=date('Y-m-d',strtotime("1/".$_POST['donar_id']));
          $insert_data['subject']=$_POST['subject'];
          $insert_data['msg_body']=$_POST['report'];
          $insert_data['send_status']=0;
         

        $this->Aedr_model->insert("donar_mails",$insert_data);
        redirect(base_url()."Admin/donar_emails/", 'refresh');

  }


/////////////// Donary Email Sending End ////////////////////
function preview_mail($param1='')
{
  if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        //////////////// page setup /////////////        
          
              $page_data['page_title']="Donar Email";
              $page_data['form_heading']="Compose";
              $page_data['table_heading']="Email List";
               $page_data['page_heading']="Donar Email";
              $page_data['err1']="display: none";    


            $page_data['page_name']="backennd/admin/preview_mail";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/donars","name"=>"Donars","class"=>"");
             $bread_crum[2]=array("link"=>base_url()."Admin/donar_emails","name"=>"Donars Emails","class"=>"");
              $bread_crum[3]=array("link"=>base_url()."Admin/preview_mail/".$param1,"name"=>"Preview Emails","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

      $mail_id=$param1;
    $where ="mail_id=".$mail_id;
    $mail= $this->Aedr_model->get_row('donar_mails',$where);

    $where ="donar_id=".$mail['donar_id'];
    $donar= $this->Aedr_model->get_row('donar',$where);

     $missionary_by_id=$this->Aedr_model->get_row_by_id('missionary','missionary_id'); 
     $where ="donar_id=".$mail['donar_id'];
    $donar_missionary_assignments= $this->Aedr_model->get_results_array('missionary_donar_assignment',$where);

        $path=array();

      foreach ($donar_missionary_assignments as $dma) {
            
            $link=getcwd()."\uploads\\report_pdf\\".$missionary_by_id[$dma['missionary_id']]['id']."_".date('M')."_".date('Y').".pdf";
             if(file_exists($link))
           {
              array_push($path,$link);

           }

          
        }

          $page_data['mail']=$mail;
          $page_data['path']=$path;
          $page_data['donar']=$donar;
          $page_data['missionary_by_id']=$missionary_by_id;
          
     //print_r($page_data);exit;


      

  ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']);

}


///////////////  District List  ///////////////////


function district($param1 = '', $param2 = '' , $param3 = '')
    {

      if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        //////////////// page setup /////////////        
          
              $page_data['page_title']="Districts";
              $page_data['form_heading']="Upload Districts list";
              $page_data['table_heading']="Districts List";
               $page_data['page_heading']="Districts";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/district";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/students","name"=>"Bank","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

            $sql="select * from missionary order by name";

      $page_data['missionaries_lists']=$this->Aedr_model->get_result_sql($sql);
      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

        if($param1=="profile")
        {
          $page_data['page_title']="Missionaries Profile";
          $page_data['css_file']="bk_cms/list_css";
          $page_data['page_name']="backennd/admin/missionary_profile";
        }

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
  //////////////////// page details end ///////////////////
            

    }
///////////////////////// District list End ////////////////
/*
function budget_predictor_2021_2025()
{
  $this->load->library('Gapi');
       
  $results=$this->gapi->readSheet("1P8EcL60k2mUJOK08s-Yl69QI4hsAu1kgeg0HIgPt_vw", "M Support!A2:BK");
  
 foreach ($results as $result) {
   
  
  $insert["id"]=$result[0];
  $insert["support"]=intval($result[7]) ;
  $insert["status"]=$result[8];
  $insert["fund_start_date"]=date('Y-m-d',strtotime($result[9]));
  $insert["fund_tt_date"]=date('Y-m-d',strtotime($result[60]));
  $insert["fund_ot_date"]=date('Y-m-d',strtotime($result[61]));
  $insert["fund_stop_date"]=date('Y-m-d',strtotime($result[62]));

  print_r($insert);exit;


}
 
}
*/
/////////////////  missionary stats dashboard start //////////////
function missionary_stats_import()
{

  
  $this->load->library('Gapi');
 /*      
  $gsect_msupports=$this->gapi->readSheet("1P8EcL60k2mUJOK08s-Yl69QI4hsAu1kgeg0HIgPt_vw", "M Support!A2:BK");

  //print_r($gsect_msupports[0]);exit;


 foreach ($gsect_msupports as $gmsupport) {
   
  
  $insert_data["id"]=$gmsupport[0];
  $insert_data["name"]=$gmsupport[3];
  $insert_data["state"]=$gmsupport[4];
  $insert_data["district"]=$gmsupport[5];
  $insert_data["support"]=$gmsupport[7];
  $insert_data["status"]=$gmsupport[8];
 // $insert_data["funding_start_date"]=$gmsupport[9];
  $insert_data["installation_cost"]=$gmsupport[10];
  $insert_data["coordinator"]=$gmsupport[11];
  $insert_data["supervisor"]=$gmsupport[12];
  $insert_data["report_collector"]=$gmsupport[13];
  $insert_data["account_cluster"]=$gmsupport[14];
  $insert_data["address"]=$gmsupport[16];
  $insert_data["reason_retirement"]=$gmsupport[35];
 
  
  if($gmsupport[9]=="STARTED BEFORE RECORDS BEGUN (June 15)" || $gmsupport[9]=="")
  {
    $insert_data["fund_start_date"]=date('Y-m-d',strtotime("01-01-2015"));
  }
  else
  {
    $insert_data["fund_start_date"]=date('Y-m-d',strtotime($gmsupport[9]));
  }

  if($gmsupport[32]!="")
  {
    $d=date('m-d-Y',strtotime($gmsupport[32]));
    $insert_data["retired_date"]=date('Y-m-d',strtotime($d));
  }
  else
  {
    $insert_data["retired_date"]="";
  }
  if($gmsupport[60]!="")
  {
    $d=date('m-d-Y',strtotime($gmsupport[60]));
    $insert_data["date_2_3_support"]=date('Y-m-d',strtotime($d));
  }
  else
  {
    $insert_data["date_2_3_support"]="";
  }
  if($gmsupport[61]!="")
  {
    $d=date('m-d-Y',strtotime($gmsupport[61]));
    $insert_data["date_1_3_support"]=date('Y-m-d',strtotime($d));
  }
  else
  {
    $insert_data["date_1_3_support"]="";
  }
  if($gmsupport[62]!="")
  {
    $d=date('m-d-Y',strtotime($gmsupport[62]));
    $insert_data["stop_support"]=date('Y-m-d',strtotime($d));
  }
  else
  {
    $insert_data["stop_support"]="";
  }

  $insert_data["import_date"]=date('Y-m-d');
  
  //$gsectms[$insert["id"]]=$insert;

  //unset($insert);

 
  
  //print_r($insert_data);exit;

$id=$this->Aedr_model->insert_id("gsect_msupport",$insert_data);
  print_r($id);
  echo "<br>";
 // exit;
}

exit;*/

$reportcatcher_results=$this->gapi->readSheet("1AR7akf5vREy8YpROIDBb_wQxCtGbhCLOJ6GweXxYZB8", "AlexAddedtoMissStatsSheet!A3152:P");
 //print_r($reportcatcher_results[0]);exit;
$i=0;


 foreach ($reportcatcher_results as $rc_results) {
  
  $sum_attanding=0; 
  $sum_baptised=0;
  

  $insert["id"]=$rc_results[0];
  $insert["year"]=intval($rc_results[13]);
  $insert["period"]=$rc_results[14];
  $insert["v1n"]=intval($rc_results[1]);
  $insert["v1b"]=intval($rc_results[2]);
  $insert["v2n"]=intval($rc_results[3]);
  $insert["v2b"]=intval($rc_results[4]);
  $insert["v3n"]=intval($rc_results[5]);
  $insert["v3b"]=intval($rc_results[6]);
  $insert["v4n"]=intval($rc_results[7]);
  $insert["v4b"]=intval($rc_results[8]);
  $insert["v5n"]=intval($rc_results[9]);
  $insert["v5b"]=intval($rc_results[10]);
  $insert["v6n"]=intval($rc_results[11]);
  $insert["v6b"]=intval($rc_results[12]);

  $sum_attanding=$insert["v1n"]+$insert["v2n"]+$insert["v3n"]+$insert["v4n"]+$insert["v5n"]+$insert["v6n"];
  $sum_baptised=$insert["v1b"]+$insert["v2b"]+$insert["v3b"]+$insert["v4b"]+$insert["v5b"]+$insert["v6b"];

   $count_church=0; 
   $count_vlg=0;
  if($insert["v1n"]>0 || $insert["v1b"]>0)
  {
    $count_vlg++;
  }
  if($insert["v2n"]>0 || $insert["v2b"]>0)
  {
    $count_vlg++;
  }
  if($insert["v3n"]>0 || $insert["v3b"]>0)
  {
    $count_vlg++;
  }
  if($insert["v4n"]>0 || $insert["v4b"]>0)
  {
    $count_vlg++;
  }
  if($insert["v5n"]>0 || $insert["v5b"]>0)
  {
    $count_vlg++;
  }
  if($insert["v6n"]>0 || $insert["v6b"]>0)
  {
    $count_vlg++;
  }


   if($insert["v1b"]>=10)
  {
    $count_church++;
  }
  if($insert["v2b"]>=10)
  {
    $count_church++;
  }
  if($insert["v3b"]>=10)
  {
    $count_church++;
  }
  if($insert["v4b"]>=10)
  {
    $count_church++;
  }
  if($insert["v5b"]>=10)
  {
    $count_church++;
  }
  if($insert["v6b"]>=10)
  {
    $count_church++;
  }
  
    $insert['no_church']=$count_church;
    $insert['no_village']=$count_vlg;
    $insert['sum_attanding']=$sum_attanding;
    $insert['sum_baptised']=$sum_baptised;
    $insert['import_date']=date('Y-m-d');
  
    //print_r(count($insert));exit;

$id=$this->Aedr_model->insert_id("gsect_report_catcher",$insert);
  print_r($id);
  echo "<br>";

  unset($insert);
 // exit;

} 
  exit;  //$json_feed['gsect_msupport']=$gsectms;

    //print_r(json_encode($gsectms));exit;

    //$json_feed['missionary_stats']=$rcs;

    print_r($rcs[0]);


    echo "<br>*************************************<br>";
    
    //print_r($gsectms['TA61NC']);exit;



    $insert_data['date']=date("Y-m-d");
    $insert_data['data1']=json_encode($gsectms);
    $insert_data['data2']=json_encode($rcs);
    $insert_data['analysis_title']="missionary Stats Dashboard";
    $insert_data['purpose']="To check missionary stats progress";
    $id=$this->Aedr_model->insert_id("analysis",$insert_data);
    //print_r($json_feed['missionary_stats']);exit;
    redirect(base_url().'Admin/missionary_dashboard/'.$id,'refresh');
 
}
/*
function missionary_dashboard($param1=''){

  $id=$param1;
  $sql="select * from analysis where id=$id";
  $analysis_imported_data=$this->Aedr_model->get_row_sql($sql);

  $gsect_msupport=json_decode($analysis_imported_data['data1'],true);

  $mstats_import=json_decode($analysis_imported_data['data2'],true);

  $num=$gsect_msupport['TA61NC']['support'];

    $missionary_ids=array();
  for($y=2017;$y<=2021;$y++){

          $total_missionary=0;
          $total_liveMissionary=0;
          $total_newMissionary=0;
          $sum_retiredMissionary=0;
          $total_retiredMissionary=0;

          $newMissionary_ids=array();
          $liveMissionary_ids=array();
          $retiredMissionary_ids=array();

   foreach($gsect_msupport as $id => $gsupport) {




          $starting_date=date('Y-m-d',strtotime($gsupport['fund_start_date']));
          $retired_date=date('Y-m-d',strtotime($gsupport['retired_date']));

          //print_r($retired_date);exit;

              $ed="31-12-".$y;
              $sd="01-01-".$y;
              // print_r($sdate);exit;
             $sdate=date('Y-m-d',strtotime($sd));
             $edate=date('Y-m-d',strtotime($ed));
             $bdate=date('Y-m-d',strtotime("01-06-2015"));
             
           //   print_r($sdate);exit;

          if($starting_date<=$edate && $starting_date>=$bdate)
        {
            
            $total_missionary++;
        }
        if($retired_date<=$edate && $retired_date>=$bdate)
        {
          
            $total_retiredMissionary++;
        }
        if($starting_date>=$sdate && $starting_date<=$edate)
        {
            array_push($newMissionary_ids, $id);
            $total_newMissionary++;
        }
        if($retired_date>=$sdate && $retired_date<=$edate)
        {
          array_push($retiredMissionary_ids, $id);
            $sum_retiredMissionary++;
        }
        
        if($starting_date<=$edate && $gsupport['status']!="Retired" && $starting_date>=$bdate)
        {
          array_push($liveMissionary_ids, $id);
            $total_liveMissionary++;
        }
         
        }

         $tbl_feed[$y]['total_missionary']=$total_missionary;
         $tbl_feed[$y]['total_retiredMissionary']=$total_retiredMissionary;
         $tbl_feed[$y]['total_newMissionary']=$total_newMissionary;
         $tbl_feed[$y]['sum_retiredMissionary']=$sum_retiredMissionary;
         $tbl_feed[$y]['total_liveMissionary']=$total_liveMissionary;
          

        
    
   }

   //print_r($tbl_feed);exit;
  
 $loaded_ids=array();
  foreach ($mstats_import as $mimport) {
        
        if(!(in_array($mimport['id'],$loaded_ids)))
        {
          array_push($loaded_ids, $mimport['id']);
        }
  }
  //print_r("Hi");
 //print_r($loaded_ids);exit;

  $mids_yr[2017]=array();
  $mids_yr[2018]=array();
  $mids_yr[2019]=array();
  $mids_yr[2020]=array();
  $mids_yr[2021]=array();
  

  $mdata=array();
  for($y=2017;$y<=2021;$y++){
  foreach ($mstats_import as $mimport) {

      //  print_r($mimport);exit;
        if(in_array($mimport['id'],$loaded_ids) && $mimport['year']==$y && $mimport['period']=="R1" && !(in_array($mids_yr[$y], $mimport['id'])))
        {
          array_push($mids_yr[$y], $mimport['id']);
          $md[$mimport['id']][$y]["R1"]=array("sum_attanding" => $mimport["sum_attanding"],"sum_baptised" => $mimport["sum_baptised"],"no_village"=>$mimport['no_village'],"no_church"=>$mimport['no_church'],"v1n" => $mimport['v1n'],"v2n" => $mimport['v2n'],"v3n" => $mimport['v3n'],"v4n" => $mimport['v4n'],"v5n" => $mimport['v5n'],"v6n" => $mimport['v6n'],"v1b" => $mimport['v1b'],"v2b" => $mimport['v2b'],"v3b" => $mimport['v3b'],"v4b" => $mimport['v4b'],"v5b" => $mimport['v5b'],"v6b" => $mimport['v6b']);

        }
        
       else if(in_array($mimport['id'],$loaded_ids) && $mimport['year']==$y && $mimport['period']=="R2")
        {
          $md[$mimport['id']][$y]['R2']=array("sum_attanding" => $mimport["sum_attanding"],"sum_baptised" => $mimport["sum_baptised"],"no_village"=>$mimport['no_village'],"no_church"=>$mimport['no_church'],"v1n" => $mimport['v1n'],"v2n" => $mimport['v2n'],"v3n" => $mimport['v3n'],"v4n" => $mimport['v4n'],"v5n" => $mimport['v5n'],"v6n" => $mimport['v6n'],"v1b" => $mimport['v1b'],"v2b" => $mimport['v2b'],"v3b" => $mimport['v3b'],"v4b" => $mimport['v4b'],"v5b" => $mimport['v5b'],"v6b" => $mimport['v6b']);

        }
        else if(in_array($mimport['id'],$loaded_ids) && $mimport['year']==$y && $mimport['period']=="R3")
        {
          $md[$mimport['id']][$y]['R3']=array("sum_attanding" => $mimport["sum_attanding"],"sum_baptised" => $mimport["sum_baptised"],"no_village"=>$mimport['no_village'],"no_church"=>$mimport['no_church'],"v1n" => $mimport['v1n'],"v2n" => $mimport['v2n'],"v3n" => $mimport['v3n'],"v4n" => $mimport['v4n'],"v5n" => $mimport['v5n'],"v6n" => $mimport['v6n'],"v1b" => $mimport['v1b'],"v2b" => $mimport['v2b'],"v3b" => $mimport['v3b'],"v4b" => $mimport['v4b'],"v5b" => $mimport['v5b'],"v6b" => $mimport['v6b']);

        }
        
        $mdata[$mimport['id']]=$md[$mimport['id']];
        
      }
     
  }
  
 print_r($mids_yr[2017]);exit;
  foreach ($mdata as $id => $fd) {
          
       //   print_r($fd);exit;
    for($yr=2017;$yr<=2021;$yr++){
        $recent_church=0;
        $recent_village=0;
        $recent_period="";
        $total_attending=0;
        $total_baptism=0;

    if(!empty($fd[$yr])){
          if($fd[$yr]["R3"]['no_village']>0){
            $recent_church=$fd[$yr]["R3"]['no_church'];
            $recent_village=$fd[$yr]["R3"]['no_village'];
            $recent_period="R3";
            $total_attending=$fd[$yr]["R3"]['sum_attanding'];
            $total_baptism=$fd[$yr]["R3"]['sum_baptised'];

          }
          else if($fd[$yr]["R2"]['no_village']>0){
            $recent_church=$fd[$yr]["R2"]['no_church'];
            $recent_village=$fd[$yr]["R2"]['no_village'];
            $recent_period="R2";
            $total_attending=$fd[$yr]["R2"]['sum_attanding'];
            $total_baptism=$fd[$yr]["R2"]['sum_baptised'];
          }
          else if($fd[$yr]["R1"]['no_village']>0){
            $recent_church=$fd[$yr]["R1"]['no_church'];
            $recent_village=$fd[$yr]["R1"]['no_village'];
            $recent_period="R1";
            $total_attending=$fd[$yr]["R1"]['sum_attanding'];
            $total_baptism=$fd[$yr]["R1"]['sum_baptised'];
          }

          $recent_data[$id][$yr]['no_church']=$recent_church;
          $recent_data[$id][$yr]['no_village']=$recent_village;
          $recent_data[$id][$yr]['period']=$recent_period;
          $recent_data[$id][$yr]['attanding']=$total_attending;
          $recent_data[$id][$yr]['baptised']=$total_baptism;
      }
    
      
    }
      
  }

 // print_r($recent_data['CGQFT6']);exit;
 $data_2017=array();
 $data_2018=array();
 $data_2019=array();
 $data_2020=array();
 $data_2021=array();
 

  foreach($recent_data as $id => $rdata) {
     // print_r($rdata);exit;
    
      //print_r($rdata);exit;
      if(!empty($rdata[2017])){
        $rdata[2017]["id"]=$id;    
        array_push($data_2017,$rdata[2017]);
      }
      if(!empty($rdata[2018])){
        $rdata[2018]["id"]=$id;    
        array_push($data_2018,$rdata[2018]);
      }
      if(!empty($rdata[2019])){
        $rdata[2019]["id"]=$id;    
        array_push($data_2019,$rdata[2019]);
      }
      if(!empty($rdata[2020])){
        $rdata[2020]["id"]=$id;    
        array_push($data_2020,$rdata[2020]);
      }
      if(!empty($rdata[2021])){
        $rdata[2021]["id"]=$id;    
        array_push($data_2021,$rdata[2021]);
      }
    

  }

//print_r($data_2021);exit;

$this->load->library('Gapi');
      
     // print_r($data_2017);exit;

  $i=231;
      for($j=230;$j<count($data_2017);$j++) {
         // echo $id;\

          $id=$data_2017[$j]['id'];
          $rdata=$data_2017[$j];
        //print_r($rdata);exit;
          // echo $j;exit;
        $val_to_sheet=array(2017,$id,$gsect_msupport[$id]['name'],$rdata['period'],$rdata['attanding'],$rdata['baptised'],$rdata['no_village'],$rdata['no_church'],$i);
       $this->gapi->writeData_missionary_stats_sheet("1B3Bdaa7FljokiZPcZE_aDvBWBFrGLg3aUo8BTEH8RcY", "StatsReportBySystem!A:I",$val_to_sheet);
     
     
       $i++;
      }

 
/////////////// calculate missionary stats details  ///////////////
 echo "success";
exit;
  for($y=2017;$y<=2021;$y++){

          $total_attending=0;
          $total_baptised=0;
          $total_village=0;
          $total_church=0;
          
   foreach($recent_data as $id => $rdata) {

        //print_r($rdata);exit; 

          $total_attending+=$rdata[$y]["attanding"];
          $total_baptised+=$rdata[$y]["baptised"];
          $total_village+=$rdata[$y]["no_village"];
          $total_church+=$rdata[$y]["no_church"];

        
         
        }

          $tbl_feed[$y]['total_attending']=$total_attending;
         $tbl_feed[$y]['total_baptised']=$total_baptised;
         $tbl_feed[$y]['total_village']=$total_village;
         $tbl_feed[$y]['total_church']=$total_church;



      /*  if($y==2017){
         $tbl_feed[$y]['total_attending']=$total_attending;
         $tbl_feed[$y]['total_baptised']=$total_baptised;
         $tbl_feed[$y]['total_village']=$total_village;
         $tbl_feed[$y]['total_church']=$total_church;
       }
       else
       {
        $tbl_feed[$y]['total_attending']=$total_attending+$tbl_feed[$y-1]['total_attending'];
         $tbl_feed[$y]['total_baptised']=$total_baptised+$tbl_feed[$y-1]['total_baptised'];
         $tbl_feed[$y]['total_village']=$total_village+$tbl_feed[$y-1]['total_village'];
         $tbl_feed[$y]['total_church']=$total_church+$tbl_feed[$y-1]['total_church'];
       }
          
          echo $y;
          echo "<br>************************<br>";
          print_r($tbl_feed[$y]);
          echo "<br>************************<br>";
        
    
   }
   exit;

   /*$this->load->library('Gapi');
     for($yr=2017;$yr<=2021;$yr++){
       $val_to_sheet=array($yr,$tbl_feed[$yr]['total_missionary'],$tbl_feed[$yr]['total_newMissionary'],$tbl_feed[$yr]['sum_retiredMissionary'],$tbl_feed[$yr]['total_retiredMissionary'],$tbl_feed[$yr]['total_attending'],$tbl_feed[$yr]['total_baptised'],$tbl_feed[$yr]['total_village'],$tbl_feed[$yr]['total_church']);

       echo $yr." Loading stats table start here...";

        $this->gapi->writeData_missionary_stats_sheet("1B3Bdaa7FljokiZPcZE_aDvBWBFrGLg3aUo8BTEH8RcY", "ReportBySystem!A:I",$val_to_sheet);
    echo $yr." Loading stats table End";


     }

     

 //  print_r($tbl_feed[2017]);exit;


    
}*/

 function missionary_dashboard($param1=''){


for($yr=2017;$yr<=2021;$yr++)
{

    $fw_support_currently=0;
    $fw_new=0;
    $fw_retired=0;
    $fw_retired_total=0;
    


  $sql="select count(distinct id) as fw_support_currently from gsect_msupport where fund_start_date between '2010-01-01' and '$yr-01-01' ";
  $result_msupport=$this->Aedr_model->get_row_sql($sql);
    
  $fw_support_currently=$result_msupport['fw_support_currently'];

  $sql="select count(distinct id) as fw_new from gsect_msupport where fund_start_date between '$yr-01-01' and '$yr-12-31' ";
  $result_msupport=$this->Aedr_model->get_row_sql($sql);


  $fw_new=$result_msupport['fw_new'];


  $sql="select count(distinct id) as fw_retired from gsect_msupport where retired_date between '$yr-01-01' and '$yr-12-31' ";
  $result_msupport=$this->Aedr_model->get_row_sql($sql);


  $fw_retired=$result_msupport['fw_retired'];

  $sql="select count(distinct id) as fw_retired_total from gsect_msupport where retired_date between '2010-01-01' and '$yr-12-31' ";
  $result_msupport=$this->Aedr_model->get_row_sql($sql);


  $fw_retired_total=$result_msupport['fw_retired_total'];

  
  $sql="select distinct id as id from gsect_msupport where fund_start_date between '2010-01-01' and '$yr-12-31'";
  $result_msupport_ids=$this->Aedr_model->get_result_sql($sql);


     $year_result[$yr]['fw_support_currently']=$fw_support_currently;
     $year_result[$yr]['fw_new']=$fw_new;
     $year_result[$yr]['fw_retired']=$fw_retired;
     $year_result[$yr]['fw_retired_total']=$fw_retired_total;

   // print_r($result_msupport_ids);exit;

    foreach ($result_msupport_ids as $mid) {
            
            $id=$mid[id];
      //  print_r($mid);exit;
           $fresult=NULL;
        $sql="SELECT * FROM gsect_report_catcher WHERE year=$yr and period='R3' and id='$id'";
        $R3result=$this->Aedr_model->get_row_sql($sql);

          if(!empty($R3result)){
            $fresult=$R3result;
          }  
          else
          {
            $sql="SELECT * FROM gsect_report_catcher WHERE year=$yr and period='R2' and id='$id'";
             $R2result=$this->Aedr_model->get_row_sql($sql);
             if(!empty($R2result)){
               $fresult=$R2result;
             }
             else
             {
                $sql="SELECT * FROM gsect_report_catcher WHERE year=$yr and period='R1' and id='$id'";
             $R1result=$this->Aedr_model->get_row_sql($sql);
                 if(!empty($R1result))
                 {
                    $fresult=$R1result;
                 }
             }
          }

          $bresult[$id]=$fresult;

          unset($fresult);
        
        

    }
     $total_attending=0;
          $total_baptised=0;
          $total_village=0;
          $total_church=0;

     foreach ($bresult as $id => $br) {
            //print_r($br);exit;
         if(!empty($br)){
            $total_attending+=$br['sum_attanding'];
            $total_baptised+=$br['sum_baptised'];
            $total_village+=$br['no_village'];
            $total_church+=$br['no_church'];
         }

     }
     $year_result[$yr]['total_attending']=$total_attending;
     $year_result[$yr]['total_baptised']=$total_baptised;
     $year_result[$yr]['total_village']=$total_village;
     $year_result[$yr]['total_church']=$total_church;
     $year_result[$yr]['bestresult']=$bresult;


     if($yr!=2017)
     {
     $year_result[$yr]['total_attending_prg']=$year_result[$yr-1]['total_attending']+$total_attending;
     $year_result[$yr]['total_baptised_prg']=$year_result[$yr-1]['total_baptised']+$total_baptised;
     $year_result[$yr]['total_village_prg']=$year_result[$yr-1]['total_village']+$total_village;
     $year_result[$yr]['total_church_prg']=$year_result[$yr-1]['total_church']+$total_church;
     }

  

}

$insert_data['data1']=json_encode($year_result);
$insert_data['date']=date('Y-m-d');
$insert_data['analysis_title']="missionary stats dashboard";

$rid=$this->Aedr_model->insert_id("analysis",$insert_data);

        redirect(base_url().'Admin/mstatsdashboard/'.$rid,'refresh');

}
function mstatsdashboard($param1=''){

  $rid=$param1;

  $sql="select * from analysis where id=$rid";
  $reportResult=$this->Aedr_model->get_row_sql($sql);
  $year_result=json_decode($reportResult['data1'],true);


  $page_data['missionary_by_id']=$this->Aedr_model->get_row_by_id('gsect_msupport','id');

  //print_r($page_data['missionary_by_id']['TA61NC']['name']);exit;

  ////////////////  chart data start //////////////////////

  //$chart_data[]=array("Year","Fw Support","New Fw","Graduated Fw","Attending worship","Baptised church members","Villages with worship groups","Established churches");
  //$chart_data[]=array("Year","Fw Support","New Fw","Graduated Fw");
  $chart_data[]=array("Category","2017","2018","2019","2020","2021");
  $chart_data[]=array("Fw Support",intval($year_result[2017]['fw_support_currently']-$year_result[2017]['fw_retired_total']),intval($year_result[2018]['fw_support_currently']-$year_result[2018]['fw_retired_total']),intval($year_result[2019]['fw_support_currently']-$year_result[2019]['fw_retired_total']),intval($year_result[2020]['fw_support_currently']-$year_result[2020]['fw_retired_total']),intval($year_result[2021]['fw_support_currently']-$year_result[2021]['fw_retired_total']));
  $chart_data[]=array("New Fw",intval($year_result[2017]['fw_new']),intval($year_result[2018]['fw_new']),intval($year_result[2019]['fw_new']),intval($year_result[2020]['fw_new']),intval($year_result[2021]['fw_new']));
  $chart_data[]=array("Graduated Fw",intval($year_result[2017]['fw_retired_total']),intval($year_result[2018]['fw_retired_total']),intval($year_result[2019]['fw_retired_total']),intval($year_result[2020]['fw_retired_total']),intval($year_result[2021]['fw_retired_total']));

  //print_r($year_result[2019]);exit;
  $chart_div_report[]=array("Category","2017","2018","2019","2020");

  $chart_div_report[]=array("Attending worship",intval($year_result[2017]['total_attending']),intval($year_result[2018]['total_attending']),intval($year_result[2019]['total_attending']),intval($year_result[2020]['total_attending']));
  $chart_div_report[]=array("Baptised church members",intval($year_result[2017]['total_baptised']),intval($year_result[2018]['total_baptised']),intval($year_result[2019]['total_baptised']),intval($year_result[2020]['total_baptised']));
  $chart_div_report1[]=array("Category","2017","2018","2019","2020");
  $chart_div_report1[]=array("Villages with worship groups",intval($year_result[2017]['total_village']),intval($year_result[2018]['total_village']),intval($year_result[2019]['total_village']),intval($year_result[2020]['total_village']));
  $chart_div_report1[]=array("Established churches",intval($year_result[2017]['total_church']),intval($year_result[2018]['total_church']),intval($year_result[2019]['total_church']),intval($year_result[2020]['total_church']));



  ////////////////  chart data end //////////////////////

  $page_data['chart_data']=json_encode($chart_data);
   $page_data['chart_div_report']=json_encode($chart_div_report);
   $page_data['chart_div_report1']=json_encode($chart_div_report1);
$page_data['year_result']=$year_result;
 $page_data['page_title']="Stats History";
              
              $page_data['table_heading']="Missionary Stats History";
               $page_data['page_heading']="stats History";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/missionaryStatsDashboard";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
          


  

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
               $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


}
/////////////////  missionary stats dashboard end //////////////*/


/////////////////  missionary stats dashboard start //////////////
function finance_import()
{

  
  $this->load->library('Gapi');

  $finance_bank=$this->gapi->readSheet("1eQ09vTLP8dNfwNI1FZz_dQiTGTgh8rOiTDxTq1rV_Vk", "Bank!A9001:P10898");

 
  foreach ($finance_bank as $id => $fbank) {


 $insert_data['transaction_date']=date('Y-m-d',strtotime($fbank[1]));
 $insert_data['tdescription']=$fbank[2];
 $insert_data['debit_amount']=$fbank[6];
 $insert_data['credit_amount']=$fbank[7];
 $insert_data['balance']=$fbank[8];
 $insert_data['stype']=$fbank[9];
 $insert_data['recurring']=$fbank[10];
 $insert_data['renamer']=$fbank[11];
 $insert_data['suggested_name']=$fbank[13];
 $insert_data['M']=$fbank[14];
 $insert_data['Y']=$fbank[15];
 $insert_data['temp']=$fbank[12];

 //print_r($insert_data);exit;

 $fid=$this->Aedr_model->insert_id("finance_core_actual",$insert_data);
echo $insert_data['transaction_date']."-".$insert_data['renamer']."<br>";

}




}

function missionary_dashboard_live($param1=''){

  $rid=$param1;
for($yr=2017;$yr<=2021;$yr++)
{

    $fw_support_currently=0;
    $fw_new=0;
    $fw_retired=0;
    $fw_retired_total=0;
    


  $sql="select count(distinct id) as fw_support_currently from gsect_msupport where status='Live' and fund_start_date between '2010-01-01' and '$yr-01-01' ";
  $result_msupport=$this->Aedr_model->get_row_sql($sql);
    
  $fw_support_currently=$result_msupport['fw_support_currently'];

  $sql="select count(distinct id) as fw_new from gsect_msupport where fund_start_date between '$yr-01-01' and '$yr-12-31' ";
  $result_msupport=$this->Aedr_model->get_row_sql($sql);


  $fw_new=$result_msupport['fw_new'];


  $sql="select count(distinct id) as fw_retired from gsect_msupport where retired_date between '$yr-01-01' and '$yr-12-31' ";
  $result_msupport=$this->Aedr_model->get_row_sql($sql);


  $fw_retired=$result_msupport['fw_retired'];

  $sql="select count(distinct id) as fw_retired_total from gsect_msupport where retired_date between '2010-01-01' and '$yr-12-31' ";
  $result_msupport=$this->Aedr_model->get_row_sql($sql);


  $fw_retired_total=$result_msupport['fw_retired_total'];

  
  $sql="select distinct id as id from gsect_msupport where status='Live' and  fund_start_date between '2010-01-01' and '$yr-12-31'";
  $result_msupport_ids=$this->Aedr_model->get_result_sql($sql);


     $year_result[$yr]['fw_support_currently']=$fw_support_currently;
     $year_result[$yr]['fw_new']=$fw_new;
     $year_result[$yr]['fw_retired']=$fw_retired;
     $year_result[$yr]['fw_retired_total']=$fw_retired_total;

   // print_r($result_msupport_ids);exit;

    foreach ($result_msupport_ids as $mid) {
            
            $id=$mid[id];
      //  print_r($mid);exit;
           $fresult=NULL;
        $sql="SELECT * FROM gsect_report_catcher WHERE year=$yr and period='R3' and id='$id'";
        $R3result=$this->Aedr_model->get_row_sql($sql);

          if(!empty($R3result)){
            $fresult=$R3result;
          }  
          else
          {
            $sql="SELECT * FROM gsect_report_catcher WHERE year=$yr and period='R2' and id='$id'";
             $R2result=$this->Aedr_model->get_row_sql($sql);
             if(!empty($R2result)){
               $fresult=$R2result;
             }
             else
             {
                $sql="SELECT * FROM gsect_report_catcher WHERE year=$yr and period='R1' and id='$id'";
             $R1result=$this->Aedr_model->get_row_sql($sql);
                 if(!empty($R1result))
                 {
                    $fresult=$R1result;
                 }
             }
          }

          $bresult[$id]=$fresult;

          unset($fresult);
        
        

    }
     $total_attending=0;
          $total_baptised=0;
          $total_village=0;
          $total_church=0;

     foreach ($bresult as $id => $br) {
           // print_r($br);exit;
         if(!empty($br)){
            $total_attending+=$br['sum_attanding'];
            $total_baptised+=$br['sum_baptised'];
            $total_village+=$br['no_village'];
            $total_church+=$br['no_church'];
            $bresult_final[$id]=$br;
         }

     }
     $year_result[$yr]['total_attending']=$total_attending;
     $year_result[$yr]['total_baptised']=$total_baptised;
     $year_result[$yr]['total_village']=$total_village;
     $year_result[$yr]['total_church']=$total_church;
     if(!empty($bresult_final)){
        $year_result[$yr]['bestresult']=$bresult_final;
     }


     if($yr!=2017)
     {
     $year_result[$yr]['total_attending_prg']=$year_result[$yr-1]['total_attending']+$total_attending;
     $year_result[$yr]['total_baptised_prg']=$year_result[$yr-1]['total_baptised']+$total_baptised;
     $year_result[$yr]['total_village_prg']=$year_result[$yr-1]['total_village']+$total_village;
     $year_result[$yr]['total_church_prg']=$year_result[$yr-1]['total_church']+$total_church;
     }

  

}

$update_date['data2']=json_encode($year_result);

$where ="id=".$rid;


$this->Aedr_model->update('analysis',$where,$update_date);

        redirect(base_url().'Admin/mstatsdashboard/'.$rid,'refresh');

}


function finance_refine()
{
    echo "My daddy... I am calling...";
    echo "<br>";

    $sql="select * from finance_core_actual";
  $finance_result=$this->Aedr_model->get_result_sql($sql);

  print_r($finance_result[7]);exit;

}


//////////////// donar view import start ///////////


function donarview_import()
{

  
  $this->load->library('Gapi');

  $donarview_results=$this->gapi->readSheet("1w5wmbFHltA48KDGVrR8mmUELbx-z8ULfjolRp8-9Xzs", "Donor view!C4:AE376");

 


  foreach ($donarview_results as $donarview) {

 

 $insert_data['name']=$donarview[0];
 $insert_data['email']=$donarview[4];
 $insert_data['status_suggester']=$donarview[8];
 $insert_data['status']=$donarview[9];
 $insert_data['age']=$donarview[10];
 $insert_data['l2016']=$donarview[11];
 $insert_data['l2017']=$donarview[12];
 $insert_data['l2018']=$donarview[13];
 $insert_data['l2019']=$donarview[14];
 $insert_data['l2020']=$donarview[15];
 $insert_data['l2021']=$donarview[16];
 
 $insert_data['date_last_given']=date('Y-m-d',strtotime($donarview[24]));
 $insert_data['month_last_given']=$donarview[25];
 $insert_data['last_donation']=intval($donarview[26]);
 $insert_data['accural']=$donarview[22];
 $insert_data['accural_length']=intval($donarview[23]);
 $insert_data['sponsorship_scope']=intval($donarview[27]);
 $insert_data['partners_chain']=$donarview[28];

 //print_r($insert_data);exit;
 
 $fid=$this->Aedr_model->insert_id("donar_view_actual",$insert_data);
echo $insert_data['name']."-".$insert_data['date_last_given']."<br>";//exit;



}

}


//////////////// donar view import end ///////////

//////////////// donar view in db start ///////////


function donarview_db()
{

 $sql="select distinct (renamer) from finance_core_actual";
 $uniq_donarnames=$this->Aedr_model->get_result_sql($sql);

 //print_r($uniq_donarnames);exit;
 $updated_name=array();
 $non_updated_name=array();
 
  foreach ($uniq_donarnames as $udonarname) {

      $name=strtolower($udonarname['renamer']);
   // $name=strtolower("Paul Searle");
    //  $fid=strtolower($udonarname['fid']);
      $sql="select * from donar_view_actual where LOWER(name)='$name'";


      $uniq_details=$this->Aedr_model->get_row_sql($sql);
   
   //print_r($uniq_details);exit;

     if(!empty($uniq_details)){
   
  // print_r($uniq_details);
 $insert_data['name']=$uniq_details['name'];
 $insert_data['email']=$uniq_details['email'];
 $insert_data['status_suggester']=$uniq_details['status_suggester'];
 $insert_data['status']=$uniq_details['status'];
 $insert_data['age']=$uniq_details['age'];
 //$insert_data['rdid']=$uniq_details['email'];
 
 //$did=$this->Aedr_model->insert_id("gsect_donar",$insert_data);

 //print_r($uniq_details['name']);
  $rd_id=strtoupper(substr($uniq_details['name'],0,4)."".random_string('alnum', 2)."".$did);

  //print_r($rd_id);exit;

 $update['rd_id']=$rd_id;

 $where ="did=".$did;

  array_push($updated_name, $name);

/*
 $this->Aedr_model->update('gsect_donar',$where,$update);

 $update['did']=$did;

 $where ="renamer='$name'";



 $this->Aedr_model->update('finance_core_actual',$where,$update);

 $update['did']=$did;

 $where ="id=".$uniq_details['id'];

 $this->Aedr_model->update('donar_view_actual',$where,$update);

//echo $uniq_details['id']."<br>";

//echo $insert_data['name']."-".$did."<br>";*/



unset($update);
//exit;
}
else
{

  array_push($non_updated_name, $name);
  print_r($name);
  echo "<br>";
}


  }

  print_r(count($updated_name));
  echo "<br>";
  print_r(count($non_updated_name));


}


//////////////// donar view in db  end ///////////

function donar_analysis($param1='')
{

  

                                  $option_status["regular"]="regular";
                                  $option_status["active"]="active";
                                  $option_status["inactive"]="inactive";
                                  $option_status["retired"]="retired";
                                  $option_status["all"]="all";

                                  $option_pstatus["all"]="all";
                                  $option_pstatus["regular"]="regular";
                                  $option_pstatus["progressive"]="progressive";
                                  $option_pstatus["regressive"]="regressive";

      $page_data['option_status']=$option_status;
      $page_data['option_pstatus']=$option_pstatus;

      $sql="select name , rd_id from gsect_donar";
      $donar_list=$this->Aedr_model->get_result_sql($sql);

      foreach ($donar_list as $donar) {
        $rd_id=$donar['rd_id'];
        $sql="select * from finance_core_actual where rd_id='$rd_id' order by transaction_date DESC";
        $donation_list=$this->Aedr_model->get_result_sql($sql);         
          
        if(!empty($donation_list)){
              $date1 = strtotime(date('Y-m-d'));
              
              $trans_credict1=$donation_list[0]['credit_amount'];
              $trans_date1=$donation_list[0]['transaction_date'];

              $date2=strtotime($trans_date1);

              $last_donation_difference=$this->date_diff($date1,$date2);

           //   print_r($last_donation_difference);exit;

              if($last_donation_difference['yr']>0)
              { 
                 $last_trans['ago']=$last_donation_difference['yr']."Yrs ago";
                 $last_trans['status']="retired";

                 $last_trans['row_style']="background-color: #F08080";
                 $last_trans['btn_style']="btn btn-danger btn-sm";



              }
              else if($last_donation_difference['months']>5)
              {
                  $last_trans['status']="inactive";
                  $last_trans['ago']=$last_donation_difference['months']." Months ago";
                  $last_trans['row_style']="background-color: #FFBF00";
                  $last_trans['btn_style']="btn btn-warning btn-sm";
                
              }
              else if($last_donation_difference['months']<=5 && $last_donation_difference['months']>=3)
              {
                $last_trans['status']="active";
                $last_trans['ago']=$last_donation_difference['months']." Months ago";
                $last_trans['row_style']="background-color: #9FE2BF";
                $last_trans['btn_style']="btn btn-primary btn-sm";
              }
              else
              {
                $last_trans['status']="regular";
                $last_trans['ago']=$last_donation_difference['months']." Months ago";
                $last_trans['btn_style']="btn btn-success btn-sm";
              }



              $trans_credict2=$donation_list[1]['credit_amount'];
              $trans_date2=$donation_list[1]['transaction_date'];



              $trans_credict3=$donation_list[2]['credit_amount'];
              $trans_date3=$donation_list[2]['transaction_date'];

              $trans_credict4=$donation_list[3]['credit_amount'];
              $trans_date4=$donation_list[3]['transaction_date'];

              $last_trans['trans_credict1']=$trans_credict1;
              $last_trans['trans_date1']=$trans_date1;

              $last_trans['trans_credict2']=$trans_credict2;
              $last_trans['trans_date2']=$trans_date2;

              $last_trans['trans_credict3']=$trans_credict3;
              $last_trans['trans_date3']=$trans_date3;

              $last_trans['trans_credict4']=$trans_credict4;
              $last_trans['trans_date4']=$trans_date4;

              $payment_index1=$trans_credict2-$trans_credict1;
              $payment_index2=$trans_credict3-$trans_credict2;
              $payment_index3=$trans_credict4-$trans_credict3;

              if($payment_index1==$payment_index2 && $payment_index2==$payment_index3)
              {
                $payment_status="regular";
              }
              elseif ($payment_index1==$payment_index2 && $payment_index2>$payment_index3) {
                $payment_status="progressive";
              }
              else
              {
                $payment_status="regressive";
              }

             $sql="select * from gsect_donar where rd_id='$rd_id'";
             $donar_detail=$this->Aedr_model->get_row_sql($sql);  

              
        // $donar_detail['email']="na#";

              if(!filter_var($donar_detail['email'], FILTER_VALIDATE_EMAIL))
              {
                 $donar_detail['email']="need to update";
              }


              
             $ddetails[$rd_id]['last_trans']=$last_trans;
             $ddetails[$rd_id]['payment_status']=$payment_status;
             $ddetails[$rd_id]['donation_list']=$donation_list;
             $ddetails[$rd_id]['donar_detail']=$donar_detail;

             

             $update_data['latest_status']=$last_trans['status'];
             $update_data['payment_status']=$payment_status;
             $update_data['donation_list']=json_encode($donation_list);
             $update_data['last_trans']=json_encode($last_trans);
             $update_data['update_date']=date('Y-m-d');

      //  print_r($update_data);exit;

        $where ="rd_id='".$rd_id."'";

        $this->Aedr_model->update('gsect_donar',$where,$update_data);



        }
        //print_r(expression)
       $rd_id=NULL;
      }

      ////////////////  chart data end //////////////////////

        $page_data['ddetails']=$ddetails;
        $page_data['page_title']="Donar Report";
              
              $page_data['table_heading']="Donar Analysis";
               $page_data['page_heading']="Donar Analysis";
              $page_data['err']="display: none";    


       

            $page_data['page_name']="backennd/admin/donar_donation_analysis";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
            $page_data['footer']='bk_cms/footer';

            $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/students","name"=>"Bank","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

      $sql="select * from donar order by name";

      $page_data['donars_lists']=$this->Aedr_model->get_result_sql($sql);

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 



}


function date_diff($date1,$date2)
{
  //print_r($date1);exit;
  $diff = abs($date2 - $date1);
  $years = floor($diff / (365*60*60*24)); 
  $months = floor(($diff - $years * 365*60*60*24)/(30*60*60*24)); 
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  $date_calc['yr']=$years;
  $date_calc['months']=$months;
  $date_calc['days']=$days;
  return $date_calc;
}

function financecore_budget_import()
{

  
  $this->load->library('Gapi');

  $budgets=$this->gapi->readSheet("1RAM7dxKmur4a7zAiHKj8TduRsO6-Jf3hmU0jtqANPRg", "Budgets!A27000:AA30000");

 
  foreach ($budgets as $id => $budget) {

  

 $insert_data['year']=$budget[0];
 $insert_data['month']=$budget[1];
 $insert_data['ID']=$budget[2];
 $insert_data['type1']=$budget[3];
 $insert_data['type2']=$budget[4];
 $insert_data['description']=$budget[5];
 $insert_data['state']=$budget[6];
 $insert_data['area']=$budget[7];
 $insert_data['amount']=intval($budget[8]);
 $insert_data['status']=$budget[10];
 $insert_data['start_date']=$budget[11];
 $insert_data['dub_note']=$budget[12];
 $insert_data['coordinator']=$budget[13];
 
 $insert_data['supervisor']=$budget[15];
 $insert_data['account_cluster']=$budget[16];
 
 $insert_data['cost_type']=$budget[22];
 $insert_data['funding_country']=$budget[24];
 $insert_data['mp']=$budget[26];
 

 

 $fid=$this->Aedr_model->insert_id("gsect_budget",$insert_data);
echo $fid.$insert_data['year']."-".$insert_data['month']."-".$insert_data['type2']."-".$insert_data['description']."<br>";
//print_r($insert_data);
//exit;

}

}
//////////////////// Budget Analysis report start //////////////////
function budget_analysis()
{
  $sql="select * from gsect_budget";
  $finance_result=$this->Aedr_model->get_result_sql($sql);

  for($yr=2019;$yr<=2021;$yr++) {
    for($mth=1;$mth<=12;$mth++)
    {

      $sql="select count(ID) as mcount,mp from gsect_budget as gb where gb.type2='Field workers' and gb.year=$yr and gb.month=$mth and Exists (SELECT ID FROM gsect_budget as gbb where year=$yr and month=$mth and type2='Supervisor TA' and gbb.ID=gb.ID) GROUP by mp";
      $STA_FWK=$this->Aedr_model->get_result_sql($sql);

      $result_sup_fw[$yr][$mth]=$STA_FWK;

      $sql="SELECT count(ID) as mcount,mp FROM gsect_budget as gbb where year=$yr and month=$mth and type2='Supervisor TA' GROUP by mp";
      $STA=$this->Aedr_model->get_result_sql($sql);
      $result_sup[$yr][$mth]=$STA;
      unset($STA);
      unset($STA_FWK);


    }
    
    
  }

  //print_r($result_sup[2021][1]);exit;

  for($yr=2019;$yr<=2021;$yr++) {
    for($mth=1;$mth<=12;$mth++)
    {   
        foreach ($result_sup_fw[$yr][$mth] as $value) {

              if($value['mp']=='GSECT')
              { 
                  if($value['mcount']>0)
                  {
                  $GSECT_result[$yr][$mth]['sup_fw_count']=$value['mcount'];
                }
                else
                {
                  $GSECT_result[$yr][$mth]['sup_fw_count']=0;
                }
                   
              }

              if($value['mp']=='JLM')
              { 
                  if($value['mcount']>0)
                  {
                  $JLM_result[$yr][$mth]['sup_fw_count']=$value['mcount'];
                }
                else
                {
                  $JLM_result[$yr][$mth]['sup_fw_count']=0;
                }
                   
              }
                         if($value['mp']=='BCT')
              { 
                  if($value['mcount']>0)
                  {
                  $BCT_result[$yr][$mth]['sup_fw_count']=$value['mcount'];
                }
                else
                {
                  $BCT_result[$yr][$mth]['sup_fw_count']=0;
                }
                   
              }
              if($value['mp']=='NJM')
              { 
                  if($value['mcount']>0)
                  {
                  $NJM_result[$yr][$mth]['sup_fw_count']=$value['mcount'];
                }
                else
                {
                  $NJM_result[$yr][$mth]['sup_fw_count']=0;
                }
                   
              }

              /*if($value['mp']=='GSECT')
              {
                  $GSECT_result[$yr][$mth]['sup_fw_count']=$value['mcount'];
                   
              }
              
              if($value['mp']=='JLM')
              {
                  $JLM_result[$yr][$mth]['sup_fw_count']=$value['mcount'];
                   
              }
              
              if($value['mp']=='NJM')
              {
                  $NJM_result[$yr][$mth]['sup_fw_count']=$value['mcount'];
                   
              }

              if($value['mp']=='BCT')
              {
                  $BCT_result[$yr][$mth]['sup_fw_count']=$value['mcount'];
                   
              }
             

          */

       
        }

        foreach ($result_sup[$yr][$mth] as $value123) {
          
         

              if($value123['mp']=='GSECT')
              { 
                  if($value123['mcount']>0)
                  {
                  $GSECT_result[$yr][$mth]['sup_count']=$value123['mcount'];
                }
                else
                {
                  $GSECT_result[$yr][$mth]['sup_count']=0;
                }
                   
              }
              if($value123['mp']=='JLM')
              { 
                  if($value123['mcount']>0)
                  {
                  $JLM_result[$yr][$mth]['sup_count']=$value123['mcount'];
                }
                else
                {
                  $JLM_result[$yr][$mth]['sup_count']=0;
                }
                   
              }

              if($value123['mp']=='NJM')
              { 
                  if($value123['mcount']>0)
                  {
                  $NJM_result[$yr][$mth]['sup_count']=$value123['mcount'];
                }
                else
                {
                  $NJM_result[$yr][$mth]['sup_count']=0;
                }
                   
              }

              
             
             if($value123['mp']=='BCT')
              { 
                  if($value123['mcount']>0)
                  {
                  $BCT_result[$yr][$mth]['sup_count']=$value123['mcount'];
                }
                else
                {
                  $BCT_result[$yr][$mth]['sup_count']=0;
                }
                   
              }


       
        }
        
    }

  }

   //print_r($JLM_result);exit;
      $page_data['GSECT_result']=$GSECT_result;
        $page_data['JLM_result']=$JLM_result;
        $page_data['BCT_result']=$BCT_result;
        $page_data['NJM_result']=$JLM_result;
        $page_data['page_title']="Budget Supervisor Report";
              
              $page_data['table_heading']="Budget Supervisor Analysis";
               $page_data['page_heading']="Budget Supervisor Analysis";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/budget_supervisor_analysis";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
            $page_data['footer']='bk_cms/footer';

            $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/students","name"=>"Bank","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

    

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
  

}

//////////////////// Budget Analysis report end //////////////////

////////////////  donar individual report start ////////

function donar_report($param1='')
{

      $option_status["regular"]="regular";
      $option_status["active"]="active";
      $option_status["inactive"]="inactive";
      $option_status["retired"]="retired";
      $option_status["all"]="all";

      $option_pstatus["all"]="all";
      $option_pstatus["regular"]="regular";
      $option_pstatus["progressive"]="progressive";
      $option_pstatus["regressive"]="regressive";

      $page_data['option_status']=$option_status;
      $page_data['option_pstatus']=$option_pstatus;

      $latest_status=$_POST['status'];
      $payment_status=$_POST['pstatus'];

      if($latest_status=="all" && $payment_status=="all")
      {
        $sql="select * from gsect_donar where latest_status!='' and payment_status!=''";
      }
      else if($latest_status=="all" && $payment_status!="all")
      {
        $sql="select * from gsect_donar where latest_status!='' and payment_status='$payment_status'";
      }
      else if($latest_status!="all" && $payment_status=="all")
      {
        $sql="select * from gsect_donar where latest_status='$latest_status' and payment_status!=''";
      }
      else
      {
        $sql="select * from gsect_donar where latest_status='$latest_status' and payment_status='$payment_status'";
      }

      
      $donar_list=$this->Aedr_model->get_result_sql($sql);

        foreach ($donar_list as $donar) {


              $rd_id=$donar['rd_id'];
              
              if(!filter_var($donar['email'], FILTER_VALIDATE_EMAIL))
              {
                 $donar['email']="need to update";
              }

             $ddetails[$rd_id]['last_trans']=json_decode($donar['last_trans'],true);
             $ddetails[$rd_id]['payment_status']=$donar['payment_status'];
             $ddetails[$rd_id]['donation_list']=json_decode($donar['donation_list'],true);
             unset($donar['last_trans']);
             unset($donar['donation_list']);
             //print_r($donar);exit;
             $ddetails[$rd_id]['donar_detail']=$donar;

             $rd_id=NULL;
             unset($donar);
        }


      ////////////////  chart data end //////////////////////

        $page_data['ddetails']=$ddetails;
        $page_data['page_title']="Donar Report";
              
              $page_data['table_heading']="Donar Analysis";
               $page_data['page_heading']="Donar Analysis";
              $page_data['err']="display: none";    


       

            $page_data['page_name']="backennd/admin/donar_donation_report";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
            $page_data['footer']='bk_cms/footer';

            $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/students","name"=>"Bank","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

      $sql="select * from donar order by name";

      $page_data['donars_lists']=$this->Aedr_model->get_result_sql($sql);

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 



}





////////////////  donar individual report end ////////

}

?>