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
        $this->load->model('aedr_model');
        $this->load->helper('download_helper');
    }

    function index()
    {


        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
            $data['page_name']="dashboard";
            $data['css_file']="dashboard_css.php";
            $data['script_file']="scripts.php";
            $data['side_menu']="admin_menu.php";
        $this->load->view('backend/index', $data);
    }

   ////////////////////// Manage Grade START//////////////////


    function grades($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['grade_lists']=$this->aedr_model->get_list('class');

        $page_data['class_id']="";
        $page_data['name']="";
        $page_data['name_numeric']="";
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['name_numeric']= $this->input->post('name_numeric');
            $this->aedr_model->insert('class',$data);
            redirect(base_url() . 'Admin/grades/'.$data['class_id'], 'refresh');
        }
         if ($param1 == 'do_update') 
        {
                $data['name']=$this->input->post('name');
                $data['name_numeric']=$this->input->post('name_numeric');
                $class_id=$this->input->post('grade_id');
                $where ="class_id=".$class_id;

                $this->aedr_model->update('class',$where,$data);
           
            redirect(base_url() . 'Admin/grades/'.$data['class_id'], 'refresh');
        } else if ($param1 == 'edit') {
                 $where ="class_id=".$param2;
            $edit_data= $this->aedr_model->get_row('class',$where);
            $page_data['class_id']=$edit_data['class_id'];
            $page_data['name']=$edit_data['name'];
            $page_data['name_numeric']=$edit_data['name_numeric'];
        }
        if ($param1 == 'delete') {
           
             $where ="class_id=".$param2;
            $this->aedr_model->delete('class',$where,$data);

            redirect(base_url() . 'Admin/grades/'.$param3, 'refresh');
        }
        
        ///////////////// page details ////////////////////////


           $page_data['page_name']="admin/grade";
            $page_data['css_file']="list_css.php";
            $page_data['script_file']="list_script.php";
            $page_data['side_menu']="admin_menu.php";
            $page_data['title']="Grade Details";
            $page_data['table_heading']="Grade List";





        $this->load->view('backend/index', $page_data);
    }

   ////////////////////// Manage Grade END//////////////////

    
    ////////////////////// Manage Subject START//////////////////


    function subjects($param1 = '', $param2 = '' , $param3 = '')
    {
         if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['subject_lists']=$this->aedr_model->get_list('subject');
       $page_data['grade_lists']=$this->aedr_model->get_list('class');
    $page_data['grade_by_id']=$this->aedr_model->get_row_by_id('class','class_id');

        $page_data['subject_id']="";
        $page_data['name']="";

            ////////////////// page details //////////////
 
            $page_data['page_name']="admin/subject";
            $page_data['css_file']="list_css.php";
            $page_data['script_file']="list_script.php";
            $page_data['side_menu']="admin_menu.php";
            $page_data['title']="Subject Details";
            $page_data['table_heading']="Subject List";


      
        if($param1 == 'create') {

            $data['name']       = $this->input->post('name');           
            $this->aedr_model->insert('subject',$data);
            redirect(base_url() . 'Admin/subjects/'.$data['subject_id'], 'refresh');
        }
         if ($param1 == 'do_update') 
        {
                $data['name']=$this->input->post('name');
                
                $subject_id=$this->input->post('subject_id');
                $where ="subject_id=".$subject_id;

                $this->aedr_model->update('subject',$where,$data);
           
            redirect(base_url() . 'Admin/subjects/'.$data['subject_id'], 'refresh');
        } else if ($param1 == 'edit') {
                 $where ="subject_id=".$param2;
               //  echo $param2;
            $edit_data= $this->aedr_model->get_row('subject',$where);
            $page_data['subject_id']=$edit_data['subject_id'];
            $page_data['name']=$edit_data['name'];
            
        }
        if ($param1 == 'delete') {
           
             $where ="subject_id=".$param2;
            $this->aedr_model->delete('subject',$where,$data);

            redirect(base_url() . 'Admin/subjects/', 'refresh');
        }

        if ($param1 == 'add_topic') {
            
             $where ="subject_id=".$param2;
             $page_data['topic_lists']=$this->aedr_model->get_results_array('topic',$where);
             $page_data['page_name']="admin/topic";
             $page_data['title']="Topic Details";
             $page_data['table_heading']="Topic List";

            //$where ="subject_id=".$param2;
            $edit_data= $this->aedr_model->get_row('subject',$where);

            $page_data['subject']=$edit_data;

          //  redirect(base_url() . 'Admin/subjects/', 'refresh');
        }

        if($param1 == 'create_topic') {
            $data['subject_id']=$this->input->post('subject_id');
            $data['name']=$this->input->post('topic_name');
            $data['class_id']=$this->input->post('class_id');

             print_r($data);

            if($_POST['topic_id']!='')
            {   
                $where ="topic_id=".$_POST['topic_id'];
                $this->aedr_model->update('topic',$where,$data);
            }     
           else
            $this->aedr_model->insert('topic',$data);


            redirect(base_url() . 'Admin/subjects/add_topic/'.$data['subject_id'], 'refresh');
        }
        
         if ($param1 == 'edit_topic') {

            
             $where ="topic_id=".$param2;
             $topic=$this->aedr_model->get_row('topic',$where);

             $page_data['grade_lists']=$this->aedr_model->get_list('class');

             //print_r($topic);exit;
             $subject_id=$topic['subject_id'];

             $where ="subject_id=".$subject_id;
             $page_data['topic_lists']=$this->aedr_model->get_results_array('topic',$where);

             $page_data['edit_data']=$topic;

             $page_data['page_name']="admin/edit_topic";
             $page_data['title']="Edit Topic";
             $page_data['table_heading']="Sub Topic List";

            //$where ="subject_id=".$param2;
            $edit_data= $this->aedr_model->get_row('subject',$where);

            $page_data['subject']=$edit_data;

         
        }


        if ($param1 == 'delete_topic') {
            
                $topic_id=$param2;

                $where ="topic_id=".$topic_id;
                $topic=$this->aedr_model->get_row('topic',$where);

                $subject_id=$topic['subject_id'];

                //print_r($subject_id);exit;


                $where ="topic_id=".$topic_id;
            $this->aedr_model->delete('topic',$where,$data);

            redirect(base_url() . 'Admin/subjects/add_topic/'.$subject_id, 'refresh');
        }


       ////////////////// Sub Topic  ///////////////////


        if ($param1 == 'add_sub_topic') {
            
             $where ="topic_id=".$param2;
             $page_data['sub_topic_lists']=$this->aedr_model->get_results_array('sub_topic',$where);
             $page_data['page_name']="admin/sub_topic";
             $page_data['title']="Sub Topic Details";
             $page_data['table_heading']="Sub Topic List";

            //$where ="topic_id=".$param2;
            $edit_data= $this->aedr_model->get_row('topic',$where);

            $page_data['topic']=$edit_data;

             $where ="subject_id=".$edit_data['subject_id'];

            $page_data['subject_detail']=$this->aedr_model->get_row('subject',$where);
        }

        if($param1 == 'create_sub_topic') {
            $data['topic_id']=$this->input->post('topic_id');
            $data['name']=$this->input->post('sub_topic_name');

            if($_POST['sub_topic_id']!='')
            {   
                $where ="sub_topic_id=".$_POST['sub_topic_id'];
                $this->aedr_model->update('sub_topic',$where,$data);
            }     
           else
            $this->aedr_model->insert('sub_topic',$data);

            redirect(base_url() . 'Admin/subjects/add_sub_topic/'.$data['topic_id'], 'refresh');
        }
        
         if ($param1 == 'edit_sub_topic') {
            
             $where ="sub_topic_id=".$param2;
             $sub_topic=$this->aedr_model->get_row('sub_topic',$where);

             //print_r($sub_topic);exit;
             $topic_id=$sub_topic['topic_id'];

             $where ="topic_id=".$topic_id;
             $page_data['sub_topic_lists']=$this->aedr_model->get_results_array('sub_topic',$where);

             $page_data['edit_data']=$sub_topic;

             $page_data['page_name']="admin/edit_sub_topic";
             $page_data['title']="Edit Topic";
             $page_data['table_heading']="Sub Topic List";

            //$where ="topic_id=".$param2;
            $edit_data= $this->aedr_model->get_row('topic',$where);

            $where ="subject_id=".$edit_data['subject_id'];

            $page_data['subject_detail']=$this->aedr_model->get_row('subject',$where);

            $page_data['topic']=$edit_data;

         
        }


        if ($param1 == 'delete_sub_topic') {
            
                $sub_topic_id=$param2;

                $where ="sub_topic_id=".$sub_topic_id;
                $sub_topic=$this->aedr_model->get_row('sub_topic',$where);

                $topic_id=$sub_topic['topic_id'];

                $where ="sub_topic_id=".$sub_topic_id;
            $this->aedr_model->delete('sub_topic',$where,$data);

            redirect(base_url() . 'Admin/subjects/add_sub_topic/'.$topic_id, 'refresh');
        }
        $this->load->view('backend/index', $page_data);
    }

   ////////////////// Manage Subject END ///////////////

    //////////////// Manage Student START////////////////


    function students($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

       $page_data['student_lists']=$this->aedr_model->get_list('csstudent');
       $page_data['grade_lists']=$this->aedr_model->get_list('class');
       $page_data['student_groups']=$this->aedr_model->get_list('student_group');

        $page_data['student_id']="";
        $page_data['name']="";
        $this->session->set_userdata('referred_from', current_url());
    ///////////// page details /////////////////////
            $page_data['page_name']="admin/student";
            $page_data['css_file']="list_css.php";
            $page_data['script_file']="list_script.php";
            $page_data['side_menu']="admin_menu.php";
            $page_data['title']="Student Details";
            $page_data['table_heading']="Student List";
        if ($param1 == 'create') {
                
               //print_r($_POST);exit;

                $insert_data['name']=$this->input->post('name');
                $insert_data['dob']=date('Y-m-d',strtotime($this->input->post('dob')));
                $insert_data['gender']=$this->input->post('gender');
                $insert_data['adm_class']=$this->input->post('adm_class');
                $insert_data['username']=$this->input->post('username');
                $insert_data['password']=md5($this->input->post('name'));
                $insert_data['adm_no']=$this->input->post('adm_no');
                $insert_data['group_id']=$this->input->post('group_id');
                $adm_no=$this->input->post('adm_no');
                $username=$this->input->post('username');
                $rst=$this->check_db_row('csstudent','adm_no',$adm_no);
                
                    if($rst!=0)
                      redirect(base_url() . 'Admin/students/add/err');

                 $rst1=$this->check_db_row('csstudent','username',$username);
                
                    if($rst1!=0)
                      redirect(base_url() . 'Admin/students/add/err1');
                          
            $this->aedr_model->insert('csstudent',$insert_data);
           redirect(base_url() . 'Admin/students/', 'refresh');
        }
         if ($param1 == 'do_update') 
        {
                
                $update_data['name']=$this->input->post('name');
                $update_data['dob']=date('Y-m-d',strtotime($this->input->post('dob')));
                $update_data['gender']=$this->input->post('gender');
                $update_data['adm_class']=$this->input->post('adm_class');
                $update_data['username']=$this->input->post('username');
                $update_data['adm_no']=$this->input->post('adm_no');
                $update_data['group_id']=$this->input->post('group_id');
                
                $student_id=$this->input->post('student_id');
                $where ="student_id=".$student_id;

                $this->aedr_model->update('csstudent',$where,$update_data);
           
            redirect(base_url() . 'Admin/students/'.$data['student_id'], 'refresh');
        } else if ($param1 == 'delete') {
           
             $where ="student_id=".$param2;
            $this->aedr_model->delete('csstudent',$where,$data);

            redirect(base_url() . 'Admin/students/'.$param3, 'refresh');
        } else if ($param1 == 'add')
             {
                $page_data['err']="display: none";
                $page_data['err_msg']="";
               if($param2=='err')
               {
                $page_data['err']="display: block";
                $page_data['err_msg']="This admission number is already exit.Please try with another number ";
               }

               if($param2=='err1')
               {
                $page_data['err']="display: block";
                $page_data['err_msg']="This Username is already exit.Please try with another username ";
               }
                

                $page_data['page_name']="admin/add_student";
                $page_data['css_file']="form_top_css.php";
                $page_data['script_file']="form_script.php";
                $page_data['side_menu']="admin_menu.php";
                $page_data['title']="Add Student Details";
                $page_data['table_heading']="Student List";
             }
           else if ($param1 == 'edit')
             {

            $where ="student_id=".$param2;
            $edit_data=$this->aedr_model->get_row('csstudent',$where);
            $page_data['edit_data']=$edit_data; 
            $page_data['page_name']="admin/edit_student";
            $page_data['css_file']="form_top_css.php";
            $page_data['script_file']="form_script.php";
            $page_data['side_menu']="admin_menu.php";
            $page_data['title']="Edit Student Details";
            $page_data['table_heading']="Student List";
             }

        $this->load->view('backend/index', $page_data);
    }

    function check_db_row($db_name,$name,$value)
    {
        $where ="$name = '".$value."'";
        $edit_data= $this->aedr_model->get_row($db_name,$where);

        return count($edit_data);

    }

   ////////////////////// Manage Student END//////////////////

  //////////////////////// Group Start/////////////////////////

    function groups($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['group_lists']=$this->aedr_model->get_list('student_group');

        $page_data['group_id']="";
        $page_data['name']="";
        $page_data['short_name']="";
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['short_name']= $this->input->post('short_name');
            $this->aedr_model->insert('student_group',$data);
            redirect(base_url() . 'Admin/groups/'.$data['class_id'], 'refresh');
        }
         if ($param1 == 'do_update') 
        {
                $data['name']=$this->input->post('name');
                $data['short_name']=$this->input->post('short_name');
                $group_id=$this->input->post('group_id');
                $where ="group_id=".$group_id;

                $this->aedr_model->update('student_group',$where,$data);
           
            redirect(base_url() . 'Admin/groups/'.$data['class_id'], 'refresh');
        } else if ($param1 == 'edit') {
                 $where ="group_id=".$param2;
            $edit_data= $this->aedr_model->get_row('student_group',$where);
            $page_data['group_id']=$edit_data['group_id'];
            $page_data['name']=$edit_data['name'];
            $page_data['short_name']=$edit_data['short_name'];
        }
        if ($param1 == 'delete') {
           
             $where ="group_id=".$param2;
            $this->aedr_model->delete('student_group',$where,$data);

            redirect(base_url() . 'Admin/groups/'.$param3, 'refresh');
        }
        
