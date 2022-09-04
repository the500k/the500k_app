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
               
            </div>
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-navy-blue">
                       Report Preview
                    </header>
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="overview" class="tab-pane active">
                               <div class="row" style="<?php echo $flash_style; ?>">
                                  <div class="alert alert-block alert-success fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Praise God !</strong> You have successfully submitted your report to the admin .
                            </div>
                               </div>
                                <div class="row">
                                    &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>MP_Panel/edit_missionary_report/<?php echo $report_data['report_id']; ?>">
                                                    Edit Report...
                                                 </a>
                                               
                                                 <a class="btn btn-success" target="_blank" href="<?php echo base_url(); ?>MP_Panel/generate_fw_termreport/<?php echo $report_data['report_id']; ?>">
                                                    Verify Report Pdf
                                                 </a>
                                               <?php 
                                             

                                                if($report_data['is_send_approval']==NULL){

                                               ?>
                                                 <a class="btn btn-danger" href="<?php echo base_url(); ?>MP_Panel/submit_approval/<?php echo $report_data['report_id']; ?>">
                                                    Submit for Approval
                                                 </a>
                                                 <?php 
                                               }
                                                 ?>
                                                 <hr>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                      
                  <table  class="table table-bordered table-striped" id="dynamic-table">
                    <thead class="table-primary bg-primary">
                    <tr>
                      <th colspan="2"><center>FW's <?php echo $missionary_details1['fname']."'s ".$report_data['report_year']."-".$report_data['report_period']." - Report ";  ?></center></th>
                      
                    </tr>
                    </thead>
                    <tbody class="table-info">
                       <tr>
                         <td>Name</td>
                         <td><?php echo $missionary_details1['fname'];  ?></td>
                        </tr>
                        <tr>
                         <td>State</td>
                         <td><?php echo $state_by_id[$missionary_details1['state_id']]['name'];  ?></td>
                        </tr>
                        <tr>
                         <td>Age</td>
                         <td><?php 
                         $dob=new DateTime(date('d-m-Y',strtotime($missionary_details1['dob'])));
                          $today=new Datetime(date('d-m-Y'));
                         echo $dob->diff($today)->y; ?>&nbsp;Years</td></td>
                        </tr>
                        <tr>
                         <td>Spouse Name</td>
                         <td><?php echo $missionary_details1['spouse_name'];  ?></td>
                        </tr>
                        <tr>
                         <td>Children Name</td>
                         <td><?php echo $missionary_details1['children_name'];  ?></td>
                        </tr>
                        <thead class="table-primary bg-primary">
                    <tr>
                      <th colspan="2"><center>FW's <?php echo $missionary_details1['fname']."'s ".$report_data['report_year']."-".$report_data['report_period']." - Report Table";  ?></center></th>
                      
                    </tr>
                    </thead>
                        <tr>
                         <td colspan="2">
                            <center>
                                
                            <table style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;font-size:16px;line-height:115%;font-family:"Agency FB","sans-serif";border: 2px;'>
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
                      </center>
                      </td>
                        </tr>
                         <?php 
                              if($report_data['doc_link']!=NULL)
                              {
                        ?>
                        <tr>
                         <td colspan="2">
                         
                        <a href="<?php echo $report_data['doc_link']; ?>" download="<?php echo substr($report_data['doc_link'], strpos($report_data['doc_link'],'_report')+8); ?>"><h4 style="color: #000066">Download <span>&#9755;</span> 
                          <?php echo substr($report_data['doc_link'], strpos($report_data['doc_link'],'_report')+8);  ?>
                         
  </h4>
</a>

</td>
</tr>
<?php 
      }


                               if($report_data['photo_link']!=NULL)
                                    {
                                     
                        ?>
<tr>
  <td colspan="2"> 

                              
                   
                                  <center><img src="<?php echo base_url(); ?>/uploads/report_photo/<?php echo $report_data['photo_link']; ?>" style=" max-width: 100%; and height: auto;"></center>
                                  <hr>
                                </td>
                        </tr>
                        <?php 
                                  }
                                ?>

                        <thead class="table-primary bg-primary">
                    <tr>
                      <th colspan="2"><center>Prayer Points</center></th>
                      
                    </tr>
                    </thead>

                        <tr>
                         <td colspan="2">

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

                                                                                                  </td>
                        </tr>
                        <thead class="table-primary bg-primary">
                    <tr>
                      <th colspan="2"><center>Report</center></th>
                      
                    </tr>
                    </thead>

                        <tr>
                         <td colspan="2"><?php echo $report_data['report']; ?></td>
                        </tr>
                        
                        
                    </tbody>
                   
                    </table>


                                       
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