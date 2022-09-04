<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MP_Panel extends CI_Controller
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
        if ($this->session->userdata('MP_login') != 1)
            redirect(base_url(), 'refresh');

          
    }

    function index()
    {       
       // echo "Here we go jeeva";exit;

          /*  $page_data['page_name']="backennd/mp_pannel/dashboard";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/dasboard_css";
            $page_data['script_file']="bk_cms/dashboard_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
            $page_data['footer']='bk_cms/footer';

              ///////////////// page details ////////////////////////


                $this->load->view($page_data['css_file'],$page_data);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu']);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']);*/
                redirect(base_url().'MP_Panel/missionaries','refresh');

    }

    function submit_missionary($param1="")
    {
      // print_r($_POST);exit;missionaries

      if($param1=="first")
      {
        //print_r($this->session->userdata());exit;
        $insert=$_POST;
        $insert['submission_date']=date("Y-m-d");
        $insert['mp_id']=$this->session->userdata("mp_id");
               $insert['status']=1;
        $missionary_id=$this->Aedr_model->insert_id("missionary_first",$insert);

        redirect(base_url().'MP_Panel/add_missionary/first1/'.$missionary_id,'refresh');
         
      }
      if($param1=="first1")
      {
        //print_r($_POST);exit;
        $missionary_id=$_POST['missionary_id'];
        $update_data=$_POST;
        $update_data['dob']=date("Y-m-d",strtotime($this->input->post('dob')));

        $where ="missionary_id=".$missionary_id;

        $this->Aedr_model->update('missionary_first',$where,$update_data);
     
        

        redirect(base_url().'MP_Panel/add_missionary/second/'.$missionary_id,'refresh');
         
      }
      elseif($param1=="second")
      {
        //print_r($_POST);exit;
        $missionary_id=$_POST['missionary_id'];
        $insert=$_POST;
        $insert['mf_starting_date']=date("Y-m-d",strtotime($this->input->post('mf_starting_date')));        
        $id=$this->Aedr_model->insert_id("missionary_second",$insert);
        //echo $missionary_id;exit;
        redirect(base_url().'MP_Panel/add_missionary/third/'.$missionary_id,'refresh');
      }
      elseif($param1=="third")
      {
        $missionary_id=$_POST['missionary_id'];
        $insert=$_POST;
        $id=$this->Aedr_model->insert_id("missionary_third",$insert);
        redirect(base_url().'MP_Panel/add_missionary/four/'.$missionary_id,'refresh');
      }
      elseif($param1=="four")
      {
        $missionary_id=$_POST['missionary_id'];
        $insert=$_POST;
        $id=$this->Aedr_model->insert_id("missionary_four",$insert);
        redirect(base_url().'MP_Panel/add_missionary/five/'.$missionary_id,'refresh');
      }
      elseif($param1=="five")
      {
        $missionary_id=$_POST['missionary_id'];
       
        $insert=$_POST;
        
        $id=$this->Aedr_model->insert_id("missionary_five",$insert);
        redirect(base_url().'MP_Panel/add_missionary/six/'.$missionary_id,'refresh');
      }
      elseif($param1=="six")
      {
        $missionary_id=$_POST['missionary_id'];

        
        
        $insert=$_POST;        
        $id=$this->Aedr_model->insert_id("missionary_six",$insert);

        $this->update_googlesheet($missionary_id);

        redirect(base_url().'MP_Panel/missionary_profile/'.$missionary_id,'refresh');
      }
      


          ////////////////// google api sheet /////////////

      /* $this->load->library('Gapi');
        

        
       $report_period=$data['report_year']." R".$data['report_period'];


       $val_to_sheet=array(date('d-m-Y',strtotime($report['report_date'])),$reporter['name'],$report_period,$mid,$data['missionary_name'],$data['report'],$report['village_details'],implode(',',$data['prayer_points']),$data['photo_link'],$data['doc_link']);
     // print_r($val_to_sheet);exit;

    $this->gapi->writeData_uploadCatcher("1Vcwj46Cl3bIUhUbw7sYVU7QzgzMkJZgT4wt_6XM3u9g", "reportcatcher!A:J",$val_to_sheet);

   //exit;
       //print_r($result);exit;*/

 ////////////////////// google api sheet //////////////////////
    }

  function update_googlesheet($missionary_id)
  { 
   

      $mp_name=$this->session->userdata('name');
              


    /////////////////////////// Data Start ////////////////////////

              $state_by_id=$this->Aedr_model->get_row_by_id('state','state_id');
              $district_by_id=$this->Aedr_model->get_row_by_id('district','district_id');

              $sql="select * from missionary_first where missionary_id=$missionary_id";

              $missionary_details1=$this->Aedr_model->get_row_sql($sql);

              
              //print_r($missionary_details1);exit;

              $sql="select * from missionary_second where missionary_id=$missionary_id";

              $missionary_details2=$this->Aedr_model->get_row_sql($sql);

              if($missionary_details2['is_fw_active_in_mf']==2)
              {
                $missionary_details2['desc_mf']="Not Applicable";
                $missionary_details2['mf_starting_date']="Not Applicable";
                $missionary_details2['tbaptized']="Not Applicable";
              }
              else
              {
                $missionary_details2['mf_starting_date']=date("d-m-Y",strtotime($missionary_details2['mf_starting_date']));
              }
             // print_r($missionary_details2);exit;



              $sql="select * from missionary_third where missionary_id=$missionary_id";

              $missionary_details3=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_four where missionary_id=$missionary_id";

              $missionary_details4=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_five where missionary_id=$missionary_id";

              $missionary_details5=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_six where missionary_id=$missionary_id";

              $missionary_details6=$this->Aedr_model->get_row_sql($sql);

    ////////////////////////  data  end  /////////////////////////////////////////


    /////////// option data start ////////////////////////

              $op_yes_no[1]="Yes";
              $op_yes_no[2]="No";

              $op_mf_type[1]="Village";
              $op_mf_type[2]="Town";
              $op_mf_type[3]="City";

              $op_hw_fund_help_fw[1]="It will enable the FW to do church planting work full time not part time";
              $op_hw_fund_help_fw[2]="It will enable the FW to begin ministry in a new locaiton";
              $op_hw_fund_help_fw[3]="It will enable the FW to live in his ministry location";
              $op_hw_fund_help_fw[4]="It will remove unnecessary financial burdens so the FW will be under less pressure and be able to focus more on the church planting work";
              $op_hw_fund_help_fw[5]="Support from another organisation removed";


              $op_BC_main[1]="IPC Theological Seminary";
              $op_BC_main[2]="ACE, Hydrabad";
              $op_BC_main[3]="Action Ministries, India";
              $op_BC_main[4]="ACTS Academy , Banglaore";
              $op_BC_main[5]="ACY, HYD";
              $op_BC_main[6]="AG Bible College, Gola";
              $op_BC_main[7]="AG Bible Taining Centre";
              $op_BC_main[8]="AG Central Bible College";
              $op_BC_main[9]="Ag Traing Center";
              $op_BC_main[10]="Agape Institute (Ponta Sahib)";
              $op_BC_main[11]="AGAPE, VIJAYAWADA";
              $op_BC_main[12]="Allahabad Bible Seminary";
              $op_BC_main[13]="Anglican Clergy Episcopal, Hyderabad";
              $op_BC_main[14]="Aroma Bible College, Dhamtari";
              $op_BC_main[15]="Aroma Bible College, Dhamtari 3Years and New Life Biblical Seminari Kerla 3Years";
              $op_BC_main[16]="Asian theological association";
              $op_BC_main[17]="Assembly of Gospel For Asia, Bhubaneswar (Lucknow)";
              $op_BC_main[18]="Beersheba Theological College";
              $op_BC_main[19]="Beersheba Theological College, Jagadalpur";
              $op_BC_main[20]="Beersheba Theological College, Pippiria";
              $op_BC_main[21]="Beleivers Church";
              $op_BC_main[22]="believers church";
              $op_BC_main[23]="Berean Baptist Bible College And Seminary";
              $op_BC_main[24]="Bethany Bible College, Trivandrum";
              $op_BC_main[25]="Bethel Bible College, Punalur";
              $op_BC_main[26]="Bethel Bible College, Punalur, New Life Biblical Seminary , Cheruvakkal, Harvest Mission Bible college";
              $op_BC_main[27]="Bethel New life college, Banglore";
              $op_BC_main[28]="Bilaspur";
              $op_BC_main[29]="Buntain Theological Seminary, Kolkotta";
              $op_BC_main[30]="C.TH, Pamgarh";
              $op_BC_main[31]="Calvary Bible College";
              $op_BC_main[32]="Carmel Bible Training Centre Pathankot";
              $op_BC_main[33]="Central Bible College";
              $op_BC_main[34]="Central India Bible College";
              $op_BC_main[35]="Central India theological seminary Itarsi MP.";
              $op_BC_main[36]="CFI";
              $op_BC_main[37]="CFI CHHATTISGARH";
              $op_BC_main[38]="Chandigarh";
              $op_BC_main[39]="Changshin Academy for pastors in Nagpur";
              $op_BC_main[40]="Christ Ambassadors Bible Training centre, Mumbai";
              $op_BC_main[41]="Christ Calvary";
              $op_BC_main[42]="Church on the Rock";
              $op_BC_main[43]="CTH BILASPUR";
              $op_BC_main[44]="Delhi";
              $op_BC_main[45]="Delhi Bible Instiute";
              $op_BC_main[46]="DLM";
              $op_BC_main[47]="Doon Bible college, Dheradoon";
              $op_BC_main[48]="DTH";
              $op_BC_main[49]="Ebenezar Theological Seminary";
              $op_BC_main[50]="Eleos Bible Training School";
              $op_BC_main[51]="Elim Bible traning center Rourkela";
              $op_BC_main[52]="Elue Bible Institute";
              $op_BC_main[53]="Emmanuel Bible College";
              $op_BC_main[54]="Emmanuel BIble Institute Karnataka";
              $op_BC_main[55]="faith bible collage";
              $op_BC_main[56]="Faith Bible College,Ranny , Kerala";
              $op_BC_main[57]="Fisherman Bible college, Vijayawada
              Grace Bible Coillege , hariyana";
              $op_BC_main[58]="FTS Manakkala";
              $op_BC_main[59]="Gamaliel Theological centre, Uttarakhand";
              $op_BC_main[60]="GCM Gujrath";
              $op_BC_main[61]="GEMS BIBLE SCHOOL, BIHAR";
              $op_BC_main[62]="GFA, Odisha";
              $op_BC_main[63]="Gilgal Bible college, Goa";
              $op_BC_main[64]="Gola, Uttaer Pradesh";
              $op_BC_main[65]="Good News International University";
              $op_BC_main[66]="Gorakhpur Seminary";
              $op_BC_main[67]="Gospel For Asia, Anoopgarh";
              $op_BC_main[68]="Gospel For Asia, Bhubaneswar";
              $op_BC_main[69]="Gospel For Asia, Bilaspur";
              $op_BC_main[70]="Gospel For Asia, Brijaraj Nagar";
              $op_BC_main[71]="Gospel For Asia, Palampur";
              $op_BC_main[72]="Gospel For Asia, Thiruvalla";
              $op_BC_main[73]="Grace Bible College, Hariyana";
              $op_BC_main[74]="Grace Bible Institute Durg";
              $op_BC_main[75]="Grace centre for theological Taining";
              $op_BC_main[76]="Grace Centre, Gola";
              $op_BC_main[77]="Grace Decipleship Centre";
              $op_BC_main[78]="Great Commission Bible College";
              $op_BC_main[79]="Gujarath Bible College";
              $op_BC_main[80]="Hallelujah Bible School, Bhopal";
              $op_BC_main[81]="Hallelujah Bible Training Centre";
              $op_BC_main[82]="Harvest Mission College, Noida";
              $op_BC_main[83]="Harvest Training Institute, Chennai";
              $op_BC_main[84]="Harvest Vision Centre Karkapal";
              $op_BC_main[85]="Himachal Bible College and Seminary";
              $op_BC_main[86]="Himalaya Evangelical Mission";
              $op_BC_main[87]="Himanchal Bible College and Bersheeba Bible College";
              $op_BC_main[88]="Holistic Training Centre";
              $op_BC_main[89]="Holy Spirit Training Centre";
              $op_BC_main[90]="Hosanna Ministry, Andhra Pradesh";
              $op_BC_main[91]="IBM";
              $op_BC_main[92]="ICA";
              $op_BC_main[93]="ICMTP (Diploma In Christian Ministry)";
              $op_BC_main[94]="ICOM";
              $op_BC_main[95]="ICT, SEVABHARAT";
              $op_BC_main[96]="IDC-JEHOVAN NISSI BILE INSTITUTE.";
              $op_BC_main[97]="IGM, Lucknow";
              $op_BC_main[98]="IGSM";
              $op_BC_main[99]="India Bible college and Seminary";
              $op_BC_main[100]="India Full Gospel Bible College in Banglore";
              $op_BC_main[101]="Indian Bible Literature";
              $op_BC_main[102]="Indiann Institiute of Theological";
              $op_BC_main[103]="International Institute of Church Management";
              $op_BC_main[104]="International Institute Of Theology";
              $op_BC_main[105]="International School of Evangelism";
              $op_BC_main[106]="IPC Theological Seminary";
              $op_BC_main[107]="Jeevan Jyoti Bible Training Centre Bible Training Centre";
              $op_BC_main[108]="Kachua Mission College, Alahabad";
              $op_BC_main[109]="Karnataka Institute of Theology";
              $op_BC_main[110]="Kerala Theological Seminary";
              $op_BC_main[111]="Khammam, Telangana";
              $op_BC_main[112]="Latur bible college";
              $op_BC_main[113]="LCT Lucknow";
              $op_BC_main[114]="Light for India";
              $op_BC_main[115]="Light for India Bible college";
              $op_BC_main[116]="Living bible Institute";
              $op_BC_main[117]="Living Hope";
              $op_BC_main[118]="Living Word Mission";
              $op_BC_main[119]="Lucknow Theological College";
              $op_BC_main[120]="Mahaneh Den Theological Trainning Center, Mubai";
              $op_BC_main[121]="Maharashtra Bible college";
              $op_BC_main[122]="Manna Bible College";
              $op_BC_main[123]="Maranatha Bible Training Centre";
              $op_BC_main[124]="Masters Trainers";
              $op_BC_main[125]="MBCB";
              $op_BC_main[126]="MBTI";
              $op_BC_main[127]="Mission India Bible College, Guna";
              $op_BC_main[128]="Mission India Bible College, Trivandrum";
              $op_BC_main[129]="Mission India Bible College, Trivandrum and SeminaryRaipur";
              $op_BC_main[130]="Mission India Disciple center.Chatisgarh";
              $op_BC_main[131]="Missionary Training Centre, Patiala";
              $op_BC_main[132]="Missions India Theological Seminary, Nagpur";
              $op_BC_main[133]="NA";
              $op_BC_main[134]="NAMTE, Jalandhar";
              $op_BC_main[135]="NBM, Latur";
              $op_BC_main[136]="Nehemiah Bible Istitution ,Tamil Nadu";
              $op_BC_main[137]="New Hope Bible College, Nilambur";
              $op_BC_main[138]="New India Biblical Seminary, Paippad";
              $op_BC_main[139]="New India church of God bible College";
              $op_BC_main[140]="New Life Bible College, Bangalore";
              $op_BC_main[141]="New Life Biblical Seminary , Cheruvakkal";
              $op_BC_main[142]="New LIfe College";
              $op_BC_main[143]="New Thelogical College, DehraDoon Bible college, Dheradoon";

              $op_BC_main[145]="No";
              $op_BC_main[146]="No formal training";
              $op_BC_main[147]="No formal Training";
              $op_BC_main[148]="NO FORMAL TRAINING";
              $op_BC_main[149]="No Training";
              $op_BC_main[150]="North India Bible Institute";
              $op_BC_main[151]="North India Theological Seminary Bhopal";
              $op_BC_main[152]="North Indian Institute for Theological Studies";
              $op_BC_main[153]="Northen Institute Of Biblical Study, In Patiala";
              $op_BC_main[154]="Odisha Bible School";
              $op_BC_main[155]="Operation Agape ible College,Ludhiana";
              $op_BC_main[156]="Peniel Bible Seminary, Keezhillam";
              $op_BC_main[157]="Philedelphia Bible College";
              $op_BC_main[158]="Pniel Bible College";
              $op_BC_main[159]="Punjab";
              $op_BC_main[160]="Punjab Bible college";
              $op_BC_main[161]="Rajsthan bible collage";
              $op_BC_main[162]="Rev BM Chand School of Theology and Leadership";
              $op_BC_main[163]="Rhaema Bible training college, Nagpur,";
              $op_BC_main[164]="Rhema Bible College and Seminary, Palakkad";
              $op_BC_main[165]="Rourkeala Bible college";
              $op_BC_main[166]="Sacred Assemblies fellowship Delhi";
              $op_BC_main[167]="Samarpit Bible college";
              $op_BC_main[168]="Sathya Veda Seminary, Trivandrum";
              $op_BC_main[169]="School of Holy Spirit";
              $op_BC_main[170]="Shalom Bible Institute";
              $op_BC_main[171]="Sharon Bible College";
              $op_BC_main[172]="Shekkana";
              $op_BC_main[173]="Short term church bases dtraining";
              $op_BC_main[174]="South Western Bible college India";
              $op_BC_main[175]="Southern Asia Bible College";
              $op_BC_main[176]="Southern Bible College, Kanyakumary";
              $op_BC_main[177]="Spirit Faith Bible School";
              $op_BC_main[178]="Spirit of Faith Bible School";
              $op_BC_main[179]="Susamachar Theological College & Seminary";
              $op_BC_main[180]="SVS";
              $op_BC_main[181]="Tamilnadu Bible College and seminary";
              $op_BC_main[182]="TBL, Karnataka";
              $op_BC_main[183]="TEAC Mission Nawapur";
              $op_BC_main[184]="Telangana";
              $op_BC_main[185]="Trinity Binle College,Calicut";
              $op_BC_main[186]="Truth University, Nagpur,Maharashtra";
              $op_BC_main[187]="UP Mission Bible College, Kanpur";
              $op_BC_main[188]="Western India Pentecosta church-Anand,Gujarat";
              $op_BC_main[189]="Wisdom for Asia Bible College";
              $op_BC_main[190]="Word of Life Ministries, Lucknow, Up";
              $op_BC_main[191]="Yeshua Thelogical College. Alahabad";
              $op_BC_main[192]="Youth With A Mission";
              $op_BC_main[193]="Zion Raj";


              $op_affiliated[1]="Affiliated";
              $op_affiliated[2]="Independent";


              $op_language[1]="Bengali";
              $op_language[2]="Marathi";
              $op_language[3]="Telugu";
              $op_language[4]="Tamil";
              $op_language[5]="Gujarati";
              $op_language[6]="Urdu";
              $op_language[7]="Kannada";
              $op_language[8]="Odia";
              $op_language[9]="Malayalam";
              $op_language[10]="Punjabi";
              $op_language[11]="Sanskrit";


              $op_DBC[1]="Pentecostal";
              $op_DBC[2]="Evangelical";
              $op_DBC[3]="Inter Denominational";
              $op_DBC[4]="NCM";
              $op_DBC[5]="Christ for India";
              $op_DBC[6]="Baptist";
              $op_DBC[7]="NA";
              $op_DBC[8]="IET";
              $op_DBC[9]="Assembly Of God";
              $op_DBC[10]="IPC";
              $op_DBC[11]="Pentecost";
              $op_DBC[12]="life center";
              $op_DBC[13]="Sharon Fellowship";
              $op_DBC[14]="Sathya Veda Seminary, Trivandrum";
              $op_DBC[15]="ICT, SEVABHARATh";
              $op_DBC[16]="Anglican";
              $op_DBC[17]="Southern Asia Bible College";
              $op_DBC[18]="No";
              $op_DBC[19]="IGM";
              $op_DBC[20]="Beleivers Church";
              $op_DBC[21]="CFI";
              $op_DBC[22]="Bretheren";
              $op_DBC[23]="Independent";
              $op_DBC[24]="Sharon";
              $op_DBC[25]="Church of God";
              $op_DBC[26]="NCM";


                

            //// options end /////
               //print_r($this->session->userdata('name'));exit;
              
   //  print_r($missionary_details6);exit;

    ////////////////// google api sheet /////////////

      $this->load->library('Gapi');
       $val_to_sheet=array(date('d-m-Y',strtotime($missionary_details1['submission_date'])),$mp_name,$missionary_details1['mp_staff_name'],$missionary_details1['mp_staff_sname'],$missionary_details1['mp_staff_id'],$missionary_details1['fname'],$missionary_details1['middlename'],$missionary_details1['surename'],date('d-m-Y',strtotime($missionary_details1['dob'])),$op_yes_no[$missionary_details1['fstatus']],$missionary_details1['depent'],$missionary_details1['phone_num'],$missionary_details1['alt_phone_num'],$op_yes_no[$missionary_details1['is_whatsapp_available']],$missionary_details1['aadhar_number'],$state_by_id[$missionary_details1['state_id']]['name'],$district_by_id[$missionary_details1['district_id']]['name'],$missionary_details2['primary_village'],$missionary_details2['pincode'],$op_mf_type[$missionary_details2['mf_type']],$missionary_details2['mf_population'],$op_yes_no[$missionary_details2['is_fw_active_in_mf']],$missionary_details2['mf_starting_date'],$missionary_details2['desc_mf'],$missionary_details2['desc_fw_income'],$missionary_details2['tbaptized'],$missionary_details2['hw_fund_help_fw'],$op_hw_fund_help_fw[$missionary_details2['hw_fund_help_fw_op']],$missionary_details2['tchristians'],$op_yes_no[$missionary_details2['is_fw_live_in_mf']],$missionary_details2['fw_address'],$op_yes_no[$missionary_details3['is_fw_trained_in_bc']],$op_BC_main[$missionary_details3['BC_main']],$missionary_details3['qualification'],$missionary_details3['noyear_training'],$missionary_details3['graduation_year'],$missionary_details3['other_course_year'],$op_yes_no[$missionary_details3['is_fw_spk_english']],$op_affiliated[$missionary_details3['is_affiliated']],$op_DBC[$missionary_details3['affiliated_denomination']],$missionary_details3['desc_fw_aligns'],$op_yes_no[$missionary_details3['is_fw_spk_hindi']],$op_language[$missionary_details3['other_spk_language']],$missionary_details4['supervisor_name'],$missionary_details4['supervisor_id'],$op_yes_no[$missionary_details4['is_supervisor_inducted']],$op_yes_no[$missionary_details4['is_supervisor_agree']],$missionary_details4['nof_supervisor'],$missionary_details4['distance_supervisor_fw'],$op_yes_no[$missionary_details4['is_FW_other_org']],$missionary_details4['FW_other_payment'],$missionary_details5['ref_name'],$missionary_details5['desc_reference'],$missionary_details6['FW_testimony']);




       $val_to_mpsheet=array(date('d-m-Y',strtotime($missionary_details1['submission_date'])),$missionary_details1['mp_staff_name'],$missionary_details1['mp_staff_sname'],$missionary_details1['mp_staff_id'],$missionary_details1['fname'],$missionary_details1['middlename'],$missionary_details1['surename'],date('d-m-Y',strtotime($missionary_details1['dob'])),$op_yes_no[$missionary_details1['fstatus']],$missionary_details1['depent'],$missionary_details1['phone_num'],$missionary_details1['alt_phone_num'],$op_yes_no[$missionary_details1['is_whatsapp_available']],$missionary_details1['aadhar_number'],$state_by_id[$missionary_details1['state_id']]['name'],$district_by_id[$missionary_details1['district_id']]['name'],$missionary_details2['primary_village'],$missionary_details2['pincode'],$op_mf_type[$missionary_details2['mf_type']],$missionary_details2['mf_population'],$op_yes_no[$missionary_details2['is_fw_active_in_mf']],$missionary_details2['mf_starting_date'],$missionary_details2['desc_mf'],$missionary_details2['desc_fw_income'],$missionary_details2['tbaptized'],$missionary_details2['hw_fund_help_fw'],$op_hw_fund_help_fw[$missionary_details2['hw_fund_help_fw_op']],$missionary_details2['tchristians'],$op_yes_no[$missionary_details2['is_fw_live_in_mf']],$missionary_details2['fw_address'],$op_yes_no[$missionary_details3['is_fw_trained_in_bc']],$op_BC_main[$missionary_details3['BC_main']],$missionary_details3['qualification'],$missionary_details3['noyear_training'],$missionary_details3['graduation_year'],$missionary_details3['other_course_year'],$op_yes_no[$missionary_details3['is_fw_spk_english']],$op_affiliated[$missionary_details3['is_affiliated']],$op_DBC[$missionary_details3['affiliated_denomination']],$missionary_details3['desc_fw_aligns'],$op_yes_no[$missionary_details3['is_fw_spk_hindi']],$op_language[$missionary_details3['other_spk_language']],$missionary_details4['supervisor_name'],$missionary_details4['supervisor_id'],$op_yes_no[$missionary_details4['is_supervisor_inducted']],$op_yes_no[$missionary_details4['is_supervisor_agree']],$missionary_details4['nof_supervisor'],$missionary_details4['distance_supervisor_fw'],$op_yes_no[$missionary_details4['is_FW_other_org']],$missionary_details4['FW_other_payment'],$missionary_details5['ref_name'],$missionary_details5['desc_reference'],$missionary_details6['FW_testimony']);

       for($i=0;$i<count($val_to_sheet);$i++)
          {
              if($val_to_sheet[$i]==NULL)
              {
                  $val_to_sheet[$i]="Not updated";
              }

          }
          for($j=0;$j<count($val_to_mpsheet);$j++)
          {
              if($val_to_mpsheet[$j]==NULL)
              {
                  $val_to_mpsheet[$j]="Not updated";
              }

          }

      //print_r(count($val_to_mpsheet));exit;
    $this->gapi->writeData_NewMissionary_centralsheet("1G0Rc5DRBLnFlNCpjhC7JO8E3Z-7aZ0o3wnjE1m-dTjM", "R4R!A:BC",$val_to_sheet);

          //print_r($this->session->userdata());exit;

          $missionary_name=$this->session->userdata('name');

          //print_r($missionary_name);exit;

        if($missionary_name=="JLM")
        {
              //print_r($missionary_name);exit;
              $this->gapi->writeData_NewMissionary_inmissionarysheet("1_iVbphOeEapm2bP-EdY_uLSTdICuKxSA5QITqben1QE", "R4R!A:BC",$val_to_mpsheet);
        }
        elseif($missionary_name=="NJM")
        {
          $this->gapi->writeData_NewMissionary_inmissionarysheet("1G0Rc5DRBLnFlNCpjhC7JO8E3Z-7aZ0o3wnjE1m-dTjM", "R4R!A:BC",$val_to_mpsheet);
        }
        elseif($missionary_name=="NJM")
        {
          $this->gapi->writeData_NewMissionary_inmissionarysheet("1G0Rc5DRBLnFlNCpjhC7JO8E3Z-7aZ0o3wnjE1m-dTjM", "R4R!A:BC",$val_to_mpsheet);
        }




    echo "Successfully Added to the sheet";

   //exit;
       //print_r($result);exit;

 ////////////////////// google api sheet //////////////////////

  }



    ///////////////  Missionary Report List  ///////////////////
