<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller
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


function incomeFlux()
    {

    	if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if(empty($_POST))
        	redirect(base_url()."Admin/bank_reports/", 'refresh');
    		  
    		//////////////// page setup /////////////        
          
              $page_data['page_title']="Income Flux Reports";
              $page_data['page_heading']="Income Flux Reports";
              $page_data['page_name']="backennd/admin/IncomeFluxReport";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin/students","name"=>"Bank","class"=>"current");
            $page_data['bread_crums']=$bread_crum;

            //////////////// page setup /////////////////


           $start_date = date('Y-m-d',strtotime(str_replace('/', '-', '01/'.$_POST['starting_month'])));


           $end_date = date('Y-m-d',strtotime(str_replace('/', '-', '30/'.$_POST['end_month'])));

           $today = strtotime(date("Y-m-d"));
		  $maxdate = date('Y-m-d', strtotime('+1 month', $today));

		   //////////////////  validatation /////////////////

         
           if($start_date>$end_date)
           {
           	
           		redirect(base_url() . 'Admin/bank_reports/error_invalid_date');
           	 //echo "error";exit;
           }
           else if($end_date>$maxdate)
           {
           	  redirect(base_url() . 'Admin/bank_reports/error_greater_date');
           }
        
		/////////////////////////////////////////////////////////

		 /////////////////// Chart setting  ///////////////////

           $month_total_income[]=array("Month","Income total");
           $month_fw_income[]=array("Month","FW Income");
           $month_ga_income[]=array("Month","GA Income");
           $month_children_home_income[]=array("Month","Children Home Income");
           $month_sp_income[]=array("Month","Children Home Income");
           $month_indiana_income[]=array("Month","Indiana income");
           $month_Arizona_income[]=array("Month","Arizona Income");

         //////////////////////////////////////////////////////

		  ////////////// calculating no of months /////////////

			$syear = date('Y',strtotime($start_date));
			$eyear = date('Y', strtotime($end_date));

			$smonth = date('m', strtotime($start_date));
			$emonth = date('m', strtotime($end_date));

			if($emonth==1 || $emonth==3 || $emonth==5 || $emonth==7 || $emonth==8 || $emonth==10 || $emonth==12)
			{
				$end_date = date('Y-m-d',strtotime(str_replace('/', '-', '31/'.$_POST['end_month'])));
			}
			else if($emonth==2)
			{
				$end_date = date('Y-m-d',strtotime(str_replace('/', '-', '29/'.$_POST['end_month'])));
			}
			else
			{
				$end_date = date('Y-m-d',strtotime(str_replace('/', '-', '30/'.$_POST['end_month'])));
			}
				

			 	if($eyear>$syear)
			 	{	
			 		$diff=($eyear-$syear)*12;		 		

			 		$noofmonth=$diff-$smonth+$emonth+1;
			 	}
			 	else
			 	{
			 		$noofmonth=$emonth-$smonth+1;
			 	}
			 	//echo $noofmonth;
				$month_details[]=array();	
				$m=$smonth;
				$y=$syear;
					$months=array();
					$years=array();
		   for($i=0;$i<$noofmonth;$i++)
		   { 
		   	  if($m!=12)
		   	  {
		   	  	$month_details[$i]['month']=$m++;
		   	  	$month_details[$i]['year']=$y;

		   	  }              
              else
              {
              	$month_details[$i]['month']=$m;
              	$month_details[$i]['year']=$y++;
              	$m=1;
              }
              array_push($months,$month_details[$i]['month']);
              array_push($years,$month_details[$i]['year']);
		   }



		 	$i=0;
	foreach ($month_details as $md) {
		
			$keymonth=$md['month'];
		 	$keyyear=$md['year'];

		 //	echo $keymonth;
		 //	echo $keyyear;
			$sql="select * from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth";
			$details=$this->Aedr_model->get_result_sql($sql);

			$sql="select distinct name from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth";
			$name_list_array=$this->Aedr_model->get_result_sql($sql);
			$name_list=array();
			foreach ($name_list_array as $names) {
				array_push($name_list, $names['name']);
			}
			$sql="select round(sum(camount),0) as total_sum from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth and (source_type='BANK' or source_type='Bank (Arizona)') ";
			$total_sum_row=$this->Aedr_model->get_row_sql($sql);

			$sql="select round(sum(camount),0) as fw_sum from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth and source_type='BANK' and regular_accrual='Yes' and audit_income='field workers' and core_project='Core'";
			$fw_sum_row=$this->Aedr_model->get_row_sql($sql);

			$sql="select distinct name from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth and source_type='BANK' and regular_accrual='Yes' and audit_income='field workers' and core_project='Core'";
			$fw_names=$this->Aedr_model->get_result_sql($sql);

				$name_list=array();
			foreach ($fw_names as $fw_name) {
				array_push($name_list, $fw_name['name']);
			}

			//print_r($name_list);exit;


			$sql="select round(sum(camount),0)/4 as ga from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth and source_type='BANK' and regular_accrual='Yes' and ga='Yes' and core_project='Core'";
			$ga_sum_row=$this->Aedr_model->get_row_sql($sql);

			$sql="select round(sum(camount),0) as children_home from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth and regular_accrual='Yes' and audit_income='Childrens home'";
			$ch_sum_row=$this->Aedr_model->get_row_sql($sql);

			$sql="select round(sum(camount),0) as sp_sum from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth and regular_accrual='Yes' and audit_income='Social Projects' ";
			$sp_sum_row=$this->Aedr_model->get_row_sql($sql);

			$sql="select round(sum(camount),0) as indiana_sum from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth and source_type='500K INDIANA' and regular_accrual='Yes' and core_project='Core'";
			$indiana_sum_row=$this->Aedr_model->get_row_sql($sql);
			

			$sql="select round(sum(camount),0) as Arizona_sum from bank_transaction where YEAR(tdate)=$keyyear and MONTH(tdate)=$keymonth and source_type='Bank (Arizona)' and regular_accrual='Yes' and core_project='Core'";
			$arizona_sum_row=$this->Aedr_model->get_row_sql($sql);

	 $mdetails[$keymonth]['month']=$keymonth;
	 $mdetails[$keymonth]['year']=$keyyear;
	 $mdetails[$keymonth]['total_sum']=$total_sum_row['total_sum'];
	 $mdetails[$keymonth]['fw_sum']=$fw_sum_row['fw_sum'];
	 $mdetails[$keymonth]['name_list']=$name_list;
	 $mdetails[$keymonth]['ga']=$ga_sum_row['ga'];
	 $mdetails[$keymonth]['children_home']=$ch_sum_row['children_home'];
	 $mdetails[$keymonth]['sp_sum']=$sp_sum_row['sp_sum'];
	 $mdetails[$keymonth]['indiana_sum']=$indiana_sum_row['indiana_sum'];
	 $mdetails[$keymonth]['Arizona_sum']=$arizona_sum_row['Arizona_sum'];
	 $mdetails[$keymonth]['name_list']=$name_list;
	 unset($name_list);

	$month_total_income[]=array(date('F', mktime(0, 0, 0, $keymonth, 10))."-".$keyyear,intval($mdetails[$keymonth]['total_sum']));
	 $month_fw_income[]=array(date('F', mktime(0, 0, 0, $keymonth, 10))."-".$keyyear,intval($mdetails[$keymonth]['fw_sum']));
           $month_ga_income[]=array(date('F', mktime(0, 0, 0, $keymonth, 10))."-".$keyyear,intval($mdetails[$keymonth]['ga']));
           $month_children_home_income[]=array(date('F', mktime(0, 0, 0, $keymonth, 10))."-".$keyyear,intval($mdetails[$keymonth]['children_home']));
           $month_indiana_income[]=array(date('F', mktime(0, 0, 0, $keymonth, 10))."-".$keyyear,intval($mdetails[$keymonth]['indiana_sum']));
           $month_Arizona_income[]=array(date('F', mktime(0, 0, 0, $keymonth, 10))."-".$keyyear,intval($mdetails[$keymonth]['Arizona_sum']));
           $month_sp_income[]=array(date('F', mktime(0, 0, 0, $keymonth, 10))."-".$keyyear,intval($mdetails[$keymonth]['sp_sum']));
        }
/////////////////// Preparing Name List  /////////////////////

        $aname_list=array();
  
         	  $sql="select distinct name from bank_transaction where source_type='BANK' and regular_accrual='Yes' and audit_income='field workers' and core_project='Core' and (tdate between '$start_date' and '$end_date')";
         	  //print_r($sql);exit;
         	  $actual_name_lists=$this->Aedr_model->get_result_sql($sql);
		
			foreach ($actual_name_lists as $actual_name_list) {
				array_push($aname_list, $actual_name_list['name']);
			}

		 $sql="select * from bank_transaction where source_type='BANK' and regular_accrual='Yes' and audit_income='field workers' and core_project='Core' and (tdate between '$start_date' and '$end_date')";
         	  //print_r($sql);exit;
         	  $namewise_data=$this->Aedr_model->get_result_sql($sql);
		
			foreach ($namewise_data as $namewise) {
					$ky=date('Y',strtotime($namewise['tdate']));
					$km=intval(date('m',strtotime($namewise['tdate'])));
					$namewise_details[$namewise['name']][$ky][$km]=$namewise;
			}

			$page_data['namewise_details']=$namewise_details;

			
        $regular_payment=array();
   		if(count($months)==5)
   		{
   			$regular_payment=array_intersect($mdetails[$months[0]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[2]]['name_list'],$mdetails[$months[3]]['name_list'],$mdetails[$months[4]]['name_list']);
   		  $paid_only_month1=array_diff($mdetails[$months[0]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[2]]['name_list'],$mdetails[$months[3]]['name_list'],$mdetails[$months[4]]['name_list']);
   		  $paid_only_month2=array_diff($mdetails[$months[1]]['name_list'], $mdetails[$months[0]]['name_list'],$mdetails[$months[2]]['name_list'],$mdetails[$months[3]]['name_list'],$mdetails[$months[4]]['name_list']);
   		  $paid_only_month3=array_diff($mdetails[$months[2]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[0]]['name_list'],$mdetails[$months[3]]['name_list'],$mdetails[$months[4]]['name_list']);
   		  $paid_only_month4=array_diff($mdetails[$months[3]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[2]]['name_list'],$mdetails[$months[0]]['name_list'],$mdetails[$months[4]]['name_list']);
   		  $paid_only_month5=array_diff($mdetails[$months[4]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[2]]['name_list'],$mdetails[$months[3]]['name_list'],$mdetails[$months[0]]['name_list']);

   		  $irregular_payment=array_diff($aname_list, $regular_payment, $paid_only_month1, $paid_only_month2, $paid_only_month3, $paid_only_month4, $paid_only_month5);

   		  $mdetails[$months[0]]['paid_only']=$paid_only_month1;
   		  $mdetails[$months[1]]['paid_only']=$paid_only_month2;
   		  $mdetails[$months[2]]['paid_only']=$paid_only_month3;
   		  $mdetails[$months[3]]['paid_only']=$paid_only_month4;
   		  $mdetails[$months[4]]['paid_only']=$paid_only_month5;
   		 
   		}
   		else if(count($months)==4)
   		{
   			$regular_payment=array_intersect($mdetails[$months[0]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[2]]['name_list'],$mdetails[$months[3]]['name_list']);
   		  $paid_only_month1=array_diff($mdetails[$months[0]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[2]]['name_list'],$mdetails[$months[3]]['name_list']);
   		  $paid_only_month2=array_diff($mdetails[$months[1]]['name_list'], $mdetails[$months[0]]['name_list'],$mdetails[$months[2]]['name_list'],$mdetails[$months[3]]['name_list']);
   		  $paid_only_month3=array_diff($mdetails[$months[2]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[0]]['name_list'],$mdetails[$months[3]]['name_list']);
   		  $paid_only_month4=array_diff($mdetails[$months[3]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[2]]['name_list'],$mdetails[$months[0]]['name_list']);

   		   $irregular_payment=array_diff($aname_list, $regular_payment, $paid_only_month1, $paid_only_month2, $paid_only_month3, $paid_only_month4);
   		  
   		  $mdetails[$months[0]]['paid_only']=$paid_only_month1;
   		  $mdetails[$months[1]]['paid_only']=$paid_only_month2;
   		  $mdetails[$months[2]]['paid_only']=$paid_only_month3;
   		  $mdetails[$months[3]]['paid_only']=$paid_only_month4;
   		  		 
   		}
   		else if(count($months)==3)
   		{
   			$regular_payment=array_intersect($mdetails[$months[0]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[2]]['name_list']);
   		  $paid_only_month1=array_diff($mdetails[$months[0]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[2]]['name_list']);
   		  $paid_only_month2=array_diff($mdetails[$months[1]]['name_list'], $mdetails[$months[0]]['name_list'],$mdetails[$months[2]]['name_list']);
   		  $paid_only_month3=array_diff($mdetails[$months[2]]['name_list'], $mdetails[$months[1]]['name_list'],$mdetails[$months[0]]['name_list']);
   		  
   		   $irregular_payment=array_diff($aname_list, $regular_payment, $paid_only_month1, $paid_only_month2, $paid_only_month3);
   		  $mdetails[$months[0]]['paid_only']=$paid_only_month1;
   		  $mdetails[$months[1]]['paid_only']=$paid_only_month2;
   		  $mdetails[$months[2]]['paid_only']=$paid_only_month3;
   		
   		}
   		else if(count($months)==2)
   		{
   			$regular_payment=array_intersect($mdetails[$months[0]]['name_list'], $mdetails[$months[1]]['name_list']);
   		  $paid_only_month1=array_diff($mdetails[$months[0]]['name_list'], $mdetails[$months[1]]['name_list']);
   		  $paid_only_month2=array_diff($mdetails[$months[1]]['name_list'], $mdetails[$months[0]]['name_list']);
   		    
   		  $mdetails[$months[0]]['paid_only']=$paid_only_month1;
   		  $mdetails[$months[1]]['paid_only']=$paid_only_month2;
   		   $irregular_payment=array_diff($aname_list, $regular_payment, $paid_only_month1, $paid_only_month2);
   		 
   		}
   		else if(count($months)==2)
   		{
   		  $regular_payment=$mdetails[$months[0]]['name_list'];
   		  $paid_only_month1=$mdetails[$months[0]]['name_list'];
   		
   		  $mdetails[$months[0]]['paid_only']=$paid_only_month1;
   		   $irregular_payment=array_diff($aname_list, $regular_payment, $paid_only_month1);
   		 
   		}
   		else
   		{
   			redirect(base_url() . 'Admin/bank_reports/error_invalid_month');
   		}

   		$page_data['months']=$months;
   		$page_data['years']=$years;
   		$page_data['regular_payment']=$regular_payment;
   		$page_data['irregular_payment']=$irregular_payment;

		$page_data['month_fw_income']=json_encode($month_fw_income);
		$page_data['month_ga_income']=json_encode($month_ga_income);
		$page_data['month_children_home_income']=json_encode($month_children_home_income);
		$page_data['month_indiana_income']=json_encode($month_indiana_income);
		$page_data['month_Arizona_income']=json_encode($month_Arizona_income);
		$page_data['month_sp_income']=json_encode($month_sp_income);
		
    	$page_data['month_total_income']=json_encode($month_total_income);
    	$page_data['month_total_income_array']=$mdetails;


        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
        //////////////////// page details end ///////////////////
            



  }

  ///////////////    Field Worker Report Starts ///////////////////////

   public function generate_fw_termreport($param1='')
    {
      $report_id=1;
      
        if($param1<=0)
        {
           redirect(base_url().'mtermreports/','refresh');
        }
        else
        {
          $report_id=$param1;
        }

         
          /////////// option data end ////////////////////////


              $data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

              $sql="select * from mp_missionary_report where report_id=$report_id";

              $report_data=$this->Aedr_model->get_row_sql($sql);
              $data['report_data']=$report_data;
              // print_r($report_data);exit;
              $missionary_id=$report_data['missionary_id'];
              $data['village_details']=json_decode($report_data['village_details'],true);
             
              $data['prayer_points']=json_decode($report_data['prayer_points'],true);
              $sql="select * from missionary_first where missionary_id=$missionary_id";

              $data['missionary_details1']=$this->Aedr_model->get_row_sql($sql);

          $data['profile_data']=$page_data['missionary_details1'];


        //////// generate the pdf start /////

            //print_r($page_data['missionary_details7']);exit;

         $this->load->library('Pdf');
        $html = $this->load->view('fw_termreport_pdf', $data, true);
       $this->pdf->createPDF($html, $filename, false);


    //////////generate the pdf end ///////////


   }

  ///////////////    Field Worker Report Starts ///////////////////////



}
  ?>