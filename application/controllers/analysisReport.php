<?php 

class AnalysisReport extends CI_Controller
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
    }

    function index()
    { 
         //   $page_data['disp_err']="display: none";
        //$page_data['err_msg']="";
            $page_data['page_name']="missionary_report";
           
        ///////////////// page details   //////////////////////
         
        ///////////////////// Data Fetching ////////////////

        $page_data['states']=$this->Aedr_model->get_list('state');

        ///////////////////////////////////////////////////   

        $this->load->view($page_data['page_name'],$page_data);
               

    }
    function err($param='')
    {       

        if($param==1)
        {
        $page_data['disp_err']="display: block";
        $page_data['err_msg']="Please enter valid reporter details";
            
        }
        else
        {
            $page_data['disp_err']="display: block";
        $page_data['err_msg']="Please enter valid missionary id/name/state details";
        }
       
            $page_data['page_name']="missionary_report";
           

        ///////////////// page details   //////////////////////


                $this->load->view($page_data['page_name'],$page_data);
               

    }
    function missionary_dashboard($param1=''){


for($yr=2017;$yr<=2021;$yr++)
{

    $fw_support_currently=0;
    $fw_new=0;
    $fw_retired=0;
    $fw_retired_total=0;
    


  $sql="select count(distinct id) as fw_support_currently from gsect_msupport where fund_start_date between '2010-01-01' and '$yr-12-31' ";
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

 $page_data['page_title']="Bank Transction";
              $page_data['form_heading']="Bank Transaction";
              $page_data['table_heading']="Transaction History";
               $page_data['page_heading']="Tansaction";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin/missionaryStatsDashboard";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
          


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


}


  
}

?>