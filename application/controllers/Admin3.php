<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin3 extends CI_Controller
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

             

          /*   $update_data['latest_status']=$last_trans['status'];
             $update_data['payment_status']=$payment_status;
             $update_data['donation_list']=json_encode($donation_list);
             $update_data['last_trans']=json_encode($last_trans);
             $update_data['update_date']=date('Y-m-d');

      //  print_r($update_data);exit;

        $where ="rd_id='".$rd_id."'";

        $this->Aedr_model->update('gsect_donar',$where,$update_data);*/



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


       

            $page_data['page_name']="backennd/admin3/donar_donation_analysis";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin3/side_menu3";
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


       

            $page_data['page_name']="backennd/admin3/donar_donation_report";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin3/side_menu3";
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