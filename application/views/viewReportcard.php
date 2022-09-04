 <!-- page content -->
      <div class="right_col">

        <div class="">
         
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Student Report Card</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <section class="content invoice"  role="main">
                    <!-- title row -->
                     <div id="printableArea">
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                      <?php   
                      
                      
                      	$option_grade=array();
                      	 $option_grade['1']="LKG";
                          $option_grade['2']="UKG";
                          $option_grade['3']="I";
                          $option_grade['4']="II";
                          $option_grade['5']="III";
                          $option_grade['6']="IV";
                          $option_grade['7']="V";
                          $option_grade['8']="VI";
                          $option_grade['9']="VII";
                          $option_grade['10']="VIII";
                          $option_grade['11']="IX";
                       $option_grade['12']="X";
                       $option_grade['13']="XI";
                       $option_grade['14']="XII";
                      
                      ?>
                        
                       <img src="<?php echo base_url(); ?>uploads/logo2.jpg" alt="logo" width="710px">
                          <center>Academic Session: 2017-2018</center>
                          <center>Report Card for Class <?php echo $option_grade[$grade_id]; ?></center>        
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      
                     
                      <!-- /.col -->
                      

                      
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                   

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-xs-12 table">
                        <table class="table table-striped" border="1px" size="200px">
                          <thead>
                            <tr>
                                  <th></th>
                              <th colspan="6" align="center"><center><h3>Scholastic Areas</h3></center></th>
                              
                              </tr>

                                  <tr>
                                  <th>Subject</th>
                              <th>Periodic Test <br>(10)</th>
                              <th>Discipline & <br> Note Book <br>(5)</th>
                              <th>Subject<br> Enrichment<br>Activity <br>(5)</th>
                              <th><center>Terminal <br>(80)</center></th>
                              <th>Total<br> (100)</th>
                              <th>Grade</th>
                              

                              

                              </tr>
                          </thead>
                          <tbody>

                              <?php
                              
                              $option=array(
					        1 => 'ENGLIGH',
					        2 => 'II LANGUAGE',
					        3  => 'MATHEMATICS',
					        					        5  => 'SOCIAL SCIENCE',
					        6  => 'III LANGUAGE',
					        7  => 'COMPUTER SCIENCE'
					);
					     
					     
				if($grade_id>4)
				{
				$option[4]="SCIENCE";
				}
				else
				{
									$option[4]="EVS";				
				}	     
					                              
                              if(!empty($student_marks))
                              {

                                $i=1;

                                $sum=0;
                             	
                             	//echo $grade_id;
                             if($grade_id>7)	
                             {
                             	//echo "hi";

                                  foreach($student_marks as $student_mark)
                                  {
                                  
                                  $sub_id=$student_mark['subject_id'];
                                   

                                    ?>
                            <tr>
                              <td><?php echo $option[$student_mark['subject_id']]; ?></td>
                              <td><?php if($student_mark['class_test']!=0)
                              			{                              			
                              			echo $student_mark['class_test'];  
                              			} ?></td>
                              <td><?php  if($student_mark['notebook']!=0)
                              			{
                              			echo $student_mark['notebook'];
                              			}  ?></td>
                              <td><?php echo  $student_mark['activity']; ?></td>
                              <td><?php echo  $student_mark['exam_mark']; ?></td>
                              <td>
                              <?php 
                                
                                $total=$student_mark['class_test']+$student_mark['notebook']+$student_mark['activity']+$student_mark['exam_mark'];
                                
                              echo  $total; ?></td>
                              <td>
                             <?php
                         
                              
                              if($total>=91)
                              {
                                echo "A1";
                              }
                              elseif($total>=81)
                              {
                                echo "A2";
                              }
                              elseif($total>=71)
                              {
                                echo "B1";
                              }
                              elseif($total>=61)
                              {
                                echo "B2";
                              }
                              elseif($total>=51)
                              {
                                echo "C1";
                              }
                              elseif($total>=41)
                              {
                                echo "C2";
                              }
                              elseif($total>=33)
                              {
                                echo "D";
                              }
                              else
                              {
                                echo "E";
                              }
                              
                                ?>


                              </td>
                              
                             
                            </tr>
                            

                             <?php 

                              }
                              
                              }
                              else
                              {
                              
                              
                               foreach($student_marks as $student_mark)
                                  {
                                  
                                  
                                  $sub_id=$student_mark['subject_id'];
                                   

                                    ?>
                            <tr>
                              <td><?php  echo $option[$student_mark['subject_id']]; ?></td>
                              <td><?php if($student_mark['class_test']!=0)
                              			{                              			
                              			echo $student_mark['class_test'];  
                              			} ?></td>
                              <td><?php  if($student_mark['notebook']!=0)
                              			{
                              			echo $student_mark['notebook'];
                              			}  ?></td>
                              <td><?php echo  $student_mark['activity']; ?></td>
                              <td><?php echo  $student_mark['exam_mark']; ?></td>
                              <td>
                              <?php 
                                
                                $total=$student_mark['class_test']+$student_mark['notebook']+$student_mark['activity']+$student_mark['exam_mark'];
                                
                              echo  $total; ?></td>
                              <td>
                                <?php
                         
                              
                              if($total>=91)
                              {
                                echo "A+";
                              }
                              elseif($total>=75)
                              {
                                echo "A";
                              }
                              elseif($total>=56)
                              {
                                echo "B";
                              }
                              elseif($total>=35)
                              {
                                echo "C";
                              }
                              
                              else
                              {
                                echo "D";
                              }
                              
                                ?>
                              


                              </td>
                              
                             
                            </tr>
                            

                             <?php 

                              }
                              
                              
                              		   
                              
                          // end else    
                              }
                              
}
                              ?>
                                                
                          </tbody>
                        </table>
                        
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    
	<div class="row">
	<div class="col-md-12">
                      <div class="col-xs-6 table">
                        <table class="table table-striped" border="1px" size="200px">
                          <thead>
                            <tr>
                                 
                              <th align="center"><center><h3>Co-Scholastic Areas</h3></center></th>
                              
                              <th>Grade</th>
                              
                              

                              

                              </tr>
                          </thead>
                          <tbody>

                             <tr>
                                  <td>Work Education (or Pre-vocational Education)</td>
                              <td> <?php echo  $student_eca_marks['wrkedu']; ?> </td>                          
                              

                              

                              </tr>
                               <tr>
                                  <td>Art Education </td>
                              <td> <?php echo  $student_eca_marks['artedu']; ?> </td>                          
                              

                              

                              </tr>
                               <tr>
                                  <td>Health & Physical Education</td>
                              <td> <?php echo  $student_eca_marks['phyedu']; ?> </td>                          
                              

                              

                              </tr>
                               <tr>
                                  <td></td>
                              <td></td>                          
                              

                              

                              </tr>
                               <tr>
                                  <td>Discipline</td>
                              <td> <?php echo  $student_eca_marks['discipline']; ?> </td>                          
                              

                              

                              </tr>
                                                
                          </tbody>
                        </table>
                       
                      </div>
                      <!-- /.col -->
                    </div>
                    
                    </div>
                    <!-- /.row -->
                    
                    <div class="row">
	
                    <div class="col-xs-6">
                    <br>
                    <b>Class Teacher's Remark  .........................</b><br><br>
                   
                    </div>
                    
                    
                    
                    </div>
                    <!-- /.row -->
                      <div class="row">
		
		<div class="col-xs-4">
                
                    
                    </div>
                    
                    <div class="col-xs-4">
                    <b>Signature of class teacher</b>
                    
                    </div>
                    <div class="col-xs-4">
                    <b>Signature of Principal</b>
                    </div>
                    
                    	
                    
                    
                    </div>
                    <!-- /.row -->
                    <br>
                          <br>
                            <br>
                        <?php 
                        echo $student_data['name'] 
                        ?>



                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-xs-12">
                       
                        <button class="btn btn-default" onclick="window.history.go(-1); return false;"><i class="fa fa-arrow-left"></i> Back</button>

                        <!-- <button class="btn pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button> -->
                        <button class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="printDiv('printableArea')"><i class="fa fa-download"></i> Print</button>
                      </div>
                    </div>
                  </form>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>

         
         

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">Design by <a href="#">Indirani</a>
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="<?php echo base_url(); ?>asset/SMS/js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="<?php echo base_url(); ?>asset/SMS/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo base_url(); ?>asset/SMS/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>asset/SMS/js/icheck/icheck.min.js"></script>

  <script src="<?php echo base_url(); ?>asset/SMS/js/custom.js"></script>

  <!-- pace -->
  <script src="<?php echo base_url(); ?>asset/SMS/js/pace/pace.min.js"></script>

<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}



  </script>

</body>

</html>