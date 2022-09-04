<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin2 extends CI_Controller
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

          /*  $page_data['page_name']="backennd/admin/dashboard";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/dasboard_css";
            $page_data['script_file']="bk_cms/dashboard_script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
            $page_data['footer']='bk_cms/footer';

              ///////////////// page details ////////////////////////


            $this->load->view($page_data['css_file'],$page_data);
            $this->load->view($page_data['top_menu']);
            $this->load->view( $page_data['side_menu']);
            $this->load->view($page_data['page_name'],$page_data);
            $this->load->view('bk_cms/footer');
            $this->load->view($page_data['script_file']);*/

            redirect(base_url().'Admin2/new_reports', 'refresh');

    }

    function load_msupport()
    {
    $this->load->library('Gapi');
     
    $msupport_details=$this->gapi->readSheet("1P8EcL60k2mUJOK08s-Yl69QI4hsAu1kgeg0HIgPt_vw", "M Support!A2:Z");
    $live_missionary=array();
    $retired_missionary=array();
    $rejected_missionary=array();
    $Applying_missionary=array();
    $Intern_missionary=array();
    $Funding_Docked_missionary=array();
    foreach ($msupport_details as $msupport_detail) {
        //print_r($msupport_detail);exit;
        $mdetails=array();
        $id=$msupport_detail[0];
            $mdetails["id"]=$msupport_detail[0];
            $mdetails["name"]=str_replace('/','',$msupport_detail[3]);
            $mdetails["support"]=$msupport_detail[6];
            $mdetails["state"]=str_replace('&','and',$msupport_detail[4]);
            $mdetails["status"]=$msupport_detail[8];
            $mdetails["rcycle"]=str_replace('/','',$msupport_detail[24]);
            $mdetails["dt_funding_start"]=date("d-m-Y",strtotime("01".$msupport_detail[9]));
        if(array_key_exists($msupport_detail[0], $live_missionary)!=1 and $msupport_detail[8]=="Live")
        {
            

            $live_missionary[$id]=$mdetails;
        }
        else if(array_key_exists($msupport_detail[0], $retired_missionary)!=1 and $msupport_detail[8]=="Retired")
        {
            $retired_missionary[$id]=$mdetails;
        }
        else if(array_key_exists($msupport_detail[0], $rejected_missionary)!=1 and $msupport_detail[8]=="Rejected")
        {
            $rejected_missionary[$id]=$mdetails;
        }
        else if(array_key_exists($msupport_detail[0], $Intern_missionary)!=1 and $msupport_detail[8]=="Intern")
        {
            $Intern_missionary[$id]=$mdetails;
        }
        else if(array_key_exists($msupport_detail[0], $Applying_missionary)!=1 and $msupport_detail[8]=="Applying")
        {
            $Applying_missionary[$id]=$mdetails;
        }
        else if(array_key_exists($msupport_detail[0], $Funding_Docked_missionary)!=1 and $msupport_detail[8]=="Funding Docked")
        {
            $Funding_Docked_missionary[$id]=$mdetails;
        }
        unset($mdetails);
    }
   
   // print_r($live_missionary);
    $insert_msupport['live_missionary']=json_encode($live_missionary);

    //print_r($insert_msupport['live_missionary']);exit;
    $insert_msupport['retired_missionary']=json_encode($retired_missionary);
    $insert_msupport['rejected_missionary']=json_encode($rejected_missionary);
    $insert_msupport['Applying_missionary']=json_encode($Applying_missionary);
    $insert_msupport['Funding_Docked_missionary']=json_encode($Funding_Docked_missionary);
    $id=$this->Aedr_model->insert_id("gsect_msupport",$insert_msupport);
   
    //exit;
    $msupport["live_missionary"]=$live_missionary;
    $msupport["retired_missionary"]=$retired_missionary;
    $msupport["rejected_missionary"]=$rejected_missionary;
    $msupport["Applying_missionary"]=$Applying_missionary;
    $msupport["Funding_Docked_missionary"]=$Funding_Docked_missionary;
    $ms=stripslashes(json_encode($msupport));
    $insert['msupport']=$ms;
   // print_r($insert);exit;
    //print_r(json_decode($insert['msupport'],true));exit;
    $insert['date']=date('Y-m-d');
    
    $id=$this->Aedr_model->insert_id("gsect",$insert);
    $this->load_checklist($id);


}
function load_rawmsupport()
    {
    $this->load->library('Gapi');
     
    $msupport_details123=$this->gapi->readSheet("1cNuOStIQuzsk0WKaXZdHyyL2olUmpBUMIjgAMCW7e4U", "MissionaryStatsTab!A5:Z");
    $raw_missionary=array();
    print_r($msupport_details123[0]);exit;
    foreach ($msupport_details123 as $msupport_detail) {
        //print_r($msupport_detail);exit;
        $mdetails=array();
        $id=$msupport_detail[0];
            $mdetails["id"]=$msupport_detail[0];
            $mdetails["name"]=str_replace('/','',$msupport_detail[3]);
            $mdetails["support"]=$msupport_detail[6];
            $mdetails["state"]=str_replace('&','and',$msupport_detail[4]);
            $mdetails["status"]=$msupport_detail[8];
            $mdetails["rcycle"]=str_replace('/','',$msupport_detail[24]);
            $mdetails["dt_funding_start"]=date("d-m-Y",strtotime("01".$msupport_detail[9]));
            print_r($msupport_detail);exit;
            $mdetails["dt_funding_end"]=date("d-m-Y",strtotime($msupport_detail[32]));

          $raw_missionary[$id]=$mdetails;  
        
        unset($mdetails);
    }
   
   print_r($raw_missionary);exit;
    $update_data['raw_msupport']=json_encode($raw_missionary);

    
    $where ="id=1";

    $this->Aedr_model->update('gsect',$where,$update_data);
    


}

    function load_checklist($id=1)
    {

        $sql="select * from gsect where id=1";
        $result=$this->Aedr_model->get_row_sql($sql);
        //print_r($result['live_missionary']);
        $msupport=json_decode($result['msupport'],true);
        
        //print_r($msupport);exit;

        $Live_mids=array_keys($msupport['live_missionary']);
       
    $this->load->library('Gapi');
    $checklists=$this->gapi->readSheet("1AR7akf5vREy8YpROIDBb_wQxCtGbhCLOJ6GweXxYZB8", "AlexAddedtoMissStatsSheet!A2:O");
    
    foreach ($checklists as $checklist) {
        
       

        $id=$checklist[0];
        $year=intval($checklist[13]);
        $r=$checklist[14];
        //print_r($id);exit;
        $village_details=array($checklist[1],$checklist[2],$checklist[3],$checklist[4],$checklist[5],$checklist[6],$checklist[7],$checklist[8],$checklist[9],$checklist[10],$checklist[11],$checklist[12]);
       

        $checklist_details[$id]["id"]=$id;
        $checklist_details[$id][$year][$r]=$village_details;
    }
   // print_r($checklist_details['JK85D8'][2020]);exit;
    $id=1;
    $update_data['checklist']=json_encode($checklist_details);

        $where ="id=1";

        $this->Aedr_model->update('gsect',$where,$update_data);

    redirect(base_url().'Admin2/missionary_stats_sheet_retreive/'.$id,'refresh');
    }

    function missionary_stats_sheet_retreive($param1='')
    {
        $id=$param1;

        $sql="select * from gsect where id=$id";
        $result=$this->Aedr_model->get_row_sql($sql);
        $msupport=json_decode($result['msupport'],true);
        $mchecklist=json_decode($result['checklist'],true);
        $live_missionary_ids=array_keys($msupport['live_missionary']);
        $latest_report=array();
        
        print_r(count($msupport['Funding_Docked_missionary']));exit;

        foreach ($live_missionary_ids as $lmid) {


            if(!empty($mchecklist[$lmid][2021]['R1']))
            {
                $latest_report[$lmid]=$mchecklist[$lmid][2021]['R1'];
            }
            elseif(!empty($mchecklist[$lmid][2020]['R3']))
            {
                $latest_report[$lmid]=$mchecklist[$lmid][2020]['R3'];
            }
            elseif(!empty($mchecklist[$lmid][2020]['R2']))
            {
                $latest_report[$lmid]=$mchecklist[$lmid][2020]['R2'];
            }
            elseif(!empty($mchecklist[$lmid][2020]['R1']))
            {
                $latest_report[$lmid]=$mchecklist[$lmid][2020]['R1'];
            }
            elseif(!empty($mchecklist[$lmid][2019]['R3']))
            {
                $latest_report[$lmid]=$mchecklist[$lmid][2019]['R3'];
            }
            elseif(!empty($mchecklist[$lmid][2019]['R2']))
            {
                $latest_report[$lmid]=$mchecklist[$lmid][2019]['R2'];
            }
            elseif(!empty($mchecklist[$lmid][2019]['R1']))
            {
                $latest_report[$lmid]=$mchecklist[$lmid][2019]['R1'];
            }
        }

       
        print_r($latest_report['ASKRLT']);exit;
       
        
    }

    function budget_export()
  { 
    
    ////// fetching data start //////

     $state_by_id=$this->Aedr_model->get_row_by_id('state','state_id');

     //print_r($state_by_id);

    $district_by_id=$this->Aedr_model->get_row_by_id('district','district_id');
    $sql="select distinct mf.* from missionary_first as mf,missionary_second as ms,missionary_six as mss where ms.missionary_id=mf.missionary_id and mf.mp_id=4 and mss.missionary_id=mf.missionary_id";


    $missionaryDetails=$this->Aedr_model->get_result_sql($sql);

   // print_r(count($missionaryDetails));exit;

   /* $sql="select * from missionary_four as mf,missionary_first as mfr where  mfr.mp_id=2 and mfr.missionary_id=mf.missionary_id";

    $missionaryDetails4=$this->Aedr_model->get_result_sql($sql);

    $sql="select * from supervisor where mp_id=2";

    $supervisor=$this->Aedr_model->get_result_sql($sql);*/

    //print_r($missionaryDetails);exit;

    $msum=0;
    $ssum=0;
    $insum=0;
    $irum=0;
    $i=0;

   foreach ($missionaryDetails as $Mdetails) {
     $missionary_id=$Mdetails['missionary_id'];

     /////////// other table data ////////////

     $sql="select * from missionary_second where missionary_id=$missionary_id";

    $missionary_second=$this->Aedr_model->get_row_sql($sql);

     $sql="select * from missionary_four where missionary_id=$missionary_id";

    $missionary_four=$this->Aedr_model->get_row_sql($sql);

   // print_r($sql);exit;

     $budget_export['year']=2021;
     $budget_export['month']=3;
     $budget_export['ID']=$Mdetails['mrid'];
     $budget_export['label']="MISSIONARY SALARY";
     $budget_export['type']="Field Workers";
     $budget_export['name']=$Mdetails['fname']." ".$Mdetails['surename'];
     $budget_export['state']=$state_by_id[$Mdetails['state_id']]['name'];
     $budget_export['district']=$district_by_id[$Mdetails['district_id']]['name'];
     $budget_export['cost']=5500;
     $budget_export['status']="Live";
     $budget_export['Supervisor']=$missionary_four['supervisor_name'];
     $budget_export['phone']=$Mdetails['phone_num'];
     $budget_export['pincode']=$missionary_second['pincode'];
     $budget_export['is_regular']="Regular";
     $budget_export['is_core']="Core";
     $budget_export['cost_type']="Community Development Programme";
     $budget_export['funding_country']="500k UK/Indiana/Arizona";

     $finance_export[$i++]=$budget_export;
    
      $msum+=$budget_export['cost'];

   }

   /*

    $sql="select distinct s.* from supervisor as s,missionary_four as mf where s.mp_id=2 and s.status=1 and mf.supervisor_id=s.mrid";

    $supervisors=$this->Aedr_model->get_result_sql($sql);

    //print_r(count($supervisors));exit;



   foreach ($supervisors as $supervisor) {
     $supervisors_id=$supervisor['supervisor_id'];

     /////////// other table data ////////////
     $supervisor_code=$supervisor['mrid'];

     $budget_export['year']=2021;
     $budget_export['month']=2;
     $budget_export['ID']=$supervisor['mrid'];
     $budget_export['label']="Supervisor TA";
     $budget_export['type']="Supervisor";
     $budget_export['name']=$supervisor['fname']." ".$supervisor['surename'];
     $budget_export['state']=$state_by_id[$supervisor['state_id']]['name'];
     $budget_export['district']=$district_by_id[$supervisor['district_id']]['name'];
     $budget_export['cost']=$supervisor['nom']*200;
     $budget_export['status']="Live";
     $budget_export['Supervisor']=$supervisor['fname'];
     $budget_export['phone']="Not updated";
     $budget_export['pincode']="NA";
     $budget_export['is_regular']="Regular";
     $budget_export['is_core']="Core";
     $budget_export['cost_type']="Community Development Programme";
     $budget_export['funding_country']="500k UK/Indiana/Arizona";

     $finance_export[$i++]=$budget_export;
    
      $ssum+=$budget_export['cost'];

   }
  
   $this->load->library('Gapi');
       
       $result=$this->gapi->readSheet("1_iVbphOeEapm2bP-EdY_uLSTdICuKxSA5QITqben1QE", "Irregulars!A5:W8");
     
        foreach ($result as $rst) {
   
        $budget_export['year']=2021;
     $budget_export['month']=2;
     $budget_export['ID']=$rst[0];
     $budget_export['label']=$rst[1];
     $budget_export['type']=$rst[2];
     $budget_export['name']=$rst[3];
     $budget_export['state']=$rst[4];
     $budget_export['district']=$rst[5];
     $budget_export['cost']=$rst[6];
     $budget_export['status']="NA";
     $budget_export['Supervisor']="NA";
     $budget_export['phone']="Not Applicable";
     $budget_export['pincode']="NA";
     $budget_export['is_regular']="Irregular";
     $budget_export['is_core']=$rst[18];
     $budget_export['cost_type']=$rst[20];
     $budget_export['funding_country']="500k UK/Indiana/Arizona";

     $finance_export[$i++]=$budget_export;
    
     $irregular+=$budget_export['cost'];
        }
      
     // print_r($finance_export);exit;
// irregular
 /*  $budget_export['year']=2020;
     $budget_export['month']=12;
     $budget_export['ID']="JLO9T314";
     $budget_export['label']="Reporting Team";
     $budget_export['type']="Reporting Team";
     $budget_export['name']="Moses Babu";
     $budget_export['state']="Andhra Pradesh";
     $budget_export['district']="Prakasam";
     $budget_export['cost']=5000;
     $budget_export['status']="NA";
     $budget_export['Supervisor']="NA";
     $budget_export['phone']="Not Applicable";
     $budget_export['pincode']="NA";
     $budget_export['is_regular']="Irregular";
     $budget_export['is_core']="Core";
     $budget_export['cost_type']="Christmas Gift";
     $budget_export['funding_country']="500k UK/Indiana/Arizona";

     $finance_export[$i++]=$budget_export;
    
      $irregular=$budget_export['cost'];

      $budget_export['year']=2021;
     $budget_export['month']=2;
     $budget_export['ID']="JLM2T31X";
     $budget_export['label']="Reporting Team SALARY";
     $budget_export['type']="Reporting Team ";
     $budget_export['name']="Moses Babu";
     $budget_export['state']="Andhra Pradesh";
     $budget_export['district']="Prakasam";
     $budget_export['cost']=7200;
     $budget_export['status']="NA";
     $budget_export['Supervisor']="NA";
     $budget_export['phone']="Not Applicable";
     $budget_export['pincode']="NA";
     $budget_export['is_regular']="regular";
     $budget_export['is_core']="Core";
     $budget_export['cost_type']="Staff Honerarium";
     $budget_export['funding_country']="500k UK/Indiana/Arizona";

     $finance_export[$i++]=$budget_export;
    
      $otherregular=$budget_export['cost'];
//  irregular end

*/
   $total_amount=$msum;//+$ssum+$irregular+$otherregular;

  //  print_r($finance_export);exit;


  
      ////////////////// google api sheet /////////////

      $this->load->library('Gapi');
       // print_r($finance_export);exit;
      foreach ($finance_export as $fe) {

       // print_r($fe);exit;
        $val_to_sheet=array($fe['year'],$fe['month'],$fe['ID'],$fe['label'],$fe['type'],$fe['name'],$fe['state'],$fe['district'],$fe['cost'],$fe['status'],$fe['Supervisor'],$fe['phone'],$fe['pincode'],$fe['is_regular'],$fe['is_core'],$fe['cost_type'],$fe['funding_country']);


       
//print_r($val_to_sheet);exit;



for($i=0;$i<count($val_to_sheet);$i++)
{
    if($val_to_sheet[$i]==NULL)
    {
        $val_to_sheet[$i]="Not updated";
    }

}

//print_r(count($val_to_sheet));exit;
    $this->gapi->writeData_finance_export("1gAOSF0Z5a_QXmZAVe9GL3_M6OBfVpgF3n7lN5SUMslI", "finance_actual!A:Z",$val_to_sheet);

    unset($val_to_sheet);
      }
       echo "Love you jesus";
    

          //print_r($this->session->userdata());exit;

      

   }