function add_missionary($param1='',$param2='')
    {

     
        //////////////// page setup /////////////        
          
              $page_data['page_title']="Add New Missionary";
              $page_data['form_heading']="Missionary Partners Details";
              $page_data['table_heading']="Report List";
               $page_data['page_heading']="New Missionary";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/mp_pannel/add_missionary_first";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."MP_Panel","name"=>"Missionary Partner","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."MP_Panel/add_missionary","name"=>"New Missionary","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

            $sql="select * from state order by name";

      $page_data['states']=$this->Aedr_model->get_result_sql($sql);

       

      // print_r($page_data['missionaries_lists']);exit;

      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

       
        /////// options starts //////////////////////

        
//$op_BC_main//////////////////
$op_BC_main[1]="IPC Theological Seminary";
$op_BC_main[2]="ACE, Hydrabad";
$op_BC_main[3]="Action Ministries, India";
$op_BC_main[4]="ACTS Academy , Banglaore";
$op_BC_main[5]="ACY, HYD";
$op_BC_main[6]="AG Bible College, Gola";
$op_BC_main[7]="AG Bible Taining Centre";
$op_BC_main[8]="AG Central Bible College";
$op_BC_main[9]="Ag Traing Center";
$op_BC_main[10]="Agape Institute (Ponta Sahib)";
$op_BC_main[11]="AGAPE, VIJAYAWADA";
$op_BC_main[12]="Allahabad Bible Seminary";
$op_BC_main[13]="Anglican Clergy Episcopal, Hyderabad";
$op_BC_main[14]="Aroma Bible College, Dhamtari";
$op_BC_main[15]="Aroma Bible College, Dhamtari 3Years and New Life Biblical Seminari Kerla 3Years";
$op_BC_main[16]="Asian theological association";
$op_BC_main[17]="Assembly of Gospel For Asia, Bhubaneswar (Lucknow)";
$op_BC_main[18]="Beersheba Theological College";
$op_BC_main[19]="Beersheba Theological College, Jagadalpur";
$op_BC_main[20]="Beersheba Theological College, Pippiria";
$op_BC_main[21]="Beleivers Church";
$op_BC_main[22]="believers church";
$op_BC_main[23]="Berean Baptist Bible College And Seminary";
$op_BC_main[24]="Bethany Bible College, Trivandrum";
$op_BC_main[25]="Bethel Bible College, Punalur";
$op_BC_main[26]="Bethel Bible College, Punalur, New Life Biblical Seminary , Cheruvakkal, Harvest Mission Bible college";
$op_BC_main[27]="Bethel New life college, Banglore";
$op_BC_main[28]="Bilaspur";
$op_BC_main[29]="Buntain Theological Seminary, Kolkotta";
$op_BC_main[30]="C.TH, Pamgarh";
$op_BC_main[31]="Calvary Bible College";
$op_BC_main[32]="Carmel Bible Training Centre Pathankot";
$op_BC_main[33]="Central Bible College";
$op_BC_main[34]="Central India Bible College";
$op_BC_main[35]="Central India theological seminary Itarsi MP.";
$op_BC_main[36]="CFI";
$op_BC_main[37]="CFI CHHATTISGARH";
$op_BC_main[38]="Chandigarh";
$op_BC_main[39]="Changshin Academy for pastors in Nagpur";
$op_BC_main[40]="Christ Ambassadors Bible Training centre, Mumbai";
$op_BC_main[41]="Christ Calvary";
$op_BC_main[42]="Church on the Rock";
$op_BC_main[43]="CTH BILASPUR";
$op_BC_main[44]="Delhi";
$op_BC_main[45]="Delhi Bible Instiute";
$op_BC_main[46]="DLM";
$op_BC_main[47]="Doon Bible college, Dheradoon";
$op_BC_main[48]="DTH";
$op_BC_main[49]="Ebenezar Theological Seminary";
$op_BC_main[50]="Eleos Bible Training School";
$op_BC_main[51]="Elim Bible traning center Rourkela";
$op_BC_main[52]="Elue Bible Institute";
$op_BC_main[53]="Emmanuel Bible College";
$op_BC_main[54]="Emmanuel BIble Institute Karnataka";
$op_BC_main[55]="faith bible collage";
$op_BC_main[56]="Faith Bible College,Ranny , Kerala";
$op_BC_main[57]="Fisherman Bible college, Vijayawada
Grace Bible Coillege , hariyana";
$op_BC_main[58]="FTS Manakkala";
$op_BC_main[59]="Gamaliel Theological centre, Uttarakhand";
$op_BC_main[60]="GCM Gujrath";
$op_BC_main[61]="GEMS BIBLE SCHOOL, BIHAR";
$op_BC_main[62]="GFA, Odisha";
$op_BC_main[63]="Gilgal Bible college, Goa";
$op_BC_main[64]="Gola, Uttaer Pradesh";
$op_BC_main[65]="Good News International University";
$op_BC_main[66]="Gorakhpur Seminary";
$op_BC_main[67]="Gospel For Asia, Anoopgarh";
$op_BC_main[68]="Gospel For Asia, Bhubaneswar";
$op_BC_main[69]="Gospel For Asia, Bilaspur";
$op_BC_main[70]="Gospel For Asia, Brijaraj Nagar";
$op_BC_main[71]="Gospel For Asia, Palampur";
$op_BC_main[72]="Gospel For Asia, Thiruvalla";
$op_BC_main[73]="Grace Bible College, Hariyana";
$op_BC_main[74]="Grace Bible Institute Durg";
$op_BC_main[75]="Grace centre for theological Taining";
$op_BC_main[76]="Grace Centre, Gola";
$op_BC_main[77]="Grace Decipleship Centre";
$op_BC_main[78]="Great Commission Bible College";
$op_BC_main[79]="Gujarath Bible College";
$op_BC_main[80]="Hallelujah Bible School, Bhopal";
$op_BC_main[81]="Hallelujah Bible Training Centre";
$op_BC_main[82]="Harvest Mission College, Noida";
$op_BC_main[83]="Harvest Training Institute, Chennai";
$op_BC_main[84]="Harvest Vision Centre Karkapal";
$op_BC_main[85]="Himachal Bible College and Seminary";
$op_BC_main[86]="Himalaya Evangelical Mission";
$op_BC_main[87]="Himanchal Bible College and Bersheeba Bible College";
$op_BC_main[88]="Holistic Training Centre";
$op_BC_main[89]="Holy Spirit Training Centre";
$op_BC_main[90]="Hosanna Ministry, Andhra Pradesh";
$op_BC_main[91]="IBM";
$op_BC_main[92]="ICA";
$op_BC_main[93]="ICMTP (Diploma In Christian Ministry)";
$op_BC_main[94]="ICOM";
$op_BC_main[95]="ICT, SEVABHARAT";
$op_BC_main[96]="IDC-JEHOVAN NISSI BILE INSTITUTE.";
$op_BC_main[97]="IGM, Lucknow";
$op_BC_main[98]="IGSM";
$op_BC_main[99]="India Bible college and Seminary";
$op_BC_main[100]="India Full Gospel Bible College in Banglore";
$op_BC_main[101]="Indian Bible Literature";
$op_BC_main[102]="Indiann Institiute of Theological";
$op_BC_main[103]="International Institute of Church Management";
$op_BC_main[104]="International Institute Of Theology";
$op_BC_main[105]="International School of Evangelism";
$op_BC_main[106]="IPC Theological Seminary";
$op_BC_main[107]="Jeevan Jyoti Bible Training Centre Bible Training Centre";
$op_BC_main[108]="Kachua Mission College, Alahabad";
$op_BC_main[109]="Karnataka Institute of Theology";
$op_BC_main[110]="Kerala Theological Seminary";
$op_BC_main[111]="Khammam, Telangana";
$op_BC_main[112]="Latur bible college";
$op_BC_main[113]="LCT Lucknow";
$op_BC_main[114]="Light for India";
$op_BC_main[115]="Light for India Bible college";
$op_BC_main[116]="Living bible Institute";
$op_BC_main[117]="Living Hope";
$op_BC_main[118]="Living Word Mission";
$op_BC_main[119]="Lucknow Theological College";
$op_BC_main[120]="Mahaneh Den Theological Trainning Center, Mubai";
$op_BC_main[121]="Maharashtra Bible college";
$op_BC_main[122]="Manna Bible College";
$op_BC_main[123]="Maranatha Bible Training Centre";
$op_BC_main[124]="Masters Trainers";
$op_BC_main[125]="MBCB";
$op_BC_main[126]="MBTI";
$op_BC_main[127]="Mission India Bible College, Guna";
$op_BC_main[128]="Mission India Bible College, Trivandrum";
$op_BC_main[129]="Mission India Bible College, Trivandrum and SeminaryRaipur";
$op_BC_main[130]="Mission India Disciple center.Chatisgarh";
$op_BC_main[131]="Missionary Training Centre, Patiala";
$op_BC_main[132]="Missions India Theological Seminary, Nagpur";
$op_BC_main[133]="NA";
$op_BC_main[134]="NAMTE, Jalandhar";
$op_BC_main[135]="NBM, Latur";
$op_BC_main[136]="Nehemiah Bible Istitution ,Tamil Nadu";
$op_BC_main[137]="New Hope Bible College, Nilambur";
$op_BC_main[138]="New India Biblical Seminary, Paippad";
$op_BC_main[139]="New India church of God bible College";
$op_BC_main[140]="New Life Bible College, Bangalore";
$op_BC_main[141]="New Life Biblical Seminary , Cheruvakkal";
$op_BC_main[142]="New LIfe College";
$op_BC_main[143]="New Thelogical College, DehraDoon Bible college, Dheradoon";

$op_BC_main[145]="No";
$op_BC_main[146]="No formal training";
$op_BC_main[147]="No formal Training";
$op_BC_main[148]="NO FORMAL TRAINING";
$op_BC_main[149]="No Training";
$op_BC_main[150]="North India Bible Institute";
$op_BC_main[151]="North India Theological Seminary Bhopal";
$op_BC_main[152]="North Indian Institute for Theological Studies";
$op_BC_main[153]="Northen Institute Of Biblical Study, In Patiala";
$op_BC_main[154]="Odisha Bible School";
$op_BC_main[155]="Operation Agape ible College,Ludhiana";
$op_BC_main[156]="Peniel Bible Seminary, Keezhillam";
$op_BC_main[157]="Philedelphia Bible College";
$op_BC_main[158]="Pniel Bible College";
$op_BC_main[159]="Punjab";
$op_BC_main[160]="Punjab Bible college";
$op_BC_main[161]="Rajsthan bible collage";
$op_BC_main[162]="Rev BM Chand School of Theology and Leadership";
$op_BC_main[163]="Rhaema Bible training college, Nagpur,";
$op_BC_main[164]="Rhema Bible College and Seminary, Palakkad";
$op_BC_main[165]="Rourkeala Bible college";
$op_BC_main[166]="Sacred Assemblies fellowship Delhi";
$op_BC_main[167]="Samarpit Bible college";
$op_BC_main[168]="Sathya Veda Seminary, Trivandrum";
$op_BC_main[169]="School of Holy Spirit";
$op_BC_main[170]="Shalom Bible Institute";
$op_BC_main[171]="Sharon Bible College";
$op_BC_main[172]="Shekkana";
$op_BC_main[173]="Short term church bases dtraining";
$op_BC_main[174]="South Western Bible college India";
$op_BC_main[175]="Southern Asia Bible College";
$op_BC_main[176]="Southern Bible College, Kanyakumary";
$op_BC_main[177]="Spirit Faith Bible School";
$op_BC_main[178]="Spirit of Faith Bible School";
$op_BC_main[179]="Susamachar Theological College & Seminary";
$op_BC_main[180]="SVS";
$op_BC_main[181]="Tamilnadu Bible College and seminary";
$op_BC_main[182]="TBL, Karnataka";
$op_BC_main[183]="TEAC Mission Nawapur";
$op_BC_main[184]="Telangana";
$op_BC_main[185]="Trinity Binle College,Calicut";
$op_BC_main[186]="Truth University, Nagpur,Maharashtra";
$op_BC_main[187]="UP Mission Bible College, Kanpur";
$op_BC_main[188]="Western India Pentecosta church-Anand,Gujarat";
$op_BC_main[189]="Wisdom for Asia Bible College";
$op_BC_main[190]="Word of Life Ministries, Lucknow, Up";
$op_BC_main[191]="Yeshua Thelogical College. Alahabad";
$op_BC_main[192]="Youth With A Mission";
$op_BC_main[193]="Zion Raj";
//op_DBC

$op_DBC[1]="Pentecostal";
$op_DBC[2]="Evangelical";
$op_DBC[3]="Inter Denominational";
$op_DBC[4]="NCM";
$op_DBC[5]="Christ for India";
$op_DBC[6]="Baptist";
$op_DBC[7]="NA";
$op_DBC[8]="IET";
$op_DBC[9]="Assembly Of God";
$op_DBC[10]="IPC";
$op_DBC[11]="Pentecost";
$op_DBC[12]="life center";
$op_DBC[13]="Sharon Fellowship";
$op_DBC[14]="Sathya Veda Seminary, Trivandrum";
$op_DBC[15]="ICT, SEVABHARATh";
$op_DBC[16]="Anglican";
$op_DBC[17]="Southern Asia Bible College";
$op_DBC[18]="No";
$op_DBC[19]="IGM";
$op_DBC[20]="Beleivers Church";
$op_DBC[21]="CFI";
$op_DBC[22]="Bretheren";
$op_DBC[23]="Independent";
$op_DBC[24]="Sharon";
$op_DBC[25]="Church of God";
$op_DBC[26]="NCM";

//op_board
$op_board[1]="NCM";
$op_board[2]="AG";
$op_board[3]="Harvest";
$op_board[4]="Other";

//$op_fstatus
$op_fstatus[2]="Married- no children";
$op_fstatus[3]="Widower / Widow";
$op_fstatus[4]="Married- with children";
$op_fstatus[5]="Widower / Widow - with children";

//op_mf_type
$op_mf_type[1]="Village";
$op_mf_type[2]="Town";
$op_mf_type[3]="City";

//op_pre_news
$op_pre_news[1]="Pre-existing";
$op_pre_news[2]="NewStarter";

//op_pio_inherits
$op_pio_inherits[1]="Pioneer";
$op_pio_inherits[2]="inheritor";

//op_living
$op_living[1]="Staying in his own village and commuting to the mission field";
$op_living[2]="Rented House in Mission field";
$op_living[3]="Beliver's House";
$op_living[4]="Pastor's Home";
$op_living[5]="Friend's Home";
$op_living[6]="Paraents Home";
$op_living[7]="Parents Home";
$op_living[8]="Supervisor's House";

/// op_rec_fund 

$op_rec_fund[1]="Part time to full time";
$op_rec_fund[2]="Newly starting ministry";
$op_rec_fund[3]="Struggling for daily bread";
$op_rec_fund[4]="Commuter to residential missionary";
$op_rec_fund[5]="Support from another mission withdrawn";
$op_rec_fund[6]="Part time to full time & commuter to residential";
$op_rec_fund[7]="He was working in an another organisation now God guided him to this new area.";
$op_rec_fund[8]="Missionary is going to start the ministry.";
$op_rec_fund[9]="Support stopped from other organization";
$op_rec_fund[10]="For his survival. room rent, and for his travel expences";

///op_influence_factor

$op_influence_factor[1]="0-20%";
$op_influence_factor[2]="20-40%";
$op_influence_factor[3]="40-60%";
$op_influence_factor[4]="60-80%";
$op_influence_factor[5]="80-100%";

//op_coordinator
$op_coordinator[1]="Aris Selvan";
$op_coordinator[2]="Pramanda Durga";
$op_coordinator[3]="Bikram Upadhay";
$op_coordinator[4]="Narendra Das";
$op_coordinator[5]="Joel Soloman";
$op_coordinator[6]="Binu Sekharan";
$op_coordinator[7]="Wilson";
$op_coordinator[8]="P C Mathew ";
$op_coordinator[9]="Suresh Kumar";
$op_coordinator[10]="Shaji Varghese";
$op_coordinator[11]="Santosh";
$op_coordinator[12]="Wilson Patole";
$op_coordinator[13]="M S Ramesh";
$op_coordinator[14]="Aneesh Mathew";
$op_coordinator[15]="Jobin Abraham";
$op_coordinator[16]="Babu Raj Thomson";
$op_coordinator[17]="Reji Samuel ";
$op_coordinator[18]="Gleetus Vincent";
$op_coordinator[19]="Ashok Sharma";
$op_coordinator[20]="David Wilson";
$op_coordinator[21]="Branton Philip";

//op_supervisor
$op_supervisor[1]="Aris Selvan";
$op_supervisor[2]="Ajith Kumar Pani";
$op_supervisor[3]="Bikram Upadhay";
$op_supervisor[4]="Sunil Kumar Jangde";
$op_supervisor[5]="Dinesh Nirala";
$op_supervisor[6]="Jagadesh Kumar";
$op_supervisor[7]="Narendra Das";
$op_supervisor[8]="Amarnath Sreekanth Bai";
$op_supervisor[9]="Vasanth Solanki";
$op_supervisor[10]="Preamodpargigleetus ";
$op_supervisor[11]="Ravison";
$op_supervisor[12]="Anu Soman";
$op_supervisor[13]="Manubendra Digal";
$op_supervisor[14]="Prakash GK Gamaliel Kanakam";
$op_supervisor[15]="Wilson";
$op_supervisor[16]="Naveen Kumar";
$op_supervisor[17]="Anji Nandihalli";
$op_supervisor[18]="Shajan A R";
$op_supervisor[19]="Christen Raj";
$op_supervisor[20]="Salim Raj";
$op_supervisor[21]="Suresh Kumar";
$op_supervisor[22]="Jose Lazer";
$op_supervisor[23]="Christopher C Thampi";
$op_supervisor[24]="Shiva Charan";
$op_supervisor[25]="Jagatheesh Bamne";
$op_supervisor[26]="Santosh ";
$op_supervisor[27]="Amol Satish Valvi";
$op_supervisor[28]="Vikram Vasava";
$op_supervisor[29]="Ayub Digal";
$op_supervisor[30]="Nanki Badaik Sing";
$op_supervisor[31]="Girish Chandra Marandi";
$op_supervisor[32]="Nilambar Pangi";
$op_supervisor[33]="Ashish Kumar";
$op_supervisor[34]="A.K. Binoy";
$op_supervisor[35]="Ramesh Khadia";
$op_supervisor[36]="Sandeep Singh";
$op_supervisor[37]="Binu Vijayan";
$op_supervisor[38]="Christudas ";
$op_supervisor[39]="Anto Mathew M";
$op_supervisor[40]="Pharget/Parget Massih";
$op_supervisor[41]="Premraj ";
$op_supervisor[42]="Shijo Samuel";
$op_supervisor[43]="Stephen Masih";
$op_supervisor[44]="Molay Roy";
$op_supervisor[45]="Karan John";
$op_supervisor[46]="Massih Issaiah";
$op_supervisor[47]="Umesh Kumar";
$op_supervisor[48]="Amrithpal Singh";
$op_supervisor[49]="Arokya Das";
$op_supervisor[50]="Pramanda ";
$op_supervisor[51]="Aneesh Mathew";
$op_supervisor[52]="Jobin Abraham";
$op_supervisor[53]="Joseph Sankeshwar";
$op_supervisor[54]="Johen Kumar";
$op_supervisor[55]="Brijesh Kumar Singh";
$op_supervisor[56]="Shaji Mathew";
$op_supervisor[57]="Sujit Kumar Nayak";
$op_supervisor[58]="Suresh Rajan";
$op_supervisor[59]="Kalyan Nanda";
$op_supervisor[60]="Joseph Khristi";
$op_supervisor[61]="Monu Rawat";
$op_supervisor[62]="Samuel Stephen";
$op_supervisor[63]="Samuel Raj";
$op_supervisor[64]="Jagadeesh Bellomkonda";
$op_supervisor[65]="Thumala Pawankumar";
$op_supervisor[66]="Johnson Stephen";
$op_supervisor[67]="Bifan Lohara";
$op_supervisor[68]="Ashok Sharma";
$op_supervisor[69]="Digambar Pathode";
$op_supervisor[70]="Vipeen Rodge";
$op_supervisor[71]="Frankline Jose";
$op_supervisor[72]="Om Panth";
$op_supervisor[73]="David Wilson";
$op_supervisor[74]="Pradeep Kamble";
$op_supervisor[75]="Jitendra Kumar Bagha";
$op_supervisor[76]="Robert Benard";
$op_supervisor[77]="Finny George";
$op_supervisor[78]="John Singh";
$op_supervisor[79]="Meera Patil";
$op_supervisor[80]="Binu Gabriel";
$op_supervisor[81]="Dileep Kumar";
$op_supervisor[82]="Harash Kumar Anand";
$op_supervisor[83]="Dandu Vijaya Raju";
$op_supervisor[84]="Judson Abraham";
$op_supervisor[85]="Ravish Ronald";
$op_supervisor[86]="Amruta Rao";
$op_supervisor[87]="Ransay Bhagat";
$op_supervisor[88]="Eswara Rao";
$op_supervisor[89]="Akash Deep Acharjee";
$op_supervisor[90]="Firoj Tigga";
$op_supervisor[91]="Samuel C H";
$op_supervisor[92]="Purushottam Kumar";
$op_supervisor[93]="Rajkumar Dodiba Chowhan";
$op_supervisor[94]="Ghanshyam Hirawani";
$op_supervisor[95]="Firesh limma";

//op_account_cluster

$op_account_cluster[1]="Andhra Pradesh 1";
$op_account_cluster[2]="Tripura 1";
$op_account_cluster[3]="Odisha 1";
$op_account_cluster[4]="Assam 1";
$op_account_cluster[5]="Chhattisgarh 1";
$op_account_cluster[6]="Gujurat 1";
$op_account_cluster[7]="Jammu & Kashmir 1";
$op_account_cluster[8]="Punjab 1";
$op_account_cluster[9]="Karnataka 1";
$op_account_cluster[10]="Kerala 1";
$op_account_cluster[11]="Rajasthan 1";
$op_account_cluster[12]="Uttar Pradesh 4";
$op_account_cluster[13]="Madhya Pradesh 1";
$op_account_cluster[14]="Maharashtra 1";
$op_account_cluster[15]="Odisha 2";
$op_account_cluster[16]="Uttarakhand 1";
$op_account_cluster[17]="Uttar Pradesh 3";
$op_account_cluster[18]="Himachal Pradesh 1";
$op_account_cluster[19]="Tamil Nadu 1";
$op_account_cluster[20]="Andaman Nicobar 1";
$op_account_cluster[21]="Uttar Pradesh 1";
$op_account_cluster[22]="West Bengal 1";
$op_account_cluster[23]="Uttar Pradesh 2";
$op_account_cluster[24]="Delhi 1";
$op_account_cluster[25]="Maharashtra 2";

//op_cost_type

$op_cost_type[1]="Community Development Programme";
$op_cost_type[2]="work support";
$op_cost_type[3]="Child welfare programme";
$op_cost_type[4]="Educational Assistance";
$op_cost_type[5]="Medical Assistance";
$op_cost_type[6]="Rehabilitation Programme";
$op_cost_type[7]="Economic Enhancement Project";
$op_cost_type[8]="Staff Honerarium";
$op_cost_type[9]="Social welfare program";
$op_cost_type[10]="Community Develp";
$op_cost_type[11]="Child welfare programe";
$op_cost_type[12]="Child welsfare Programme";
$op_cost_type[13]="Child Welfare Program";
$op_cost_type[14]="Community Development Program";
$op_cost_type[15]="Field Training";

//op_support_country
$op_support_country[1]="500k UK/Indiana/Arizona";
$op_support_country[2]="Costa Rica";
$op_support_country[3]="India (Cotton Hill Account)";
$op_support_country[4]="UAE";
$op_support_country[5]="Cash in hand";
$op_support_country[6]="Brazil";
$op_support_country[7]="Canada";
$op_support_country[8]="Panama (Pr Antonio church)";
$op_support_country[9]="Panama (Pr Mario church)";
$op_support_country[10]="USA (independent)";
$op_support_country[11]="Non-500k";

//op_lang

$op_lang[1]="Read";
$op_lang[2]="Write";
$op_lang[3]="Read and Write";
$op_lang[4]="Read and Write - Not Proficient";
$op_lang[5]="Read and Write - Proficient";

//op_score
$op_score[1]="Very Poor";
$op_score[2]="Poor";
$op_score[3]="Moderate";
$op_score[4]="Good";
$op_score[5]="Very Good";

$op_yes_no[1]="Yes";
$op_yes_no[2]="No";

$op_hw_fund_help_fw[1]="It will enable the FW to do church planting work full time not part time";
$op_hw_fund_help_fw[2]="It will enable the FW to begin ministry in a new locaiton";
$op_hw_fund_help_fw[3]="It will enable the FW to live in his ministry location";
$op_hw_fund_help_fw[4]="It will remove unnecessary financial burdens so the FW will be under less pressure and be able to focus more on the church planting work";
$op_hw_fund_help_fw[5]="Support from another organisation removed";


$op_affiliated[1]="Affiliated";
$op_affiliated[2]="Independent";


$op_language[1]="Bengali";
$op_language[2]="Marathi";
$op_language[3]="Telugu";
$op_language[4]="Tamil";
$op_language[5]="Gujarati";
$op_language[6]="Urdu";
$op_language[7]="Kannada";
$op_language[8]="Odia";
$op_language[9]="Malayalam";
$op_language[10]="Punjabi";
$op_language[11]="Sanskrit";








//print_r($op_BC_main);exit;


        /////// options ends //////////////////////

        $page_data['op_BC_main']=$op_BC_main;
        $page_data['op_DBC']=$op_DBC;
        $page_data['op_board']=$op_board;
        $page_data['op_fstatus']=$op_fstatus;
        $page_data['op_mf_type']=$op_mf_type;
        $page_data['op_pre_news']=$op_pre_news;
        $page_data['op_pio_inherits']=$op_pio_inherits;
        $page_data['op_living']=$op_living;
        $page_data['op_rec_fund']=$op_rec_fund;
        $page_data['op_influence_factor']=$op_influence_factor;
        $page_data['op_coordinator']=$op_coordinator;
        $page_data['op_supervisor']=$op_supervisor;
        $page_data['op_account_cluster']=$op_account_cluster;
        $page_data['op_cost_type']=$op_cost_type;
        $page_data['op_support_country']=$op_support_country;
        $page_data['op_lang']=$op_lang;
        $page_data['op_score']=$op_score;
        $page_data['op_yes_no']=$op_yes_no;
        $page_data['op_hw_fund_help_fw']=$op_hw_fund_help_fw;
        $page_data['op_affiliated']=$op_affiliated;
        $page_data['op_language']=$op_language;

        


        if($param1=="first")
        {
    
        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
        //////////////////// page details end ///////////////////
          }

          /////////////////////  add new second start  /////////////////////////

        else if($param1=="first1")
            {

                //$missionary_id=$param2;
               // echo "hi second";exit;

             // echo $param2;exit;
              $page_data["missionary_id"]=$param2;

              $page_data['page_title']="Add New Missionary";
              $page_data['form_heading']="Add FW Demographic Information";
              $page_data['table_heading']="Report List";
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/add_missionary_new";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }

      /////////////////////  add new second start  /////////////////////////

        else if($param1=="second")
            {

                //$missionary_id=$param2;
               // echo "hi second";exit;

             // echo $param2;exit;
              $page_data["missionary_id"]=$param2;

              $page_data['page_title']="Add New Missionary";
              $page_data['form_heading']="Add Ministry location details";
              $page_data['table_heading']="Report List";
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/add_missionary_second";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }




      /////////////////////  add new second end  /////////////////////////

            /////////////////////  add new third start  /////////////////////////

        else if($param1=="third")
            {

              $page_data["missionary_id"]=$param2;
               // echo "hi second";exit;

              $page_data['page_title']="Add New Missionary";
              $page_data['form_heading']="Add FW skills and Experience Details";              
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/add_missionary_third";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }

        else if($param1=="four")
            {

                 $page_data["missionary_id"]=$param2;
               // echo "hi second";exit;

              $page_data['page_title']="Add New Missionary";
              $page_data['form_heading']="Add Supervision";              
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/add_missionary_four";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }

          else if($param1=="five")
            {

                 $page_data["missionary_id"]=$param2;
               // echo "hi second";exit;

              $page_data['page_title']="Add New Missionary";
              $page_data['form_heading']="Add Reference";              
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/add_missionary_five";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }
            else if($param1=="six")
            {

                 $page_data["missionary_id"]=$param2;
               // echo "hi second";exit;

              $page_data['page_title']="Add New Missionary";
              $page_data['form_heading']="Add FW testimony";              
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/add_missionary_six";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }




      /////////////////////  add new third end  /////////////////////////


                
            

    }
///////////////////////// Missionary list End ////////////////

    ///////////////// missionary profile start /////////////

       function missionary_profile($param1="")
    {

        $missionary_id=$param1;
        //echo $missionary_id;exit;

            ///// options starts ////

              $op_yes_no[1]="Yes";
              $op_yes_no[2]="No";

              $op_mf_type[1]="Village";
              $op_mf_type[2]="Town";
              $op_mf_type[3]="City";

              $op_hw_fund_help_fw[1]="It will enable the FW to do church planting work full time not part time";
              $op_hw_fund_help_fw[2]="It will enable the FW to begin ministry in a new locaiton";
              $op_hw_fund_help_fw[3]="It will enable the FW to live in his ministry location";
              $op_hw_fund_help_fw[4]="It will remove unnecessary financial burdens so the FW will be under less pressure and be able to focus more on the church planting work";
              $op_hw_fund_help_fw[5]="Support from another organisation removed";


              $op_BC_main[1]="IPC Theological Seminary";
              $op_BC_main[2]="ACE, Hydrabad";
              $op_BC_main[3]="Action Ministries, India";
              $op_BC_main[4]="ACTS Academy , Banglaore";
              $op_BC_main[5]="ACY, HYD";
              $op_BC_main[6]="AG Bible College, Gola";
              $op_BC_main[7]="AG Bible Taining Centre";
              $op_BC_main[8]="AG Central Bible College";
              $op_BC_main[9]="Ag Traing Center";
              $op_BC_main[10]="Agape Institute (Ponta Sahib)";
              $op_BC_main[11]="AGAPE, VIJAYAWADA";
              $op_BC_main[12]="Allahabad Bible Seminary";
              $op_BC_main[13]="Anglican Clergy Episcopal, Hyderabad";
              $op_BC_main[14]="Aroma Bible College, Dhamtari";
              $op_BC_main[15]="Aroma Bible College, Dhamtari 3Years and New Life Biblical Seminari Kerla 3Years";
              $op_BC_main[16]="Asian theological association";
              $op_BC_main[17]="Assembly of Gospel For Asia, Bhubaneswar (Lucknow)";
              $op_BC_main[18]="Beersheba Theological College";
              $op_BC_main[19]="Beersheba Theological College, Jagadalpur";
              $op_BC_main[20]="Beersheba Theological College, Pippiria";
              $op_BC_main[21]="Beleivers Church";
              $op_BC_main[22]="believers church";
              $op_BC_main[23]="Berean Baptist Bible College And Seminary";
              $op_BC_main[24]="Bethany Bible College, Trivandrum";
              $op_BC_main[25]="Bethel Bible College, Punalur";
              $op_BC_main[26]="Bethel Bible College, Punalur, New Life Biblical Seminary , Cheruvakkal, Harvest Mission Bible college";
              $op_BC_main[27]="Bethel New life college, Banglore";
              $op_BC_main[28]="Bilaspur";
              $op_BC_main[29]="Buntain Theological Seminary, Kolkotta";
              $op_BC_main[30]="C.TH, Pamgarh";
              $op_BC_main[31]="Calvary Bible College";
              $op_BC_main[32]="Carmel Bible Training Centre Pathankot";
              $op_BC_main[33]="Central Bible College";
              $op_BC_main[34]="Central India Bible College";
              $op_BC_main[35]="Central India theological seminary Itarsi MP.";
              $op_BC_main[36]="CFI";
              $op_BC_main[37]="CFI CHHATTISGARH";
              $op_BC_main[38]="Chandigarh";
              $op_BC_main[39]="Changshin Academy for pastors in Nagpur";
              $op_BC_main[40]="Christ Ambassadors Bible Training centre, Mumbai";
              $op_BC_main[41]="Christ Calvary";
              $op_BC_main[42]="Church on the Rock";
              $op_BC_main[43]="CTH BILASPUR";
              $op_BC_main[44]="Delhi";
              $op_BC_main[45]="Delhi Bible Instiute";
              $op_BC_main[46]="DLM";
              $op_BC_main[47]="Doon Bible college, Dheradoon";
              $op_BC_main[48]="DTH";
              $op_BC_main[49]="Ebenezar Theological Seminary";
              $op_BC_main[50]="Eleos Bible Training School";
              $op_BC_main[51]="Elim Bible traning center Rourkela";
              $op_BC_main[52]="Elue Bible Institute";
              $op_BC_main[53]="Emmanuel Bible College";
              $op_BC_main[54]="Emmanuel BIble Institute Karnataka";
              $op_BC_main[55]="faith bible collage";
              $op_BC_main[56]="Faith Bible College,Ranny , Kerala";
              $op_BC_main[57]="Fisherman Bible college, Vijayawada
              Grace Bible Coillege , hariyana";
              $op_BC_main[58]="FTS Manakkala";
              $op_BC_main[59]="Gamaliel Theological centre, Uttarakhand";
              $op_BC_main[60]="GCM Gujrath";
              $op_BC_main[61]="GEMS BIBLE SCHOOL, BIHAR";
              $op_BC_main[62]="GFA, Odisha";
              $op_BC_main[63]="Gilgal Bible college, Goa";
              $op_BC_main[64]="Gola, Uttaer Pradesh";
              $op_BC_main[65]="Good News International University";
              $op_BC_main[66]="Gorakhpur Seminary";
              $op_BC_main[67]="Gospel For Asia, Anoopgarh";
              $op_BC_main[68]="Gospel For Asia, Bhubaneswar";
              $op_BC_main[69]="Gospel For Asia, Bilaspur";
              $op_BC_main[70]="Gospel For Asia, Brijaraj Nagar";
              $op_BC_main[71]="Gospel For Asia, Palampur";
              $op_BC_main[72]="Gospel For Asia, Thiruvalla";
              $op_BC_main[73]="Grace Bible College, Hariyana";
              $op_BC_main[74]="Grace Bible Institute Durg";
              $op_BC_main[75]="Grace centre for theological Taining";
              $op_BC_main[76]="Grace Centre, Gola";
              $op_BC_main[77]="Grace Decipleship Centre";
              $op_BC_main[78]="Great Commission Bible College";
              $op_BC_main[79]="Gujarath Bible College";
              $op_BC_main[80]="Hallelujah Bible School, Bhopal";
              $op_BC_main[81]="Hallelujah Bible Training Centre";
              $op_BC_main[82]="Harvest Mission College, Noida";
              $op_BC_main[83]="Harvest Training Institute, Chennai";
              $op_BC_main[84]="Harvest Vision Centre Karkapal";
              $op_BC_main[85]="Himachal Bible College and Seminary";
              $op_BC_main[86]="Himalaya Evangelical Mission";
              $op_BC_main[87]="Himanchal Bible College and Bersheeba Bible College";
              $op_BC_main[88]="Holistic Training Centre";
              $op_BC_main[89]="Holy Spirit Training Centre";
              $op_BC_main[90]="Hosanna Ministry, Andhra Pradesh";
              $op_BC_main[91]="IBM";
              $op_BC_main[92]="ICA";
              $op_BC_main[93]="ICMTP (Diploma In Christian Ministry)";
              $op_BC_main[94]="ICOM";
              $op_BC_main[95]="ICT, SEVABHARAT";
              $op_BC_main[96]="IDC-JEHOVAN NISSI BILE INSTITUTE.";
              $op_BC_main[97]="IGM, Lucknow";
              $op_BC_main[98]="IGSM";
              $op_BC_main[99]="India Bible college and Seminary";
              $op_BC_main[100]="India Full Gospel Bible College in Banglore";
              $op_BC_main[101]="Indian Bible Literature";
              $op_BC_main[102]="Indiann Institiute of Theological";
              $op_BC_main[103]="International Institute of Church Management";
              $op_BC_main[104]="International Institute Of Theology";
              $op_BC_main[105]="International School of Evangelism";
              $op_BC_main[106]="IPC Theological Seminary";
              $op_BC_main[107]="Jeevan Jyoti Bible Training Centre Bible Training Centre";
              $op_BC_main[108]="Kachua Mission College, Alahabad";
              $op_BC_main[109]="Karnataka Institute of Theology";
              $op_BC_main[110]="Kerala Theological Seminary";
              $op_BC_main[111]="Khammam, Telangana";
              $op_BC_main[112]="Latur bible college";
              $op_BC_main[113]="LCT Lucknow";
              $op_BC_main[114]="Light for India";
              $op_BC_main[115]="Light for India Bible college";
              $op_BC_main[116]="Living bible Institute";
              $op_BC_main[117]="Living Hope";
              $op_BC_main[118]="Living Word Mission";
              $op_BC_main[119]="Lucknow Theological College";
              $op_BC_main[120]="Mahaneh Den Theological Trainning Center, Mubai";
              $op_BC_main[121]="Maharashtra Bible college";
              $op_BC_main[122]="Manna Bible College";
              $op_BC_main[123]="Maranatha Bible Training Centre";
              $op_BC_main[124]="Masters Trainers";
              $op_BC_main[125]="MBCB";
              $op_BC_main[126]="MBTI";
              $op_BC_main[127]="Mission India Bible College, Guna";
              $op_BC_main[128]="Mission India Bible College, Trivandrum";
              $op_BC_main[129]="Mission India Bible College, Trivandrum and SeminaryRaipur";
              $op_BC_main[130]="Mission India Disciple center.Chatisgarh";
              $op_BC_main[131]="Missionary Training Centre, Patiala";
              $op_BC_main[132]="Missions India Theological Seminary, Nagpur";
              $op_BC_main[133]="NA";
              $op_BC_main[134]="NAMTE, Jalandhar";
              $op_BC_main[135]="NBM, Latur";
              $op_BC_main[136]="Nehemiah Bible Istitution ,Tamil Nadu";
              $op_BC_main[137]="New Hope Bible College, Nilambur";
              $op_BC_main[138]="New India Biblical Seminary, Paippad";
              $op_BC_main[139]="New India church of God bible College";
              $op_BC_main[140]="New Life Bible College, Bangalore";
              $op_BC_main[141]="New Life Biblical Seminary , Cheruvakkal";
              $op_BC_main[142]="New LIfe College";
              $op_BC_main[143]="New Thelogical College, DehraDoon Bible college, Dheradoon";

              $op_BC_main[145]="No";
              $op_BC_main[146]="No formal training";
              $op_BC_main[147]="No formal Training";
              $op_BC_main[148]="NO FORMAL TRAINING";
              $op_BC_main[149]="No Training";
              $op_BC_main[150]="North India Bible Institute";
              $op_BC_main[151]="North India Theological Seminary Bhopal";
              $op_BC_main[152]="North Indian Institute for Theological Studies";
              $op_BC_main[153]="Northen Institute Of Biblical Study, In Patiala";
              $op_BC_main[154]="Odisha Bible School";
              $op_BC_main[155]="Operation Agape ible College,Ludhiana";
              $op_BC_main[156]="Peniel Bible Seminary, Keezhillam";
              $op_BC_main[157]="Philedelphia Bible College";
              $op_BC_main[158]="Pniel Bible College";
              $op_BC_main[159]="Punjab";
              $op_BC_main[160]="Punjab Bible college";
              $op_BC_main[161]="Rajsthan bible collage";
              $op_BC_main[162]="Rev BM Chand School of Theology and Leadership";
              $op_BC_main[163]="Rhaema Bible training college, Nagpur,";
              $op_BC_main[164]="Rhema Bible College and Seminary, Palakkad";
              $op_BC_main[165]="Rourkeala Bible college";
              $op_BC_main[166]="Sacred Assemblies fellowship Delhi";
              $op_BC_main[167]="Samarpit Bible college";
              $op_BC_main[168]="Sathya Veda Seminary, Trivandrum";
              $op_BC_main[169]="School of Holy Spirit";
              $op_BC_main[170]="Shalom Bible Institute";
              $op_BC_main[171]="Sharon Bible College";
              $op_BC_main[172]="Shekkana";
              $op_BC_main[173]="Short term church bases dtraining";
              $op_BC_main[174]="South Western Bible college India";
              $op_BC_main[175]="Southern Asia Bible College";
              $op_BC_main[176]="Southern Bible College, Kanyakumary";
              $op_BC_main[177]="Spirit Faith Bible School";
              $op_BC_main[178]="Spirit of Faith Bible School";
              $op_BC_main[179]="Susamachar Theological College & Seminary";
              $op_BC_main[180]="SVS";
              $op_BC_main[181]="Tamilnadu Bible College and seminary";
              $op_BC_main[182]="TBL, Karnataka";
              $op_BC_main[183]="TEAC Mission Nawapur";
              $op_BC_main[184]="Telangana";
              $op_BC_main[185]="Trinity Binle College,Calicut";
              $op_BC_main[186]="Truth University, Nagpur,Maharashtra";
              $op_BC_main[187]="UP Mission Bible College, Kanpur";
              $op_BC_main[188]="Western India Pentecosta church-Anand,Gujarat";
              $op_BC_main[189]="Wisdom for Asia Bible College";
              $op_BC_main[190]="Word of Life Ministries, Lucknow, Up";
              $op_BC_main[191]="Yeshua Thelogical College. Alahabad";
              $op_BC_main[192]="Youth With A Mission";
              $op_BC_main[193]="Zion Raj";


              $op_affiliated[1]="Affiliated";
              $op_affiliated[2]="Independent";


              $op_language[1]="Bengali";
              $op_language[2]="Marathi";
              $op_language[3]="Telugu";
              $op_language[4]="Tamil";
              $op_language[5]="Gujarati";
              $op_language[6]="Urdu";
              $op_language[7]="Kannada";
              $op_language[8]="Odia";
              $op_language[9]="Malayalam";
              $op_language[10]="Punjabi";
              $op_language[11]="Sanskrit";


              $op_DBC[1]="Pentecostal";
              $op_DBC[2]="Evangelical";
              $op_DBC[3]="Inter Denominational";
              $op_DBC[4]="NCM";
              $op_DBC[5]="Christ for India";
              $op_DBC[6]="Baptist";
              $op_DBC[7]="NA";
              $op_DBC[8]="IET";
              $op_DBC[9]="Assembly Of God";
              $op_DBC[10]="IPC";
              $op_DBC[11]="Pentecost";
              $op_DBC[12]="life center";
              $op_DBC[13]="Sharon Fellowship";
              $op_DBC[14]="Sathya Veda Seminary, Trivandrum";
              $op_DBC[15]="ICT, SEVABHARATh";
              $op_DBC[16]="Anglican";
              $op_DBC[17]="Southern Asia Bible College";
              $op_DBC[18]="No";
              $op_DBC[19]="IGM";
              $op_DBC[20]="Beleivers Church";
              $op_DBC[21]="CFI";
              $op_DBC[22]="Bretheren";
              $op_DBC[23]="Independent";
              $op_DBC[24]="Sharon";
              $op_DBC[25]="Church of God";
              $op_DBC[26]="NCM";


            //// options end /////

              $page_data['op_yes_no']=$op_yes_no;
              $page_data['op_mf_type']=$op_mf_type;
              $page_data['op_hw_fund_help_fw']=$op_hw_fund_help_fw;
              $page_data['op_BC_main']=$op_BC_main;
              $page_data['op_affiliated']=$op_affiliated;
              $page_data['op_language']=$op_language;
              $page_data['op_DBC']=$op_DBC;



             
              $page_data['form_heading']="Upload Missionary list";
              $page_data['table_heading']="Missionaries List";
               $page_data['page_heading']="Missionarys";
              $page_data['err']="display: none";    

              $page_data['page_title']="Missionaries Profile";
              $page_data['css_file']="bk_cms/list_css";
              $page_data['page_name']="backennd/mp_pannel/missionary_profile";


           
            $page_data['top_menu']="bk_cms/top_menu";
            
            $page_data['script_file']="bk_cms/script";
             $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."MP_Panel","name"=>"Missionary Partner Pannel","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."MP_Panel/missionary","name"=>"Missionary List","class"=>"current");
            $page_data['bread_crums']=$bread_crum;

            $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

              $sql="select * from missionary_first where missionary_id=$missionary_id";

              $page_data['missionary_details1']=$this->Aedr_model->get_row_sql($sql);

              $page_data['profile_data']=$page_data['missionary_details1'];


              $sql="select * from missionary_second where missionary_id=$missionary_id";

              $missionary_details2=$this->Aedr_model->get_row_sql($sql);

              if($missionary_details2['is_fw_active_in_mf']==2)
              {
                $missionary_details2['desc_mf']="Not Applicable";
                $missionary_details2['mf_starting_date']="Not Applicable";
                $missionary_details2['tbaptized']="Not Applicable";
              }

              $page_data['missionary_details2']=$missionary_details2;



              $sql="select * from missionary_third where missionary_id=$missionary_id";

              $page_data['missionary_details3']=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_four where missionary_id=$missionary_id";

              $page_data['missionary_details4']=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_five where missionary_id=$missionary_id";

              $page_data['missionary_details5']=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_six where missionary_id=$missionary_id";

              $page_data['missionary_details6']=$this->Aedr_model->get_row_sql($sql);

              $page_data['missionary_id']=$missionary_id;

             //print_r($page_data['missionary_details2']);exit;

            





             ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
  //////////////////// page details end ///////////////////




    }






    ///////////////// missionary profile end /////////////

    ///////////////  Missionary List  ///////////////////


function missionaries($param1 = '', $param2 = '' , $param3 = '')
    {

     

        //////////////// page setup /////////////        
          
              $page_data['page_title']="Missionaries";
              $page_data['form_heading']="Upload Missionary list";
              $page_data['table_heading']="Missionaries List";
               $page_data['page_heading']="Missionarys";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/mp_pannel/missionary";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/list_form_css";
            $page_data['script_file']="bk_cms/script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."MP_Panel/missionaries","name"=>"Missionary List","class"=>"active-trail active");
           
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

           $mp_id=$this->session->userdata("mp_id");
           $sql="select * from missionary_first where mp_id=$mp_id order by fname";

      $page_data['missionaries_lists']=$this->Aedr_model->get_result_sql($sql);
      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');
     // $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

      


    
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

///////////////// generate the application pdf starts///////////////////

 public function generate_fw_application($param1='')
    {
      $missionary_id=1;
        if($param1<=0)
        {
           redirect(base_url().'missionaries/','refresh');
        }
        else
        {
          $missionary_id=$param1;
        }

          /////////// option data start ////////////////////////

          $op_yes_no[1]="Yes";
              $op_yes_no[2]="No";

              $op_mf_type[1]="Village";
              $op_mf_type[2]="Town";
              $op_mf_type[3]="City";

              $op_hw_fund_help_fw[1]="It will enable the FW to do church planting work full time not part time";
              $op_hw_fund_help_fw[2]="It will enable the FW to begin ministry in a new locaiton";
              $op_hw_fund_help_fw[3]="It will enable the FW to live in his ministry location";
              $op_hw_fund_help_fw[4]="It will remove unnecessary financial burdens so the FW will be under less pressure and be able to focus more on the church planting work";
              $op_hw_fund_help_fw[5]="Support from another organisation removed";


              $op_BC_main[1]="IPC Theological Seminary";
              $op_BC_main[2]="ACE, Hydrabad";
              $op_BC_main[3]="Action Ministries, India";
              $op_BC_main[4]="ACTS Academy , Banglaore";
              $op_BC_main[5]="ACY, HYD";
              $op_BC_main[6]="AG Bible College, Gola";
              $op_BC_main[7]="AG Bible Taining Centre";
              $op_BC_main[8]="AG Central Bible College";
              $op_BC_main[9]="Ag Traing Center";
              $op_BC_main[10]="Agape Institute (Ponta Sahib)";
              $op_BC_main[11]="AGAPE, VIJAYAWADA";
              $op_BC_main[12]="Allahabad Bible Seminary";
              $op_BC_main[13]="Anglican Clergy Episcopal, Hyderabad";
              $op_BC_main[14]="Aroma Bible College, Dhamtari";
              $op_BC_main[15]="Aroma Bible College, Dhamtari 3Years and New Life Biblical Seminari Kerla 3Years";
              $op_BC_main[16]="Asian theological association";
              $op_BC_main[17]="Assembly of Gospel For Asia, Bhubaneswar (Lucknow)";
              $op_BC_main[18]="Beersheba Theological College";
              $op_BC_main[19]="Beersheba Theological College, Jagadalpur";
              $op_BC_main[20]="Beersheba Theological College, Pippiria";
              $op_BC_main[21]="Beleivers Church";
              $op_BC_main[22]="believers church";
              $op_BC_main[23]="Berean Baptist Bible College And Seminary";
              $op_BC_main[24]="Bethany Bible College, Trivandrum";
              $op_BC_main[25]="Bethel Bible College, Punalur";
              $op_BC_main[26]="Bethel Bible College, Punalur, New Life Biblical Seminary , Cheruvakkal, Harvest Mission Bible college";
              $op_BC_main[27]="Bethel New life college, Banglore";
              $op_BC_main[28]="Bilaspur";
              $op_BC_main[29]="Buntain Theological Seminary, Kolkotta";
              $op_BC_main[30]="C.TH, Pamgarh";
              $op_BC_main[31]="Calvary Bible College";
              $op_BC_main[32]="Carmel Bible Training Centre Pathankot";
              $op_BC_main[33]="Central Bible College";
              $op_BC_main[34]="Central India Bible College";
              $op_BC_main[35]="Central India theological seminary Itarsi MP.";
              $op_BC_main[36]="CFI";
              $op_BC_main[37]="CFI CHHATTISGARH";
              $op_BC_main[38]="Chandigarh";
              $op_BC_main[39]="Changshin Academy for pastors in Nagpur";
              $op_BC_main[40]="Christ Ambassadors Bible Training centre, Mumbai";
              $op_BC_main[41]="Christ Calvary";
              $op_BC_main[42]="Church on the Rock";
              $op_BC_main[43]="CTH BILASPUR";
              $op_BC_main[44]="Delhi";
              $op_BC_main[45]="Delhi Bible Instiute";
              $op_BC_main[46]="DLM";
              $op_BC_main[47]="Doon Bible college, Dheradoon";
              $op_BC_main[48]="DTH";
              $op_BC_main[49]="Ebenezar Theological Seminary";
              $op_BC_main[50]="Eleos Bible Training School";
              $op_BC_main[51]="Elim Bible traning center Rourkela";
              $op_BC_main[52]="Elue Bible Institute";
              $op_BC_main[53]="Emmanuel Bible College";
              $op_BC_main[54]="Emmanuel BIble Institute Karnataka";
              $op_BC_main[55]="faith bible collage";
              $op_BC_main[56]="Faith Bible College,Ranny , Kerala";
              $op_BC_main[57]="Fisherman Bible college, Vijayawada
              Grace Bible Coillege , hariyana";
              $op_BC_main[58]="FTS Manakkala";
              $op_BC_main[59]="Gamaliel Theological centre, Uttarakhand";
              $op_BC_main[60]="GCM Gujrath";
              $op_BC_main[61]="GEMS BIBLE SCHOOL, BIHAR";
              $op_BC_main[62]="GFA, Odisha";
              $op_BC_main[63]="Gilgal Bible college, Goa";
              $op_BC_main[64]="Gola, Uttaer Pradesh";
              $op_BC_main[65]="Good News International University";
              $op_BC_main[66]="Gorakhpur Seminary";
              $op_BC_main[67]="Gospel For Asia, Anoopgarh";
              $op_BC_main[68]="Gospel For Asia, Bhubaneswar";
              $op_BC_main[69]="Gospel For Asia, Bilaspur";
              $op_BC_main[70]="Gospel For Asia, Brijaraj Nagar";
              $op_BC_main[71]="Gospel For Asia, Palampur";
              $op_BC_main[72]="Gospel For Asia, Thiruvalla";
              $op_BC_main[73]="Grace Bible College, Hariyana";
              $op_BC_main[74]="Grace Bible Institute Durg";
              $op_BC_main[75]="Grace centre for theological Taining";
              $op_BC_main[76]="Grace Centre, Gola";
              $op_BC_main[77]="Grace Decipleship Centre";
              $op_BC_main[78]="Great Commission Bible College";
              $op_BC_main[79]="Gujarath Bible College";
              $op_BC_main[80]="Hallelujah Bible School, Bhopal";
              $op_BC_main[81]="Hallelujah Bible Training Centre";
              $op_BC_main[82]="Harvest Mission College, Noida";
              $op_BC_main[83]="Harvest Training Institute, Chennai";
              $op_BC_main[84]="Harvest Vision Centre Karkapal";
              $op_BC_main[85]="Himachal Bible College and Seminary";
              $op_BC_main[86]="Himalaya Evangelical Mission";
              $op_BC_main[87]="Himanchal Bible College and Bersheeba Bible College";
              $op_BC_main[88]="Holistic Training Centre";
              $op_BC_main[89]="Holy Spirit Training Centre";
              $op_BC_main[90]="Hosanna Ministry, Andhra Pradesh";
              $op_BC_main[91]="IBM";
              $op_BC_main[92]="ICA";
              $op_BC_main[93]="ICMTP (Diploma In Christian Ministry)";
              $op_BC_main[94]="ICOM";
              $op_BC_main[95]="ICT, SEVABHARAT";
              $op_BC_main[96]="IDC-JEHOVAN NISSI BILE INSTITUTE.";
              $op_BC_main[97]="IGM, Lucknow";
              $op_BC_main[98]="IGSM";
              $op_BC_main[99]="India Bible college and Seminary";
              $op_BC_main[100]="India Full Gospel Bible College in Banglore";
              $op_BC_main[101]="Indian Bible Literature";
              $op_BC_main[102]="Indiann Institiute of Theological";
              $op_BC_main[103]="International Institute of Church Management";
              $op_BC_main[104]="International Institute Of Theology";
              $op_BC_main[105]="International School of Evangelism";
              $op_BC_main[106]="IPC Theological Seminary";
              $op_BC_main[107]="Jeevan Jyoti Bible Training Centre Bible Training Centre";
              $op_BC_main[108]="Kachua Mission College, Alahabad";
              $op_BC_main[109]="Karnataka Institute of Theology";
              $op_BC_main[110]="Kerala Theological Seminary";
              $op_BC_main[111]="Khammam, Telangana";
              $op_BC_main[112]="Latur bible college";
              $op_BC_main[113]="LCT Lucknow";
              $op_BC_main[114]="Light for India";
              $op_BC_main[115]="Light for India Bible college";
              $op_BC_main[116]="Living bible Institute";
              $op_BC_main[117]="Living Hope";
              $op_BC_main[118]="Living Word Mission";
              $op_BC_main[119]="Lucknow Theological College";
              $op_BC_main[120]="Mahaneh Den Theological Trainning Center, Mubai";
              $op_BC_main[121]="Maharashtra Bible college";
              $op_BC_main[122]="Manna Bible College";
              $op_BC_main[123]="Maranatha Bible Training Centre";
              $op_BC_main[124]="Masters Trainers";
              $op_BC_main[125]="MBCB";
              $op_BC_main[126]="MBTI";
              $op_BC_main[127]="Mission India Bible College, Guna";
              $op_BC_main[128]="Mission India Bible College, Trivandrum";
              $op_BC_main[129]="Mission India Bible College, Trivandrum and SeminaryRaipur";
              $op_BC_main[130]="Mission India Disciple center.Chatisgarh";
              $op_BC_main[131]="Missionary Training Centre, Patiala";
              $op_BC_main[132]="Missions India Theological Seminary, Nagpur";
              $op_BC_main[133]="NA";
              $op_BC_main[134]="NAMTE, Jalandhar";
              $op_BC_main[135]="NBM, Latur";
              $op_BC_main[136]="Nehemiah Bible Istitution ,Tamil Nadu";
              $op_BC_main[137]="New Hope Bible College, Nilambur";
              $op_BC_main[138]="New India Biblical Seminary, Paippad";
              $op_BC_main[139]="New India church of God bible College";
              $op_BC_main[140]="New Life Bible College, Bangalore";
              $op_BC_main[141]="New Life Biblical Seminary , Cheruvakkal";
              $op_BC_main[142]="New LIfe College";
              $op_BC_main[143]="New Thelogical College, DehraDoon Bible college, Dheradoon";

              $op_BC_main[145]="No";
              $op_BC_main[146]="No formal training";
              $op_BC_main[147]="No formal Training";
              $op_BC_main[148]="NO FORMAL TRAINING";
              $op_BC_main[149]="No Training";
              $op_BC_main[150]="North India Bible Institute";
              $op_BC_main[151]="North India Theological Seminary Bhopal";
              $op_BC_main[152]="North Indian Institute for Theological Studies";
              $op_BC_main[153]="Northen Institute Of Biblical Study, In Patiala";
              $op_BC_main[154]="Odisha Bible School";
              $op_BC_main[155]="Operation Agape ible College,Ludhiana";
              $op_BC_main[156]="Peniel Bible Seminary, Keezhillam";
              $op_BC_main[157]="Philedelphia Bible College";
              $op_BC_main[158]="Pniel Bible College";
              $op_BC_main[159]="Punjab";
              $op_BC_main[160]="Punjab Bible college";
              $op_BC_main[161]="Rajsthan bible collage";
              $op_BC_main[162]="Rev BM Chand School of Theology and Leadership";
              $op_BC_main[163]="Rhaema Bible training college, Nagpur,";
              $op_BC_main[164]="Rhema Bible College and Seminary, Palakkad";
              $op_BC_main[165]="Rourkeala Bible college";
              $op_BC_main[166]="Sacred Assemblies fellowship Delhi";
              $op_BC_main[167]="Samarpit Bible college";
              $op_BC_main[168]="Sathya Veda Seminary, Trivandrum";
              $op_BC_main[169]="School of Holy Spirit";
              $op_BC_main[170]="Shalom Bible Institute";
              $op_BC_main[171]="Sharon Bible College";
              $op_BC_main[172]="Shekkana";
              $op_BC_main[173]="Short term church bases dtraining";
              $op_BC_main[174]="South Western Bible college India";
              $op_BC_main[175]="Southern Asia Bible College";
              $op_BC_main[176]="Southern Bible College, Kanyakumary";
              $op_BC_main[177]="Spirit Faith Bible School";
              $op_BC_main[178]="Spirit of Faith Bible School";
              $op_BC_main[179]="Susamachar Theological College & Seminary";
              $op_BC_main[180]="SVS";
              $op_BC_main[181]="Tamilnadu Bible College and seminary";
              $op_BC_main[182]="TBL, Karnataka";
              $op_BC_main[183]="TEAC Mission Nawapur";
              $op_BC_main[184]="Telangana";
              $op_BC_main[185]="Trinity Binle College,Calicut";
              $op_BC_main[186]="Truth University, Nagpur,Maharashtra";
              $op_BC_main[187]="UP Mission Bible College, Kanpur";
              $op_BC_main[188]="Western India Pentecosta church-Anand,Gujarat";
              $op_BC_main[189]="Wisdom for Asia Bible College";
              $op_BC_main[190]="Word of Life Ministries, Lucknow, Up";
              $op_BC_main[191]="Yeshua Thelogical College. Alahabad";
              $op_BC_main[192]="Youth With A Mission";
              $op_BC_main[193]="Zion Raj";


              $op_affiliated[1]="Affiliated";
              $op_affiliated[2]="Independent";


              $op_language[1]="Bengali";
              $op_language[2]="Marathi";
              $op_language[3]="Telugu";
              $op_language[4]="Tamil";
              $op_language[5]="Gujarati";
              $op_language[6]="Urdu";
              $op_language[7]="Kannada";
              $op_language[8]="Odia";
              $op_language[9]="Malayalam";
              $op_language[10]="Punjabi";
              $op_language[11]="Sanskrit";


              $op_DBC[1]="Pentecostal";
              $op_DBC[2]="Evangelical";
              $op_DBC[3]="Inter Denominational";
              $op_DBC[4]="NCM";
              $op_DBC[5]="Christ for India";
              $op_DBC[6]="Baptist";
              $op_DBC[7]="NA";
              $op_DBC[8]="IET";
              $op_DBC[9]="Assembly Of God";
              $op_DBC[10]="IPC";
              $op_DBC[11]="Pentecost";
              $op_DBC[12]="life center";
              $op_DBC[13]="Sharon Fellowship";
              $op_DBC[14]="Sathya Veda Seminary, Trivandrum";
              $op_DBC[15]="ICT, SEVABHARATh";
              $op_DBC[16]="Anglican";
              $op_DBC[17]="Southern Asia Bible College";
              $op_DBC[18]="No";
              $op_DBC[19]="IGM";
              $op_DBC[20]="Beleivers Church";
              $op_DBC[21]="CFI";
              $op_DBC[22]="Bretheren";
              $op_DBC[23]="Independent";
              $op_DBC[24]="Sharon";
              $op_DBC[25]="Church of God";
              $op_DBC[26]="NCM";


            //// options end /////

              $data['op_yes_no']=$op_yes_no;
              $data['op_mf_type']=$op_mf_type;
              $data['op_hw_fund_help_fw']=$op_hw_fund_help_fw;
              $data['op_BC_main']=$op_BC_main;
              $data['op_affiliated']=$op_affiliated;
              $data['op_language']=$op_language;
              $data['op_DBC']=$op_DBC;




          /////////// option data end ////////////////////////


              $data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

              $sql="select * from missionary_first where missionary_id=$missionary_id";

              $data['missionary_details1']=$this->Aedr_model->get_row_sql($sql);

              $data['profile_data']=$page_data['missionary_details1'];


              $sql="select * from missionary_second where missionary_id=$missionary_id";

               $missionary_details2=$this->Aedr_model->get_row_sql($sql);

              if($missionary_details2['is_fw_active_in_mf']==2)
              {
                $missionary_details2['desc_mf']="Not Applicable";
                $missionary_details2['mf_starting_date']="Not Applicable";
                $missionary_details2['tbaptized']="Not Applicable";
              }

              $data['missionary_details2']=$missionary_details2;

              $sql="select * from missionary_third where missionary_id=$missionary_id";

              $data['missionary_details3']=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_four where missionary_id=$missionary_id";

              $data['missionary_details4']=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_five where missionary_id=$missionary_id";

              $data['missionary_details5']=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_six where missionary_id=$missionary_id";

              $data['missionary_details6']=$this->Aedr_model->get_row_sql($sql);


    //////// generate the pdf start /////

         $this->load->library('Pdf');
        $html = $this->load->view('fw_application', $data, true);
       $this->pdf->createPDF($html, $filename, false);


    //////////generate the pdf end ///////////


   }

///////////////// generate the application pdf ends///////////////////

   function fetch_district($param1='')
 {


  $state_id=$param1;

   //echo $topic_id;
 


   $sql="select * from district where state_id=$state_id";
    $rsts=$this->Aedr_model->get_result_sql($sql);
  $output ='<option value="0">Select District</option>';
  //  print_r($rst);

    foreach ($rsts as $rst) {
     $output .= '<option value="'.$rst['district_id'].'">'.$rst['name'].'</option>';
    }
  print_r($output);
 }

///////////////  Missionary Edit start  ///////////////////
function edit_missionary($param1='',$param2='')
    {

     
        //////////////// page setup /////////////        
          
              $page_data['page_title']="edit New Missionary";
              $page_data['form_heading']="Missionary Partners Details";
              $page_data['table_heading']="Report List";
               $page_data['page_heading']="New Missionary";
              $page_data['err']="display: none";    


            $page_data['page_name']="backennd/mp_pannel/edit_missionary_first";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';
          
             $bread_crum[0]=array("link"=>base_url()."MP_Panel","name"=>"Missionary Partner","class"=>"active-trail active");
            $bread_crum[1]=array("link"=>base_url()."MP_Panel/edit_missionary","name"=>"New Missionary","class"=>"current");
            $page_data['bread_crums']=$bread_crum;


     ///////////////////////  Data  //////////////////////

            $sql="select * from state order by name";

      $page_data['states']=$this->Aedr_model->get_result_sql($sql);



       

      // print_r($page_data['missionaries_lists']);exit;

      $page_data['state_by_id']=$this->Aedr_model->get_row_by_id('state','state_id');

       
        /////// options starts //////////////////////

        
//$op_BC_main//////////////////
$op_BC_main[1]="IPC Theological Seminary";
$op_BC_main[2]="ACE, Hydrabad";
$op_BC_main[3]="Action Ministries, India";
$op_BC_main[4]="ACTS Academy , Banglaore";
$op_BC_main[5]="ACY, HYD";
$op_BC_main[6]="AG Bible College, Gola";
$op_BC_main[7]="AG Bible Taining Centre";
$op_BC_main[8]="AG Central Bible College";
$op_BC_main[9]="Ag Traing Center";
$op_BC_main[10]="Agape Institute (Ponta Sahib)";
$op_BC_main[11]="AGAPE, VIJAYAWADA";
$op_BC_main[12]="Allahabad Bible Seminary";
$op_BC_main[13]="Anglican Clergy Episcopal, Hyderabad";
$op_BC_main[14]="Aroma Bible College, Dhamtari";
$op_BC_main[15]="Aroma Bible College, Dhamtari 3Years and New Life Biblical Seminari Kerla 3Years";
$op_BC_main[16]="Asian theological association";
$op_BC_main[17]="Assembly of Gospel For Asia, Bhubaneswar (Lucknow)";
$op_BC_main[18]="Beersheba Theological College";
$op_BC_main[19]="Beersheba Theological College, Jagadalpur";
$op_BC_main[20]="Beersheba Theological College, Pippiria";
$op_BC_main[21]="Beleivers Church";
$op_BC_main[22]="believers church";
$op_BC_main[23]="Berean Baptist Bible College And Seminary";
$op_BC_main[24]="Bethany Bible College, Trivandrum";
$op_BC_main[25]="Bethel Bible College, Punalur";
$op_BC_main[26]="Bethel Bible College, Punalur, New Life Biblical Seminary , Cheruvakkal, Harvest Mission Bible college";
$op_BC_main[27]="Bethel New life college, Banglore";
$op_BC_main[28]="Bilaspur";
$op_BC_main[29]="Buntain Theological Seminary, Kolkotta";
$op_BC_main[30]="C.TH, Pamgarh";
$op_BC_main[31]="Calvary Bible College";
$op_BC_main[32]="Carmel Bible Training Centre Pathankot";
$op_BC_main[33]="Central Bible College";
$op_BC_main[34]="Central India Bible College";
$op_BC_main[35]="Central India theological seminary Itarsi MP.";
$op_BC_main[36]="CFI";
$op_BC_main[37]="CFI CHHATTISGARH";
$op_BC_main[38]="Chandigarh";
$op_BC_main[39]="Changshin Academy for pastors in Nagpur";
$op_BC_main[40]="Christ Ambassadors Bible Training centre, Mumbai";
$op_BC_main[41]="Christ Calvary";
$op_BC_main[42]="Church on the Rock";
$op_BC_main[43]="CTH BILASPUR";
$op_BC_main[44]="Delhi";
$op_BC_main[45]="Delhi Bible Instiute";
$op_BC_main[46]="DLM";
$op_BC_main[47]="Doon Bible college, Dheradoon";
$op_BC_main[48]="DTH";
$op_BC_main[49]="Ebenezar Theological Seminary";
$op_BC_main[50]="Eleos Bible Training School";
$op_BC_main[51]="Elim Bible traning center Rourkela";
$op_BC_main[52]="Elue Bible Institute";
$op_BC_main[53]="Emmanuel Bible College";
$op_BC_main[54]="Emmanuel BIble Institute Karnataka";
$op_BC_main[55]="faith bible collage";
$op_BC_main[56]="Faith Bible College,Ranny , Kerala";
$op_BC_main[57]="Fisherman Bible college, Vijayawada
Grace Bible Coillege , hariyana";
$op_BC_main[58]="FTS Manakkala";
$op_BC_main[59]="Gamaliel Theological centre, Uttarakhand";
$op_BC_main[60]="GCM Gujrath";
$op_BC_main[61]="GEMS BIBLE SCHOOL, BIHAR";
$op_BC_main[62]="GFA, Odisha";
$op_BC_main[63]="Gilgal Bible college, Goa";
$op_BC_main[64]="Gola, Uttaer Pradesh";
$op_BC_main[65]="Good News International University";
$op_BC_main[66]="Gorakhpur Seminary";
$op_BC_main[67]="Gospel For Asia, Anoopgarh";
$op_BC_main[68]="Gospel For Asia, Bhubaneswar";
$op_BC_main[69]="Gospel For Asia, Bilaspur";
$op_BC_main[70]="Gospel For Asia, Brijaraj Nagar";
$op_BC_main[71]="Gospel For Asia, Palampur";
$op_BC_main[72]="Gospel For Asia, Thiruvalla";
$op_BC_main[73]="Grace Bible College, Hariyana";
$op_BC_main[74]="Grace Bible Institute Durg";
$op_BC_main[75]="Grace centre for theological Taining";
$op_BC_main[76]="Grace Centre, Gola";
$op_BC_main[77]="Grace Decipleship Centre";
$op_BC_main[78]="Great Commission Bible College";
$op_BC_main[79]="Gujarath Bible College";
$op_BC_main[80]="Hallelujah Bible School, Bhopal";
$op_BC_main[81]="Hallelujah Bible Training Centre";
$op_BC_main[82]="Harvest Mission College, Noida";
$op_BC_main[83]="Harvest Training Institute, Chennai";
$op_BC_main[84]="Harvest Vision Centre Karkapal";
$op_BC_main[85]="Himachal Bible College and Seminary";
$op_BC_main[86]="Himalaya Evangelical Mission";
$op_BC_main[87]="Himanchal Bible College and Bersheeba Bible College";
$op_BC_main[88]="Holistic Training Centre";
$op_BC_main[89]="Holy Spirit Training Centre";
$op_BC_main[90]="Hosanna Ministry, Andhra Pradesh";
$op_BC_main[91]="IBM";
$op_BC_main[92]="ICA";
$op_BC_main[93]="ICMTP (Diploma In Christian Ministry)";
$op_BC_main[94]="ICOM";
$op_BC_main[95]="ICT, SEVABHARAT";
$op_BC_main[96]="IDC-JEHOVAN NISSI BILE INSTITUTE.";
$op_BC_main[97]="IGM, Lucknow";
$op_BC_main[98]="IGSM";
$op_BC_main[99]="India Bible college and Seminary";
$op_BC_main[100]="India Full Gospel Bible College in Banglore";
$op_BC_main[101]="Indian Bible Literature";
$op_BC_main[102]="Indiann Institiute of Theological";
$op_BC_main[103]="International Institute of Church Management";
$op_BC_main[104]="International Institute Of Theology";
$op_BC_main[105]="International School of Evangelism";
$op_BC_main[106]="IPC Theological Seminary";
$op_BC_main[107]="Jeevan Jyoti Bible Training Centre Bible Training Centre";
$op_BC_main[108]="Kachua Mission College, Alahabad";
$op_BC_main[109]="Karnataka Institute of Theology";
$op_BC_main[110]="Kerala Theological Seminary";
$op_BC_main[111]="Khammam, Telangana";
$op_BC_main[112]="Latur bible college";
$op_BC_main[113]="LCT Lucknow";
$op_BC_main[114]="Light for India";
$op_BC_main[115]="Light for India Bible college";
$op_BC_main[116]="Living bible Institute";
$op_BC_main[117]="Living Hope";
$op_BC_main[118]="Living Word Mission";
$op_BC_main[119]="Lucknow Theological College";
$op_BC_main[120]="Mahaneh Den Theological Trainning Center, Mubai";
$op_BC_main[121]="Maharashtra Bible college";
$op_BC_main[122]="Manna Bible College";
$op_BC_main[123]="Maranatha Bible Training Centre";
$op_BC_main[124]="Masters Trainers";
$op_BC_main[125]="MBCB";
$op_BC_main[126]="MBTI";
$op_BC_main[127]="Mission India Bible College, Guna";
$op_BC_main[128]="Mission India Bible College, Trivandrum";
$op_BC_main[129]="Mission India Bible College, Trivandrum and SeminaryRaipur";
$op_BC_main[130]="Mission India Disciple center.Chatisgarh";
$op_BC_main[131]="Missionary Training Centre, Patiala";
$op_BC_main[132]="Missions India Theological Seminary, Nagpur";
$op_BC_main[133]="NA";
$op_BC_main[134]="NAMTE, Jalandhar";
$op_BC_main[135]="NBM, Latur";
$op_BC_main[136]="Nehemiah Bible Istitution ,Tamil Nadu";
$op_BC_main[137]="New Hope Bible College, Nilambur";
$op_BC_main[138]="New India Biblical Seminary, Paippad";
$op_BC_main[139]="New India church of God bible College";
$op_BC_main[140]="New Life Bible College, Bangalore";
$op_BC_main[141]="New Life Biblical Seminary , Cheruvakkal";
$op_BC_main[142]="New LIfe College";
$op_BC_main[143]="New Thelogical College, DehraDoon Bible college, Dheradoon";

$op_BC_main[145]="No";
$op_BC_main[146]="No formal training";
$op_BC_main[147]="No formal Training";
$op_BC_main[148]="NO FORMAL TRAINING";
$op_BC_main[149]="No Training";
$op_BC_main[150]="North India Bible Institute";
$op_BC_main[151]="North India Theological Seminary Bhopal";
$op_BC_main[152]="North Indian Institute for Theological Studies";
$op_BC_main[153]="Northen Institute Of Biblical Study, In Patiala";
$op_BC_main[154]="Odisha Bible School";
$op_BC_main[155]="Operation Agape ible College,Ludhiana";
$op_BC_main[156]="Peniel Bible Seminary, Keezhillam";
$op_BC_main[157]="Philedelphia Bible College";
$op_BC_main[158]="Pniel Bible College";
$op_BC_main[159]="Punjab";
$op_BC_main[160]="Punjab Bible college";
$op_BC_main[161]="Rajsthan bible collage";
$op_BC_main[162]="Rev BM Chand School of Theology and Leadership";
$op_BC_main[163]="Rhaema Bible training college, Nagpur,";
$op_BC_main[164]="Rhema Bible College and Seminary, Palakkad";
$op_BC_main[165]="Rourkeala Bible college";
$op_BC_main[166]="Sacred Assemblies fellowship Delhi";
$op_BC_main[167]="Samarpit Bible college";
$op_BC_main[168]="Sathya Veda Seminary, Trivandrum";
$op_BC_main[169]="School of Holy Spirit";
$op_BC_main[170]="Shalom Bible Institute";
$op_BC_main[171]="Sharon Bible College";
$op_BC_main[172]="Shekkana";
$op_BC_main[173]="Short term church bases dtraining";
$op_BC_main[174]="South Western Bible college India";
$op_BC_main[175]="Southern Asia Bible College";
$op_BC_main[176]="Southern Bible College, Kanyakumary";
$op_BC_main[177]="Spirit Faith Bible School";
$op_BC_main[178]="Spirit of Faith Bible School";
$op_BC_main[179]="Susamachar Theological College & Seminary";
$op_BC_main[180]="SVS";
$op_BC_main[181]="Tamilnadu Bible College and seminary";
$op_BC_main[182]="TBL, Karnataka";
$op_BC_main[183]="TEAC Mission Nawapur";
$op_BC_main[184]="Telangana";
$op_BC_main[185]="Trinity Binle College,Calicut";
$op_BC_main[186]="Truth University, Nagpur,Maharashtra";
$op_BC_main[187]="UP Mission Bible College, Kanpur";
$op_BC_main[188]="Western India Pentecosta church-Anand,Gujarat";
$op_BC_main[189]="Wisdom for Asia Bible College";
$op_BC_main[190]="Word of Life Ministries, Lucknow, Up";
$op_BC_main[191]="Yeshua Thelogical College. Alahabad";
$op_BC_main[192]="Youth With A Mission";
$op_BC_main[193]="Zion Raj";
//op_DBC

$op_DBC[1]="Pentecostal";
$op_DBC[2]="Evangelical";
$op_DBC[3]="Inter Denominational";
$op_DBC[4]="NCM";
$op_DBC[5]="Christ for India";
$op_DBC[6]="Baptist";
$op_DBC[7]="NA";
$op_DBC[8]="IET";
$op_DBC[9]="Assembly Of God";
$op_DBC[10]="IPC";
$op_DBC[11]="Pentecost";
$op_DBC[12]="life center";
$op_DBC[13]="Sharon Fellowship";
$op_DBC[14]="Sathya Veda Seminary, Trivandrum";
$op_DBC[15]="ICT, SEVABHARATh";
$op_DBC[16]="Anglican";
$op_DBC[17]="Southern Asia Bible College";
$op_DBC[18]="No";
$op_DBC[19]="IGM";
$op_DBC[20]="Beleivers Church";
$op_DBC[21]="CFI";
$op_DBC[22]="Bretheren";
$op_DBC[23]="Independent";
$op_DBC[24]="Sharon";
$op_DBC[25]="Church of God";
$op_DBC[26]="NCM";

//op_board
$op_board[1]="NCM";
$op_board[2]="AG";
$op_board[3]="Harvest";
$op_board[4]="Other";

//$op_fstatus
$op_fstatus[2]="Married- no children";
$op_fstatus[3]="Widower / Widow";
$op_fstatus[4]="Married- with children";
$op_fstatus[5]="Widower / Widow - with children";

//op_mf_type
$op_mf_type[1]="Village";
$op_mf_type[2]="Town";
$op_mf_type[3]="City";

//op_pre_news
$op_pre_news[1]="Pre-existing";
$op_pre_news[2]="NewStarter";

//op_pio_inherits
$op_pio_inherits[1]="Pioneer";
$op_pio_inherits[2]="inheritor";

//op_living
$op_living[1]="Staying in his own village and commuting to the mission field";
$op_living[2]="Rented House in Mission field";
$op_living[3]="Beliver's House";
$op_living[4]="Pastor's Home";
$op_living[5]="Friend's Home";
$op_living[6]="Paraents Home";
$op_living[7]="Parents Home";
$op_living[8]="Supervisor's House";

/// op_rec_fund 

$op_rec_fund[1]="Part time to full time";
$op_rec_fund[2]="Newly starting ministry";
$op_rec_fund[3]="Struggling for daily bread";
$op_rec_fund[4]="Commuter to residential missionary";
$op_rec_fund[5]="Support from another mission withdrawn";
$op_rec_fund[6]="Part time to full time & commuter to residential";
$op_rec_fund[7]="He was working in an another organisation now God guided him to this new area.";
$op_rec_fund[8]="Missionary is going to start the ministry.";
$op_rec_fund[9]="Support stopped from other organization";
$op_rec_fund[10]="For his survival. room rent, and for his travel expences";

///op_influence_factor

$op_influence_factor[1]="0-20%";
$op_influence_factor[2]="20-40%";
$op_influence_factor[3]="40-60%";
$op_influence_factor[4]="60-80%";
$op_influence_factor[5]="80-100%";

//op_coordinator
$op_coordinator[1]="Aris Selvan";
$op_coordinator[2]="Pramanda Durga";
$op_coordinator[3]="Bikram Upadhay";
$op_coordinator[4]="Narendra Das";
$op_coordinator[5]="Joel Soloman";
$op_coordinator[6]="Binu Sekharan";
$op_coordinator[7]="Wilson";
$op_coordinator[8]="P C Mathew ";
$op_coordinator[9]="Suresh Kumar";
$op_coordinator[10]="Shaji Varghese";
$op_coordinator[11]="Santosh";
$op_coordinator[12]="Wilson Patole";
$op_coordinator[13]="M S Ramesh";
$op_coordinator[14]="Aneesh Mathew";
$op_coordinator[15]="Jobin Abraham";
$op_coordinator[16]="Babu Raj Thomson";
$op_coordinator[17]="Reji Samuel ";
$op_coordinator[18]="Gleetus Vincent";
$op_coordinator[19]="Ashok Sharma";
$op_coordinator[20]="David Wilson";
$op_coordinator[21]="Branton Philip";

//op_supervisor
$op_supervisor[1]="Aris Selvan";
$op_supervisor[2]="Ajith Kumar Pani";
$op_supervisor[3]="Bikram Upadhay";
$op_supervisor[4]="Sunil Kumar Jangde";
$op_supervisor[5]="Dinesh Nirala";
$op_supervisor[6]="Jagadesh Kumar";
$op_supervisor[7]="Narendra Das";
$op_supervisor[8]="Amarnath Sreekanth Bai";
$op_supervisor[9]="Vasanth Solanki";
$op_supervisor[10]="Preamodpargigleetus ";
$op_supervisor[11]="Ravison";
$op_supervisor[12]="Anu Soman";
$op_supervisor[13]="Manubendra Digal";
$op_supervisor[14]="Prakash GK Gamaliel Kanakam";
$op_supervisor[15]="Wilson";
$op_supervisor[16]="Naveen Kumar";
$op_supervisor[17]="Anji Nandihalli";
$op_supervisor[18]="Shajan A R";
$op_supervisor[19]="Christen Raj";
$op_supervisor[20]="Salim Raj";
$op_supervisor[21]="Suresh Kumar";
$op_supervisor[22]="Jose Lazer";
$op_supervisor[23]="Christopher C Thampi";
$op_supervisor[24]="Shiva Charan";
$op_supervisor[25]="Jagatheesh Bamne";
$op_supervisor[26]="Santosh ";
$op_supervisor[27]="Amol Satish Valvi";
$op_supervisor[28]="Vikram Vasava";
$op_supervisor[29]="Ayub Digal";
$op_supervisor[30]="Nanki Badaik Sing";
$op_supervisor[31]="Girish Chandra Marandi";
$op_supervisor[32]="Nilambar Pangi";
$op_supervisor[33]="Ashish Kumar";
$op_supervisor[34]="A.K. Binoy";
$op_supervisor[35]="Ramesh Khadia";
$op_supervisor[36]="Sandeep Singh";
$op_supervisor[37]="Binu Vijayan";
$op_supervisor[38]="Christudas ";
$op_supervisor[39]="Anto Mathew M";
$op_supervisor[40]="Pharget/Parget Massih";
$op_supervisor[41]="Premraj ";
$op_supervisor[42]="Shijo Samuel";
$op_supervisor[43]="Stephen Masih";
$op_supervisor[44]="Molay Roy";
$op_supervisor[45]="Karan John";
$op_supervisor[46]="Massih Issaiah";
$op_supervisor[47]="Umesh Kumar";
$op_supervisor[48]="Amrithpal Singh";
$op_supervisor[49]="Arokya Das";
$op_supervisor[50]="Pramanda ";
$op_supervisor[51]="Aneesh Mathew";
$op_supervisor[52]="Jobin Abraham";
$op_supervisor[53]="Joseph Sankeshwar";
$op_supervisor[54]="Johen Kumar";
$op_supervisor[55]="Brijesh Kumar Singh";
$op_supervisor[56]="Shaji Mathew";
$op_supervisor[57]="Sujit Kumar Nayak";
$op_supervisor[58]="Suresh Rajan";
$op_supervisor[59]="Kalyan Nanda";
$op_supervisor[60]="Joseph Khristi";
$op_supervisor[61]="Monu Rawat";
$op_supervisor[62]="Samuel Stephen";
$op_supervisor[63]="Samuel Raj";
$op_supervisor[64]="Jagadeesh Bellomkonda";
$op_supervisor[65]="Thumala Pawankumar";
$op_supervisor[66]="Johnson Stephen";
$op_supervisor[67]="Bifan Lohara";
$op_supervisor[68]="Ashok Sharma";
$op_supervisor[69]="Digambar Pathode";
$op_supervisor[70]="Vipeen Rodge";
$op_supervisor[71]="Frankline Jose";
$op_supervisor[72]="Om Panth";
$op_supervisor[73]="David Wilson";
$op_supervisor[74]="Pradeep Kamble";
$op_supervisor[75]="Jitendra Kumar Bagha";
$op_supervisor[76]="Robert Benard";
$op_supervisor[77]="Finny George";
$op_supervisor[78]="John Singh";
$op_supervisor[79]="Meera Patil";
$op_supervisor[80]="Binu Gabriel";
$op_supervisor[81]="Dileep Kumar";
$op_supervisor[82]="Harash Kumar Anand";
$op_supervisor[83]="Dandu Vijaya Raju";
$op_supervisor[84]="Judson Abraham";
$op_supervisor[85]="Ravish Ronald";
$op_supervisor[86]="Amruta Rao";
$op_supervisor[87]="Ransay Bhagat";
$op_supervisor[88]="Eswara Rao";
$op_supervisor[89]="Akash Deep Acharjee";
$op_supervisor[90]="Firoj Tigga";
$op_supervisor[91]="Samuel C H";
$op_supervisor[92]="Purushottam Kumar";
$op_supervisor[93]="Rajkumar Dodiba Chowhan";
$op_supervisor[94]="Ghanshyam Hirawani";
$op_supervisor[95]="Firesh limma";

//op_account_cluster

$op_account_cluster[1]="Andhra Pradesh 1";
$op_account_cluster[2]="Tripura 1";
$op_account_cluster[3]="Odisha 1";
$op_account_cluster[4]="Assam 1";
$op_account_cluster[5]="Chhattisgarh 1";
$op_account_cluster[6]="Gujurat 1";
$op_account_cluster[7]="Jammu & Kashmir 1";
$op_account_cluster[8]="Punjab 1";
$op_account_cluster[9]="Karnataka 1";
$op_account_cluster[10]="Kerala 1";
$op_account_cluster[11]="Rajasthan 1";
$op_account_cluster[12]="Uttar Pradesh 4";
$op_account_cluster[13]="Madhya Pradesh 1";
$op_account_cluster[14]="Maharashtra 1";
$op_account_cluster[15]="Odisha 2";
$op_account_cluster[16]="Uttarakhand 1";
$op_account_cluster[17]="Uttar Pradesh 3";
$op_account_cluster[18]="Himachal Pradesh 1";
$op_account_cluster[19]="Tamil Nadu 1";
$op_account_cluster[20]="Andaman Nicobar 1";
$op_account_cluster[21]="Uttar Pradesh 1";
$op_account_cluster[22]="West Bengal 1";
$op_account_cluster[23]="Uttar Pradesh 2";
$op_account_cluster[24]="Delhi 1";
$op_account_cluster[25]="Maharashtra 2";

//op_cost_type

$op_cost_type[1]="Community Development Programme";
$op_cost_type[2]="work support";
$op_cost_type[3]="Child welfare programme";
$op_cost_type[4]="Educational Assistance";
$op_cost_type[5]="Medical Assistance";
$op_cost_type[6]="Rehabilitation Programme";
$op_cost_type[7]="Economic Enhancement Project";
$op_cost_type[8]="Staff Honerarium";
$op_cost_type[9]="Social welfare program";
$op_cost_type[10]="Community Develp";
$op_cost_type[11]="Child welfare programe";
$op_cost_type[12]="Child welsfare Programme";
$op_cost_type[13]="Child Welfare Program";
$op_cost_type[14]="Community Development Program";
$op_cost_type[15]="Field Training";

//op_support_country
$op_support_country[1]="500k UK/Indiana/Arizona";
$op_support_country[2]="Costa Rica";
$op_support_country[3]="India (Cotton Hill Account)";
$op_support_country[4]="UAE";
$op_support_country[5]="Cash in hand";
$op_support_country[6]="Brazil";
$op_support_country[7]="Canada";
$op_support_country[8]="Panama (Pr Antonio church)";
$op_support_country[9]="Panama (Pr Mario church)";
$op_support_country[10]="USA (independent)";
$op_support_country[11]="Non-500k";

//op_lang

$op_lang[1]="Read";
$op_lang[2]="Write";
$op_lang[3]="Read and Write";
$op_lang[4]="Read and Write - Not Proficient";
$op_lang[5]="Read and Write - Proficient";

//op_score
$op_score[1]="Very Poor";
$op_score[2]="Poor";
$op_score[3]="Moderate";
$op_score[4]="Good";
$op_score[5]="Very Good";

$op_yes_no[1]="Yes";
$op_yes_no[2]="No";

$op_hw_fund_help_fw[1]="It will enable the FW to do church planting work full time not part time";
$op_hw_fund_help_fw[2]="It will enable the FW to begin ministry in a new locaiton";
$op_hw_fund_help_fw[3]="It will enable the FW to live in his ministry location";
$op_hw_fund_help_fw[4]="It will remove unnecessary financial burdens so the FW will be under less pressure and be able to focus more on the church planting work";
$op_hw_fund_help_fw[5]="Support from another organisation removed";


$op_affiliated[1]="Affiliated";
$op_affiliated[2]="Independent";


$op_language[1]="Bengali";
$op_language[2]="Marathi";
$op_language[3]="Telugu";
$op_language[4]="Tamil";
$op_language[5]="Gujarati";
$op_language[6]="Urdu";
$op_language[7]="Kannada";
$op_language[8]="Odia";
$op_language[9]="Malayalam";
$op_language[10]="Punjabi";
$op_language[11]="Sanskrit";








//print_r($op_BC_main);exit;


        /////// options ends //////////////////////

        $page_data['op_BC_main']=$op_BC_main;
        $page_data['op_DBC']=$op_DBC;
        $page_data['op_board']=$op_board;
        $page_data['op_fstatus']=$op_fstatus;
        $page_data['op_mf_type']=$op_mf_type;
        $page_data['op_pre_news']=$op_pre_news;
        $page_data['op_pio_inherits']=$op_pio_inherits;
        $page_data['op_living']=$op_living;
        $page_data['op_rec_fund']=$op_rec_fund;
        $page_data['op_influence_factor']=$op_influence_factor;
        $page_data['op_coordinator']=$op_coordinator;
        $page_data['op_supervisor']=$op_supervisor;
        $page_data['op_account_cluster']=$op_account_cluster;
        $page_data['op_cost_type']=$op_cost_type;
        $page_data['op_support_country']=$op_support_country;
        $page_data['op_lang']=$op_lang;
        $page_data['op_score']=$op_score;
        $page_data['op_yes_no']=$op_yes_no;
        $page_data['op_hw_fund_help_fw']=$op_hw_fund_help_fw;
        $page_data['op_affiliated']=$op_affiliated;
        $page_data['op_language']=$op_language;

        


        if($param1=="first")
        {

          $missionary_id=$param2;

      $sql="select * from missionary_first where missionary_id=".$missionary_id;


      $page_data['edit_data']=$this->Aedr_model->get_row_sql($sql);
      //print_r($page_data['edit_data']);exit;

        ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
        //////////////////// page details end ///////////////////
          }

          /////////////////////  edit new second start  /////////////////////////

        else if($param1=="first1")
            {

                $missionary_id=$param2;
                $sql="select * from missionary_first where missionary_id=".$missionary_id;

      $page_data['edit_data']=$this->Aedr_model->get_result_sql($sql);
                //$missionary_id=$param2;
               // echo "hi second";exit;

             // echo $param2;exit;
              $page_data["missionary_id"]=$param2;

              $page_data['page_title']="edit New Missionary";
              $page_data['form_heading']="edit FW Demographic Information";
              $page_data['table_heading']="Report List";
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/edit_missionary_new";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }

      /////////////////////  edit new second start  /////////////////////////

        else if($param1=="second")
            {

                //$missionary_id=$param2;
               // echo "hi second";exit;

             // echo $param2;exit;
              $page_data["missionary_id"]=$param2;

              $page_data['page_title']="edit New Missionary";
              $page_data['form_heading']="edit Ministry location details";
              $page_data['table_heading']="Report List";
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/edit_missionary_second";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }




      /////////////////////  edit new second end  /////////////////////////

            /////////////////////  edit new third start  /////////////////////////

        else if($param1=="third")
            {

              $page_data["missionary_id"]=$param2;
               // echo "hi second";exit;

              $page_data['page_title']="edit New Missionary";
              $page_data['form_heading']="edit FW skills and Experience Details";              
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/edit_missionary_third";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }

        else if($param1=="four")
            {

                 $page_data["missionary_id"]=$param2;
               // echo "hi second";exit;

              $page_data['page_title']="edit New Missionary";
              $page_data['form_heading']="edit Supervision";              
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/edit_missionary_four";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }

          else if($param1=="five")
            {

                 $page_data["missionary_id"]=$param2;
               // echo "hi second";exit;

              $page_data['page_title']="edit New Missionary";
              $page_data['form_heading']="edit Reference";              
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/edit_missionary_five";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }
            else if($param1=="six")
            {

                 $page_data["missionary_id"]=$param2;
               // echo "hi second";exit;

              $page_data['page_title']="edit New Missionary";
              $page_data['form_heading']="edit FW testimony";              
              $page_data['page_heading']="New Missionary";
                  


            $page_data['page_name']="backennd/mp_pannel/edit_missionary_six";
            $page_data['top_menu']="bk_cms/top_menu";
            $page_data['css_file']="bk_cms/advance_form_css";
            $page_data['script_file']="bk_cms/advance_form_script";
            $page_data['side_menu']="backennd/mp_pannel/side_menu";
             $page_data['footer']='bk_cms/footer';

            ///////////////// page details ////////////////////////
                $this->load->view($page_data['css_file']);
                $this->load->view($page_data['top_menu']);
                $this->load->view( $page_data['side_menu'],$page_data);
                $this->load->view($page_data['page_name'],$page_data);
                $this->load->view('bk_cms/footer');
                $this->load->view($page_data['script_file']); 
            //////////////////// page details end ///////////////////

            }




      /////////////////////  edit new third end  /////////////////////////


                
            

    }
///////////////////////// Missionary Edit End ////////////////


////////// update missionary details start  ///////////////////////

 function update_missionary($param1="")
    {
      // print_r($_POST);exit;missionaries

      if($param1=="first")
      {
        //print_r($this->session->userdata());exit;
        $missionary_id=$_POST['missionary_id'];
        $update=$_POST;
        $where ="missionary_id=".$missionary_id;
        $this->Aedr_model->update('missionary_first',$where,$update);

        redirect(base_url().'MP_Panel/missionary_profile/'.$missionary_id,'refresh');
         
      }
      if($param1=="first1")
      {
        //print_r($_POST);exit;
        $missionary_id=$_POST['missionary_id'];
        $update_data=$_POST;
        $update_data['dob']=date("Y-m-d",strtotime($this->input->post('dob')));

        $where ="missionary_id=".$missionary_id;

        $this->Aedr_model->update('missionary_first',$where,$update_data);
     
        

       redirect(base_url().'MP_Panel/missionary_profile/'.$missionary_id,'refresh');
         
      }
      elseif($param1=="second")
      {
        //print_r($_POST);exit;
        $missionary_id=$_POST['missionary_id'];
        $update=$_POST;
        $update['mf_starting_date']=date("Y-m-d",strtotime($this->input->post('mf_starting_date')));        
        $id=$this->Aedr_model->insert_id("missionary_second",$update);
        //echo $missionary_id;exit;
        redirect(base_url().'MP_Panel/add_missionary/third/'.$missionary_id,'refresh');
      }
      elseif($param1=="third")
      {
        $missionary_id=$_POST['missionary_id'];
        $update=$_POST;
        $id=$this->Aedr_model->insert_id("missionary_third",$update);
        redirect(base_url().'MP_Panel/add_missionary/four/'.$missionary_id,'refresh');
      }
      elseif($param1=="four")
      {
        $missionary_id=$_POST['missionary_id'];
        $update=$_POST;
        $id=$this->Aedr_model->insert_id("missionary_four",$update);
        redirect(base_url().'MP_Panel/add_missionary/five/'.$missionary_id,'refresh');
      }
      elseif($param1=="five")
      {
        $missionary_id=$_POST['missionary_id'];
       
        $update=$_POST;
        
        $id=$this->Aedr_model->insert_id("missionary_five",$update);
        redirect(base_url().'MP_Panel/add_missionary/six/'.$missionary_id,'refresh');
      }
      elseif($param1=="six")
      {
        $missionary_id=$_POST['missionary_id'];

        
        
        $update=$_POST;        
        $id=$this->Aedr_model->insert_id("missionary_six",$update);

        $this->update_googlesheet($missionary_id);

        redirect(base_url().'MP_Panel/missionary_profile/'.$missionary_id,'refresh');
      }
      


          ////////////////// google api sheet /////////////

      /* $this->load->library('Gapi');
        

        
       $report_period=$data['report_year']." R".$data['report_period'];


       $val_to_sheet=array(date('d-m-Y',strtotime($report['report_date'])),$reporter['name'],$report_period,$mid,$data['missionary_name'],$data['report'],$report['village_details'],implode(',',$data['prayer_points']),$data['photo_link'],$data['doc_link']);
     // print_r($val_to_sheet);exit;

    $this->gapi->writeData_uploadCatcher("1Vcwj46Cl3bIUhUbw7sYVU7QzgzMkJZgT4wt_6XM3u9g", "reportcatcher!A:J",$val_to_sheet);

   //exit;
       //print_r($result);exit;*/

 ////////////////////// google api sheet //////////////////////
    }

////////update missionary details end /////////////////////////////

}

?>