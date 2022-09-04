<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sample extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->library('session');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');		

        $this->load->model('Admin_model');
        $this->load->model('aedr_model');
        $this->load->model('Result_model');  
        $this->load->helper('download_helper');
    }

    public function index()
    {


    		$page_data['page_name']="dashboard";
    		$page_data['css_file']="dashboard_css.php";
    		$page_data['script_file']="scripts.php";
            $page_data['side_menu']="admin_menu.php";

    		//echo $page_data['css_file'];
    	   $this->load->view('backend/index', $page_data);


    }
    public function pdf($param1='')
    {

        $data['name']="jesusloesyoujeevanoworry";
        $this->load->library('Pdf');
        $html = $this->load->view('viewReportcard', $data, true);
        //echo "hi";exit;
       $this->pdf->createPDF($html, 'mypdf', false);

     
    /*
      $html = $this->load->view('upload_sat_topic', [], true);

      
        
     $this->pdf->createPDF($html, 'mypdf', false);*/


    }
function convertpdf(){
 
 
    // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->pdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->pdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("welcome.pdf", array("Attachment"=>0));
   }
     public function sample_form()
    {


    		$page_data['page_name']="form";
    		$page_data['css_file']="form_top_css.php";
    		$page_data['script_file']="form_script.php";
            $page_data['side_menu']="admin_menu.php";

    		//echo $page_data['page_name'];
    	   $this->load->view('backend/index', $page_data);


    }


    public function sample_form_wizard()
    {


            $page_data['page_name']="form_wizard";
            $page_data['css_file']="css_form_wizard.php";
            $page_data['script_file']="src_form_wizard.php";
            $page_data['side_menu']="admin_menu.php";

            //echo $page_data['page_name'];
           $this->load->view('form_wizard', $page_data);


    }


     public function sample_list()
    {


    		$page_data['page_name']="list";
    		$page_data['css_file']="list_css.php";
    		$page_data['script_file']="list_script.php";
            $page_data['side_menu']="admin_menu.php";

    		//echo $page_data['page_name'];
    	   $this->load->view('backend/index', $page_data);


    }

    public function sample_blank()
    {


            $page_data['page_name']="sample_blank";
            $page_data['css_file']="list_css.php";
            $page_data['script_file']="list_script.php";
            $page_data['side_menu']="admin_menu.php";

            //echo $page_data['page_name'];
           $this->load->view('backend/index', $page_data);


    }
   

    public function sample_list_form()
    {


            $page_data['page_name']="list_form";
            $page_data['css_file']="list_css.php";
            $page_data['script_file']="list_script.php";
            $page_data['side_menu']="admin_menu.php";

            //echo $page_data['page_name'];
           $this->load->view('backend/index', $page_data);


    }

    public function sample_multi_upload()
    {


            $page_data['page_name']="sample_form_upload";
            $page_data['css_file']="topcss_multi_upload.php";
            $page_data['script_file']="script_multi_upload.php";
            $page_data['side_menu']="admin_menu.php";

            //echo $page_data['page_name'];
           $this->load->view('backend/sample_form_upload' );


    }

    public function exam_preview()
    {


            $page_data['page_name']="exam_preview";
            $page_data['css_file']="list_css.php";
            $page_data['script_file']="list_script.php";
            $page_data['side_menu']="admin_menu.php";

            //echo $page_data['page_name'];
           $this->load->view('backend/index', $page_data);


    }

    public function sample_chart()
    {


           

            //echo $page_data['page_name'];
           $this->load->view('piechart');


    }

    public function sample_chart1()
    {


           

            //echo $page_data['page_name'];
           $this->load->view('sample_chart1');


    }

     function schoolwise_report()
    {


        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
            $data['page_name']="schoolwise_report";
            $data['css_file']="chart_sample.php";
            $data['script_file']="scripts_chart.php";
            $data['side_menu']="admin_menu.php";
        $this->load->view('backend/index', $data);
    }

    function view_result($rid,$student_id){
           
      $data['result']=$this->Result_model->get_result($rid,$student_id);   


        $data['title']='Result ID  '.$data['result']['rid'];
        if($data['result']['view_answer']=='1'){
         $this->load->model("Quiz_model");
        $data['saved_answers']=$this->Quiz_model->saved_answers($rid);
        $data['questions']=$this->Quiz_model->get_questions($data['result']['r_qids']);

        }
        $last_ten_result = $this->Result_model->last_ten_result($data['result']['exam_id']);
    $value=array();
    $value[]=array('Quiz Name','Percentage (%)');
     foreach($last_ten_result as $val){
      $value[]=array($val['email'].' ('.$val['username'].')',intval($val['percentage_obtained']));
     }

     $data['value']=json_encode($value);

    $correct_incorrect=explode(',',$data['result']['score_individual']);
     $qtime[]=array("question no","time in sec");
    foreach(explode(",",$data['result']['individual_time']) as $key => $val){
    if($val=='0'){
        $val=1;
    }


    
     if($correct_incorrect[$key]=="1"){
     $qtime[]=array("q  ".($key+1).") - correct ",intval($val));
     }else if($correct_incorrect[$key]=='2' ){
      $qtime[]=array("q ".($key+1).") - incorrect",intval($val));
     }else if($correct_incorrect[$key]=='0' ){
      $qtime[]=array("q ".($key+1).") - unattempted",intval($val));
     }else if($correct_incorrect[$key]=='3' ){
      $qtime[]=array($this->lang->line('q')."q ".($key+1).") - pending_evaluation ",intval($val));
     }
    
     


    }


     $data['qtime']=json_encode($qtime);

$data['percentile'] = $this->Result_model->get_percentile($data['result']['exam_id'], $data['result']['student_id'], $data['result']['score_obtained']);

   // print_r( $data['percentile']['exam_id']);exit;

     $data['attempt']=$this->Result_model->no_attempt($data['result']['exam_id'],$student_id);
  


        $data['title']='result_id'.$data['result']['rid'];




         $data['page_name']="sample_BP";
            $data['css_file']="list_css.php";
            $data['script_file']="list_script.php";
            $data['side_menu']="admin_menu.php";

        // print_r($data['saved_answers']);exit;
           $this->load->view('backend/index', $data);

        
    }

    //////////////////////////////////////////////////////////

