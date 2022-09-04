<?php 

class Report extends CI_Controller
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


     function report_submission()
    {   
     //print_r($_POST['pr7']);exit;
      
        $MPhotoFileName=$this->upload_file("misssionary_photo","./uploads/missionary/");

        $reporter_name=$this->input->post('name');
        $reporter_email=$this->input->post('email');

        $sql ="select * from reporter where name='$reporter_name'";
       // print_r($sql);exit;
        $reporter_details= $this->Aedr_model->get_row_sql($sql);

        if(empty($reporter_details))
        {
            redirect(base_url()."Report/err/1", 'refresh');
        }
        else
        {
        
        $year=$this->input->post('year');
        $period=$this->input->post('period');
        
        $missionary_id=$this->input->post('missionary_id');

         $sql ="select * from missionary_gsect where id='$missionary_id'";
       // print_r($sql);exit;
        $missionary_details= $this->Aedr_model->get_row_sql($sql);

        if(empty($missionary_details))
        {
            redirect(base_url()."Report/err/2", 'refresh');
        }
        else
        {

        //$DocFileName=$this->upload_file("reprt_doc","./uploads/missionary_report/");
         $PhotoFileName=$this->upload_file("photo","./uploads/missionary_report/");

        $fname=$this->input->post('fname');
        $surename=$this->input->post('surename'); 
        $state_id=$this->input->post('state_id');

        $insert['report_date']=date('Y-m-d');  
        $report_date=$insert['report_date'];
        $insert['missionary_id']=$missionary_details['missionary_id'];
         $insert['report']=$this->input->post('report');
         $insert['doc_link']=base_url()."uploads/missionary_report/".$DocFileName;
         
         if($PhotoFileName!=NULL)
          {
         $insert['photo_link']="./uploads/missionary_report/".$PhotoFileName;
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
            
          
        

         //  print_r($prayer_points);exit;
          $insert['prayer_points']=json_encode($prayer_points);
          $insert['village_details']=json_encode($village_details);
          $insert['reporter_id']=$reporter_details['reporter_id'];
          $insert['report_year']=$this->input->post('year');
          $insert['report_period']=$this->input->post('class');
          $insert['status']=1;
          $insert['is_send']=0;
          $insert['is_send_approval']=1;

          //print_r($insert);exit;
          $report_id=$this->Aedr_model->insert_id("missionary_report",$insert);
        //print_r($missionary_details);exit;

    if($this->input->post('missionary_spouse_name')!=NULL)
          {
            $update['spouse']=$this->input->post('missionary_spouse_name');
          }
         // print_r($this->input->post('mission_dob'));
      if(!empty($this->input->post('mission_dob')))
          {
            $update['dob']=date('Y-m-d',strtotime($this->input->post('mission_dob')));
          }

          if($MPhotoFileName!=NULL)
          {
            $update['photo']=base_url()."uploads/missionary/".$MPhotoFileName;
          }

        //  print_r($update);exit;
          if(!empty($update))
          {

            $where ="missionary_id=".$missionary_details['missionary_id'];
                $this->Aedr_model->update('missionary_gsect',$where,$update);
                //echo "Success";exit;
          }
        //  $update['spouse']=
      }
    }

  //  print_r($this->input->post('mission_dob'));
    //print_r($update);exit;
   // http://localhost/the500k/Report/generate_fw_report/9

   $filename=base_url()."Report/generate_fw_report/".$report_id;

   $this->load->library('Gapi');

  $val_to_sheet=array(date('d-m-Y'),$reporter_name,$reporter_email,$filename,$missionary_details['name'],$missionary_details['id'],$v1[1],$v1[2],$v1[3],$v2[1],$v2[2],$v2[3],$v3[1],$v3[2],$v3[3],$v4[1],$v4[2],$v4[3],$v5[1],$v5[2],$v5[3],$v6[1],$v6[2],$v6[3],$v7[1],$v7[2],$v7[3],$v8[1],$v8[2],$v8[3],$v9[1],$v9[2],$v9[3],$v10[1],$v10[2],$v10[3],$insert['report'],$prayer_points[0],$prayer_points[1],$prayer_points[2],$prayer_points[3],$prayer_points[4],$prayer_points[5],$prayer_points[6],$prayer_points[7],$year,"R".$insert['report_period']);


       

//print_r(count($val_to_MSsheet));exit;


for($i=0;$i<count($val_to_sheet);$i++)
{
    if($val_to_sheet[$i]==NULL)
    {
        $val_to_sheet[$i]="Not updated";
    }

}


//print_r($val_to_sheet);exit;
$this->gapi->writeData_gsect_report("1XIq4o1YQmi3Yfn_6mfT85UimcOFrzCca8hI0wFM7Rt8", "catcher!A:AU",$val_to_sheet);


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
                            <title>Missionary Report Has been uploaded successfully</title>
                        </head>
                        <body>
                            <h2>Dear Team,</h2>
                            <p><b>Missionary Report Has been uploaded successfully</b> ".$missionary_details['missionary_id']."</p>
                           
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
  /*   else
    {
     show_error($this->email->print_debugger());
    }
*/




          redirect(base_url().'Report/generate_fw_report/'.$report_id,'refresh');
    }

///////////////////////// pdf generation ////////////////

  public function generate_fw_report($param1='')
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

    function upload_file($name,$upload_path)
    {

        //echo "Hi";exit;
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
                            return $data['file_name'];
                             
                        }
                        else
                        {
                           // echo $this->upload->display_errors();
                            return false;
                        }

            
    }

    /////////////////// Retirement Report Form ///////////////
 function retirement_report()
    { 
         //   $page_data['disp_err']="display: none";
        //$page_data['err_msg']="";
            $page_data['page_name']="retirement_report";
           
        ///////////////// page details   //////////////////////
         
        ///////////////////// Data Fetching ////////////////

        $page_data['states']=$this->Aedr_model->get_list('state');

        ///////////////////////////////////////////////////   

        $this->load->view($page_data['page_name'],$page_data);
               

    }
  ///////////////Retirement Report Form End ///////////////////
    function retire_report_submission()
    {   
      
       // print_r($_POST);exit;
      
        $reporter_name=$this->input->post('name');
        $reporter_email=$this->input->post('email');

        $sql ="select * from reporter where name='$reporter_name'";
       // print_r($sql);exit;
        $reporter_details= $this->Aedr_model->get_row_sql($sql);

        if(empty($reporter_details))
        {
            redirect(base_url()."Report/err/1", 'refresh');
        }
        else
        {
                
        $missionary_id=$this->input->post('missionary_id');

         $sql ="select * from missionary where id='$missionary_id'";
       // print_r($sql);exit;
        $missionary_details= $this->Aedr_model->get_row_sql($sql);

        if(empty($missionary_details))
        {
            redirect(base_url()."Report/err/2", 'refresh');
        }
        else
        {

        

        $fname=$this->input->post('fname');
        $surename=$this->input->post('surename'); 
        $state_id=$this->input->post('state_id');
        $insert['reporter_id']=$reporter_details['reporter_id'];
        $insert['rdate']=date('Y-m-d',strtotime($this->input->post('rdate')));
        $insert['missionary_id']=$missionary_details['missionary_id'];
         $insert['report']=$this->input->post('report');
         $insert['fi_deadline']=$this->input->post('fi_deadline');
         $insert['winning_status']=$this->input->post('winning_status');
         $insert['reason_for_retirement']=$this->input->post('reason_for_retirement');
         $insert['now_fw_doing']=$this->input->post('now_fw_doing');
         $insert['now_fw_supporting']=$this->input->post('now_fw_supporting');
         $insert['reason_not_submitting_report']=$this->input->post('reason_not_submitting_report');
         $insert['mission_field_status']=$this->input->post('mission_field_status');
         $insert['comment']=$this->input->post('comment');
         $insert['detailed_commentory']=$this->input->post('detailed_commentory');
         $insert['ms_score']=$this->input->post('ms_score');
         $insert['reason_msscore']=$this->input->post('reason_msscore');
         $insert['cp_score']=$this->input->post('cp_score');
         $insert['reason_cpscore']=$this->input->post('reason_cpscore');
         $insert['ru_score']=$this->input->post('ru_score');
         $insert['reason_ruscore']=$this->input->post('reason_ruscore');

          $report_id=$this->Aedr_model->insert_id("missionary_retirement",$insert);

          $this->load->library('Gapi');
        

       $val_to_sheet=array($fname,$surename,$missionary_id,$insert['rdate'],$reporter_name,$insert['fi_deadline'],$insert['winning_status'],$insert['reason_for_retirement'],$insert['now_fw_doing'],$insert['now_fw_supporting'],$insert['reason_not_submitting_report'],$insert['mission_field_status'],$insert['comment'],$insert['detailed_commentory'],$insert['ms_score'],$insert['reason_msscore'],$insert['cp_score'],$insert['reason_cpscore'],$insert['ru_score'],$insert['reason_ruscore'],$insert['report']);
     // print_r($val_to_sheet);exit;

    $this->gapi->writeData_retirementReport("1-qYInCMYeZb3qzNThnmXP_F8yiNd5EalDI4HIpS0_LM", "report_catcher!A:T",$val_to_sheet);



          echo "Success";exit;
        //print_r($missionary_details);exit;

        //  $update['spouse']=
      }
    }
          redirect(base_url().'Report/generate_fw_report/'.$report_id,'refresh');
    }

 /*    function readsheet($missionary_id,$val_to_sheet)
    {
      $this->load->library('Gapi');  
      $retirement_details=$this->gapi->readSheet("1-qYInCMYeZb3qzNThnmXP_F8yiNd5EalDI4HIpS0_LM", "report_catcher!A:T");
      foreach($retirement_details as $rdetail)
      {
            $missionary 
      }

      print_r($value[1]);

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
     if(!empty($bresult)){
        $year_result[$yr]['bestresult']=$bresult;
     }
     


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

        redirect(base_url().'Report/mstatsdashboard/'.$rid,'refresh');

}
function mstatsdashboard($param1=''){

  $rid=$param1;

  $sql="select * from analysis where id=$rid";
  $reportResult=$this->Aedr_model->get_row_sql($sql);
  $year_result=json_decode($reportResult['data1'],true);

  //print_r($year_result[2017]);exit;

  $sql="select id from gsect_msupport";
  $gsectResultids=$this->Aedr_model->get_result_sql($sql);

  $gsect_ids=array();

  foreach ($gsectResultids as $gsectResult) {
    
      array_push($gsect_ids, $gsectResult['id']);
  }

 

    foreach ($gsect_ids as $gsect_id) {
 
            
        $bresult=$year_result[2021]['bestresult'][$gsect_id];

       // print_r($bresult['TA61NC']);exit;
       if(!empty($bresult))
        {
          
          $latest_value[$gsect_id]=array("year"=>2021,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
           continue;
        }

        $bresult=$year_result[2020]['bestresult'][$gsect_id];

       if(!empty($bresult))
        {

           $latest_value[$gsect_id]=array("year"=>2020,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
           /*print_r($latest_value);
           print_r($bresult);exit;*/
           continue;
        }

        $bresult=$year_result[2019]['bestresult'][$gsect_id];
       if(!empty($bresult))
        {
           $latest_value[$gsect_id]=array("year"=>2019,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
           continue;
           
        }
        $bresult=$year_result[2018]['bestresult'][$gsect_id];
       if(!empty($bresult))
        {
           $latest_value[$gsect_id]=array("year"=>2018,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
           continue;
           
        }
        $bresult=$year_result[2017]['bestresult'][$gsect_id];
       if(!empty($bresult))
        {
           $latest_value[$gsect_id]=array("year"=>2017,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
          // continue;
           
        }
    }

    $lsum_attending=0;
    $lno_village=0;
    $lno_church=0;
    $lsum_baptised=0;



 foreach ($latest_value as $latest) {
      
     // print_r($latest);exit;
      $lsum_attending=$lsum_attending+$latest['sum_attanding'];
      $lno_village=$lno_village+$latest['no_village'];
      $lno_church=$lno_church+$latest['no_church'];
      $lsum_baptised=$lsum_baptised+$latest['sum_baptised'];

    //  print_r($latest);exit;
 }

 $page_data['latest_result']=$latest_value;

 $sql="select count(*) as total_retired from gsect_msupport where status='retired'";
  $latest_retired=$this->Aedr_model->get_row_sql($sql);

$sql="select count(*) as total_fw from gsect_msupport";
  $latest_totalfw=$this->Aedr_model->get_row_sql($sql);

  


  

 $page_data['latest_retired']=$latest_retired['total_retired'];
 $page_data['total_fw']=$latest_totalfw['total_fw'];
 $page_data['total_live']=$latest_totalfw['total_fw']-$latest_retired['total_retired'];
 

 $page_data['lsum_attending']=$lsum_attending;
 $page_data['lno_village']=$lno_village;
 $page_data['lno_church']=$lno_church;
 $page_data['lsum_baptised']=$lsum_baptised;
 $page_data['missionary_by_id']=$this->Aedr_model->get_row_by_id('gsect_msupport','id');



  //print_r($page_data['missionary_by_id']['TA61NC']['name']);exit;

  ////////////////  chart data start //////////////////////

  //$chart_data[]=array("Year","Fw Support","New Fw","Graduated Fw","Attending worship","Baptised church members","Villages wordwrap(str)               ith worship groups","Established churches");
  //$chart_data[]=array("Year","Fw Support","New Fw","Graduated Fw");
  $chart_data[]=array("Category","2017","2018","2019","2020","2021");
  $chart_data[]=array("Fw Support",intval($year_result[2017]['fw_support_currently']-$year_result[2017]['fw_retired_total']),intval($year_result[2018]['fw_support_currently']-$year_result[2018]['fw_retired_total']),intval($year_result[2019]['fw_support_currently']-$year_result[2019]['fw_retired_total']),intval($year_result[2020]['fw_support_currently']-$year_result[2020]['fw_retired_total']),intval($page_data['total_live']));
  $chart_data[]=array("New Fw",intval($year_result[2017]['fw_new']),intval($year_result[2018]['fw_new']),intval($year_result[2019]['fw_new']),intval($year_result[2020]['fw_new']),intval($year_result[2021]['fw_new']));
  
  $chart_data[]=array("Graduated Fw",intval($year_result[2017]['fw_retired_total']),intval($year_result[2018]['fw_retired_total']),intval($year_result[2019]['fw_retired_total']),intval($year_result[2020]['fw_retired_total']),intval($year_result[2021]['fw_retired_total']));

  //print_r($year_result[2019]);exit;
  $chart_div_report[]=array("Category","2017","2018","2019","2020","2021");

  $chart_div_report[]=array("Attending worship",intval($year_result[2017]['total_attending']),intval($year_result[2018]['total_attending']),intval($year_result[2019]['total_attending']),intval($year_result[2020]['total_attending']),intval($page_data['lsum_attending']));
  $chart_div_report[]=array("Baptised church members",intval($year_result[2017]['total_baptised']),intval($year_result[2018]['total_baptised']),intval($year_result[2019]['total_baptised']),intval($year_result[2020]['total_baptised']),intval($page_data['lsum_baptised']));




  $chart_div_report1[]=array("Category","2017","2018","2019","2020","2021");
  $chart_div_report1[]=array("Villages with worship groups",intval($year_result[2017]['total_village']),intval($year_result[2018]['total_village']),intval($year_result[2019]['total_village']),intval($year_result[2020]['total_village']),intval($page_data['lno_village']));
  $chart_div_report1[]=array("Established churches",intval($year_result[2017]['total_church']),intval($year_result[2018]['total_church']),intval($year_result[2019]['total_church']),intval($year_result[2020]['total_church']),intval($page_data['lno_church']));

   $result123=$this->mstatsdashboard_live($rid);

 //print_r($result123);exit;

  $page_data['yrslts']=$result123['year_result'];
  $page_data['latest']=$result123['latest'];

   $other_mp_result=$this->other_missionaryParteners_import();

   $page_data['jlm']=$other_mp_result['jlm'];
   $page_data['njm']=$other_mp_result['njm'];
   $page_data['bct']=$other_mp_result['bct'];


   //print_r($other_mp_result);exit;

  // print_r($page_data['latest']);exit;
  


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
            $page_data['top_menu']="bk_cms/top_menu_report";
           $page_data['css_file']="bk_cms/list_form_css";
           $page_data['script_file']="bk_cms/script";
          //  $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
          


  

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
               $this->load->view($page_data['top_menu']);
          //      $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 


}
/////////////////  missionary stats dashboard end //////////////*/

function mstatsdashboard_live($param1=''){

  $rid=$param1;

  $sql="select * from analysis where id=$rid";
  $reportResult=$this->Aedr_model->get_row_sql($sql);

  //print_r($reportResult);exit;
  $year_result=json_decode($reportResult['data2'],true);

  //print_r($year_result[2017]);exit;

  $sql="select id from gsect_msupport where status='Live' or status='Funding Docked'";
  $gsectResultids=$this->Aedr_model->get_result_sql($sql);

  $gsect_ids=array();

//  print_r(count($gsectResultids));exit;

  foreach ($gsectResultids as $gsectResult) {
    
      array_push($gsect_ids, $gsectResult['id']);
  }

 

    foreach ($gsect_ids as $gsect_id) {
 
            
        $bresult=$year_result[2021]['bestresult'][$gsect_id];

       // print_r($bresult['TA61NC']);exit;
       if(!empty($bresult))
        {
          
          $latest_value[$gsect_id]=array("year"=>2021,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
           continue;
        }

        $bresult=$year_result[2020]['bestresult'][$gsect_id];

       if(!empty($bresult))
        {

           $latest_value[$gsect_id]=array("year"=>2020,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
           /*print_r($latest_value);
           print_r($bresult);exit;*/
           continue;
        }

        $bresult=$year_result[2019]['bestresult'][$gsect_id];
       if(!empty($bresult))
        {
           $latest_value[$gsect_id]=array("year"=>2019,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
           continue;
           
        }
        $bresult=$year_result[2018]['bestresult'][$gsect_id];
       if(!empty($bresult))
        {
           $latest_value[$gsect_id]=array("year"=>2018,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
           continue;
           
        }
        $bresult=$year_result[2017]['bestresult'][$gsect_id];
       if(!empty($bresult))
        {
           $latest_value[$gsect_id]=array("year"=>2017,"period"=>$bresult['period'],"sum_attanding"=>$bresult['sum_attanding'],"no_village"=>$bresult['no_village'],"no_church"=>$bresult['no_church'],"sum_baptised"=>$bresult['sum_baptised']);
          // continue;
           
        }
    }

    $lsum_attending=0;
    $lno_village=0;
    $lno_church=0;
    $lsum_baptised=0;



 foreach ($latest_value as $latest) {
      
     // print_r($latest);exit;
      $lsum_attending=$lsum_attending+$latest['sum_attanding'];
      $lno_village=$lno_village+$latest['no_village'];
      $lno_church=$lno_church+$latest['no_church'];
      $lsum_baptised=$lsum_baptised+$latest['sum_baptised'];

    //  print_r($latest);exit;
 }

 $page_data['latest_result']=$latest_value;

 $sql="select count(*) as total_retired from gsect_msupport where status='retired'";
  $latest_retired=$this->Aedr_model->get_row_sql($sql);

$sql="select count(*) as total_fw from gsect_msupport where status='Live' or status='Funding Docked'";
  $latest_totalfw=$this->Aedr_model->get_row_sql($sql);

  


  

 $latest['latest_retired']=$latest_retired['total_retired'];
 $latest['total_fw']=$latest_totalfw['total_fw'];
 $latest['total_live']=$latest_totalfw['total_fw'];
 

 $latest['lsum_attending']=$lsum_attending;
 $latest['lno_village']=$lno_village;
 $latest['lno_church']=$lno_church;
 $latest['lsum_baptised']=$lsum_baptised;
// $year_result['missionary_by_id']=$this->Aedr_model->get_row_by_id('gsect_msupport','id');

$result['latest']=$latest;

  //print_r($page_data['missionary_by_id']['TA61NC']['name']);exit;

  ////////////////  chart data start //////////////////////

  //$chart_data[]=array("Year","Fw Support","New Fw","Graduated Fw","Attending worship","Baptised church members","Villages wordwrap(str)               ith worship groups","Established churches");
  //$chart_data[]=array("Year","Fw Support","New Fw","Graduated Fw");
  $chart_data[]=array("Category","2017","2018","2019","2020","2021");
  $chart_data[]=array("Fw Support",intval($year_result[2017]['fw_support_currently']-$year_result[2017]['fw_retired_total']),intval($year_result[2018]['fw_support_currently']-$year_result[2018]['fw_retired_total']),intval($year_result[2019]['fw_support_currently']-$year_result[2019]['fw_retired_total']),intval($year_result[2020]['fw_support_currently']-$year_result[2020]['fw_retired_total']),intval($page_data['total_live']));
  $chart_data[]=array("New Fw",intval($year_result[2017]['fw_new']),intval($year_result[2018]['fw_new']),intval($year_result[2019]['fw_new']),intval($year_result[2020]['fw_new']),intval($year_result[2021]['fw_new']));
  
  $chart_data[]=array("Graduated Fw",intval($year_result[2017]['fw_retired_total']),intval($year_result[2018]['fw_retired_total']),intval($year_result[2019]['fw_retired_total']),intval($year_result[2020]['fw_retired_total']),intval($year_result[2021]['fw_retired_total']));

  //print_r($year_result[2019]);exit;
  $chart_div_report[]=array("Category","2017","2018","2019","2020","2021");

  $chart_div_report[]=array("Attending worship",intval($year_result[2017]['total_attending']),intval($year_result[2018]['total_attending']),intval($year_result[2019]['total_attending']),intval($year_result[2020]['total_attending']),intval($page_data['lsum_attending']));
  $chart_div_report[]=array("Baptised church members",intval($year_result[2017]['total_baptised']),intval($year_result[2018]['total_baptised']),intval($year_result[2019]['total_baptised']),intval($year_result[2020]['total_baptised']),intval($page_data['lsum_baptised']));




  $chart_div_report1[]=array("Category","2017","2018","2019","2020","2021");
  $chart_div_report1[]=array("Villages with worship groups",intval($year_result[2017]['total_village']),intval($year_result[2018]['total_village']),intval($year_result[2019]['total_village']),intval($year_result[2020]['total_village']),intval($page_data['lno_village']));
  $chart_div_report1[]=array("Established churches",intval($year_result[2017]['total_church']),intval($year_result[2018]['total_church']),intval($year_result[2019]['total_church']),intval($year_result[2020]['total_church']),intval($page_data['lno_church']));

$result['year_result']=$year_result;

return $result;


/*
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
            $page_data['top_menu']="bk_cms/top_menu_report";
           $page_data['css_file']="bk_cms/list_form_css";
           $page_data['script_file']="bk_cms/script";
          //  $page_data['side_menu']="backennd/admin/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."Admin","name"=>"Admin","class"=>"active-trail active");
          


  

    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
               $this->load->view($page_data['top_menu']);
          //      $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 

                */


}

function other_missionaryParteners_import()
{

  
  $this->load->library('Gapi');
 
  $jlm_msupports=$this->gapi->readSheet("1f6SeGCrZrGHdVNY0ixUD2Ju6t4Ycmp8V1LX8pHlvBYI", "M Support!A2:Z");

  $njm_msupports=$this->gapi->readSheet("1gqiH_6yhr-le6Jz5ZH63fue3ZNlxSIJLCHDvXAGXaIE", "M Support!A2:Z");

  $bct_msupports=$this->gapi->readSheet("1eQxddXyUrKAjTOO7FlGCiUfYLo-BI00SHoSLt3iXEuw", "M Support!A2:Z");

  
  $total_fw=0;
  $total_retired=0;
  $total_live=0;

  foreach ($jlm_msupports as $jlm) {
     if(!empty($jlm))
     {
        $total_fw++;
     }

     if($jlm[8]=="Live")
     {
        $total_live++;
     }

     if($jlm[8]=="Retired")
     {
        $total_retired++;
     }

     
  }
  $jlm_final['total_fw']=$total_fw;
  $jlm_final['total_live']=$total_live;
  $jlm_final['total_retired']=$total_retired;

  

   $total_fw=0;
  $total_retired=0;
  $total_live=0;

  foreach ($bct_msupports as $bct) {
     if(!empty($bct))
     {
        $total_fw++;
     }

     if($bct[8]=="Live")
     {
        $total_live++;
     }

     if($bct[8]=="Retired")
     {
        $total_retired++;
     }

     
  }



  $bct_final['total_fw']=$total_fw;
  $bct_final['total_live']=$total_live;
  $bct_final['total_retired']=$total_retired;

   

   $total_fw=0;
  $total_retired=0;
  $total_live=0;

  foreach ($njm_msupports as $njm) {
     if(!empty($njm))
     {
        $total_fw++;
     }

     if($njm[8]=="Live")
     {
        $total_live++;
     }

     if($njm[8]=="Retired")
     {
        $total_retired++;
     }

     
  }

  $njm_final['total_fw']=$total_fw;
  $njm_final['total_live']=$total_live;
  $njm_final['total_retired']=$total_retired;
  

   $other_mp['jlm']=$jlm_final;
   $other_mp['bct']=$bct_final;
   $other_mp['njm']=$njm_final;

  // print_r($other_mp);exit;



   return $other_mp;
 

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