///////////////  Missionary Report List  ///////////////////
function generate_mbudget()
    {

     
        //////////////// page setup /////////////        
          
            $page_data['page_title']="Add New Budget";
            $page_data['form_heading']="Budget Details";
              
            $page_data['page_heading']="New budget";
            $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/generate_mbudget";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
            $page_data['footer']='bk_cms/footer';
          
            $bread_crum[0]=array("link"=>base_url()."Admin2/budget_export","name"=>"Missionary Budget","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin2/generate_mbudget","name"=>"New Budget","class"=>"current");
            $page_data['bread_crums']=$bread_crum;

            $sql="select DISTINCT mp.* from missionary_partners as mp,missionary_first as mf,missionary_seven as ms where mp.mp_id=mf.mp_id and mf.missionary_id=ms.missionary_id";

            $missionary_partners=$this->Aedr_model->get_result_sql($sql);

            $page_data['mps']=$missionary_partners;
            
            $op_yes_no[1]="Yes";
            $op_yes_no[2]="No";

            $page_data['op_yes_no']=$op_yes_no;


           // print_r($page_data['mps']);exit;

            ////////////////   page definition start  /////////////////

            
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


            ////////////////   page definition end  /////////////////

            //print_r($page_data);

}


///////////////  Missionary Report List  ///////////////////
function generate_otherregular()
    {

     
        //////////////// page setup /////////////        
          
            $page_data['page_title']="Add New other regular";
            $page_data['form_heading']="Budget Details";
              
            $page_data['page_heading']="New budget";
            $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/generate_otherregular";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
            $page_data['footer']='bk_cms/footer';
          
            $bread_crum[0]=array("link"=>base_url()."Admin2/budget_export","name"=>"Missionary Budget","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin2/generate_mbudget","name"=>"New Budget","class"=>"current");
            $page_data['bread_crums']=$bread_crum;

            $sql="select DISTINCT mp.* from missionary_partners as mp,missionary_first as mf,missionary_seven as ms where mp.mp_id=mf.mp_id and mf.missionary_id=ms.missionary_id";

            $missionary_partners=$this->Aedr_model->get_result_sql($sql);

            $page_data['mps']=$missionary_partners;
            
            $op_yes_no[1]="Yes";
            $op_yes_no[2]="No";

            $option_cost_type[1]="MISSIONARY SALARY";
            $option_cost_type[2]="KINGDOM KIDS PALACE ALL COSTS";
            $option_cost_type[3]="MISC / PROJECTS";
            $option_cost_type[4]="PAULS PROJECTS";
            $option_cost_type[5]="MTC EXPANSION";
            $option_cost_type[6]="MTC RUNNING COSTS";
            $option_cost_type[7]="REPORTING TEAM";
            $option_cost_type[8]="Replication/ICT";
            $option_cost_type[9]="MISSIONARY TRAINING";
            $option_cost_type[10]="COORDINATOR TRAVEL COSTS";



            $option_cost_type_label[1]="Field workers";
            $option_cost_type_label[2]="Installation costs";
            $option_cost_type_label[3]="Childrens home";
            $option_cost_type_label[4]="Social projects";
            $option_cost_type_label[5]="Building projects and land purchase";
            $option_cost_type_label[6]="Training centre construction";
            $option_cost_type_label[7]="training centres";
            $option_cost_type_label[8]="Reporting team";
            $option_cost_type_label[9]="Replication/ICT";
            $option_cost_type_label[10]="Field training";


            $option_india_cost_type[1]="Community Development Programme";
            $option_india_cost_type[2]="work support";
            $option_india_cost_type[3]="Child welfare programme";
            $option_india_cost_type[4]="Educational Assistance";
            $option_india_cost_type[5]="Medical Assistance";
            $option_india_cost_type[6]="Rehabilitation Programme";
            $option_india_cost_type[7]="Economic Enhancement Project";
            $option_india_cost_type[8]="Staff Honerarium";
            $option_india_cost_type[9]="Social welfare program";
            $option_india_cost_type[10]="Community Develp";
            $option_india_cost_type[11]="Child welfare programe";
            $option_india_cost_type[12]="Child welsfare Programme";
            $option_india_cost_type[13]="Child Welfare Program";
            $option_india_cost_type[14]="Community Development Program";
            $option_india_cost_type[15]="Field Training";


            $sql="select * from state order by name";

            $page_data['states']=$this->Aedr_model->get_result_sql($sql);


            $page_data['op_yes_no']=$op_yes_no;
            $page_data['option_cost_type']=$option_cost_type;
            $page_data['option_cost_type_label']=$option_cost_type_label;
            $page_data['option_india_cost_type']=$option_india_cost_type;


           // print_r($page_data['mps']);exit;

            ////////////////   page definition start  /////////////////

            
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


            ////////////////   page definition end  /////////////////

            //print_r($page_data);

}

