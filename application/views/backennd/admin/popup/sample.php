
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                     
                     <h3>Exam Details</h3>
                    <div class="table-responsive" style="text-align: left; margin-bottom: 17px">
                      
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
                         
                      <?php echo form_open_multipart(base_url().'import_export/import_board_topics'); ?>
                       <h4><b>Upload Your File[upload only .xls file]</b></h4>

                       <?php 

                          $this->session->set_userdata('referred_from', current_url());

                       ?>
               

                 <button type="submit" class="btn btn-success">Import</button>
               
                  </div>
                </div>

               
              </div> 

            </div>





