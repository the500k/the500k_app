<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class GSECT_Panel extends CI_Controller
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

      echo "Our Index";

    }
    function reading_budget()
    {    

      $this->load->library('Gapi');
       
       $result=$this->gapi->readSheet("1P8EcL60k2mUJOK08s-Yl69QI4hsAu1kgeg0HIgPt_vw", "M Support!A:W");
       $i=1;
        
        foreach ($result as $rst) {
            $value_to_the_sheet=array();
       
   if($i>1 && $rst[0]!='' && is_numeric(6) && $rst[8]=='Live' && $rst[22]=='500k UK/Indiana/Arizona')
           {
            $value_to_the_sheet[0]=2021;
            $value_to_the_sheet[1]=1;
            for($j=0;$j<count($rst);$j++){
              if($rst[$j]!=NULL){
                array_push($value_to_the_sheet,$rst[$j]);
              }
              else
              {
                array_push($value_to_the_sheet,"nil");
                
              }
               
            }
           /*print_r($value_to_the_sheet);
          print_r(count($value_to_the_sheet));exit;*/
        }
           if(count($value_to_the_sheet)>0)
            {
             
             $this->gapi->writeGSECT_finance_export("1P8EcL60k2mUJOK08s-Yl69QI4hsAu1kgeg0HIgPt_vw", "finance_export_by_script!A:X",$value_to_the_sheet);
             echo $i." added <br>";
            }
            
            
           $i++;
                   
        }

    }
}
?>