///////////////  Missionary Report List  ///////////////////
///////////////  Missionary Report List  ///////////////////
function generate_irregular()
    {

     
        //////////////// page setup /////////////        
          
            $page_data['page_title']="Add New other regular";
            $page_data['form_heading']="Budget Details";
              
            $page_data['page_heading']="New budget";
            $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/generate_irregular";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
            $page_data['footer']='bk_cms/footer';
          
            $bread_crum[0]=array("link"=>base_url()."Admin2/budget_export","name"=>"Missionary Budget","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."Admin2/generate_mbudget","name"=>"New Budget","class"=>"current");
            $page_data['bread_crums']=$bread_crum;

            $sql="select DISTINCT mp.* from missionary_partners as mp,missionary_first as mf,missionary_seven as ms where mp.mp_id=mf.mp_id and mf.missionary_id=ms.missionary_id";

            $missionary_partners=$this->Aedr_model->get_result_sql($sql);

            $page_data['mps']=$missionary_partners;
            
            $op_yes_no[1]="Yes";
            $op_yes_no[2]="No";

            $option_cost_type[1]="MISSIONARY SALARY";
            $option_cost_type[2]="KINGDOM KIDS PALACE ALL COSTS";
            $option_cost_type[3]="MISC / PROJECTS";
            $option_cost_type[4]="PAULS PROJECTS";
            $option_cost_type[5]="MTC EXPANSION";
            $option_cost_type[6]="MTC RUNNING COSTS";
            $option_cost_type[7]="REPORTING TEAM";
            $option_cost_type[8]="Replication/ICT";
            $option_cost_type[9]="MISSIONARY TRAINING";
            $option_cost_type[10]="COORDINATOR TRAVEL COSTS";



            $option_cost_type_label[1]="Field workers";
            $option_cost_type_label[2]="Installation costs";
            $option_cost_type_label[3]="Childrens home";
            $option_cost_type_label[4]="Social projects";
            $option_cost_type_label[5]="Building projects and land purchase";
            $option_cost_type_label[6]="Training centre construction";
            $option_cost_type_label[7]="training centres";
            $option_cost_type_label[8]="Reporting team";
            $option_cost_type_label[9]="Replication/ICT";
            $option_cost_type_label[10]="Field training";


            $option_india_cost_type[1]="Community Development Programme";
            $option_india_cost_type[2]="work support";
            $option_india_cost_type[3]="Child welfare programme";
            $option_india_cost_type[4]="Educational Assistance";
            $option_india_cost_type[5]="Medical Assistance";
            $option_india_cost_type[6]="Rehabilitation Programme";
            $option_india_cost_type[7]="Economic Enhancement Project";
            $option_india_cost_type[8]="Staff Honerarium";
            $option_india_cost_type[9]="Social welfare program";
            $option_india_cost_type[10]="Community Develp";
            $option_india_cost_type[11]="Child welfare programe";
            $option_india_cost_type[12]="Child welsfare Programme";
            $option_india_cost_type[13]="Child Welfare Program";
            $option_india_cost_type[14]="Community Development Program";
            $option_india_cost_type[15]="Field Training";


            $sql="select * from state order by name";

            $page_data['states']=$this->Aedr_model->get_result_sql($sql);


            $page_data['op_yes_no']=$op_yes_no;
            $page_data['option_cost_type']=$option_cost_type;
            $page_data['option_cost_type_label']=$option_cost_type_label;
            $page_data['option_india_cost_type']=$option_india_cost_type;


           // print_r($page_data['mps']);exit;

            ////////////////   page definition start  /////////////////

            
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


            ////////////////   page definition end  /////////////////

            //print_r($page_data);

}


///////////////  Missionary Report List  ///////////////////
function irregular()
    {

     
        //////////////// page setup /////////////        
          
            $page_data['page_title']="Add New other regular";
            $page_data['form_heading']="Budget Details";
              
            $page_data['page_heading']="New budget";
            $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/irregulars";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
            $page_data['footer']='bk_cms/footer';
          
            $bread_crum[0]=array("link"=>base_url()."Admin2/irregular","name"=>"Irregular","class"=>"active-trail active");
             $bread_crum[1]=array("link"=>base_url()."Admin2/generate_irregular","name"=>"New Irregular","class"=>"current");
            $page_data['bread_crums']=$bread_crum;

            
            $sql="select * from irregular";

            $irregulars=$this->Aedr_model->get_result_sql($sql);

            $page_data['irregulars']=$irregulars;
            
            $op_yes_no[1]="Yes";
            $op_yes_no[2]="No";

            $option_cost_type[1]="MISSIONARY SALARY";
            $option_cost_type[2]="KINGDOM KIDS PALACE ALL COSTS";
            $option_cost_type[3]="MISC / PROJECTS";
            $option_cost_type[4]="PAULS PROJECTS";
            $option_cost_type[5]="MTC EXPANSION";
            $option_cost_type[6]="MTC RUNNING COSTS";
            $option_cost_type[7]="REPORTING TEAM";
            $option_cost_type[8]="Replication/ICT";
            $option_cost_type[9]="MISSIONARY TRAINING";
            $option_cost_type[10]="COORDINATOR TRAVEL COSTS";



            $option_cost_type_label[1]="Field workers";
            $option_cost_type_label[2]="Installation costs";
            $option_cost_type_label[3]="Childrens home";
            $option_cost_type_label[4]="Social projects";
            $option_cost_type_label[5]="Building projects and land purchase";
            $option_cost_type_label[6]="Training centre construction";
            $option_cost_type_label[7]="training centres";
            $option_cost_type_label[8]="Reporting team";
            $option_cost_type_label[9]="Replication/ICT";
            $option_cost_type_label[10]="Field training";


            $option_india_cost_type[1]="Community Development Programme";
            $option_india_cost_type[2]="work support";
            $option_india_cost_type[3]="Child welfare programme";
            $option_india_cost_type[4]="Educational Assistance";
            $option_india_cost_type[5]="Medical Assistance";
            $option_india_cost_type[6]="Rehabilitation Programme";
            $option_india_cost_type[7]="Economic Enhancement Project";
            $option_india_cost_type[8]="Staff Honerarium";
            $option_india_cost_type[9]="Social welfare program";
            $option_india_cost_type[10]="Community Develp";
            $option_india_cost_type[11]="Child welfare programe";
            $option_india_cost_type[12]="Child welsfare Programme";
            $option_india_cost_type[13]="Child Welfare Program";
            $option_india_cost_type[14]="Community Development Program";
            $option_india_cost_type[15]="Field Training";


            $sql="select * from state order by name";

            $page_data['states']=$this->Aedr_model->get_result_sql($sql);


            $page_data['op_yes_no']=$op_yes_no;
            $page_data['option_cost_type']=$option_cost_type;
            $page_data['option_cost_type_label']=$option_cost_type_label;
            $page_data['option_india_cost_type']=$option_india_cost_type;


           // print_r($page_data['mps']);exit;

            ////////////////   page definition start  /////////////////

            
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


            ////////////////   page definition end  /////////////////

            //print_r($page_data);

}

function submit_budget($param1="")
    {
      // print_r($_POST);exit;missionaries

      if($param1=="irregular")
      {
        $insert=$_POST;
        print_r($insert);exit;

        $insert['submission_date']=date("Y-m-d");
        $insert['mp_id']=$this->session->userdata("mp_id");
               $insert['status']=1;
        $missionary_id=$this->Aedr_model->insert_id("missionary_first",$insert);

        redirect(base_url().'Admin2/add_missionary/first1/'.$missionary_id,'refresh');
         
      }

    }

 function fetch_missionary($param1='')
 {


  $mp_id=$param1;

   //echo $topic_id;
 

///*

   $sql="select * from missionary_fi/5/5/5/5/5/58 where state_id=$state_id";
    $rsts=$this->Aedr_model->get_result_sql($sql);
  $output ='<option value="0">Select District</option>';
  //  print_r($rst);

    foreach ($rsts as $rst) {
     $output .= '<option value="'.$rst['district_id'].'">'.$rst['name'].'</option>';
    }
  print_r($output);
 }

 function new_reports()
 {
        //////////////// page setup /////////////        
          
            $page_data['page_title']="Missionaries";
              $page_data['form_heading']="Upload Missionary report";
              $page_data['table_heading']="Missionaries Report List";
               $page_data['page_heading']="Missionary Report";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/newreports";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
             $page_data['footer']='bk_cms/footer';
          
            $bread_crum[0]=array("link"=>base_url()."Admin2/new_reports","name"=>"Reports to be approve","class"=>"active-trail active");
             
            $page_data['bread_crums']=$bread_crum;


            //////////////  page data start  /////////////

    $sql="select * from mp_missionary_report as mr,missionary_first as mf where  mr.is_send_approval=1  and  mf.missionary_id=mr.missionary_id order by report_date desc";

      $page_data['missionaries_lists']=$this->Aedr_model->get_result_sql($sql);
    //print_r($page_data['missionaries_lists'][0]);exit;

      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');
      $page_data['mp_by_id']=$this->Aedr_model->get_row_by_id('missionary_partners','mp_id');
      $page_data['missionary_by_id']=$this->Aedr_model->get_row_by_id('missionary_first','missionary_id');

      



            //////////////  page data end  /////////////

            
            

           // print_r($page_data['mps']);exit;

            ////////////////   page definition start  /////////////////

            
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


            ////////////////   page definition end  /////////////////

            //print_r($page_data);
 }



 function old_reports()
 {
        //////////////// page setup /////////////        
          
            $page_data['page_title']="Missionaries";
              $page_data['form_heading']="Upload Missionary report";
              $page_data['table_heading']="Missionaries Report List";
               $page_data['page_heading']="Missionary Report";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/old_report";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
             $page_data['footer']='bk_cms/footer';
          
            $bread_crum[0]=array("link"=>base_url()."Admin2/old_reports","name"=>"Reports to be approve","class"=>"active-trail active");
             
            $page_data['bread_crums']=$bread_crum;


            //////////////  page data start  /////////////

    $sql="select * from mp_missionary_report as mr,missionary_first as mf where  mr.is_send_approval=2  and  mf.missionary_id=mr.missionary_id order by report_date desc";

      $page_data['missionaries_lists']=$this->Aedr_model->get_result_sql($sql);
    //print_r($page_data['missionaries_lists'][0]);exit;

      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');
      $page_data['mp_by_id']=$this->Aedr_model->get_row_by_id('missionary_partners','mp_id');
      $page_data['missionary_by_id']=$this->Aedr_model->get_row_by_id('missionary_first','missionary_id');

      



            //////////////  page data end  /////////////

            
            

           // print_r($page_data['mps']);exit;

            ////////////////   page definition start  /////////////////

            
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


            ////////////////   page definition end  /////////////////

            //print_r($page_data);
 }

 ///////////////    Field Worker Report Starts ///////////////////////

   public function missionary_report_preview($param1='',$param2='')
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

      
        //  print_r($page_data['flash_style']);exit;
        ////////////////// page setup  ////////////////////
          $page_data['form_heading']="Upload Missionary list";
              $page_data['table_heading']="Missionaries List";
               $page_data['page_heading']="Missionarys";
              $page_data['err']="display: none";    

              $page_data['page_title']="Missionaries Profile";
              $page_data['css_file']="bk_cms/list_css";
              $page_data['page_name']="backennd/admin1/report_preview";


           
            $page_data['top_menu']="bk_cms/top_menu";
            
            $page_data['script_file']="bk_cms/script";
             $page_data['side_menu']="backennd/admin1/side_menu1";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin2/new_reports","name"=>"New Missionary Report List","class"=>"active-trail active");
            
          /////////// option data end ////////////////////////


              $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

              if($para2!=1)
              {
              
              $sql="select * from missionary_report where report_id=$report_id";
          }
          else
          {
              $sql="select * from mp_missionary_report where report_id=$report_id";
          }

              $report_data=$this->Aedr_model->get_row_sql($sql);
              $page_data['report_data']=$report_data;
           //   print_r($report_data);exit;
              $missionary_id=$report_data['missionary_id'];
              $page_data['village_details']=json_decode($report_data['village_details'],true);
             
              $page_data['prayer_points']=json_decode($report_data['prayer_points'],true);

                if($para2!=1)
              {
              
              $sql="select * from missionary_gsect where missionary_id=$missionary_id";
              $missionary_details1=$this->Aedr_model->get_row_sql($sql);
              $missionary_details1['fname']=$missionary_details1['name'];
              $missionary_details1['spouse_name']=$missionary_details1['spouse'];
              $missionary_details1['fname']=$missionary_details1['name'];
          }
          else
          {
              $sql="select * from missionary_first where missionary_id=$missionary_id";
              $missionary_details1=$this->Aedr_model->get_row_sql($sql);
          }
              

            //  $page_data['missionary_details1']=$this->Aedr_model->get_row_sql($sql);
        
          $page_data['missionary_details1']=$missionary_details1;
          $page_data['profile_data']=$missionary_details1;

          $page_data['param2']=$param2;


        ///////////////// page details ////////////////////////
            $this->load->view($page_data['css_file']);
            $this->load->view($page_data['top_menu']);
            $this->load->view( $page_data['side_menu'],$page_data);
            $this->load->view($page_data['page_name'],$page_data);
            $this->load->view('bk_cms/footer');
            $this->load->view($page_data['script_file']); 
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

   ///////////////  Missionary edit report  ///////////////////
function edit_missionary_report($param1='',$param2='')
    {

        //print_r($param1);exit;

      $report_id=$param1;
        //////////////// page setup /////////////        
          
              $page_data['page_title']="Missionary Edit Report";
              $page_data['form_heading']="Missionary Edit Report";
              $page_data['table_heading']="Report List";
               $page_data['page_heading']="Edit Missionary";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/edit_missionary_report";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin2","name"=>"Missionary Partner","class"=>"active-trail active");
           
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////
         //   $mp_id=$this->session->userdata("mp_id");


            $sql="select * from mp_missionary_report where report_id=$report_id";

      $edit_data=$this->Aedr_model->get_row_sql($sql);



      $page_data['edit_data']=$edit_data;

      $reporter_id=$edit_data['reporter_id'];

      $sql="select * from mp_reporter where reporter_id=$reporter_id";

      $page_data['reporter']=$this->Aedr_model->get_row_sql($sql);

        $mp_id=$edit_data["mp_id"];

      //print_r($edit_data);exit;

       $sql="select * from missionary_first where mp_id=$mp_id  and mrid!='' order by mrid";

      $page_data['missisonaries']=$this->Aedr_model->get_result_sql($sql);

      $page_data['prayer_points']=json_decode($edit_data['prayer_points'],true);
      $page_data['village_details']=json_decode($edit_data['village_details'],true);
     //  print_r($page_data['prayer_points']);exit;
      //print_r($page_data['village_details']);exit;
     
        
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
        //////////////////// page details end ///////////////////
      }
  //////////////////  missionary report edit  end /////////////

  function report_update()
    {   

        //print_r($_POST);exit;
      $report_id=$_POST['report_id'];
         $mp_id=$_POST['mp_id'];

          
        // $mp_name=$this->session->userdata('name');

         $sql ="select * from missionary_partners where mp_id=$mp_id";
        $mp_details= $this->Aedr_model->get_row_sql($sql);

        $mp_name=$mp_details['name'];

        $reporter_name=$_POST['name'];
        $reporter_email=$_POST['email'];
        $sql ="select * from mp_reporter where email='$reporter_email' and mp_id=$mp_id";
        $reporter_details= $this->Aedr_model->get_row_sql($sql);


        if(empty($reporter_details))
        {
            redirect(base_url()."Admin2/edit_missionary_report/".$report_id, 'refresh');
        }
        else
        {

            
            
       $year=$this->input->post('year');
          $period=$this->input->post('period');
         
       
        $missionary_id=$this->input->post('missionary_id');

         $sql ="select * from missionary_first where missionary_id=$missionary_id and mp_id=$mp_id";
       // print_r($sql);exit;
        $missionary_details= $this->Aedr_model->get_row_sql($sql);
        

         
        if(empty($missionary_details))
        {
            redirect(base_url()."Admin2/err/2", 'refresh');
        }
        else
        {

          $upload_name=$mp_name."_".$year."_R".$period."_".$missionary_details['fname'].'.jpg';

         
        $PhotoFileName=$this->upload_image('photo','report_photo',$upload_name);

       /* print_r($upload_name);exit;}}

print_r($PhotoFileName);exit;}}*/

        $upload_name=$mp_name."_".$year."_R".$period."_".$missionary_details['fname'].'.docx';
       // print_r($upload_name);exit;
        $DocFileName=$this->upload_file("reprt_doc","./uploads/missionary_report/");
        $update_data['report_date']=date('Y-m-d');  
        $update_data['missionary_id']=$missionary_details['missionary_id'];
         $update_data['report']=$this->input->post('report');


          if($DocFileName!=NULL){

         $update_data['doc_link']=base_url()."uploads/missionary_report/".$DocFileName;
       }
         
         if($PhotoFileName!=NULL)
          {
         $update_data['photo_link']=$PhotoFileName;
         }


          
         $prayer_points=array();
        array_push($prayer_points,$this->input->post('pr1'));
        array_push($prayer_points,$this->input->post('pr2'));
        array_push($prayer_points,$this->input->post('pr3'));
            if($this->input->post('pr4')!='')
            {
                array_push($prayer_points,$this->input->post('pr4'));
            }
            if($this->input->post('pr5')!='')
            {
                array_push($prayer_points,$this->input->post('pr5'));
            }
            if($this->input->post('pr6')!='')
            {
                array_push($prayer_points,$this->input->post('pr6'));
            }
            if($this->input->post('pr7')!='')
            {
                array_push($prayer_points,$this->input->post('pr7'));
            }
            if($this->input->post('pr8')!='')
            {
                array_push($prayer_points,$this->input->post('pr8'));
            }
            if($this->input->post('pr9')!='')
            {
                array_push($prayer_points,$this->input->post('pr9'));
            }
            if($this->input->post('pr10')!='')
            {
                array_push($prayer_points,$this->input->post('pr10'));
            }

            $v=0;
            $village_details=array();           
            $v1=array();
            $v2=array();
            $v3=array();
            $v4=array();
            $v5=array();
            $v6=array();
            $v7=array();
            $v8=array();
            $v9=array();
            $v10=array();

            if($this->input->post('v1_name')!='' || $this->input->post('v1_cfprayer')!='' || $this->input->post('v1_baptisms')!='')
            {
                array_push($v1,'v1');
                array_push($v1,$this->input->post('v1_name'));
                array_push($v1,$this->input->post('v1_cfprayer'));
                array_push($v1,$this->input->post('v1_baptisms'));  

                $village_details[$v++]=$v1;                  
            }

            if($this->input->post('v2_name')!='' || $this->input->post('v2_cfprayer')!='' || $this->input->post('v2_baptisms')!='')
            {
                array_push($v2,'v2');
                array_push($v2,$this->input->post('v2_name'));
                array_push($v2,$this->input->post('v2_cfprayer'));
                array_push($v2,$this->input->post('v2_baptisms'));  

                $village_details[$v++]=$v2;                  
            }
            
            if($this->input->post('v3_name')!='' || $this->input->post('v3_cfprayer')!='' || $this->input->post('v3_baptisms')!='')
            {
                array_push($v3,'v3');
                array_push($v3,$this->input->post('v3_name'));
                array_push($v3,$this->input->post('v3_cfprayer'));
                array_push($v3,$this->input->post('v3_baptisms'));  

                $village_details[$v++]=$v3;                  
            }
            if($this->input->post('v4_name')!='' || $this->input->post('v4_cfprayer')!='' || $this->input->post('v4_baptisms')!='')
            {
                array_push($v4,'v4');
                array_push($v4,$this->input->post('v4_name'));
                array_push($v4,$this->input->post('v4_cfprayer'));
                array_push($v4,$this->input->post('v4_baptisms'));  

                $village_details[$v++]=$v4;                  
            }
            if($this->input->post('v5_name')!='' || $this->input->post('v5_cfprayer')!='' || $this->input->post('v5_baptisms')!='')
            {
                array_push($v5,'v5');
                array_push($v5,$this->input->post('v5_name'));
                array_push($v5,$this->input->post('v5_cfprayer'));
                array_push($v5,$this->input->post('v5_baptisms'));  

                $village_details[$v++]=$v5;                  
            }
            if($this->input->post('v6_name')!='' || $this->input->post('v6_cfprayer')!='' || $this->input->post('v6_baptisms')!='')
            {
                array_push($v6,'v6');
                array_push($v6,$this->input->post('v6_name'));
                array_push($v6,$this->input->post('v6_cfprayer'));
                array_push($v6,$this->input->post('v6_baptisms'));  

                $village_details[$v++]=$v6;                  
            }
            if($this->input->post('v7_name')!='' || $this->input->post('v7_cfprayer')!='' || $this->input->post('v7_baptisms')!='')
            {
                array_push($v7,'v7');
                array_push($v7,$this->input->post('v7_name'));
                array_push($v7,$this->input->post('v7_cfprayer'));
                array_push($v7,$this->input->post('v7_baptisms'));  

                $village_details[$v++]=$v7;                  
            }
            if($this->input->post('v8_name')!='' || $this->input->post('v8_cfprayer')!='' || $this->input->post('v8_baptisms')!='')
            {
                array_push($v8,'v8');
                array_push($v8,$this->input->post('v8_name'));
                array_push($v8,$this->input->post('v8_cfprayer'));
                array_push($v8,$this->input->post('v8_baptisms'));  

                $village_details[$v++]=$v8;                  
            }
            if($this->input->post('v9_name')!='' || $this->input->post('v9_cfprayer')!='' || $this->input->post('v9_baptisms')!='')
            {
                array_push($v9,'v9');
                array_push($v9,$this->input->post('v9_name'));
                array_push($v9,$this->input->post('v9_cfprayer'));
                array_push($v9,$this->input->post('v9_baptisms'));  

                $village_details[$v++]=$v9;                  
            }
            if($this->input->post('v10_name')!='' || $this->input->post('v10_cfprayer')!='' || $this->input->post('v10_baptisms')!='')
            {
                array_push($v10,'v10');
                array_push($v10,$this->input->post('v10_name'));
                array_push($v10,$this->input->post('v10_cfprayer'));
                array_push($v10,$this->input->post('v10_baptisms'));  

                $village_details[$v++]=$v10;                  
            }
            
          
        array_push($prayer_points,$this->input->post('pr1'));
        array_push($prayer_points,$this->input->post('pr2'));
        array_push($prayer_points,$this->input->post('pr3'));
            if($pr4!='')
            {
                array_push($prayer_points,$this->input->post('pr4'));
            }

           // print_r($reporter_details);exit;
          $update_data['prayer_points']=json_encode($prayer_points);
          $update_data['village_details']=json_encode($village_details);
          $update_data['reporter_id']=$reporter_details['reporter_id'];
          $update_data['report_year']=$this->input->post('year');
          $update_data['report_period']=$this->input->post('period');


          
         $where ="report_id=".$report_id;

        $this->Aedr_model->update('mp_missionary_report',$where,$update_data);
          

       

    
      }
    }
      //print_r("updated successfully");exit;
          redirect(base_url().'Admin2/edit_missionary_report/'.$report_id,'refresh');
    }




