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
                               if($profile_data['photo']!=null)
                                    {
                                      $image=$profile_data['photo'];
                                    }
                                    else
                                    {
                                      $image="student.jpg";
                                    }
                        
                        ?> 


                               <img src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" alt=""/>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="profile-desk">
                               <h1><?php echo $profile_data['name']; ?></h1>
                               <h5>
                                     <?php echo  $grade_level[$profile_data['grade_level_id']]['name'];     ?>

                               </h5>
                             
                               <h5>
                                   <?php echo  $degree[$profile_data['degree_id']]['name'];     ?>
                                 
                               </h5>
                                 <h5>
                                <?php 

                                    $dept=$department[$degree[$profile_data['degree_id']]['department_id']];

                                echo  $dept['name'];     ?>

                               </h5>
                               <a href="#" class="btn btn-primary">Edit Profile</a>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="profile-statistics">

                              <?php 

                                    $fname="Not Update";
                                    $fnumber="Not Update";
                                    $mname="Not Update";
                                    $mnumber="Not Update";
                                    $address="Not Updated";

                                    if(!empty($parent_data))
                                    {
                                      $fname="Mr.".$parent_data['f_name'];
                                      $fnumber=$parent_data['f_phone'];
                                      $mname="Mrs.".$parent_data['m_name'];
                                      $mnumber=$parent_data['m_phone'];
                                      $address=$profile_data['door_no']."-".$profile_data['street']."-".$profile_data['city'];
                                    }


                              ?>

                               <h1><?php echo $fname; ?></h1>
                               <p><?php echo $fnumber; ?></p>
                               <h1><?php echo $mname; ?></h1>
                               <p><?php echo $mnumber; ?></p>
                               <hr>
                               <p><?php echo $address; ?></p>
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
                                    Marks
                                </a>
                            </li>
                                 <li>
                                <a data-toggle="tab" href="#timetable">
                                    Time Table
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#job-history">
                                    Academic History
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#contacts" class="contact-map">
                                    Attandance
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#settings">
                                    Subjects And Assignment
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="overview" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-8">
                                        
                                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                        <script type="text/javascript">
                                          google.charts.load('current', {'packages':['bar']});
                                          google.charts.setOnLoadCallback(drawChart);

                                          function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                              ['Test Name', 'Topper Score', 'Your Score', 'Average Score'],
                                              ['Unit Test 1', 90,75, 60],
                                              ['Unit Test 2', 95, 65, 50],
                                              ['Unit Test 3', 92, 45, 55]
                                            ]);

                                            var options = {
                                              chart: {
                                                title: 'Unit Test Performance'
                                                  },
                                                legend: {position: 'bottom', textStyle: {color: 'blue', fontSize: 10}}
                                            };

                                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                            chart.draw(data, google.charts.Bar.convertOptions(options));
                                          }
                                        </script>

                                          <div id="columnchart_material" style="width: 600px; height: 500px;"></div>

                                       
                                    </div>
                                    <div class="col-md-4">
                                        <div class="prf-box">
                                            <h3 class="prf-border-head">Subjectwise Analysis</h3>
                                            <div class=" wk-progress">
                                                <div class="col-md-5">Operation System</div>
                                                <div class="col-md-5">
                                                    <div class="progress  ">
                                                        <div style="width: 70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-danger">
                                                            <span class="sr-only">70% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">70%</div>
                                            </div>
                                            <div class=" wk-progress">
                                                <div class="col-md-5">Computer Graphics</div>
                                                <div class="col-md-5">
                                                    <div class="progress ">
                                                        <div style="width: 57%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                                                            <span class="sr-only">57% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">57%</div>
                                            </div>
                                            <div class=" wk-progress">
                                                <div class="col-md-5">Networks</div>
                                                <div class="col-md-5">
                                                    <div class="progress ">
                                                        <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-info">
                                                            <span class="sr-only">20% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">20%</div>
                                            </div>
                                            <div class=" wk-progress">
                                                <div class="col-md-5">Data Structure</div>
                                                <div class="col-md-5">
                                                    <div class="progress ">
                                                        <div style="width: 30%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                                            <span class="sr-only">30% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">30%</div>
                                            </div>
                                        </div>
                                        <div class="prf-box">
                                            <h3 class="prf-border-head">Quick Links</h3>
                                            <div class=" wk-progress pf-status">
                                                <div class="col-md-8 col-xs-8">
                                                  <a class="btn btn-primary">
                                                Edit Profile
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
                                     
                        <header class="panel-heading no-border">
                            Class Time Table
                     
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="purple-bg">Day</th>
                                    <th class="terques-bg">I</th>
                                    <th class="purple-bg">II</th>
                                    <th class="terques-bg">III</th>
                                    <th class="purple-bg">I</th>
                                    <th class="terques-bg">II</th>
                                    <th class="purple-bg">III</th>
                                    <th class="terques-bg">I</th>
                                    <th class="purple-bg">II</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="terques-bg">Monday</td>
                                    <td>CS1301</td>
                                    <td>CS1302</td>
                                    <td>CS1303</td>
                                    <td>CS1301</td>
                                    <td>CS1304</td>
                                    <td>CS1305</td>
                                    <td>CS1306</td>
                                    <td>CS1301</td>
                                </tr>
                                <tr>
                                    <td class="purple-bg">TuesDay</td>
                                    <td>CS1301</td>
                                    <td>CS1302</td>
                                    <td>CS1303</td>
                                    <td>CS1301</td>
                                    <td>CS1306</td>
                                    <td>CS1305</td>
                                    <td>CS1307</td>
                                    <td>CS1301</td>
                                </tr>
                                  <tr>
                                    <td class="terques-bg">Wednesday</td>
                                    <td>CS1301</td>
                                    <td>CS1302</td>
                                    <td>CS1303</td>
                                    <td>CS1301</td>
                                    <td>CS1306</td>
                                    <td>CS1305</td>
                                    <td>CS1307</td>
                                    <td>CS1301</td>
                                </tr>
                                  <tr>
                                    <td class="purple-bg">Thursday</td>
                                    <td>CS1301</td>
                                    <td>CS1306</td>
                                    <td>CS1304</td>
                                    <td>CS1301</td>
                                    <td>CS1306</td>
                                    <td>CS1305</td>
                                    <td>CS1307</td>
                                    <td>CS1301</td>
                                </tr>
                                  <tr>
                                    <td class="terques-bg">Friday</td>
                                    <td>CS1304</td>
                                    <td>CS1302</td>
                                    <td>CS1303</td>
                                    <td>CS1302</td>
                                    <td>CS1306</td>
                                    <td>CS1305</td>
                                    <td>CS1307</td>
                                    <td>CS1301</td>
                                </tr>
                                  <tr>
                                    <td class="purple-bg">Saturday</td>
                                    <td>CS1304</td>
                                    <td>CS1302</td>
                                    <td>CS1303</td>
                                    <td>CS1306</td>
                                    <td>CS1306</td>
                                    <td>CS1305</td>
                                    <td>CS1307</td>
                                    <td>CS1301</td>
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
                                        <div class="timeline-messages">
                                            <h3>Take a Tour</h3>
                                            <!-- Comment -->
                                            <div class="msg-time-chat">
                                                <div class="message-body msg-in">
                                                    <span class="arrow"></span>
                                                    <div class="text">
                                                        <div class="first">
                                                            XII - 80% - 2016
                                                        </div>
                                                        <div class="second bg-terques ">
                                                            St.John Matriculation Hr Sec School,Madurai
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /comment -->

                                            <!-- Comment -->
                                            <div class="msg-time-chat">
                                                <div class="message-body msg-in">
                                                    <span class="arrow"></span>
                                                    <div class="text">
                                                        <div class="first">
                                                            X - 88% - 2014
                                                        </div>
                                                        <div class="second bg-red">
                                                           Velammal Matriculation School,Madurai
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /comment -->

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="contacts" class="tab-pane">
                                <div class="row">
                                     <div class="col-md-12">
                                     
                        <header class="panel-heading no-border">
                           
                     
                        </header>
                        <div class="panel-body">
                          <div style="overflow-x:auto;">
                        <table  class="table table-bordered table-striped">
                                <thead>
                                 <tr>

                                  <th class="purple-bg">Month</th>

                                    <?php 

                                      for($i=1;$i<32;$i++)
                                      {

                                        ?>
                                         <th  class="purple-bg" width="5px"><?php echo $i; ?></th>

                                        <?php

                                      }

                                  ?>
                                  <th class="purple-bg">TWD</th>
                                  <th class="purple-bg">NP</th>
                                  <th class="purple-bg">NA</th>

                                  
                                 
                                </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>January</td>
                                    <td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td class="bg-primary"></td><td class="bg-primary"></td>
                                    <td>X</td><td>X</td><td class="red-bg">AB</td><td>X</td><td>X</td><td class="bg-primary">X</td><td class="bg-primary"></td><td class="bg-primary"></td><td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td class="bg-primary"></td><td>X</td><td class="bg-primary"></td><td>X</td><td>X</td><td>X</td><td class="red-bg">AB</td><td class="bg-primary"></td><td class="bg-primary"></td>
                                    <td>22</td>
                                    <td>20</td>
                                    <td>2</td>

                                  </tr>
                                    <tr>
                                    <td>February</td>
                                    <td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td class="bg-primary"></td><td class="bg-primary"></td>
                                    <td>X</td><td>X</td><td class="red-bg">AB</td><td>X</td><td>X</td><td class="bg-primary">X</td><td class="bg-primary"></td><td class="bg-primary"></td><td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td class="bg-primary"></td><td>X</td><td class="bg-primary"></td><td>X</td><td>X</td><td>X</td><td>X</td><td class="bg-primary"></td><td class="bg-primary"></td>
                                    <td>22</td>
                                    <td>21</td>
                                    <td>1</td>

                                  </tr>
                                    <tr>
                                    <td>March</td>
                                    <td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td class="bg-primary"></td><td class="bg-primary"></td>
                                    <td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td class="bg-primary">X</td><td class="bg-primary"></td><td class="bg-primary"></td><td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td>X</td><td class="bg-primary"></td><td>X</td><td class="bg-primary"></td><td>X</td><td>X</td><td>X</td><td>X</td><td class="bg-primary"></td><td class="bg-primary"></td>
                                    <td>22</td>
                                    <td>22</td>
                                    <td>0</td>

                                  </tr>
                               
                                
                                </tbody>
                            </table>

                         
                          </div>
                          <br>
                             <button class="btn bg-primary">Holiday</button>
                            <button class="btn red-bg">Absend</button>

                        </div>
                 
                                    </div>
                                </div>
                            </div>
                            <div id="settings" class="tab-pane">
                                <div class="position-center">
                                    <div class="prf-contacts sttng">
                                        <h2>  Personal Information</h2>
                                    </div>
                                    <form role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label"> Avatar</label>
                                            <div class="col-lg-6">
                                                <input type="file" id="exampleInputFile" class="file-pos">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Company</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="c-name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Lives In</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="lives-in" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Country</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="country" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Description</label>
                                            <div class="col-lg-10">
                                                <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="prf-contacts sttng">
                                        <h2> socail networks</h2>
                                    </div>
                                    <form role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Facebook</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="fb-name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Twitter</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="twitter" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Google plus</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="g-plus" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Flicr</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="flicr" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Youtube</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="youtube" class="form-control">
                                            </div>
                                        </div>

                                    </form>
                                    <div class="prf-contacts sttng">
                                        <h2>Contact</h2>
                                    </div>
                                    <form role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Address 1</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="addr1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Address 2</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="addr2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Phone</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Cell</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="cell" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Skype</label>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder=" " id="skype" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                                <button class="btn btn-default" type="button">Cancel</button>
                                            </div>
                                        </div>

                                    </form>
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