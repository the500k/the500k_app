<!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
          <!-- page start-->
        <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs-alt">
                       <?php 
                                    foreach ($bread_crums as $bread_crum ) {
                                    ?>
                                    <li><a href="<?php echo $bread_crum['link']; ?>" class="<?php echo $bread_crum['class']; ?>"><?php echo $bread_crum['name']; ?></a></li>
                                    <?php
                                    }

                       ?>
                    </ul>
                </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                       <div class="col-md-3">
                           <div class="profile-pic text-center">
                          
                          <?php       
                                

                               if($profile_data['photo']!=NULL)
                                    {
                                      $image=$profile_data['photo'];
                                    }
                                    else
                                    {
                                      $image="fw_default.jpg";
                                    }
                               
                        ?> 

                          <img src="<?php echo base_url(); ?>uploads/missionary/<?php echo $image; ?>" alt=""/>
                             
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="profile-desk">
                              <hr>
                               <h1><?php 
                                    if($profile_data['fname']!="Not Applicable")
                                         echo $profile_data['fname']." ";
                                     
                                     if($profile_data['middlename']!="Not Applicable")  
                                         echo $profile_data['middlename']." ";
                                         
                                    if($profile_data['surename']!="Not Applicable")
                                         echo $profile_data['surename']; 
                               
                               ?></h1>
                               <hr>
                               <h3>
                                     <?php echo  "JLM";     ?>

                               </h3>
                               <hr>
                             
                               <h1>
                                   <?php echo $state_by_id[$profile_data['state_id']]['name'];  ?>
                                 
                               </h1>
                               <hr>
                               <h3>
                                   <?php echo $district_by_id[$profile_data['district_id']]['name'];  ?>
                                 
                               </h3>
                               <hr>
                                 
                               <a href="<?php echo base_url(); ?>MP_Panel/generate_fw_application/<?php echo $missionary_id; ?>" class="btn btn-primary">Download the application</a>

                               <hr>

                               <a href="<?php echo base_url(); ?>MP_Panel/generate_fw_report/<?php echo $missionary_id; ?>" class="btn btn-warning">Download Report</a>

                               
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="profile-statistics">

                              <?php 

                                    $fname="Not Update";
                                    $fnumber="Not Update";
                                   // $mname="Not Update";
                                    $mnumber="Not Update";
                                   // $address="Not Updated";
                                    
                                     //   print_r($profile_data);

                                    if(!empty($profile_data))
                                    {
                                      $fname="Mr.".$profile_data['fname'];
                                      $fnumber=$profile_data['phone_num'];
                                      //$mname="Mrs.".$profile_data['m_name'];
                                      if(!empty($profile_data['alt_phone_num']))
                                      $mnumber=$profile_data['alt_phone_num'];
                                     // $address=$profile_data['door_no']."-".$profile_data['street']."-".$profile_data['city'];
                                    }


                              ?>

                               <h1><?php echo "Phone Number"; ?></h1>
                               <p><?php echo $fnumber; ?></p>
                               <h1><?php echo "Second Number"; ?></h1>
                               <p><?php echo $mnumber; ?></p>
                               <hr>
                               
                           </div>
                       </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#overview">
                                    Demographic
                                </a>
                            </li>
                                 <li>
                                <a data-toggle="tab" href="#timetable">
                                    Location
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#job-history">
                                   Experience
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#contacts" class="contact-map">
                                    Supervision
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#settings">
                                    Reference
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#proposal">
                                    Proposal
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="overview" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-8">
                                      <a class="btn btn-info" href="<?php echo base_url(); ?>MP_Panel/edit_missionary/first/<?php echo $missionary_id; ?>">
                                                    Edit Reporter
                                                 </a>
                                                 &nbsp;<a class="btn btn-danger" href="<?php echo base_url(); ?>MP_Panel/edit_missionary/seven/<?php echo $missionary_id; ?>">
                                                    Edit Proposal
                                                 </a>
                                                 <a class="btn btn-warning"  href="<?php echo base_url(); ?>MP_Panel/edit_missionary/four/<?php echo $missionary_id; ?>">
                                                    Edit Supervision Details.
                                                 </a>
                  <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead class="table-primary bg-primary">
                    <tr>
                      <th colspan="2">FW's Demographic Information</th>
                      
                    </tr>
                    </thead>
                    <tbody class="table-info bg-info">
                       <tr>
                         <td>First name</td>
                         <td><?php echo $missionary_details1['fname'];  ?></td>
                        </tr>
                        <tr>
                         <td>Middle names</td>
                         <td><?php echo $missionary_details1['middlename'];;  ?></td>
                        </tr>
                        <tr>
                         <td>Surname (last name)</td>
                         <td><?php echo $missionary_details1['surename'];  ?></td>
                        </tr>
                        <tr>
                         <td>Date of Birth</td>
                         <td><?php echo date('d-m-Y',strtotime($missionary_details1['dob']));  ?></td>
                        </tr>
                        <tr>
                         <td>Age</td>
                         <td><?php 
                          $dob=new DateTime(date('d-m-Y',strtotime($missionary_details1['dob'])));
                          $today=new Datetime(date('d-m-Y'));
                         echo $dob->diff($today)->y;  ?></td>
                        </tr>
                        <tr>
                         <td>Is the FW married or single?</td>
                         <td><?php echo $op_yes_no[$missionary_details1['fstatus']];  ?></td>
                        </tr>
                        <tr>
                         <td>How many children does the FW have?</td>
                         <td><?php echo $missionary_details1['depent'];  ?></td>
                        </tr>
                        <tr>
                         <td>FW main phone number</td>
                         <td><?php echo $missionary_details1['phone_num'];  ?></td>
                        </tr>
                        <tr>
                         <td>FW's second phone number</td>
                         <td><?php echo $missionary_details1['alt_phone_num'];  ?></td>
                        </tr>
                        <tr>
                         <td>Does the FW have a smart phone that can work WhatsApp?</td>
                         <td><?php echo $op_yes_no[$missionary_details1['is_whatsapp_available']];  ?></td>
                        </tr>
                        <tr>
                         <td>Aadhar number</td>
                         <td><?php echo $missionary_details1['aadhar_number'];  ?></td>
                        </tr>
                        <tr>
                         <td>State</td>
                         <td><?php echo $state_by_id[$missionary_details1['state_id']]['name'];  ?></td>
                        </tr>
                        <tr>
                         <td>District</td>
                         <td><?php echo $district_by_id[$profile_data['district_id']]['name'];  ?></td>
                        </tr>
                        
                    </tbody>
                   
                    </table>


                                       
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <div class="prf-box">
                                            <h3 class="prf-border-head">Quick Links</h3>
                                            <div class=" wk-progress pf-status">
                                                <div class="col-md-8 col-xs-8">
                                                 <a class="btn btn-primary" href="<?php echo base_url(); ?>MP_Panel/edit_missionary/first1/<?php echo $missionary_id; ?>">
                                                    Edit Demographic Info...
                                                 </a>
                                                 <hr>
                                                 <a class="btn btn-success" href="<?php echo base_url(); ?>MP_Panel/edit_missionary/second/<?php echo $missionary_id; ?>">
                                                    Edit Ministry Location...
                                                 </a>
                                                 <hr>
                                                 <a class="btn btn-danger" href="<?php echo base_url(); ?>MP_Panel/edit_missionary/third/<?php echo $missionary_id; ?>">
                                                    Edit Skill & Experience...
                                                 </a>
                                            
                                                 
                                                 <hr>
                                                 <a class="btn btn-info" href="<?php echo base_url(); ?>MP_Panel/edit_missionary/five/<?php echo $missionary_id; ?>">
                                                    Edit Reference Details...
                                                 </a>
                                                 <hr>
                                                 <a class="btn btn-primary" href="<?php echo base_url(); ?>MP_Panel/edit_missionary/six/<?php echo $missionary_id; ?>">
                                                    Edit Testimony Details...
                                                 </a>
                                                 
                                                 
                                              </div>
                                                
                                            </div>
                                        
                                           
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div id="timetable" class="tab-pane ">
                                <div class="row">
                                    <div class="col-md-12">
                        <div class="panel-body">
                       
                            <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead class="table-primary bg-primary">
                    <tr>
                      <th colspan="2">Ministry location details</th>
                      
                    </tr>
                    </thead>
                    <tbody class="table-danger bg-danger">
                       <tr>
                         <td>Primary place where the FW intends to minister and plant a church</td>
                         <td><?php echo $missionary_details2['primary_village'];  ?></td>
                        </tr>
                        <tr>
                         <td>PINCODE </td>
                         <td><?php echo $missionary_details2['pincode'];;  ?></td>
                        </tr>
                        <tr>
                         <td>Is the FW's primary ministry and church planting location a village, town or city</td>
                         <td><?php echo $op_mf_type[$missionary_details2['mf_type']];  ?></td>
                        </tr>
                        <tr>
                         <td>The population of the FW's primary ministry location </td>
                         <td><?php echo $missionary_details2['mf_population'];  ?></td>
                        </tr>
                        <tr>
                         <td>Is the FW already active in their primary church planting location?</td>
                         <td><?php echo $op_yes_no[$missionary_details2['is_fw_active_in_mf']];  ?></td>
                        </tr>
                        <tr>
                         <td>When did the FW begin their ministry in this place? </td>
                         <td><?php echo $missionary_details2['mf_starting_date'];  ?></td>
                        </tr>
                        <tr>
                         <td>How many people are already attending prayer or worship meetings?</td>
                         <td><?php echo $missionary_details2['desc_mf'];  ?></td>
                        </tr>
                         <tr>
                         <td>How many baptized church members are there? </td>
                         <td><?php echo $missionary_details2['tbaptized'];  ?></td>
                        </tr>
                        <tr>
                         <td colspan="2">How does the FW currently get his income and pay his bills?
                          <p><b>
                          <?php echo $missionary_details2['desc_fw_income'];  ?></b>
                        </p>
                        </td>
                        </tr>

                        <tr>
                         <td colspan="2">How will 500k's funding/sponsorship help the FW and make him more effective in his church planting work?<p><b><?php echo $missionary_details2['hw_fund_help_fw'];  ?></b></p></td>
                        </tr>
                        <tr>
                         <td colspan="2">Which of the below reasons best describes how the financial support will help the FW?
                         <p><b><?php echo $op_hw_fund_help_fw[$missionary_details2['hw_fund_help_fw_op']];  ?></b></p></td>
                        </tr>
                        <tr>
                         <td>How many Christians were in the primary church planting location before the FW begun their ministry?</td>
                         <td><?php echo $missionary_details2['tchristians'];  ?></td>
                        </tr>
                        <tr>
                         <td>Does the FW intend to live in the primary village/place where he will minister? </td>
                         <td><?php echo $op_yes_no[$missionary_details2['is_fw_live_in_mf']];  ?></td>
                        </tr>
                        <tr>
                         <td colspan="2">Provide the full address of the place where the FW intends to live whilst doing his church planting ministry. <p><b>
                         <?php echo $missionary_details2['fw_address'];  ?></b></p></td>
                        </tr>
                        
                    </tbody>
                   
                    </table>
                        </div>
                      
                 
                                    </div>
                                </div>
                            </div>
                             <div id="job-history" class="tab-pane ">
                                <div class="row">
                                    <div class="col-md-12">
                        <div class="panel-body">
                  <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead class="table-primary bg-primary">
                    <tr>
                      <th>FW skills and Experience Details</th>
                      
                    </tr>
                    </thead>
                    <tbody class="table-info bg-info">
                       <tr>
                         <td>
                          <p>
                            1.Has the FW completed a Bible College or Training Center course?<br><b>
                            <?php echo $op_yes_no[$missionary_details3['is_fw_trained_in_bc']];  ?></b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          2.Name of principal Bible College/Training Center attended<br><b>
                            <?php echo $op_BC_main[$missionary_details3['BC_main']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          3.Qualification obtained from principal Bible College/Training Center. <br><b>
                            <?php echo $missionary_details3['qualification'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          4.Number of years of training provided at principal Bible College/ Training Center<br><b>
                            <?php echo $missionary_details3['noyear_training'];  ?>Years
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          5.Year of Graduation from principal Bible College<br><b>
                            <?php echo $missionary_details3['graduation_year'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          6.Other training courses completed and year completed<br><b>
                            <?php echo $missionary_details3['other_course_year'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          7.Does the FW speak good English? Only select yes if he can read and write AND have a conversation in English<br><b>
                            <?php echo $op_yes_no[$missionary_details3['is_fw_spk_english']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          8.Is the FW affiliated to a denomination or church planting network or are they independent?<br><b>
                            <?php echo $op_affiliated[$missionary_details3['is_affiliated']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          9.What is the name of the Affiliated denomination or church network? <br><b>
                            <?php echo $op_DBC[$missionary_details3['affiliated_denomination']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          10.Does the FW feel his theology aligns with an existing grouping?<br><b>
                            <?php echo $missionary_details3['desc_fw_aligns'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          11.Does the FW speak good Hindi? Only select yes if he can read and write AND have a conversation in Hindi<br><b>
                            <?php echo $op_yes_no[$missionary_details3['is_fw_spk_hindi']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          12.What other languages does the FW know?<br><b>
                            <?php echo $op_language[$missionary_details3['other_spk_language']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                    </tbody>
                   
                    </table>
                        </div>
                      
                 
                                    </div>
                                </div>
                            </div>
                            <div id="contacts" class="tab-pane">
                                <div class="row">
                                     <div class="col-md-12">
                        <div class="panel-body">
                        <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead class="bg-primary">
                    <tr>
                      <th>Supervision Details</th>
                      
                    </tr>
                    </thead>
                    <tbody class="table-info bg-info">
                       <tr>
                         <td>
                          <p>
                            1.What is the name of the FW's assigned Supervisor?<br><b>
                            <?php echo $missionary_details4['supervisor_name'];  ?></b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          2.What is the Supervisor's ID?<br><b>
                            <?php echo $missionary_details4['supervisor_id'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          3.Has the Supervisor been inducted as a 500k Supervisor?<br><b>
                            <?php echo $op_yes_no[$missionary_details4['is_supervisor_inducted']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          4.Has the Supervisor agreed to supervise this FW? <br><b>
                            <?php echo $op_yes_no[$missionary_details4['is_supervisor_agree']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          5.How many 500k FW's is the Supervisor supervising already ?<br><b>
                            <?php echo $missionary_details4['nof_supervisor'];  ?>FWs
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          6.What is the distance in KM from the Supervisor's address to the FW's primary church planting village or location?<br><b>
                            <?php echo $missionary_details4['distance_supervisor_fw'];  ?>km
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          7.Does the FW also belong to any other organisations except for the Ministry Partner?<br><b>
                            <?php echo $op_yes_no[$missionary_details4['is_FW_other_org']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          8.if the FW will also be paid by other organizations whilst receiving financial support from 500k, how much pay will the FW receive from these other organisations each month?<br><b>
                            Rs.<?php echo $missionary_details4['FW_other_payment'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                    </tbody>
                </table>
                        </div>
                 
                                    </div>
                                </div>
                            </div>
                            <div id="settings" class="tab-pane">

                              <div class="row">
                                     <div class="col-md-12">
                        <div class="panel-body">
                        <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead class="bg-primary">
                    <tr>
                      <th>Reference Details</th>
                      
                    </tr>
                    </thead>
                    <tbody class="table-info bg-info">
                       <tr>
                         <td>
                          <p><b>1.Name of person giving reference and position within organisation</b></p>
                           <p><?php echo $missionary_details5['ref_name'];  ?></p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p><b>2.Reference Details. Here please write a short answer sharing: 1) your relationship with the FW and the time spent you have spent with him 2) your opinion on the character of the FW 3) what is his church planting potential and why you think this 4) how strong is his theological competency and why and 5) why he is a good fit for the 500k FW sponsorship program
                          </b></p>
                           <p><?php echo $missionary_details5['desc_reference'];  ?></p>
                         </td>
                        </tr>
                        <thead class="bg-success">
                          <tr>
                            <th>Testimony Details</th>
                          </tr>
                        </thead>
                        <tr>
                         <td>
                          <p>
                            <b>Please share the FW's testimony below.</b>
                          </p>
                          <p>
                              <?php echo $missionary_details6['FW_testimony'];  ?>
                          </p>
                         </td>
                        </tr>
                        
                    </tbody>
                </table>
                        </div>
                 
                                    </div>
                                </div>
                                

                            </div>
                            <div id="proposal" class="tab-pane ">
                                <div class="row">
                                    <div class="col-md-12">
                        <div class="panel-body">
                        
                                <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead class="bg-primary">
                    <tr>
                      <th>Proposal Details</th>
                      
                    </tr>
                    </thead>
                    <tbody class="table-info bg-info">
                       <tr>
                         <td>
                          <p>
                            1.Installation Cost(in rupees)<br><b>
                            <?php echo $missionary_details7['installation_cost'];  ?></b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                          2.Explanation for the Installation<br><b>
                            <?php echo $missionary_details7['explaination_cost'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td>
                          <p>
                  3.Salary recommandation(in rupees)
                          <br>
                    <b>
                  <?php echo $missionary_details7['salary_recommandation'];  ?>
                    </b>
                  </p>
                          </td>
                        </tr>
                    </tbody>
                </table>
                           
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->