function upload_file($name,$upload_path)
    {

        
                        $config['upload_path'] = $upload_path;
                        $config['overwrite']=true;
                         
                        $config['allowed_types'] = 'doc|docx|png|jpeg|jpg|gif|rtf';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);



                        if (!is_dir('uploads'))
                        {
                            mkdir('./uploads', 0777, true);
                        }
                        if ($this->upload->do_upload($name))
                        { 
                            $data = $this->upload->data();
                        //    print_r($data);exit;
                            return $data['file_name'];
                             
                        }
                        else
                        {
                          //print_r($upload_path);exit;
                          // echo $this->upload->display_errors();
                           //exit;
                            return NULL;
                        }

            
    }

    function delete_missionary_report($param1="")
    {
      $report_id=$param1;
    $where ="report_id=".$report_id;
    $this->Aedr_model->delete('mp_missionary_report',$where);
    redirect(base_url() . 'Admin2/missionary_reports/delete', 'refresh');
  }

  function delete_gsect_missionary_report($param1="")
    {
      $report_id=$param1;
    $where ="report_id=".$report_id;
    $this->Aedr_model->delete('missionary_report',$where);
    redirect(base_url() . 'Admin2/gsect_new_reports', 'refresh');
  }



   //////// file upload method start //////////

   function upload_image($filename,$folder_name,$upload_name)
    {
       
    ///////////// file upload ////////////////////
      // print_r($upload_name);exit;
     $config['upload_path'] = './uploads/'.$folder_name;
        $config['file_name']=$upload_name;
        $config['allowed_types'] = 'doc|docx|png|jpeg|jpg|gif|rtf';
        $config['max_size'] = '1000000';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
       if (!$this->upload->do_upload($filename))
        {
              
        $error = array('error' => $this->upload->display_errors());

        //print_r($error);exit;

         return NULL;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());  

            $file_name=$this->upload->data('file_name');

            return $file_name;
        }

  }
