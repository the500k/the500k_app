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
<img src="./uploads/bghead1234.jpg" width="100%">
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri","sans-serif";text-align:center;'><strong><span style='font-size:34px;line-height:115%;font-family:"Agency FB","sans-serif";'><?php echo $title; ?></span></strong></p>
<table style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;font-size:18px;line-height:115%;font-family:"Agency FB","sans-serif";border: 2px;background-color: #ffffff;'>
                    <tbody>
                      <tr><th colspan="2"><br><br><h1>Missionary Report <h1>
                        <hr></th></tr>
                      <tr style="background: #ffffff;"><td>
                          <?php       
                                

                               if($missionary_details1['photo']!=NULL)
                                    {
                                      $image=$missionary_details1['photo'];
                                    }
                                    else
                                    {
                                      $image="fw_default.jpg";
                                    }
                               
                        ?>
                        <img src="./uploads/missionary/<?php echo $image; ?>" width="250" height="250" style="vertical-align:bottom"></td><td><img src="./uploads/missionary/map1.jpg" width="250" height="250" style="vertical-align:bottom"></td></tr>
                      <tr>
                          <th colspan="2" style="background-color: #DD6710;text-align:center;color: #ffffff"><centre>Overview</centre></th>
                        </tr>
                      <tr style="background-color: #ffffff">

                      <td style="font-size:24px;" colspan="2">
                        <table style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;font-size:14px;line-height:115%;font-family:"Agency FB","sans-serif";border: 2px;'>
                            <tbody>

                          <tr>
                         <td>Name</td>
                         <td><?php echo $missionary_details1['fname'];  ?> <?php echo $missionary_details1['surename'];  ?></td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                         <td>State</td>
                         <td><?php echo $state_by_id[$missionary_details1['state_id']]['name'];  ?></td>
                        </tr>
                                        <tr>
                         <td>Age</td>
                         <td><?php 
                         $dob=new DateTime(date('d-m-Y',strtotime($missionary_details1['dob'])));
                          $today=new Datetime(date('d-m-Y'));
                         echo $dob->diff($today)->y; ?>&nbsp;Years</td>
                        </tr>
                        <tr style="background-color: #ffffff;">
                         <td>Spouse Name</td>
                         <td><?php echo $missionary_details1['spouse_name'];  ?></td>
                        </tr>
                        <tr>
                         <td>Children Name</td>
                         <td><?php echo $missionary_details1['children_name'];  ?></td>
                        </tr>
                            </tbody>
                          </table>
                       
                      </td>
                      
                    </tr>
                      
                        <tr>
                          <th colspan="2" style="background-color: #DD6710;text-align:center;color: #ffffff;font-size:14px;"><centre>One Nation - <span style="color: #000000;font-size:12px;">Half a Million Unreached Villages</span> - One God
</centre></th>
                        </tr>
                        
                        <tr>
                          <th colspan="2" style="background-color: #DD6710;text-align:center;color: #ffffff"><centre><?php echo $missionary_details1['fname']."'s ".$report_data['report_year']."R".$report_data['report_period']." - Report ";  ?>

</centre></th>
                        </tr>
                        <tr style="background-color: #ffffff">

                      <td style="font-size:24px;" colspan="2">
                        <table style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;font-size:14px;line-height:115%;font-family:"Agency FB","sans-serif";border: 2px;'>
                            <tbody>

                          <tr>
                         <td>S.No</td>
                         <td>Village</td>
                         <td>Coming for prayer</td>
                         <td>No of baptism</td>
                        </tr>
                        <?php
                          $i=1;
                          if(!empty($village_details)) 
                          {
                            foreach ($village_details as $vlg) {
                              


                        ?>
                          <tr>
                         <td><?php echo $i++;  ?></td>
                         <td><?php echo $vlg[1];  ?></td>
                         <td><?php echo $vlg[2];  ?></td>
                         <td><?php echo $vlg[3];  ?></td>
                        </tr>


                        <?php 
                             }
                          }

                        ?>

                         
                            </tbody>
                          </table>
                       
                      </td>
                      
                    </tr>

                        <tr>
                          <td colspan="2" style="background-color: #ffffff;text-align:center;"><center>
                            <?php       
                                

                               if($report_data['photo_link']!=NULL)
                                    {
                                     
                        ?> 
                                  <center><img src="./uploads/report_photo/<?php echo $report_data['photo_link']; ?>" style=" max-width: 100%; and height: auto;"></center>
                                  <hr>
                                <?php 
                                  }
                                ?>
                           </center></td>
                        </tr>
                        <tr>
                          <td colspan="2">
                             <h2>Prayer Points</span></h2>

<ul>
  <?php 

      if(!empty($prayer_points))
      {
        for($i=0;$i<count($prayer_points);$i++)
        {
          ?>
          <li><strong><span style="font-family: Verdana, Geneva, sans-serif; font-size: 18px;"><?php echo $prayer_points[$i];?></span></strong></li>
        <?php
        }
      }


  ?>
    
    
</ul>
<br>
<br>
<br>
<br>
<br>
                          </td>
                        </tr>
                       

              <tr>
                          <th colspan="2" style="background-color: #DD6710;text-align:center;color: #ffffff;font-size:14px;"><centre>One Nation - <span style="color: #000000;font-size:12px;">Half a Million Unreached Villages</span> - One God
</centre></th>
                        </tr>
                        <tr>
                          <th colspan="2" style="background-color: #DD6710;text-align:center;color: #ffffff"><centre><?php echo $missionary_details1['fname']."'s ".$report_data['report_year']."R".$report_data['report_period']." - Report ";  ?>

</centre></th>
                        </tr>
                        
                        <tr style="background-color: #FFFFFF;">
                         <td  colspan="2"><?php echo $report_data['report']; ?></td>
                        
                        </tr>
                      
                        <tr>
                          <th colspan="2" style="background-color: #DD6710;text-align:center;color: #ffffff;font-size:14px;"><centre>One Nation - <span style="color: #000000;font-size:12px;">Half a Million Unreached Villages</span> - One God
</centre></th>
                        </tr>
                        


                    </tbody>
                </table>

             