///////////////// page details ////////////////////////


           $page_data['page_name']="admin/group";
            $page_data['css_file']="list_css.php";
            $page_data['script_file']="list_script.php";
            $page_data['side_menu']="admin_menu.php";
            $page_data['title']="Group Details";
            $page_data['table_heading']="Group List";

        $this->load->view('backend/index', $page_data);
    }

///////////////////// Manage Group END//////////////////
///////////////////////  Import Books  /////////////////

public function import_book(){

  //  echo "Hi";exit;    
  
$this->load->library('Excel_reader');
echo "Hi";exit; 
   /* $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'xls';
                        $config['overwrite']=true;
                        
                        $this->load->library('upload', $config);
                        if (!is_dir('uploads'))
                        {
                            mkdir('./uploads', 0777, true);
                        }
                        if ($this->upload->do_upload('import_client'))
                        {
                            $data = $this->upload->data();
                            $file_name = $data['file_name'];
                             
                        }
                        else
                        {
                            echo $this->upload->display_errors();
                            
                        }
                        //echo $file_name;exit;

// Read the spreadsheet via a relative path to the document
// for example $this->excel_reader->read('./uploads/file.xls');
$file='./uploads/'.$file_name;

$this->excel_reader->read($file);

        

/*
// Get the contents of the first worksheet
$worksheet = $this->excel_reader->sheets[0];

$numRows = $worksheet['numRows']; // ex: 14
$numCols = $worksheet['numCols']; // ex: 4
$cells = $worksheet['cells']; // the 1st row are usually the field's name

//print_r(count($cells));exit;

$n=count($cells);


for ($i=2; $i<=$n; $i++) 
{ 
     
                $serial_no=$cells[$i][1];
                $item_type=$cells[$i][2];
                $title=$cells[$i][7];
                $isbn=$cells[$i][8];
                $author1=$cells[$i][9];
                $author2=$cells[$i][10];
                $author3=$cells[$i][11];
                $publisher=$cells[$i][13];
                $pub_place=$cells[$i][14];
                $volume=$cells[$i][15];
                $edition=$cells[$i][16];
                $language=$cells[$i][4];
                $subject=$cells[$i][5];
                $sub_series=$cells[$i][6];
                $rating=$cells[$i][17];
                $pages=$cells[$i][12];
                $lib_type=1;
                $call_no=$cells[$i][3];
                $barcode_no=$cells[$i][18];
                $crc_type=$cells[$i][19];
                $self_no=$cells[$i][20];
                $collection=$cells[$i][21];
                $invoice_no=$cells[$i][26];
                $vender_name=$cells[$i][25];
                $pod=$cells[$i][24];
                $price=$cells[$i][23];
                $book_condition=$cells[$i][22];
                $remark="nil";

                
    
 $book_data=array(
                "serial_no"=>$serial_no,
                "doe"=>date('Y-m-d'),
                "title"=>$title,
                "item_type"=>$item_type,
                "isbn"=>$isbn,
                "author1"=>$author1,
                "author2"=>$author2,
                "author3"=>$author3,
                "publisher"=>$publisher,
                "pub_place"=>$pub_place,
                "volume"=>$volume,
                "edition"=>$edition,
                "language"=>$language,
                "subject"=>$subject,
                "sub_series"=>$sub_series,
                "rating"=>$rating,
                "pages"=>$pages,
                "lib_type"=>$lib_type,
                "call_no"=>$call_no,
                "barcode_no"=>$barcode_no,
                "crc_type"=>$crc_type,
                "self_no"=>$self_no,
                "collection"=>$collection,
                "invoice_no"=>$invoice_no,
                "vender_name"=>$vender_name,
                "pod"=>date('Y-m-d',strtotime($pod)),
                "price"=>$price,
                "book_condition"=>$book_condition,
                "remark"=>$remark
                );
                
    

$this->book_model->insert_book($book_data);
    
}


    redirect('LMS/book','refresh'); 

    
*/
    }


////////////////////////////////////////////////////////
}