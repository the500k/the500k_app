
<?php 

$param1=$this->uri->segment(3);
$edit_data    = $this->db->get_where('missionary' , array('missionary_id' => 10) )->row_array();


//print_r($edit_data);exit;
?>

<br><br>

<div class="row" style="background-image: url('./uploads/background.jpg')">
  <?php echo base_url('uploads/questions/14.jpg');  ?>
   <img src="./uploads/user.jpg">
   <img src="./uploads/questions/11.jpg">
   <img src="./uploads/questions/12.jpg">
   <img src="./uploads/questions/13.jpg">
   <img src="./uploads/questions/14.jpg">
   <img src="./uploads/questions/15.jpg">


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" style="background: #26B99A;color: #ffffff" >
                    <h2>Upload MAT Topic Details</h2>
                    <h3><?php echo $name; ?></h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <h3>Exam Details</h3>
                    <div class="table-responsive" style="text-align: left; margin-bottom: 17px">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="headings" style="background: #7D3C98;color: #ffffff;">
                           <th width="50px" colspan="2"><h2>
                            <center>
                              <?php 

                                  echo $edit_data['name'];
                                   
                                  ?>
                                  </center></h2>
                           </th>
                            
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr style="background: #82E0AA">
                            <td>
                              Class
                            </td>
                            <td class="">
                              <?php echo $grade[$edit_data['class_id']]['name']; ?>
                            </td>
                          </tr>
                          <tr >
                            <td>
                           Schools
                            </td>
                            <td class=" ">
                               <?php 

                                  $school_ids=$edit_data['school_ids'];
                                  $school_ids=explode(",", $school_ids);
                                  foreach ($school_ids as $school_id) {
                                    echo $school[$school_id]['name']." | ";
                                  }
                                   ?>
                            </td>
                          </tr>
                          <tr  style="background: #82E0AA">
                            <td>
                              Group 
                            </td>
                            <td><?php echo $group[$edit_data['group_id']]['name']; ?></td>
                          </tr>
                          <tr>
                            <td>
                             Exam Date
                            </td>
                            <td><?php echo date('d-m-Y',strtotime($edit_data['exam_date'])); ?></td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                      <h4 style="color: #F5280C;">
                              
                              Please add this subject id to topic excelsheet

                            </h4>

                 <div class="col-md-6 col-sm-6 col-xs-12">
                          

                          

                            <ul class="legend list-unstyled">
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square grey"></i></span> <span class="name">English - 1 </span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square blue"></i></span> <span class="name">II- Language - 2 </span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square green"></i></span> <span class="name">MATHS - 3</span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square blue"></i></span> <span class="name">SCIENCE - 4</span>
                                </p>
                              </li>
                                <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square dark"></i></span> <span class="name">SOCIAL - 5 </span>
                                </p>
                              </li>
                              </ul>
                      </div>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <ul class="legend list-unstyled">
                       
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square grey"></i></span> <span class="name">Computer Science - 6 </span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square blue"></i></span> <span class="name">PHYSICS - 7</span>
                                </p>
                              </li>
                              <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square green"></i></span> <span class="name">CHEMISTRY - 8</span>
                                </p>
                              </li>
                                <li>
                                <p>
                                  <span class="icon"><i class="fa fa-square dark"></i></span> <span class="name">BIOLOGY - 9 </span>
                                </p>
                              </li>
                            
                            </ul>
                       </div>
                     </div>
                            <h4 style="color: #F5280C;">
                              
                              topic excelsheet header

                            </h4>
                      <table class="table table-bordered">
                         <tr><td>Subject id</td><td>Name</td><td>Ques.No</td><td>Total Ques</td></tr>
                         <tr><td>7</td><td>Light</td><td>7,3,8,9</td><td>4</td></tr>
                      </table>
                         
                      <?php echo form_open_multipart(base_url().'import_export/import_mat_topics'); ?>
                       <h4><b>Upload Your File[upload only .xls file]</b></h4>

                       <?php 

                          $this->session->set_userdata('referred_from', current_url());

                       ?>
                <input type="hidden" name="upload_status" value="<?php echo $edit_data['upload_status']; ?>">
              
                <input type="hidden" name="group_id" value="<?php echo $edit_data['group_id']; ?>">
                <input type="hidden" name="exam_id" value="<?php echo $edit_data['exam_id']; ?>">
                <input type="hidden" name="pass_percentage" value="<?php echo $edit_data['pass_percentage']; ?>">
                <input type="hidden" name="school_ids" value="<?php echo $edit_data['school_ids']; ?>">
                <input type="hidden" name="class_id" value="<?php echo $edit_data['class_id']; ?>">
                 <input type="hidden" name="exam_id" value="<?php echo $edit_data['exam_id']; ?>">

                 <input type="hidden" name="maximum_mark" value="<?php echo $edit_data['maximum_mark']; ?>">

                
                <input type="file" name="import_client" required>
                <br>

                 <button type="submit" class="btn btn-success">Import</button>
               
                  </div>
                </div>

               
              </div> 

            </div>

           