//////////////////  send to google sheet //////////////
 function send_to_googlesheet($param1="")
    {
        $this->load->library('Gapi');
      $report_id=$param1;
      $update_data['is_send_approval']=2;

      $sql="select * from mp_missionary_report where report_id=$report_id";
      $report_data=$this->Aedr_model->get_row_sql($sql);



      if($report_data['is_send_approval']==1)
      {
        $where ="report_id=".$report_id;

        $this->Aedr_model->update('mp_missionary_report',$where,$update_data);

        $mp_by_id=$this->Aedr_model->get_row_by_id('missionary_partners','mp_id');
        $missionary_by_id=$this->Aedr_model->get_row_by_id('missionary_first','missionary_id');
        

        $sql="select * from mp_missionary_report where report_id=$report_id";
      $report_data=$this->Aedr_model->get_row_sql($sql);

     

        $village_details=json_decode($report_data['village_details'],true);

        $v1n=$village_details[0][2];
        $v1b=$village_details[0][3];
        $v2n=$village_details[1][2];
        $v2b=$village_details[1][3];
        $v3n=$village_details[2][2];
        $v3b=$village_details[2][3];
        $v4n=$village_details[3][2];
        $v4b=$village_details[3][3];
        $v5n=$village_details[4][2];
        $v5b=$village_details[4][3];
        $v6n=$village_details[5][2];
        $v6b=$village_details[5][3];

        $attending=$v1n+$v2n+$v3n+$v4n+$v5n+$v6n;
        $batised=$v1b+$v2b+$v3b+$v4b+$v5b+$v6n;
        $count_village=0;
        $count_church=0;
        if($v1n>1){
            $count_village++;
        }
        if($v2n>1){
            $count_village++;
        }
        if($v3n>1){
            $count_village++;
        }
        if($v4n>1){
            $count_village++;
        }
        if($v5n>1){
            $count_village++;
        }
        if($v6n>1){
            $count_village++;
        }

        if($v1b>=10){
            $count_church++;
        }
        if($v2b>=10){
            $count_church++;
        }
        if($v3b>=10){
            $count_church++;
        }
        if($v4b>=10){
            $count_church++;
        }
        if($v5b>=10){
            $count_church++;
        }
        if($v6b>=10){
            $count_church++;
        }
       

       $val_to_sheet=array(date('d-m-Y'),$mp_by_id[$report_data['mp_id']]["name"],$missionary_by_id[$report_data['missionary_id']]["fname"],$missionary_by_id[$report_data['missionary_id']]["mrid"],$report_data['report_year'],"R".$report_data['report_period'],$v1n,$v1b,$v2n,$v2b,$v3n,$v3b,$v4n,$v4b,$v5n,$v5b,$v6n,$v6b,$attending,$batised,$count_village,$count_church);
       for($i=0;$i<count($val_to_sheet);$i++)
        {
            if($val_to_sheet[$i]==NULL)
            {
                $val_to_sheet[$i]=0;
            }

        }
        $this->gapi->writeData_reportCatcher("1738Xyi21in-IwAOF32EoQH7mXzUQ9S-63M9UU8wRhb4", "fromwebsite!A:W",$val_to_sheet);
        echo "successfully Added in the sheet";

      }
      else
      {
        echo "Error";
      //   redirect(base_url()."Admin2/missionary_report_preview/".$report_id."/1", 'refresh');
      }
      
      


    }

    function approved_reports()
 {
        //////////////// page setup /////////////        
          
            $page_data['page_title']="Missionaries";
              $page_data['form_heading']="Upload Missionary report";
              $page_data['table_heading']="Missionaries Report List";
               $page_data['page_heading']="Missionary Report";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/approvedreports";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
             $page_data['footer']='bk_cms/footer';
          
            $bread_crum[0]=array("link"=>base_url()."Admin2/new_reports","name"=>"Reports to be approve","class"=>"active-trail active");
             
            $page_data['bread_crums']=$bread_crum;


            //////////////  page data start  /////////////

    $sql="select * from mp_missionary_report as mr,missionary_first as mf where mr.is_send_approval=2 and mf.missionary_id=mr.missionary_id order by report_date desc";

      $page_data['missionaries_lists']=$this->Aedr_model->get_result_sql($sql);
    //print_r($page_data['missionaries_lists'][0]);exit;

      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');
      $page_data['missionary_by_id']=$this->Aedr_model->get_row_by_id('missionary_first','missionary_id');

      



            //////////////  page data end  /////////////

            
            

           // print_r($page_data['mps']);exit;

            ////////////////   page definition start  /////////////////

            
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


            ////////////////   page definition end  /////////////////

            //print_r($page_data);
 }

 function gsect_new_reports()
 {
        //////////////// page setup /////////////        
          
            $page_data['page_title']="Missionaries";
              $page_data['form_heading']="Upload Missionary report";
              $page_data['table_heading']="Missionaries Report List";
               $page_data['page_heading']="Missionary Report";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/gsect_newreports";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
             $page_data['footer']='bk_cms/footer';
          
            $bread_crum[0]=array("link"=>base_url()."Admin2/new_reports","name"=>"Reports to be approve","class"=>"active-trail active");
             
            $page_data['bread_crums']=$bread_crum;


            //////////////  page data start  /////////////

    $sql="select * from missionary_report as mr,missionary_gsect as mf where  mr.is_send_approval=2  and  mf.missionary_id=mr.missionary_id order by report_date desc";

      $page_data['missionaries_lists']=$this->Aedr_model->get_result_sql($sql);
  // print_r($page_data['missionaries_lists'][0]);exit;

      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');
      $page_data['mp_by_id']=$this->Aedr_model->get_row_by_id('missionary_partners','mp_id');
      $page_data['missionary_by_id']=$this->Aedr_model->get_row_by_id('missionary_gsect','missionary_id');


            //////////////  page data end  /////////////

            
            

           // print_r($page_data['mps']);exit;

            ////////////////   page definition start  /////////////////

            
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


            ////////////////   page definition end  /////////////////

            //print_r($page_data);
 }

 

 function gsect_old_reports()
 {
        //////////////// page setup /////////////        
          
            $page_data['page_title']="Missionaries";
              $page_data['form_heading']="Upload Missionary report";
              $page_data['table_heading']="Missionaries Report List";
               $page_data['page_heading']="Missionary Report";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/old_report";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
             $page_data['footer']='bk_cms/footer';
          
            $bread_crum[0]=array("link"=>base_url()."Admin2/old_reports","name"=>"Reports to be approve","class"=>"active-trail active");
             
            $page_data['bread_crums']=$bread_crum;


            //////////////  page data start  /////////////

    $sql="select * from mp_missionary_report as mr,missionary_first as mf where  mr.is_send_approval=2  and  mf.missionary_id=mr.missionary_id order by report_date desc";

      $page_data['missionaries_lists']=$this->Aedr_model->get_result_sql($sql);
    //print_r($page_data['missionaries_lists'][0]);exit;

      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');
      $page_data['mp_by_id']=$this->Aedr_model->get_row_by_id('missionary_partners','mp_id');
      $page_data['missionary_by_id']=$this->Aedr_model->get_row_by_id('missionary_first','missionary_id');

      



            //////////////  page data end  /////////////

            
            

           // print_r($page_data['mps']);exit;

            ////////////////   page definition start  /////////////////

            
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


            ////////////////   page definition end  /////////////////

            //print_r($page_data);
 }

 public function gsect_generate_fw_report($param1='')
    {
      
        $report_id=1;
        if($param1<=0)
        {
           redirect(base_url().'Report/','refresh');
        }
        else
        {
          $report_id=$param1;
        }

        
        /////////// data start /////////////////
         $where ="report_id=".$report_id;
            $report= $this->Aedr_model->get_row('missionary_report',$where);
        $where ="reporter_id=".$report['reporter_id'];
            $reporter= $this->Aedr_model->get_row('reporter',$where);

        // print_r($reporter);exit;
  //print_r($param1);exit;

            $missionary_by_id=$this->Aedr_model->get_row_by_id('missionary_gsect','missionary_id');
            $state_by_id=$this->Aedr_model->get_row_by_id('state','state_id');

            $mstate_id=$missionary_by_id[$report['missionary_id']]['state_id'];
           // print_r($mstate_id);exit;

          

        /////////////////// data end //////////////
           // print_r($missionary['name']);exit;
            $missionary=$missionary_by_id[$report['missionary_id']];
            $mid=$missionary_by_id[$report['missionary_id']]['id'];
       $data['village_details']=json_decode($report['village_details'],true);
       $data['report_year']=$report['report_year'];
        $data['report_period']=$report['report_period'];

        $data['missionary_name']=$missionary['name'];
        $data['dob']=$missionary['dob'];
        $data['photo']="./".trim($missionary['photo'],base_url());
        $data['spouse']=$missionary['spouse'];


        // print_r($state_by_id[$mstate_id]['name']);exit;
        $data['state']=$state_by_id[$mstate_id]['name'];
        $data['report']=$report['report'];

        $data['prayer_points']=json_decode($report['prayer_points'],true);
        $data['photo_link']=$report['photo_link'];
        $data['doc_link']=$report['doc_link'];
        $data['title']="Missionary Reports &ndash; &nbsp;" .date('M',strtotime($report['report_date'])).",".date('Y',strtotime($report['report_date']));     

        $filename=$mid."_".date('M',strtotime($report['report_date']))."_".date('Y',strtotime($report['report_date']));

        
 ////////////////////// google api sheet //////////////////////
        $this->load->library('Pdf');
        $html = $this->load->view('ncm_report_pdf', $data, true);
       $this->pdf->createPDF($html, $filename, false);
      
      
    }

    ///////////////  Missionary edit report  ///////////////////
