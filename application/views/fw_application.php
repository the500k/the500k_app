<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<img src="./uploads/bghead.jpg" width="100%">
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style='font-size:34px;line-height:115%;font-family:"Agency FB","sans-serif";'><?php echo $title; ?></span></strong></p>
<table style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;font-size:18px;line-height:115%;font-family:"Agency FB","sans-serif";border: 2px'>
                    <tbody>
                      <tr>
                      <th style="font-size:24px;"><centre>FW's Application Form</centre></th><th><img src="./uploads/missionary/fw_default.jpg" width="100" height="100"></th>
                      
                    </tr>
                      <tr>
                      <th colspan="2" style="background-color: #F09329;text-align:center;"><centre>Field Worker's Demographic Information</centre></th>
                      
                    </tr>
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
                         <td><?php echo $state_by_id[$missionary_details1['state_id']]['name'];  ?></td>
                        </tr>
                        <tr><td colspan="2"></td></tr>
                        <tr>
                          <th colspan="2" style="background-color: #F09329;text-align:center;"><centre>Field Worker's Ministry location details</centre></th>
                        </tr>
                        <tr>
                         <td>Place where the FW intends to minister & plant a church</td>
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
                         <td><?php echo date('d-m-Y',strtotime($missionary_details2['mf_starting_date']));  ?></td>
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
                        <tr><td colspan="2"></td></tr>
                        <tr>
                          <th colspan="2" style="background-color: #F09329;text-align:center;"><centre>FW skills and Experience Details</centre></th>
                        </tr>
                       <tr>
                         <td colspan="2">
                          <p>
                            1.Has the FW completed a Bible College or Training Center course?<br><b>
                            <?php echo $op_yes_no[$missionary_details3['is_fw_trained_in_bc']];  ?></b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          2.Name of principal Bible College/Training Center attended<br><b>
                            <?php echo $op_BC_main[$missionary_details3['BC_main']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          3.Qualification obtained from principal Bible College/Training Center. <br><b>
                            <?php echo $missionary_details3['qualification'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          4.Number of years of training provided at principal Bible College/ Training Center<br><b>
                            <?php echo $missionary_details3['noyear_training'];  ?>Years
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          5.Year of Graduation from principal Bible College<br><b>
                            <?php echo $missionary_details3['graduation_year'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          6.Other training courses completed and year completed<br><b>
                            <?php echo $missionary_details3['other_course_year'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          7.Does the FW speak good English? Only select yes if he can read and write AND have a conversation in English<br><b>
                            <?php echo $op_yes_no[$missionary_details3['is_fw_spk_english']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          8.Is the FW affiliated to a denomination or church planting network or are they independent?<br><b>
                            <?php echo $op_affiliated[$missionary_details3['is_affiliated']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          9.What is the name of the Affiliated denomination or church network? <br><b>
                            <?php echo $op_DBC[$missionary_details3['affiliated_denomination']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          10.Does the FW feel his theology aligns with an existing grouping?<br><b>
                            <?php echo $missionary_details3['desc_fw_aligns'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          11.Does the FW speak good Hindi? Only select yes if he can read and write AND have a conversation in Hindi<br><b>
                            <?php echo $op_yes_no[$missionary_details3['is_fw_spk_hindi']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          12.What other languages does the FW know?<br><b>
                            <?php echo $op_language[$missionary_details3['other_spk_language']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr><td colspan="2"></td></tr>
                        <tr>
                          <th colspan="2" style="background-color: #F09329;text-align:center;"><centre>Supervision Details</centre></th>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                            1.What is the name of the FW's assigned Supervisor?<br><b>
                            <?php echo $missionary_details4['supervisor_name'];  ?></b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          2.What is the Supervisor's ID?<br><b>
                            <?php echo $missionary_details4['supervisor_id'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          3.Has the Supervisor been inducted as a 500k Supervisor?<br><b>
                            <?php echo $op_yes_no[$missionary_details4['is_supervisor_inducted']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          4.Has the Supervisor agreed to supervise this FW? <br><b>
                            <?php echo $op_yes_no[$missionary_details4['is_supervisor_agree']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          5.How many 500k FW's is the Supervisor supervising already ?<br><b>
                            <?php echo $missionary_details4['nof_supervisor'];  ?>FWs
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          6.What is the distance in KM from the Supervisor's address to the FW's primary church planting village or location?<br><b>
                            <?php echo $missionary_details4['distance_supervisor_fw'];  ?>km
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          7.Does the FW also belong to any other organisations except for the Ministry Partner?<br><b>
                            <?php echo $op_yes_no[$missionary_details4['is_FW_other_org']];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p>
                          8.if the FW will also be paid by other organizations whilst receiving financial support from 500k, how much pay will the FW receive from these other organisations each month?<br><b>
                            Rs.<?php echo $missionary_details4['FW_other_payment'];  ?>
                            </b>
                          </p>
                         </td>
                        </tr>
                        <tr><td colspan="2"></td></tr>
                        <tr>
                          <th colspan="2" style="background-color: #F09329;text-align:center;"><centre>Reference Details</centre></th>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p><b>1.Name of person giving reference and position within organisation</b></p>
                           <p><?php echo $missionary_details5['ref_name'];  ?></p>
                         </td>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p><b>2.Reference Details. Here please write a short answer sharing: 1) your relationship with the FW and the time spent you have spent with him; 2) your opinion on the character of the FW; 3) what is his church planting potential and why you think this; 4) how strong is his theological competency and why; and 5) why he is a good fit for the 500k FW sponsorship program.</b></p>
                           <p><?php echo $missionary_details5['desc_reference'];  ?></p>
                         </td>
                        </tr>
                        <tr><td colspan="2"></td></tr>
                        <tr>
                          <th colspan="2" style="background-color: #F09329;text-align:center;"><centre>Testimony Details</centre></th>
                        </tr>
                        <tr>
                         <td colspan="2">
                          <p><b>Please share the FW's testimony below.</b></p>
                           <p><?php echo $missionary_details6['FW_testimony'];  ?></p>
                         </td>
                        </tr>


                    </tbody>
                </table>

             