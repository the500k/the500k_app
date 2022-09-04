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

                      echo form_open_multipart(base_url() . 'Admin/students/create_parent' , array('data-toggle' => 'validator', 'role' => 'form','class'=>'cmxform form-horizontal'));
                      

                    ?>
                    <!------------------------------ extracted form start ------->

                         <h4>Admission Detail</h4>
                         <hr>

                          <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Admission No  <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  id="adm_no" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="adm_no" id="adm_no" placeholder="2111" type="text" value="<?php echo $student_data['adm_no']; ?>" readonly>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Admission Date <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="doa" name="doa" required="required" class="form-control col-md-7 col-xs-12 ed" value="<?php echo date('d-m-y',strtotime($student_data['doa'])); ?>" readonly>
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
                            
                            
                                 $class_dg="id='degree_id' class='form-control' style='color:#000000;' readonly";

                                echo form_dropdown('degree_id',$option_dg,$student_data['degree_id'],$class_dg);
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
                            
                            
                                 $class_gl="id='grade_level_id' class='form-control' style='color:#000000;' readonly";

                                echo form_dropdown('grade_level_id',$option_gl,$student_data['grade_level_id'],$class_gl);
                     ?> 
                      </div>
                    </div>
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Student Name<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input   style="color: #000000;"  type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $student_data['name']; ?>" type="text" readonly>
                      </div>
                    </div>

                      


                   
                    
<!-- Father Details -->
                  
                    <h4>Father's Detail</h4>
                    <hr>

                    <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>">

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" value="<?php echo $f_name; ?>" name="f_name" id="f_name" placeholder="both name(s) e.g Jon Doe"  type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Qualification<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="f_qualification" value="<?php echo $f_qualification; ?>" name="f_qualification"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Occupation<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="f_occupation" name="f_occupation" value="<?php echo $f_occupation; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Annual Income
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="f_income" name="f_income"  class="form-control col-md-7 col-xs-12" value="<?php echo $f_income; ?>" placeholder="Rs.200000">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Landline No
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="f_landline" name="f_landline"  placeholder="2450635" class="form-control col-md-7 col-xs-12" value="<?php echo $f_landline; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">
                      Mobile No <span class="required">*</span> 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input id="f_phone" style="color: #000000;" type="text" name="f_phone" class="optional form-control col-md-7 col-xs-12" placeholder="99994985459" value="<?php echo $f_phone; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Email ID <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input id="f_email" style="color: #000000;" type="email" name="f_email"  class="form-control col-md-7 col-xs-12"  placeholder="jeevaa19@gmail.com" value="<?php echo $f_email; ?>">
                      </div>
                    </div>
              
       <!-- Mother Detail -->
          <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">

                    <h4>Mother's Detail</h4>
                    <hr>
                    

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input style="color: #000000;" value="<?php echo $m_name; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="m_name" id="m_name" placeholder="both name(s) e.g Jon Doe"  type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Qualification<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="m_qualification" name="m_qualification" value="<?php echo $m_qualification; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Occupation<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="m_occupation" name="m_occupation"  class="form-control col-md-7 col-xs-12" value="<?php echo $m_occupation; ?>">
                      </div>
                    </div>
                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Annual Income
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="m_income" name="m_income"  class="form-control col-md-7 col-xs-12" placeholder="Rs.200000" value="<?php echo $m_income; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Landline No
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="m_landline" name="m_landline"  placeholder="2450635" class="form-control col-md-7 col-xs-12" value="<?php echo $m_landline; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">
                      Mobile No <span class="required">*</span> 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input id="m_phone" style="color: #000000;" type="text" name="m_phone" class="optional form-control col-md-7 col-xs-12" placeholder="99994985459" value="<?php echo $m_phone; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Email ID <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input id="m_email" style="color: #000000;" type="email" name="m_email"  class="form-control col-md-7 col-xs-12"  placeholder="jeevaa19@gmail.com" value="<?php echo $m_email; ?>">
                      </div>
                    </div>

                    
                    <h4>Guardian's Detail</h4>
                    <hr>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input id="name" style="color: #000000;" class="form-control col-md-7 col-xs-12" name="g_name" id="g_name" placeholder="both name(s) e.g Jon Doe"  type="text" value="<?php echo $g_name; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Qualification<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="g_qualification" name="g_qualification"  class="form-control col-md-7 col-xs-12" value="<?php echo $g_qualification; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Occupation<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="g_occupation" name="g_occupation"  class="form-control col-md-7 col-xs-12" value="<?php echo $g_occupation; ?>">
                      </div>
                    </div>
                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Annual Income
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="g_income" name="g_income"  class="form-control col-md-7 col-xs-12" placeholder="Rs.200000" value="<?php echo $g_income; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Landline No
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input  style="color: #000000;" type="text"  id="g_landline" name="g_landline"  placeholder="2450635" class="form-control col-md-7 col-xs-12" value="<?php echo $g_landline; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">
                      Mobile No <span class="required">*</span> 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input id="g_phone" style="color: #000000;" type="text" name="g_phone" class="optional form-control col-md-7 col-xs-12" placeholder="99994985459" value="<?php echo $g_phone; ?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Email ID <span class="required">*</span></label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <input id="g_email" style="color: #000000;" type="email" name="g_email"  class="form-control col-md-7 col-xs-12"  placeholder="jeevaa19@gmail.com" value="<?php echo $g_email; ?>">
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

