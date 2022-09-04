    <link rel="stylesheet" type="text/css" href="<?php echo  base_url(); ?>/bk_style/plugins/datepicker/jquery.datetimepicker.css"/ >
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
           
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading purple-bg">
                           <?php echo $form_heading; ?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                             

                              <?php

                      echo form_open_multipart(base_url() . 'Admin/staffs/create' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>

                    <!------------------------------ extracted form start ------->

                         <h4>Joining Detail</h4>
                         <hr>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Staff No  <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="staff_no" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="staff_no" id="staff_no" placeholder="2111" required="required" type="text" value="<?php echo $edit_data['staff_no']; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Joining Date <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="doj" name="doj" required="required" class="form-control col-md-7 col-xs-12 ed" value="<?php echo date('d-m-Y',strtotime($edit_data['doj'])); ?>">
                      </div>
                    </div>
                 <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Department<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php               

                            if(!empty($department_lists))
                            {
                               foreach ($department_lists as $department) {

                                  $option_dp[$department['department_id']]=$department['name'];
                                 
                               }
                            }
                            
                            
                                 $class_dp="id='department_id' class='form-control' style='#000000;'";

                                echo form_dropdown('department_id',$option_dp,$exam_data['department_id'],$class_dp);
                     ?>
                      </div>
                    </div>


                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Degination<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <?php               

                            if(!empty($designation_lists))
                            {
                               foreach ($designation_lists as $designation) {

                                  $option_des[$designation['des_id']]=$designation['name'];
                                 
                               }
                            }
                            
                            
                                 $class_des="id='designation_id' class='form-control' style='#000000;'";

                                echo form_dropdown('designation_id',$option_des,$exam_data['designation_id'],$class_des);
                     ?>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">User Type<span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                          <?php               

                            if(!empty($user_type_lists))
                            {
                               foreach ($user_type_lists as $user_type) {

                                  $option_ut[$user_type['user_type_id']]=$user_type['name'];
                                 
                               }
                            }
                            
                            
                                 $class_ut="id='user_type_id' class='form-control' style='#000000;'";

                                echo form_dropdown('user_type_id',$option_ut,$user_type_id,$class_ut);
                     ?>
                      </div>
                    </div>
                    
                   <h4>Personal Information</h4>
                         <hr>
                  
                   


                    <input   style="color: #000000;"  type="hidden" name="staff_id">

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="name" id="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date of Birth <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="dob" name="dob" required="required" class="form-control col-md-7 col-xs-12 ed">
                      </div>
                    </div>
                     <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input   style="color: #000000;"  type="radio" name="gender" value="1"> &nbsp; Male &nbsp;
                              </label>
                              <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input   style="color: #000000;"  type="radio" name="gender" value="2" checked=""> Female
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Upload Photo
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">    
                        Area of the specilization
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="area_spl" name="area_spl"  class="form-control col-md-7 col-xs-12" placeholder="Computer Science">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website"> 
                    Years of experience
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="year_exp" name="year_exp"  placeholder="A+" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">
                      Highest Qualification
                 <span class="required">*</span> 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">



                         <?php       

                         

                            if(!empty($degree_group_lists))
                            {
                               foreach ($degree_group_lists as $degree_level) {

                                  $option_dl[$degree_level['degree_group_id']]=$degree_level['name'];
                                 
                               }
                            }
                            
                            
                                 $class_dl="id='degree_level_id' class='form-control' style='#000000;'";

                                echo form_dropdown('hqualification',$option_dl,$hqualification,$class_dl);
                     ?>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Mail ID <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="religion" type="email" name="email"  class="form-control col-md-7 col-xs-12" placeholder="ji@gmail.com">
                      </div>
                    </div>

                     <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Phone Number <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="ph_no" type="number" name="ph_no"  class="form-control col-md-7 col-xs-12" placeholder="9696968574">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Alternative Phone Number <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="al_ph_no" type="number" name="al_ph_no"  class="form-control col-md-7 col-xs-12" placeholder="9865745689">
                      </div>
                    </div>
                 
                    
                     <h4>Address For Communication</h4>
                     <hr>


                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Door No<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="door_no" name="door_no"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Street<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="street" name="street"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Area/Village<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="area" name="area"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">City<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="city" name="city"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Pincode<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="number" id="pincode" name="pincode"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>



                    <!------------------------------ extracted form end------->

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

