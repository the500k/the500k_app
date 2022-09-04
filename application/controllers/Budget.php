<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Budget extends CI_Controller
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

      echo "Budget Related Operation Done Here";

    }

    ///  Generate Central Budget Request sheet for 500k and JLM  //////////////

    function update_ncm_update(){
  
        $this->load->library('Gapi');
       
       $result=$this->gapi->readSheet("1P8EcL60k2mUJOK08s-Yl69QI4hsAu1kgeg0HIgPt_vw", "M Support!A:W");
        
          // print_r(count($result));exit;
         $i=1;
        foreach ($result as $rst) {

          if($i>732 && $i<733){    


       $val_to_sheet=array($rst[0], $rst[1],  $rst[2],  $rst[3],  $rst[4],  $rst[5],  $rst[6],  $rst[7],  $rst[8],  $rst[9],  $rst[10], $rst[11], $rst[12], $rst[13], $rst[14], $rst[15], $rst[16], $rst[17], $rst[18], $rst[19], $rst[20], $rst[21], $rst[22], $rst[23]);


       for($j=0;$j<count($val_to_sheet);$j++)
          {
              if($val_to_sheet[$j]==NULL)
              {
                  $val_to_sheet[$j]="-";
              }

          }


          $this->gapi->writeNCMMsupport_centralsheet("1526laCJ_LHViYEbc1GOqbDxi-lzCMde-XE2x8L9iI38", "M Support!A:W",$val_to_sheet);

          echo $i.".";
          print_r($rst[3]);
           
          echo "<br>"; 




        }

        $i++;

      }
       
      }
      function update_jlm_update(){
  
        $this->load->library('Gapi');
       
       $result=$this->gapi->readSheet("1_iVbphOeEapm2bP-EdY_uLSTdICuKxSA5QITqben1QE", "m support!A:P");
          /*
           print_r($result[0]); 
           echo "<br>";
           print_r($result[1]);exit;*/
         $i=1;
        foreach ($result as $rst) {

          if($i>2){    


       $val_to_sheet=array($rst[0],"MISSIONARY SALARY","Field workers", $rst[1],  $rst[2],  $rst[3],  $rst[4], $rst[4], $rst[6],  $rst[7],$rst[5],  $rst[8], $rst[8],$rst[8],"NA",  $rst[9],$rst[2].",".$rst[3].",Pincode-".$rst[10],$rst[12], $rst[13],$rst[11], $rst[14],"-", $rst[15]);


       for($j=0;$j<count($val_to_sheet);$j++)
          {
              if($val_to_sheet[$j]==NULL)
              {
                  $val_to_sheet[$j]="-";
              }

          }
            //print_r($val_to_sheet);exit;

          $this->gapi->writeNCMMsupport_centralsheet("1526laCJ_LHViYEbc1GOqbDxi-lzCMde-XE2x8L9iI38", "M Support!A:W",$val_to_sheet);

          echo $i.".";
          print_r($rst[1]);
           
          echo "<br>"; 




        }

        $i++;

      }
       
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

              $sql="select * from missionary_third where missionary_id=$missionary_id";

              $missionary_details3=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_four where missionary_id=$missionary_id";

              $missionary_details4=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_five where missionary_id=$missionary_id";

              $missionary_details5=$this->Aedr_model->get_row_sql($sql);

              $sql="select * from missionary_six where missionary_id=$missionary_id";

              $missionary_details6=$this->Aedr_model->get_row_sql($sql);
              
              $sql="select * from missionary_seven where missionary_id=$missionary_id";

              $missionary_details7=$this->Aedr_model->get_row_sql($sql);

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
              $op_BC_main[194]="Other";               
              $op_BC_main[195]="Bethel Bible Institute,  Markapur  (JLM)";               

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
              $op_DBC[27]="NOT Applicable";


                

            //// options end /////
               //print_r($this->session->userdata('name'));exit;
              
   //  print_r($missionary_details6);exit;

    ////////////////// google api sheet /////////////

      $this->load->library('Gapi');
       $val_to_sheet=array(date('d-m-Y',strtotime($missionary_details1['submission_date'])),$mp_name,$missionary_details1['mp_staff_name'],$missionary_details1['mp_staff_sname'],$missionary_details1['mp_staff_id'],$missionary_details1['mrid'],$missionary_details1['fname'],$missionary_details1['middlename'],$missionary_details1['surename'],date('d-m-Y',strtotime($missionary_details1['dob'])),$op_yes_no[$missionary_details1['fstatus']],$missionary_details1['depent'],$missionary_details1['phone_num'],$missionary_details1['alt_phone_num'],$op_yes_no[$missionary_details1['is_whatsapp_available']],$missionary_details1['aadhar_number'],$state_by_id[$missionary_details1['state_id']]['name'],$district_by_id[$missionary_details1['district_id']]['name'],$missionary_details2['primary_village'],$missionary_details2['pincode'],$op_mf_type[$missionary_details2['mf_type']],$missionary_details2['mf_population'],$op_yes_no[$missionary_details2['is_fw_active_in_mf']],$missionary_details2['mf_starting_date'],$missionary_details2['desc_mf'],$missionary_details2['desc_fw_income'],$missionary_details2['tbaptized'],$missionary_details2['hw_fund_help_fw'],$op_hw_fund_help_fw[$missionary_details2['hw_fund_help_fw_op']],$missionary_details2['tchristians'],$op_yes_no[$missionary_details2['is_fw_live_in_mf']],$missionary_details2['fw_address'],$op_yes_no[$missionary_details3['is_fw_trained_in_bc']],$op_BC_main[$missionary_details3['BC_main']],$missionary_details3['qualification'],$missionary_details3['noyear_training'],$missionary_details3['graduation_year'],$missionary_details3['other_course_year'],$op_yes_no[$missionary_details3['is_fw_spk_english']],$op_affiliated[$missionary_details3['is_affiliated']],$op_DBC[$missionary_details3['affiliated_denomination']],$missionary_details3['desc_fw_aligns'],$op_yes_no[$missionary_details3['is_fw_spk_hindi']],$op_language[$missionary_details3['other_spk_language']],$missionary_details4['supervisor_name'],$missionary_details4['supervisor_id'],$op_yes_no[$missionary_details4['is_supervisor_inducted']],$op_yes_no[$missionary_details4['is_supervisor_agree']],$missionary_details4['nof_supervisor'],$missionary_details4['distance_supervisor_fw'],$op_yes_no[$missionary_details4['is_FW_other_org']],$missionary_details4['FW_other_payment'],$missionary_details5['ref_name'],$missionary_details5['desc_reference'],$missionary_details6['FW_testimony'],$missionary_details7['installation_cost'],$missionary_details7['explaination_cost'],$missionary_details7['salary_recommandation']);


       $val_to_mpsheet=array(date('d-m-Y',strtotime($missionary_details1['submission_date'])),$missionary_details1['mp_staff_name'],$missionary_details1['mp_staff_sname'],$missionary_details1['mp_staff_id'],$missionary_details1['mrid'],$missionary_details1['fname'],$missionary_details1['middlename'],$missionary_details1['surename'],date('d-m-Y',strtotime($missionary_details1['dob'])),$op_yes_no[$missionary_details1['fstatus']],$missionary_details1['depent'],$missionary_details1['phone_num'],$missionary_details1['alt_phone_num'],$op_yes_no[$missionary_details1['is_whatsapp_available']],$missionary_details1['aadhar_number'],$state_by_id[$missionary_details1['state_id']]['name'],$district_by_id[$missionary_details1['district_id']]['name'],$missionary_details2['primary_village'],$missionary_details2['pincode'],$op_mf_type[$missionary_details2['mf_type']],$missionary_details2['mf_population'],$op_yes_no[$missionary_details2['is_fw_active_in_mf']],$missionary_details2['mf_starting_date'],$missionary_details2['desc_mf'],$missionary_details2['desc_fw_income'],$missionary_details2['tbaptized'],$missionary_details2['hw_fund_help_fw'],$op_hw_fund_help_fw[$missionary_details2['hw_fund_help_fw_op']],$missionary_details2['tchristians'],$op_yes_no[$missionary_details2['is_fw_live_in_mf']],$missionary_details2['fw_address'],$op_yes_no[$missionary_details3['is_fw_trained_in_bc']],$op_BC_main[$missionary_details3['BC_main']],$missionary_details3['qualification'],$missionary_details3['noyear_training'],$missionary_details3['graduation_year'],$missionary_details3['other_course_year'],$op_yes_no[$missionary_details3['is_fw_spk_english']],$op_affiliated[$missionary_details3['is_affiliated']],$op_DBC[$missionary_details3['affiliated_denomination']],$missionary_details3['desc_fw_aligns'],$op_yes_no[$missionary_details3['is_fw_spk_hindi']],$op_language[$missionary_details3['other_spk_language']],$missionary_details4['supervisor_name'],$missionary_details4['supervisor_id'],$op_yes_no[$missionary_details4['is_supervisor_inducted']],$op_yes_no[$missionary_details4['is_supervisor_agree']],$missionary_details4['nof_supervisor'],$missionary_details4['distance_supervisor_fw'],$op_yes_no[$missionary_details4['is_FW_other_org']],$missionary_details4['FW_other_payment'],$missionary_details5['ref_name'],$missionary_details5['desc_reference'],$missionary_details6['FW_testimony'],$missionary_details7['installation_cost'],$missionary_details7['explaination_cost'],$missionary_details7['salary_recommandation']);

       $val_to_MSsheet=array($missionary_details1['mrid'],$missionary_details1['fname'],$state_by_id[$missionary_details1['state_id']]['name'],$district_by_id[$missionary_details1['district_id']]['name'],$missionary_details7['salary_recommandation'],$missionary_details7['installation_cost'],"Applying",Date('d-m-Y'),$missionary_details4['supervisor_name'],$missionary_details2['fw_address'],$missionary_details2['pincode'],$missionary_details1['phone_num']);

       
       $val_to_CMSsheet=array($mp_name,$missionary_details1['mrid'],$missionary_details1['fname'],$state_by_id[$missionary_details1['state_id']]['name'],$district_by_id[$missionary_details1['district_id']]['name'],$missionary_details7['salary_recommandation'],$missionary_details7['installation_cost'],"Applying",Date('d-m-Y'),$missionary_details4['supervisor_name'],$missionary_details2['fw_address'],$missionary_details2['pincode'],$missionary_details1['phone_num']);

//print_r(count($val_to_MSsheet));exit;


for($i=0;$i<count($val_to_MSsheet);$i++)
{
    if($val_to_MSsheet[$i]==NULL)
    {
        $val_to_MSsheet[$i]="Not updated";
    }

}
for($i=0;$i<count($val_to_sheet);$i++)
{
    if($val_to_sheet[$i]==NULL)
    {
        $val_to_sheet[$i]="Not updated";
    }

}
for($i=0;$i<count($val_to_CMSsheet);$i++)
{
    if($val_to_CMSsheet[$i]==NULL)
    {
        $val_to_CMSsheet[$i]="Not updated";
    }

}
for($j=0;$j<count($val_to_mpsheet);$j++)
{
    if($val_to_mpsheet[$j]==NULL)
    {
        $val_to_mpsheet[$j]="Not updated";
    }

}
//print_r($val_to_sheet);exit;
    $this->gapi->writeData_NewMissionary_centralsheet("1G0Rc5DRBLnFlNCpjhC7JO8E3Z-7aZ0o3wnjE1m-dTjM", "NR4R!A:BG",$val_to_sheet);
    $this->gapi->writeData_MSupport_centralsheet("1G0Rc5DRBLnFlNCpjhC7JO8E3Z-7aZ0o3wnjE1m-dTjM", "m support!A:N",$val_to_CMSsheet);

          //print_r($this->session->userdata());exit;

          $missionary_name=$this->session->userdata('name');

         // print_r($missionary_name);exit;

        if($missionary_name=="JLM")
        {
              //print_r($missionary_name);exit;
              $this->gapi->writeData_NewMissionary_inmissionarysheet("1_iVbphOeEapm2bP-EdY_uLSTdICuKxSA5QITqben1QE", "NR4R!A:BG",$val_to_mpsheet);
              $this->gapi->writeData_MSupport_inmissionarysheet("1_iVbphOeEapm2bP-EdY_uLSTdICuKxSA5QITqben1QE", "m support!A:N",$val_to_MSsheet);
        }
        elseif($missionary_name=="NJM")
        {
          $this->gapi->writeData_NewMissionary_inmissionarysheet("1jALNG9vSWODi6PTUtpYMs7dMDPkrQu24MQCNmivolVk", "R4R!A:BF",$val_to_mpsheet);
        }
        




    echo "Successfully Added to the sheet";

   //exit;
       //print_r($result);exit;

 ////////////////////// google api sheet //////////////////////

  }

  

  /////////////  sample reading from googlesheet ///////////////
    function reading_from_googlesheet(){
  
 $this->load->library('Gapi');
       
       $result=$this->gapi->readSheet("1P8EcL60k2mUJOK08s-Yl69QI4hsAu1kgeg0HIgPt_vw", "M Support!A:G");
       $i=1;
        foreach ($result as $rst) {
          echo $i++;
           print_r($rst[3]);
        echo "<br>";
        }
       

}

  }

  ?>