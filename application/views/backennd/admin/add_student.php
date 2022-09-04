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

                      echo form_open_multipart(base_url() . 'Admin/students/create' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>

                    <!------------------------------ extracted form start ------->

                         <h4>Admission Detail</h4>
                         <hr>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Admission No  <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="adm_no" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="adm_no" id="adm_no" placeholder="2111" required="required" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Admission Date <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="doa" name="doa" required="required" class="form-control col-md-7 col-xs-12 ed">
                      </div>
                    </div>
                 <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Degree Admitted <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                       <?php               

                            if(!empty($degree_lists))
                            {
                               foreach ($degree_lists as $degree) {

                                  $option_dg[$degree['degree_id']]=$degree['name'];
                                 
                               }
                            }
                            
                            
                                 $class_dg="id='degree_id' class='form-control' style='#000000;'";

                                echo form_dropdown('degree_id',$option_dg,$degree_id,$class_dg);
                     ?>
                      </div>
                    </div>


                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Degree Year <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                           <?php               

                            if(!empty($grade_level_lists))
                            {
                               foreach ($grade_level_lists as $grade_level) {

                                  $option_gl[$grade_level['grade_level_id']]=$grade_level['name'];
                                 
                               }
                            }
                            
                            
                                 $class_gl="id='grade_level_id' class='form-control' style='#000000;'";

                                echo form_dropdown('grade_level_id',$option_gl,$grade_level_id,$class_gl);
                     ?> 
                      </div>
                    </div>
                    
                   <h4>Personal Information</h4>
                         <hr>
                  
                   


                    <input   style="color: #000000;"  type="hidden" name="student_id">

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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Place of birth 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="pob" name="pob"  class="form-control col-md-7 col-xs-12" placeholder="Madurai">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Blood Group
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="blood_group" name="blood_group"  placeholder="A+" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">
                      Nationality <span class="required">*</span> 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="nationality" type="text" name="nationality" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" placeholder="Indian">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Religion <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="religion" type="text" name="religion"  class="form-control col-md-7 col-xs-12" placeholder="Hindu...">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Community <span class="required">*</span></label>
                     
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <select class="form-control" name="communitity">
                          <option value="1">BC</option>
                          <option value="2">MBC</option>
                          <option value="3">SC</option>
                          <option value="4">SCA</option>
                          <option value="5">ST</option>
                          <option value="6">Economically weaker section</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Physically Challenged</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input   style="color: #000000;"  type="radio" name="gender" value="1"> &nbsp; Yes  &nbsp;
                              </label>
                              <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input   style="color: #000000;"  type="radio" name="gender" value="2" checked=""> NO 
                            </div>
                          </div>
                        </div>
                   
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Mother Tongue <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="mother_tongue" name="mother_tongue"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Transport</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="transport" value="1"> &nbsp; College Bus &nbsp;
                              </label>
                              <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="transport" value="2" checked=""> Private 
                            </div>
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

