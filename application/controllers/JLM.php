<?php 

class JLM extends CI_Controller
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
            $page_data['page_name']="jlm_missionary_entry";
           
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

         $sql ="select * from missionary where id='$missionary_id'";
       // print_r($sql);exit;
        $missionary_details= $this->Aedr_model->get_row_sql($sql);

        if(empty($missionary_details))
        {
            redirect(base_url()."Report/err/2", 'refresh');
        }
        else
        {

        $DocFileName=$this->upload_file("reprt_doc","./uploads/missionary_report/");
         $PhotoFileName=$this->upload_file("photo","./uploads/missionary_report/");

        $fname=$this->input->post('fname');
        $surename=$this->input->post('surename'); 
        $state_id=$this->input->post('state_id');

        $insert['report_date']=date('Y-m-d');  
        $insert['missionary_id']=$missionary_details['missionary_id'];
         $insert['report']=$this->input->post('report');
         $insert['doc_link']=base_url()."uploads/missionary_report/".$DocFileName;
         
         if($PhotoFileName!=NULL)
          {
         $insert['photo_link']=base_url()."uploads/missionary_report/".$PhotoFileName;
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
          $insert['prayer_points']=json_encode($prayer_points);
          $insert['village_details']=json_encode($village_details);
          $insert['reporter_id']=$reporter_details['reporter_id'];
          $insert['report_year']=$this->input->post('year');
          $insert['report_period']=$this->input->post('class');
          $insert['status']=1;
          $insert['is_send']=0;

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
                $this->Aedr_model->update('missionary',$where,$update);
                //echo "Success";exit;
          }
        //  $update['spouse']=
      }
    }
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

            $missionary_by_id=$this->Aedr_model->get_row_by_id('missionary','missionary_id');
            $state_by_id=$this->Aedr_model->get_row_by_id('state','state_id');

            //print_r($missionary_by_id[$report['missionary_id']]['name']);exit;

          

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
        $data['state']=$state_by_id[$missionary_by_id[$report['missionary_id']]['state_id']]['name'];
        $data['report']=$report['report'];

        $data['prayer_points']=json_decode($report['prayer_points'],true);
        $data['photo_link']=$report['photo_link'];
        $data['doc_link']=$report['doc_link'];
        $data['title']="Missionary Reports &ndash; &nbsp;" .date('M',strtotime($report['report_date'])).",".date('Y',strtotime($report['report_date']));     

        $filename=$mid."_".date('M',strtotime($report['report_date']))."_".date('Y',strtotime($report['report_date']));

        

////////////////// google api sheet /////////////

       $this->load->library('Gapi');
        

        
       $report_period=$data['report_year']." R".$data['report_period'];


       $val_to_sheet=array(date('d-m-Y',strtotime($report['report_date'])),$reporter['name'],$report_period,$mid,$data['missionary_name'],$data['report'],$report['village_details'],implode(',',$data['prayer_points']),$data['photo_link'],$data['doc_link']);
     // print_r($val_to_sheet);exit;

    $this->gapi->writeData_uploadCatcher("1Vcwj46Cl3bIUhUbw7sYVU7QzgzMkJZgT4wt_6XM3u9g", "reportcatcher!A:J",$val_to_sheet);

   //exit;
       //print_r($result);exit;

 ////////////////////// google api sheet //////////////////////
        $this->load->library('Pdf');
        $html = $this->load->view('fw_report', $data, true);
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
}

?>