function edit_gsect_missionary_report($param1='',$param2='')
    {

        

     $report_id=$param1;
        //////////////// page setup /////////////        
          
              $page_data['page_title']="Missionary Edit Report";
              $page_data['form_heading']="Missionary Edit Report";
              $page_data['table_heading']="Report List";
               $page_data['page_heading']="Edit Missionary";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/admin1/edit_gsect_missionary_report";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/admin1/side_menu1";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin2","name"=>"Missionary Partner","class"=>"active-trail active");
           
            $page_data['bread_crums']=$bread_crum;




     ///////////////////////  Data  //////////////////////
         //   $mp_id=$this->session->userdata("mp_id");


            $sql="select * from missionary_report where report_id=$report_id";

      $edit_data=$this->Aedr_model->get_row_sql($sql);

      
      $page_data['edit_data']=$edit_data;

      $reporter_id=$edit_data['reporter_id'];

      $sql="select * from reporter where reporter_id=$reporter_id";

      $page_data['reporter']=$this->Aedr_model->get_row_sql($sql);

      //  $mp_id=$edit_data["mp_id"];

      //print_r($edit_data);exit;

       $sql="select * from missionary_gsect";

      $page_data['missisonaries']=$this->Aedr_model->get_result_sql($sql);

      // print_r($page_data['missisonaries']);exit;


      $page_data['prayer_points']=json_decode($edit_data['prayer_points'],true);
      $page_data['village_details']=json_decode($edit_data['village_details'],true);
     //  print_r($page_data['prayer_points']);exit;
      //print_r($page_data['village_details']);exit;
     
        
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
        //////////////////// page details end ///////////////////

        
      }
  //////////////////  missionary report edit  end /////////////


      //////////////////  missionary report edit  end /////////////

  function report_gsect_update()
    {   

        //print_r($_POST);exit;
      $report_id=$_POST['report_id'];
         $mp_id=$_POST['mp_id'];

          
       

        $reporter_name=$_POST['name'];
        $reporter_email=$_POST['email'];
        $sql ="select * from reporter where email='$reporter_email'";
        $reporter_details= $this->Aedr_model->get_row_sql($sql);


        if(empty($reporter_details))
        {
            redirect(base_url()."Admin2/edit_missionary_report/".$report_id, 'refresh');
        }
        else
        {

            
            
       $year=$this->input->post('year');
          $period=$this->input->post('period');
         
       
        $missionary_id=$this->input->post('missionary_id');

         $sql ="select * from missionary_gsect where missionary_id=$missionary_id";
       // print_r($sql);exit;
        $missionary_details= $this->Aedr_model->get_row_sql($sql);
        

         
        if(empty($missionary_details))
        {
            redirect(base_url()."Admin2/err/2", 'refresh');
        }
        else
        {

          $upload_name="gsect_".$year."_R".$period."_".$missionary_details['name'].'.jpg';

         
        $PhotoFileName=$this->upload_image('photo','report_photo',$upload_name);

       /* print_r($upload_name);exit;}}

print_r($PhotoFileName);exit;}}*/

        
        $update_data['report_date']=date('Y-m-d');  
        $update_data['missionary_id']=$missionary_details['missionary_id'];
         $update_data['report']=$this->input->post('report');


        
         if($PhotoFileName!=NULL)
          {
         $update_data['photo_link']=$PhotoFileName;
         }


          
         $prayer_points=array();
        array_push($prayer_points,$this->input->post('pr1'));
        array_push($prayer_points,$this->input->post('pr2'));
        array_push($prayer_points,$this->input->post('pr3'));
            if($this->input->post('pr4')!='')
            {
                array_push($prayer_points,$this->input->post('pr4'));
            }
            if($this->input->post('pr5')!='')
            {
                array_push($prayer_points,$this->input->post('pr5'));
            }
            if($this->input->post('pr6')!='')
            {
                array_push($prayer_points,$this->input->post('pr6'));
            }
            if($this->input->post('pr7')!='')
            {
                array_push($prayer_points,$this->input->post('pr7'));
            }
            if($this->input->post('pr8')!='')
            {
                array_push($prayer_points,$this->input->post('pr8'));
            }
            if($this->input->post('pr9')!='')
            {
                array_push($prayer_points,$this->input->post('pr9'));
            }
            if($this->input->post('pr10')!='')
            {
                array_push($prayer_points,$this->input->post('pr10'));
            }

            $v=0;
            $village_details=array();           
            $v1=array();
            $v2=array();
            $v3=array();
            $v4=array();
            $v5=array();
            $v6=array();
            $v7=array();
            $v8=array();
            $v9=array();
            $v10=array();

            if($this->input->post('v1_name')!='' || $this->input->post('v1_cfprayer')!='' || $this->input->post('v1_baptisms')!='')
            {
                array_push($v1,'v1');
                array_push($v1,$this->input->post('v1_name'));
                array_push($v1,$this->input->post('v1_cfprayer'));
                array_push($v1,$this->input->post('v1_baptisms'));  

                $village_details[$v++]=$v1;                  
            }

            if($this->input->post('v2_name')!='' || $this->input->post('v2_cfprayer')!='' || $this->input->post('v2_baptisms')!='')
            {
                array_push($v2,'v2');
                array_push($v2,$this->input->post('v2_name'));
                array_push($v2,$this->input->post('v2_cfprayer'));
                array_push($v2,$this->input->post('v2_baptisms'));  

                $village_details[$v++]=$v2;                  
            }
            
            if($this->input->post('v3_name')!='' || $this->input->post('v3_cfprayer')!='' || $this->input->post('v3_baptisms')!='')
            {
                array_push($v3,'v3');
                array_push($v3,$this->input->post('v3_name'));
                array_push($v3,$this->input->post('v3_cfprayer'));
                array_push($v3,$this->input->post('v3_baptisms'));  

                $village_details[$v++]=$v3;                  
            }
            if($this->input->post('v4_name')!='' || $this->input->post('v4_cfprayer')!='' || $this->input->post('v4_baptisms')!='')
            {
                array_push($v4,'v4');
                array_push($v4,$this->input->post('v4_name'));
                array_push($v4,$this->input->post('v4_cfprayer'));
                array_push($v4,$this->input->post('v4_baptisms'));  

                $village_details[$v++]=$v4;                  
            }
            if($this->input->post('v5_name')!='' || $this->input->post('v5_cfprayer')!='' || $this->input->post('v5_baptisms')!='')
            {
                array_push($v5,'v5');
                array_push($v5,$this->input->post('v5_name'));
                array_push($v5,$this->input->post('v5_cfprayer'));
                array_push($v5,$this->input->post('v5_baptisms'));  

                $village_details[$v++]=$v5;                  
            }
            if($this->input->post('v6_name')!='' || $this->input->post('v6_cfprayer')!='' || $this->input->post('v6_baptisms')!='')
            {
                array_push($v6,'v6');
                array_push($v6,$this->input->post('v6_name'));
                array_push($v6,$this->input->post('v6_cfprayer'));
                array_push($v6,$this->input->post('v6_baptisms'));  

                $village_details[$v++]=$v6;                  
            }
            if($this->input->post('v7_name')!='' || $this->input->post('v7_cfprayer')!='' || $this->input->post('v7_baptisms')!='')
            {
                array_push($v7,'v7');
                array_push($v7,$this->input->post('v7_name'));
                array_push($v7,$this->input->post('v7_cfprayer'));
                array_push($v7,$this->input->post('v7_baptisms'));  

                $village_details[$v++]=$v7;                  
            }
            if($this->input->post('v8_name')!='' || $this->input->post('v8_cfprayer')!='' || $this->input->post('v8_baptisms')!='')
            {
                array_push($v8,'v8');
                array_push($v8,$this->input->post('v8_name'));
                array_push($v8,$this->input->post('v8_cfprayer'));
                array_push($v8,$this->input->post('v8_baptisms'));  

                $village_details[$v++]=$v8;                  
            }
            if($this->input->post('v9_name')!='' || $this->input->post('v9_cfprayer')!='' || $this->input->post('v9_baptisms')!='')
            {
                array_push($v9,'v9');
                array_push($v9,$this->input->post('v9_name'));
                array_push($v9,$this->input->post('v9_cfprayer'));
                array_push($v9,$this->input->post('v9_baptisms'));  

                $village_details[$v++]=$v9;                  
            }
            if($this->input->post('v10_name')!='' || $this->input->post('v10_cfprayer')!='' || $this->input->post('v10_baptisms')!='')
            {
                array_push($v10,'v10');
                array_push($v10,$this->input->post('v10_name'));
                array_push($v10,$this->input->post('v10_cfprayer'));
                array_push($v10,$this->input->post('v10_baptisms'));  

                $village_details[$v++]=$v10;                  
            }
            
          
        array_push($prayer_points,$this->input->post('pr1'));
        array_push($prayer_points,$this->input->post('pr2'));
        array_push($prayer_points,$this->input->post('pr3'));
            if($pr4!='')
            {
                array_push($prayer_points,$this->input->post('pr4'));
            }

           // print_r($reporter_details);exit;
          $update_data['prayer_points']=json_encode($prayer_points);
          $update_data['village_details']=json_encode($village_details);
          $update_data['reporter_id']=$reporter_details['reporter_id'];
          $update_data['report_year']=$this->input->post('year');
          $update_data['report_period']=$this->input->post('period');


          
         $where ="report_id=".$report_id;

        $this->Aedr_model->update('missionary_report',$where,$update_data);
          

       

    
      }
    }
      //print_r("updated successfully");exit;
          redirect(base_url().'Admin2/edit_gsect_missionary_report/'.$report_id,'refresh');
    }


}

?>