/*
        function view_result1($rid){
        
           $student_id=1;
            
        $data['result']=$this->Result_model->get_result($rid,$student_id);

        //  echo "Hi";exit;
           


        
          //print_r($student_id);exit;  

    
        $data['attempt']=$this->Result_model->no_attempt($data['result']['exam_id'],$student_id);
  


        $data['title']='result_id'.$data['result']['rid'];

        
             
        if($data['result']['view_answer']=='1'){
         $this->load->model("Quiz_model");
        $data['saved_answers']=$this->Quiz_model->saved_answers($rid);
        $data['questions']=$this->Quiz_model->get_questions($data['result']['r_qids']);
       //$data['options']=$this->Quiz_model->get_options($data['result']['r_qids']);

        }
       // top 10 results of selected quiz
    $last_ten_result = $this->result_model->last_ten_result($data['result']['quid']);
    $value=array();
     $value[]=array('Quiz Name','Percentage (%)');
     foreach($last_ten_result as $val){
     $value[]=array($val['email'].' ('.$val['first_name']." ".$val['last_name'].')',intval($val['percentage_obtained']));
     }
     $data['value']=json_encode($value);
     
    // time spent on individual questions
    $correct_incorrect=explode(',',$data['result']['score_individual']);
     $qtime[]=array($this->lang->line('question_no'),$this->lang->line('time_in_sec'));
    foreach(explode(",",$data['result']['individual_time']) as $key => $val){
    if($val=='0'){
        $val=1;
    }
     if($correct_incorrect[$key]=="1"){
     $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('correct')." ",intval($val));
     }else if($correct_incorrect[$key]=='2' ){
      $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('incorrect')."",intval($val));
     }else if($correct_incorrect[$key]=='0' ){
      $qtime[]=array($this->lang->line('q')." ".($key+1).") -".$this->lang->line('unattempted')." ",intval($val));
     }else if($correct_incorrect[$key]=='3' ){
      $qtime[]=array($this->lang->line('q')." ".($key+1).") - ".$this->lang->line('pending_evaluation')." ",intval($val));
     }
    }
     $data['qtime']=json_encode($qtime);
     $data['percentile'] = $this->result_model->get_percentile($data['result']['quid'], $data['result']['uid'], $data['result']['score_obtained']);

      
      $uid=$data['result']['uid'];
      $quid=$data['result']['quid'];
      
      
     print_r($data);
        
        
    }
    */

function google_sheet_api_reading(){
  
 $this->load->library('Gapi');
       
       $result=$this->gapi->readSheet("1_iVbphOeEapm2bP-EdY_uLSTdICuKxSA5QITqben1QE", "Irregulars!A5:G8");
       $i=1;
        foreach ($result as $rst) {
          echo $i++;
           print_r($rst);
        echo "<br>";
        }
       

}


    ///////////////////////////////////////////////////////


}

?>